<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore;

enum RegimeFiscale: string
{
    /**
     *  Regime ordinario.
     */
    case RF01 = 'RF01';

    /**
     * Regime dei contribuenti minimi (art. 1,c.96-117, L. 244/2007).
     */
    case RF02 = 'RF02';

    /**
     * Agricoltura e attività connesse e pesca (artt. 34 e 34-bis, D.P.R. 633/1972).
     */
    case RF04 = 'RF04';

    /**
     * Vendita sali e tabacchi (art. 74, c.1, D.P.R. 633/1972).
     */
    case RF05 = 'RF05';

    /**
     * Commercio dei fiammiferi (art. 74, c.1, D.P.R. 633/1972).
     */
    case RF06 = 'RF06';

    /**
     * Editoria (art. 74, c.1, D.P.R. 633/1972).
     */
    case RF07 = 'RF07';

    /**
     * Gestione di servizi di telefonia pubblica (art. 74, c.1, D.P.R. 633/1972).
     */
    case RF08 = 'RF08';

    /**
     * Rivendita di documenti di trasporto pubblico e di sosta (art. 74, c.1, D.P.R. 633/1972).
     */
    case RF09 = 'RF09';

    /**
     * Intrattenimenti, giochi e altre attività	di cui alla tariffa allegata al D.P.R. 640/72 (art. 74, c.6, D.P.R. 633/1972).
     */
    case RF10 = 'RF10';

    /**
     * Agenzie di viaggi e turismo (art. 74-ter, D.P.R. 633/1972).
     */
    case RF11 = 'RF11';

    /**
     * Agriturismo (art. 5, c.2, L. 413/1991).
     */
    case RF12 = 'RF12';

    /**
     * Vendite a domicilio (art. 25-bis, c.6, D.P.R. 600/1973).
     */
    case RF13 = 'RF13';

    /**
     * Rivendita di beni usati, di oggetti	d’arte, d’antiquariato o da collezione (art.	36, D.L. 41/1995).
     */
    case RF14 = 'RF14';

    /**
     * Agenzie di vendite all’asta di oggetti d’arte, antiquariato o da collezione (art. 40-bis, D.L. 41/1995).
     */
    case RF15 = 'RF15';

    /**
     * IVA per cassa P.A. (art. 6, c.5, D.P.R. 633/1972).
     */
    case RF16 = 'RF16';

    /**
     * IVA per cassa (art. 32-bis, D.L. 83/2012).
     */
    case RF17 = 'RF17';

    /**
     * Regime forfettario.
     */
    case RF19 = 'RF19';

    /**
     * Altro.
     */
    case RF18 = 'RF18';
}
