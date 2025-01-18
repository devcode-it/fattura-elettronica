<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

enum TipoDocumento: string
{
    /**
     * Fattura.
     */
    case TD01 = 'TD01';

    /**
     * Acconto / anticipo su fattura.
     */
    case TD02 = 'TD02';

    /**
     * Acconto / anticipo su parcella.
     */
    case TD03 = 'TD03';

    /**
     * Nota di credito.
     */
    case TD04 = 'TD04';

    /**
     * Nota di debito.
     */
    case TD05 = 'TD05';

    /**
     * Parcella.
     */
    case TD06 = 'TD06';

    /**
     * Integrazione fattura reverse charge interno.
     */
    case TD16 = 'TD16';

    /**
     * Integrazione/autofattura per acquisto servizi dall'estero.
     */
    case TD17 = 'TD17';

    /**
     * Integrazione per acquisto di beni intracomunitari.
     */
    case TD18 = 'TD18';

    /**
     * Integrazione/autofattura per acquisto di beni ex art.17 c.2 DPR 633/72.
     */
    case TD19 = 'TD19';

    /**
     * Autofattura per regolarizzazione e integrazione delle fatture (ex art.6 c.8 e 9-bis d.lgs.471/97 o art.46 c.5 D.L. 331/93.
     */
    case TD20 = 'TD20';

    /**
     * Autofattura per splafonamento.
     */
    case TD21 = 'TD21';

    /**
     * Estrazione benida Deposito IVA.
     */
    case TD22 = 'TD22';

    /**
     * Estrazione beni da Deposito IVA con versamento dell'IVA.
     */
    case TD23 = 'TD23';

    /**
     * Fattura differita di cui all'art.21, comma 4, terzo periodo lett. a) DPR 633/72.
     */
    case TD24 = 'TD24';

    /**
     * Fattura differita di cui all'art.21, comma 4, terzo periodo lett. b) DPR 633/72.
     */
    case TD25 = 'TD25';

    /**
     * Cessione di beni ammortizzabili e per passaggi interni (ex art.36 DPR 633/72).
     */
    case TD26 = 'TD26';

    /**
     * Fattura per autoconsumo o per cessioni gratuite senza rivalsa.
     */
    case TD27 = 'TD27';

    /**
     * Acquisti da San Marino con IVA (fattura cartacea).
     */
    case TD28 = 'TD28';
}
