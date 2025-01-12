import pandas as pd
import os
import shutil

def genera_da_file(file, tipo):
    shutil.rmtree(os.path.join(percorso_generazione, tipo))

    print(f"Lettura del file Excel")
    df = pd.read_excel("build/RappresentazioneTabellareFattOrdinaria 1.8_vers 260214.xlsx")

    df.columns = df.iloc[2]
    df = (
        df.iloc[3:]
        .reset_index(drop=True)
        .rename(columns={df.columns[13]: "Occorrenze", df.columns[14]: "Dimensioni"})
    )

    print(f"Separazione delle componenti")
    separazioni = df[df.iloc[:, :8].isnull().all(axis=1)]
    strutture = [
        df.iloc[: separazioni.index[0]],
        df.iloc[separazioni.index[0] + 1 : separazioni.index[1]],
    ]

    print(f"Lavorazione delle codifiche")
    codifiche = (
        df.iloc[separazioni.index[1] + 2 :].dropna(axis=1, how="all").reset_index(drop=True)
    )
    codifiche.columns = ["Codice", "Descrizione"]
    separatori_codifiche = codifiche[codifiche.iloc[:, 0].str.contains("<")].index

    mappa_codifiche = {}
    for i in range(1, len(separatori_codifiche)):
        inizio = separatori_codifiche[i - 1]
        fine = separatori_codifiche[i]
        nome = codifiche.iloc[inizio, 0]
        mappa_codifiche[nome] = codifiche[inizio + 1 : fine].reset_index(drop=True)

    genera_codifiche(mappa_codifiche, tipo)
    for i in strutture:
        genera_struttura(i, tipo)

def filtra_nome(nome):
    return nome.split("<")[-1].strip("<>")


def filtra_numero(nome):
    return nome.split("<")[0].strip()

def genera_codifiche(mappa_codifiche, namespace):
    namespace = f"{namespace}\\Codifiche"

    # Genera classi per le codifiche
    for nome, elementi in mappa_codifiche.items():
        nome = filtra_nome(nome)

        print(f"Generazione di enum per la codifica {nome}")

        casi = []
        for i, row in elementi.iterrows():
            casi.append(
                f"""
        // {row["Descrizione"]}
        case {row["Codice"].replace(".", "_")} = "{row["Codice"]}";
            """
            )

        casi = "".join(casi)
        contenuto = f"""enum {nome} : string {{
    {casi}
}}
"""

        os.makedirs(os.path.join(percorso_generazione, namespace), exist_ok=True)
        with open(
            os.path.join(percorso_generazione, namespace, f"{nome}.php"), "w+"
        ) as f:
            f.write(prefisso_file.replace("{namespace}", f"\\{namespace}" if len(namespace) else "") + contenuto)


mappa_tipi = {
    "xs:normalizedString": "string",
    "xs:string": "string",
    "xs:base64Binary": "string",
    "xs:integer": "int",
    "xs:decimal": "float",
    "xs:date": "date",
}

low = lambda s: s[:1].lower() + s[1:] if s else ""
replica_text = "contiene gli stessi elementi informativi previsti per il blocco"
global_map = {}


def genera_struttura(struttura_df, namespace):
    struttura_df = struttura_df.reset_index(drop=True)
    componente_primario = struttura_df.iloc[0]
    nome = filtra_nome(componente_primario[0])
    numero = filtra_numero(componente_primario[0])

    global_map[numero] = struttura_df.copy()
    sotto_namespace = f"{namespace}\\{nome}".strip("\\")

    print(f"Generazione della struttura {numero} {nome} ({namespace})")

    separatori_componenti = struttura_df[~struttura_df.iloc[:, 1].isnull()].index
    if len(separatori_componenti) == 0:
        return

    proprieta = []
    importazioni = ["Standard\\Elemento"]
    initializzatione = []
    corpo = []
    variabili = []
    componenti_da_generare = []
    for inizio, fine in zip(
        separatori_componenti.tolist(),
        separatori_componenti.tolist()[1:] + [struttura_df.shape[0]],
    ):
        parti_componente = struttura_df.iloc[inizio:fine, 1:]
        componente = parti_componente.reset_index(drop=True).iloc[0]
        nome_componente = filtra_nome(componente[0])
        occorrenze = componente["Occorrenze"]
        max_numerosita = occorrenze.split(".")[-1].strip("<>")
        min_numerosita = occorrenze.split(".")[0].strip("<>")

        nome_variabile = nome_componente

        if (
            parti_componente.shape[0] == 1
            and replica_text in componente["Descrizione funzionale"]
        ):
            numero_copia = filtra_numero(
                componente["Descrizione funzionale"].split(replica_text)[-1]
            )
            parti_componente = pd.concat(
                [parti_componente, global_map[numero_copia].iloc[1:]]
            ).reset_index(drop=True)

        if parti_componente.shape[0] == 1:
            tipo_componente = componente["Tipo info"]
            dimensioni = componente["Dimensioni"]
            parti_dimensioni = str(dimensioni).split(" ")
            min_length = parti_dimensioni[0]
            max_length = parti_dimensioni[-1]

            if mappa_tipi[tipo_componente] == "string":
                importazioni.append(f"Standard\\Testo")
                proprieta.append(
                    f"protected Testo ${nome_variabile};"
                )
                initializzatione.append((
                    nome_variabile,
                    f"Testo({'true' if min_numerosita == '0' else 'false'}, {min_length}, {max_length}{', ' + max_numerosita if max_numerosita != 'N' else ''})"
                ))
                variabili.append(("?string", nome_variabile))

                corpo.append(f"""
    public function get{nome_variabile}() : ?string {{
        return $this->{nome_variabile}->get();
    }}

    public function set{nome_variabile}(?string $value) {{
        $this->{nome_variabile}->set($value);

        return $this;
    }}""")
            elif mappa_tipi[tipo_componente] == "date":
                importazioni.append(f"Standard\\Data")
                importazioni.append(f"Carbon\\Carbon")
                proprieta.append(
                    f"protected Data ${nome_variabile};"
                )
                variabili.append(("null|string|Carbon|\DateTime", nome_variabile))
                initializzatione.append((
                    nome_variabile,
                    f"Data({'true' if min_numerosita == '0' else 'false'})"
                ))
                corpo.append(f"""
    public function get{nome_variabile}() : ?string {{
        return $this->{nome_variabile}->get();
    }}

    public function set{nome_variabile}(null|string|Carbon|\DateTime $value) {{
        $this->{nome_variabile}->set($value);

        return $this;
    }}""")
            elif mappa_tipi[tipo_componente] == "float":
                importazioni.append(f"Standard\\Decimale")
                proprieta.append(
                    f"protected Decimale ${nome_variabile};"
                )
                variabili.append(("?float", nome_variabile))

                initializzatione.append((
                    nome_variabile,
                    f"Decimale({'true' if min_numerosita == '0' else 'false'})"
                ))
                
                corpo.append(f"""
    public function get{nome_variabile}() : ?float {{
        return $this->{nome_variabile}->get();
    }}

    public function set{nome_variabile}(?float $value) {{
        $this->{nome_variabile}->set($value);

        return $this;
    }}""")
            else:
                tipo = f"{'?' if occorrenze == '<0.1>' else ''}{mappa_tipi[tipo_componente]}"
                proprieta.append(
                    f"protected {tipo} ${nome_variabile};"
                )
                if occorrenze != '<0.1>':
                    initializzatione.append((
                        nome_variabile,
                        f"0"
                    ))

                variabili.append((tipo, nome_variabile))

                corpo.append(f"""
    public function get{nome_variabile}() : {('?' if '?' not in tipo else '') + tipo} {{
        return $this->{nome_variabile};
    }}

    public function set{nome_variabile}({tipo} $value) {{
        $this->{nome_variabile} = $value;

        return $this;
    }}""")
        else:
            importazioni.append(f"{sotto_namespace}\\{nome_componente}")

            if max_numerosita == "1":
                tipo = f"{'?' if occorrenze == '<0.1>' else ''}{nome_componente}"
                proprieta.append(
                    f"protected {tipo} ${nome_variabile};"
                )
                if occorrenze != '<0.1>':
                    initializzatione.append((
                        nome_variabile,
                        f"{nome_componente}()"
                    ))
                corpo.append(f"""
    public function get{nome_variabile}() : {nome_componente} {{
        return $this->{nome_variabile};
    }}

    public function set{nome_variabile}({tipo} ${nome_variabile}) {{
        $this->{nome_variabile} = ${nome_variabile};

        return $this;
    }}""")
            else:
                importazioni.append(f"Standard\\Collezione")
                proprieta.append(
                    f"protected Collezione ${nome_variabile};"
                )

                corpo.append(f"""
    public function get{nome_variabile}() : Collezione {{
        return $this->{nome_variabile};
    }}

    public function getAll{nome_variabile}() : array {{
        return $this->{nome_variabile}->toList();
    }}

    public function add{nome_variabile}({nome_componente} $elemento) {{
        $this->{nome_variabile}->add($elemento);

        return $this;
    }}

    public function remove{nome_variabile}(int $index) {{
        $this->{nome_variabile}->remove($index);

        return $this;
    }}""")

                initializzatione.append((
                    nome_variabile,
                    f"Collezione({nome_componente}::class, {min_numerosita}{', ' + max_numerosita if max_numerosita != 'N' else ''})"
                ))


            genera_struttura(parti_componente, sotto_namespace)

        contenuto_classe = "\n\t".join(proprieta)
        contenuto_importazioni = "\n".join(
            f"use {prefisso_namespace}\\{i};" for i in sorted(set(importazioni))
        )
        contenuto_corpo = "\n".join(corpo)

        costruttore = "" if len(initializzatione) == 0 else """public function __construct({vars}) {{
        {init}
        {values}
    }}""".format(
        init="\n\t\t".join(f"$this->{k} = {'new ' if v != '0' else ''}{v};" for (k, v) in initializzatione),
        vars=", ".join(f"{('' if '?' in k or 'null' in k else '?') + k } ${v} = null" for (k, v) in variabili),
        values="\n\t\t".join(f"if (!is_null(${v})) $this->set{v}(${v});" for (k, v) in variabili),
    )
        contenuto = f"""
{contenuto_importazioni}

/*
* {componente_primario["Descrizione funzionale"]}
*/
class {nome} extends Elemento {{
    {contenuto_classe}
    {costruttore}
    {contenuto_corpo}
}}
"""

    os.makedirs(os.path.join(percorso_generazione, namespace), exist_ok=True)
    with open(os.path.join(percorso_generazione, namespace, f"{nome}.php"), "w+") as f:
        f.write(prefisso_file.replace("{namespace}", f"\\{namespace}" if len(namespace) else "") + contenuto)

print(f"Lettura percorsi")
percorso = os.path.dirname(__file__)
percorso_generazione = os.path.join(percorso, "..", "src")
prefisso_namespace = "DevCode\FatturaElettronica"
with open(os.path.join(percorso, "prefix.php")) as f:
    prefisso_file = f.read()

print(f"Generazione codice per Fattura Ordinaria")
genera_da_file(
    os.path.join(percorso, "RappresentazioneTabellareFattOrdinaria 1.8_vers 260214.xlsx"),
    "Ordinaria"
)

print(f"Generazione codice per Fattura Semplificata")
genera_da_file(
    os.path.join(percorso, "RappresentazioneTabellareFattSemplificata"),
    "Semplificata"
)
