[![Latest Version on Packagist](https://img.shields.io/packagist/v/deved/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/deved/fattura-elettronica)
[![Build Status](https://travis-ci.org/deved-it/fattura-elettronica.svg?branch=master)](https://travis-ci.org/deved-it/fattura-elettronica)
[![Total Downloads](https://img.shields.io/packagist/dt/deved/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/deved/fattura-elettronica)
[![License](https://poser.pugx.org/deved/fattura-elettronica/license)](https://packagist.org/packages/deved/fattura-elettronica)

# Libreria Fattura Elettronica

## Descrizione
La libreria è stata testata generando solo fatture semplici.
I casi particolari non sono stati ancora trattati.
Potete segnalare qualsiasi necessità o problema
[qui](https://github.com/deved-it/fattura-elettronica/issues/new).

## Installazione

    composer require deved/fattura-elettronica

## Esempio di utilizzo

```php
use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\Common\Sede;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedente;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaOrdinaria;
use Dasc3er\FatturaElettronica\Tabelle\TipoDocumento;

require __DIR__.'/vendor/autoload.php';

$fattura = FatturaOrdinaria::build(
    TipoDocumento::Fattura,
    '2018-11-22',
    '2018221111',
    '001'
);

// Anagrafica cedente
$anagraficaCedente = DatiAnagraficiCedente::build(
    '12345678901',
    'IT',
    '12345678901',
    'Acme SpA',
);
$sedeCedente = Sede::build(
    'Via Roma 10',
    null,
    'Tarvisio',
    '33018',
    'UD',
    'IT',
);

$cedente = $fattura->getCedentePrestatore();
$cedente->setDatiAnagrafici($anagraficaCedente);
$cedente->setSede($sedeCedente);

// Anagrafica cessionario
$anagraficaCessionario = DatiAnagrafici::build(
    'XYZYZX77M04H888K',
    null,
    null,
    'Pinco Palla'
);

$sedeCessionario = Sede::build(
    'Via Diaz 35',
    null,
    'Tarvisio',
    '33018',
    'UD',
    'IT',
);
$cessionario = $fattura->getCessionarioCommittente();
$cessionario->setDatiAnagrafici($anagraficaCessionario);
$cessionario->setSede($sedeCessionario);

$fattura->getDatiGenerali()
    ->getDatiGeneraliDocumento()
    ->setImportoTotaleDocumento(122);

$linea = DettaglioLinee::build('Articolo1', 50, 'ABC', 120, 10);
$fattura->getDatiBeniServizi()->addLinea($linea);

// Generazione
$xml = $fattura->__toString();

$file = $fattura->getFileName();
var_dump($xml);
var_dump($file);
var_dump($fattura->validate());
```
