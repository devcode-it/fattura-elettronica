<?php

require_once __DIR__.'/../vendor/autoload.php';

use League\Csv\Reader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

$filesystem = new Filesystem();

function estraiLista($array, $key)
{
    $list = [];
    foreach ($array as $a) {
        if (empty($a)) {
            continue;
        }
        foreach ($a as $k => $v) {
            if ($k == $key) {
                $list[] = $v;
            }
        }
    }

    return array_merge(...$list);
}

function parseElement(SimpleXMLElement $elemento, array $riferimento_numero, string $namespace, array $descrizioni)
{
    $attributi = $elemento->attributes();
    $nome = (string) $attributi['name'];
    if (empty($nome)) {
        return;
    }

    $sotto_namespace = count($riferimento_numero) == 1 ? $namespace : $namespace.'\\'.$nome;

    $numero = implode('.', array_slice($riferimento_numero, 1));
    print_r("\nLettura struttura $numero $nome ($namespace)");

    $minimo_occorrenze = intval($attributi->minOccurs ?? 1);

    if (!empty($elemento->xpath('ancestor::xs:choice'))) {
        print_r("\n\t$nome ($namespace) is inside a choice element - set as optional");
        $minimo_occorrenze = 0;
    }

    $massimo_occorrenze = empty((string) $attributi->maxOccurs) ? 1 : (string) $attributi->maxOccurs;
    $massimo_occorrenze = $massimo_occorrenze == 'unbounded' ? null : intval($massimo_occorrenze);

    $tipo_interno = $attributi['type'];
    // Interpreta tipo composito
    $info_tipo = parseComplexType(
        $elemento,
        $nome,
        $tipo_interno,
        $sotto_namespace,
        $riferimento_numero,
        $descrizioni
    );

    $contenuti = [];
    if (!isset($info_tipo)) {
        // Interpreta tipo standard con restrizioni
        $info_tipo = parseSimpleType($elemento, $nome, $tipo_interno, $namespace);

        // Interpreta tipo standard senza restrizioni
        if (!isset($info_tipo)) {
            $info_tipo = parseStandardType($elemento, $nome, $tipo_interno, $namespace);
        }

        if (!isset($info_tipo)) {
            return;
        }

        $info_tipo['occorrenze'] = [$minimo_occorrenze, $massimo_occorrenze];

        return $info_tipo;
    }

    // Tipo personalizzato
    foreach ($info_tipo['elementi'] as $contenuto) {
        if (empty($contenuto)) {
            continue;
        }

        if ($contenuto['composto']) {
            $contenuti[] = generaComplexType(
                $elemento,
                $sotto_namespace,
                $contenuto
            );
        } else {
            $contenuti[] = generaSimpleType($elemento, $namespace, $contenuto);
        }
    }

    // Generazione contenuti della struttura
    $contenuto_classe = implode("\n\t", estraiLista($contenuti, 'properties'));
    $inizializzazioni = implode("\n\t\t", estraiLista($contenuti, 'init'));

    $array_importazioni = estraiLista($contenuti, 'import');
    $importazioni = ['use DevCode\\FatturaElettronica\\Standard\\Elemento;'];
    foreach ($array_importazioni as $i) {
        $importazioni[] = "use DevCode\\FatturaElettronica\\{$i};";
    }
    $contenuto_importazioni = implode("\n", array_unique($importazioni));
    $contenuto_corpo = implode("\n", estraiLista($contenuti, 'body'));

    $costruttore = strlen($inizializzazioni) ? sprintf(
        'public function __construct() {
    parent::__construct(%s);
    %s
}',
        $minimo_occorrenze == 0 ? 'true' : 'false',
        $inizializzazioni
    ) : '';

    print_r("\nGenerazione struttura $numero $nome ($namespace)");
    $doc = trim((string) $info_tipo['doc']);
    $doc_descrizione = isset($descrizioni[$numero]) ? trim((string) $descrizioni[$numero]) : '';

    salvaClasse($namespace, $nome, "
{$contenuto_importazioni}

/**
* @riferimento $numero
* @name $nome
*
* $doc_descrizione
*
* $doc
*/
class {$nome} extends Elemento {
    {$contenuto_classe}
    {$costruttore}
    {$contenuto_corpo}
}
");

    return [
        'composto' => true,
        'namespace' => $namespace,
        'nome' => $nome,
        'occorrenze' => [$minimo_occorrenze, $massimo_occorrenze],
    ];
}

function parseComplexType(SimpleXMLElement $elemento, string $nome, string $tipo, string $namespace, array $riferimento_numero, array $descrizioni)
{
    // Ricerca globale
    $riferimenti = $elemento->xpath("//xs:complexType[@name='$tipo']");
    if (empty($riferimenti)) {
        return null;
    }
    $riferimento = $riferimenti[0];

    $rif_doc = $riferimento->xpath('.//xs:annotation/xs:documentation');
    $doc = !empty($rif_doc) ? (string) $rif_doc[0] : null;

    /*
    foreach ($riferimento->attributes() as $second_gen) {
        print_r($second_gen);
    }
    */

    // Ricerca locale
    $elementi = [];
    $sequenza = $riferimento->xpath('.//xs:sequence//xs:element');
    foreach ($sequenza as $key => $el) {
        $elementi[] = parseElement(
            $el,
            array_merge($riferimento_numero, [$key + 1]),
            $namespace,
            $descrizioni
        );
    }

    return [
        'elementi' => $elementi,
        'doc' => $doc,
    ];
}

function parseSimpleType(SimpleXMLElement $elemento, string $nome, string $tipo, string $namespace)
{
    // Ricerca globale
    $riferimenti = $elemento->xpath("//xs:simpleType[@name='$tipo']");
    if (empty($riferimenti)) {
        return null;
    }
    $riferimento = $riferimenti[0];

    $restrizione = $riferimento->xpath('.//xs:restriction')[0];
    $tipo = (string) $restrizione->attributes()->base;

    // Gestione valori enum
    $enum = $riferimento->xpath('.//xs:enumeration');
    $riferimento_enum = null;
    if (!empty($enum)) {
        $riferimento_enum = salvaEnum($elemento, $enum, $namespace);
    }

    // Informazioni sulla lunghezza del valore
    $minimo_lunghezza = 0;
    $massimo_lunghezza = null;
    $rif_lunghezza = $riferimento->xpath('.//xs:length');
    if (!empty($rif_lunghezza)) {
        $minimo_lunghezza = $massimo_lunghezza = intval($rif_lunghezza[0]->attributes()->value);
    }

    $rif_lunghezza = $riferimento->xpath('.//xs:minLength');
    if (!empty($rif_lunghezza)) {
        $minimo_lunghezza = intval($rif_lunghezza[0]->attributes()->value);
    }

    $rif_lunghezza = $riferimento->xpath('.//xs:maxLength');
    if (!empty($rif_lunghezza)) {
        $massimo_lunghezza = intval($rif_lunghezza[0]->attributes()->value);
    }

    // Riferimento su valori possibili
    $massimo = $minimo = null;
    $rif_valore = $riferimento->xpath('.//xs:maxInclusive');
    if (!empty($rif_valore)) {
        $massimo = intval($rif_valore[0]->attributes()->value);
    }

    $rif_valore = $riferimento->xpath('.//xs:minInclusive');
    if (!empty($rif_valore)) {
        $minimo = intval($rif_valore[0]->attributes()->value);
    }

    // Riferimento refex
    $regex = null;
    $rif_regex = $riferimento->xpath('.//xs:pattern');
    if (!empty($rif_regex)) {
        $regex = (string) $rif_regex[0]->attributes()->value;
    }

    if (!is_null($regex)) {
        // Match per regex con dimensioni variabili definite
        preg_match('/(.+?)\{([0-9]+),\s*([0-9]+)\}\)?/', $regex, $match);

        if (!empty($match)) {
            $minimo_lunghezza = $match[2];
            $massimo_lunghezza = $match[3];
        } else {
            // Match per regex con dimensioni statiche definite
            preg_match('/(.+?)\{([0-9]+)\}\)?/', $regex, $match);

            if (!empty($match)) {
                $minimo_lunghezza = $massimo_lunghezza = $match[2];
            }
            // Match per regex di numeri con cifre limitate
            else {
                preg_match_all('/(\[0\-9\])+?/', $regex, $match);

                if (str_repeat('[0-9]', count($match[0])) == $regex) {
                    $minimo_lunghezza = $massimo_lunghezza = count($match[0]);
                }
            }
        }
    }

    return [
        'composto' => false,
        'valori' => [$minimo, $massimo],
        'regex' => $regex,
        'lunghezza' => [$minimo_lunghezza, $massimo_lunghezza],
        'tipo' => $tipo,
        'enum' => $riferimento_enum,
        'nome' => $nome,
    ];
}

function parseStandardType(SimpleXMLElement $elemento, string $nome, string $tipo, string $namespace)
{
    return [
        'composto' => false,
        'valori' => [null, null],
        'regex' => null,
        'lunghezza' => [0, null],
        'tipo' => $tipo,
        'enum' => null,
        'nome' => $nome,
    ];
}

function salvaEnum(SimpleXMLElement $elemento, array $valori, string $namespace)
{
    $nome = (string) $elemento->attributes()->name;
    print_r("\nGenerazione di enum per la codifica {$nome}");

    $contenuti = [];
    foreach ($valori as $valore) {
        $val = (string) $valore->attributes()->value;
        $enum_val = str_replace('.', '_', $val);

        $rif_doc = $valore->xpath('.//xs:annotation/xs:documentation');
        $doc = !empty($rif_doc) ? (string) $rif_doc[0] : null;

        $contenuti[] = sprintf('

    /**
    * %s
    */
    case %s = "%s";
    ', $doc, $enum_val, $val);
    }

    $contenuto_classe = implode('', $contenuti);

    salvaClasse($namespace, $nome, "enum {$nome} : string {
    $contenuto_classe
}");

    return [
        'namespace' => $namespace,
        'nome' => $nome,
    ];
}

function generaSimpleType(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $mappa_tipi = [
        'xs:normalizedString' => 'string',
        'xs:string' => 'string',
        'xs:base64Binary' => 'string',
        'xs:token' => 'string',
        'xs:integer' => 'int',
        'xs:decimal' => 'float',
        'xs:date' => 'date',
        'xs:dateTime' => 'datetime',
    ];

    if ($mappa_tipi[$info_tipo['tipo']] == 'string') {
        if (!empty($info_tipo['enum'])) {
            return generaEnum($elemento, $namespace, $info_tipo);
        }

        return generaTesto($elemento, $namespace, $info_tipo);
    } elseif ($mappa_tipi[$info_tipo['tipo']] == 'date') {
        return generaData($elemento, $namespace, $info_tipo);
    } elseif ($mappa_tipi[$info_tipo['tipo']] == 'datetime') {
        return generaData($elemento, $namespace, $info_tipo, 'YYYY-MM-DDTHH:MM:SS');
    } elseif ($mappa_tipi[$info_tipo['tipo']] == 'float') {
        return generaDecimale($elemento, $namespace, $info_tipo);
    } else {
        return generaIntero($elemento, $namespace, $info_tipo);
    }
}

function generaTesto(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';

    $minimo_lunghezza = $info_tipo['lunghezza'][0] ?? 'null';
    $massimo_lunghezza = $info_tipo['lunghezza'][1] ?? 'null';

    return [
        'import' => ['Standard\\Testo'],
        'init' => ["\$this->{$nome} = new Testo({$opzionale}, {$minimo_lunghezza}, {$massimo_lunghezza}, {$massimo_occorrenze});"],
        'constructor' => [['?string', $nome]],
        'properties' => ["protected Testo \${$nome};"],
        'body' => ["
    public function get{$nome}() : ?string {
        return \$this->{$nome}->get();
    }

    public function set{$nome}(?string \$value) {
        \$this->{$nome}->set(\$value);

        return \$this;
    }"],
    ];
}

function generaDecimale(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';

    return [
        'import' => ['Standard\\Decimale'],
        'init' => ["\$this->{$nome} = new Decimale({$opzionale});"],
        'constructor' => [['?float', $nome]],
        'properties' => ["protected Decimale \${$nome};"],
        'body' => ["
    public function get{$nome}() : ?float {
        return \$this->{$nome}->get();
    }

    public function set{$nome}(?float \$value) {
        \$this->{$nome}->set(\$value);

        return \$this;
    }"],
    ];
}

function generaIntero(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $min = $info_tipo['valori'][0] ?? 'null';
    $max = $info_tipo['valori'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';

    return [
        'import' => ['Standard\\Intero'],
        'init' => ["\$this->{$nome} = new Intero({$opzionale}, {$min}, {$max});"],
        'constructor' => [['?int', $nome]],
        'properties' => ["protected Intero \${$nome};"],
        'body' => ["
    public function get{$nome}() : ?int {
        return \$this->{$nome}->get();
    }

    public function set{$nome}(?int \$value) {
        \$this->{$nome}->set(\$value);

        return \$this;
    }"],
    ];
}

function generaEnum(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';
    $optionale_in_setter = $minimo_occorrenze == 1 ? '' : '|null';

    $enum_tipo = $info_tipo['enum']['nome'];

    return [
        'import' => ['Standard\\TestoEnum', implode('\\', $info_tipo['enum'])],
        'init' => ["\$this->{$nome} = new TestoEnum({$opzionale}, {$enum_tipo}::class);"],
        'constructor' => [['?string', $nome]],
        'properties' => ["protected TestoEnum \${$nome};"],
        'body' => ["
    public function get{$nome}() : ?string {
        return \$this->{$nome}->get();
    }

    public function set{$nome}({$enum_tipo}|string{$optionale_in_setter} \$value) {
        \$this->{$nome}->set(\$value);

        return \$this;
    }"],
    ];
}

function generaData(SimpleXMLElement $elemento, string $namespace, array $info_tipo, string $formato = 'YYYY-MM-DD')
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';

    $minimo_lunghezza = $info_tipo['lunghezza'][0] ?? 'null';
    $massimo_lunghezza = $info_tipo['lunghezza'][1] ?? 'null';

    return [
        'import' => ['Standard\\Data', 'Carbon\\Carbon'],
        'init' => ["\$this->{$nome} = new Data({$opzionale}, \"{$formato}\");"],
        'constructor' => [["null|string|Carbon|\DateTime", $nome]],
        'properties' => ["protected Data \${$nome};"],
        'body' => ["
    public function get{$nome}() : ?string {
        return \$this->{$nome}->get();
    }

    public function set{$nome}(null|string|Carbon|\DateTime \$value) {
        \$this->{$nome}->set(\$value);

        return \$this;
    }"],
    ];
}

function generaComplexType(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $massimo_occorrenze = $info_tipo['occorrenze'][1];

    if ($massimo_occorrenze > 1 || is_null($massimo_occorrenze)) {
        return generaAttributoCollezione($elemento, $namespace, $info_tipo);
    }

    return generaAttributoClasse($elemento, $namespace, $info_tipo);
}

function generaAttributoCollezione(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    return [
        'import' => ['Standard\\Collezione', $namespace.'\\'.$nome],
        'init' => ["\$this->{$nome} = new Collezione({$nome}::class, {$minimo_occorrenze}, {$massimo_occorrenze});"],
        'constructor' => [],
        'properties' => ["protected Collezione \${$nome};"],
        'body' => ["
    public function get{$nome}() : Collezione {
        return \$this->{$nome};
    }

    public function getAll{$nome}() : array {
        return \$this->{$nome}->toList();
    }

    public function add{$nome}({$nome} \$elemento) {
        \$this->{$nome}->add(\$elemento);

        return \$this;
    }

    public function remove{$nome}(int \$index) {
        \$this->{$nome}->remove(\$index);

        return \$this;
    }"],
    ];
}

function generaAttributoClasse(SimpleXMLElement $elemento, string $namespace, array $info_tipo)
{
    $nome = $info_tipo['nome'];
    $minimo_occorrenze = $info_tipo['occorrenze'][0];
    $massimo_occorrenze = $info_tipo['occorrenze'][1] ?? 'null';

    $opzionale = $minimo_occorrenze == 1 ? 'false' : 'true';

    return [
        'import' => [$namespace.'\\'.$nome],
        'init' => ["\$this->{$nome} = new {$nome}();"],
        'constructor' => [],
        'properties' => ["protected {$nome} \${$nome};"],
        'body' => ["
    public function get{$nome}() : {$nome} {
        return \$this->{$nome};
    }

    public function set{$nome}({$nome} \${$nome}) {
        \$this->{$nome} = \$$nome;

        return \$this;
    }"],
    ];
}

function salvaClasse(string $namespace, string $nome, string $contenuto)
{
    global $filesystem;

    $prefisso = "<?php

namespace DevCode\FatturaElettronica{namespace};";
    $prefisso = str_replace('{namespace}', strlen($namespace) ? '\\'.$namespace : '', $prefisso);

    $percorso = __DIR__.'/../src/'.$namespace;
    $filesystem->mkdir(
        Path::normalize($percorso),
    );
    file_put_contents(
        $percorso.'/'.$nome.'.php',
        $prefisso.$contenuto,
    );
}

function estraiDescrizioniDaCSV($filename)
{
    try {
        $csv = Reader::createFromPath(__DIR__.'/../specification/'.$filename, 'r');
    } catch (Exception $e) {
        return [];
    }
    $csv->setDelimiter(';');

    $records = $csv->getRecords();
    $descrizioni = [];
    foreach ($records as $offset => $record) {
        $numero = null;
        foreach ($record as $i => $val) {
            if ($i > 8) {
                break;
            }

            if (!empty($val)) {
                $numero = trim(trim(explode('<', $val)[0], '<>'));
                break;
            }
        }

        if (empty($numero)) {
            continue;
        }
        $descrizioni[$numero] = $record[11];
    }

    return $descrizioni;
}

function generaDaSchema($schema_file, $descrizioni, $namespace)
{
    global $filesystem;

    $xml = simplexml_load_file(__DIR__.'/../specification/'.$schema_file);

    $filesystem->remove(__DIR__.'/../src/'.$namespace);

    parseElement($xml->xpath('.//xs:element')[0], [1], $namespace, $descrizioni);
}

print_r("Generazione per Fattura Semplicata\n\n");
generaDaSchema(
    'Schema_VFSM10.xsd',
    estraiDescrizioniDaCSV('RappresentazioneTabellareFattSemplificata.csv'),
    'Semplificata'
);

print_r("\n\n------------------------------------\n\n");

print_r("Generazione per Fattura Ordinaria\n\n");
generaDaSchema(
    'Schema_VFPR12.xsd',
    estraiDescrizioniDaCSV('RappresentazioneTabellareFattOrdinaria 1.8_vers 260214.csv'),
    'Ordinaria'
);

print_r("\n\n");
