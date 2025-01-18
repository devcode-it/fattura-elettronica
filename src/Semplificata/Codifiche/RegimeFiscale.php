<?php

namespace DevCode\FatturaElettronica\Semplificata\Codifiche;

enum RegimeFiscale: string
{
    // Ordinario
    case RF01 = 'RF01';

    // Contribuenti minimi (art.1, c.96-117, L. 244/07)
    case RF02 = 'RF02';

    // Agricoltura e attività connesse e pesca (artt.34 e 34-bis, DPR 633/72)
    case RF04 = 'RF04';

    // Vendita sali e tabacchi (art.74, c.1, DPR. 633/72)
    case RF05 = 'RF05';

    // Commercio fiammiferi (art.74, c.1, DPR  633/72)
    case RF06 = 'RF06';

    // Editoria (art.74, c.1, DPR  633/72)
    case RF07 = 'RF07';

    // Gestione servizi telefonia pubblica (art.74, c.1, DPR 633/72)
    case RF08 = 'RF08';

    // Rivendita documenti di trasporto pubblico e di sosta (art.74, c.1, DPR  633/72)
    case RF09 = 'RF09';

    // Intrattenimenti, giochi e altre attività di cui alla tariffa allegata al DPR 640/72 (art.74, c.6, DPR 633/72)
    case RF10 = 'RF10';

    // Agenzie viaggi e turismo (art.74-ter, DPR 633/72)
    case RF11 = 'RF11';

    // Agriturismo (art.5, c.2, L. 413/91)
    case RF12 = 'RF12';

    // Vendite a domicilio (art.25-bis, c.6, DPR  600/73)
    case RF13 = 'RF13';

    // Rivendita beni usati, oggetti d’arte, d’antiquariato o da collezione (art.36, DL 41/95)
    case RF14 = 'RF14';

    // Agenzie di vendite all’asta di oggetti d’arte, antiquariato o da collezione (art.40-bis, DL 41/95)
    case RF15 = 'RF15';

    // IVA per cassa P.A. (art.6, c.5, DPR 633/72)
    case RF16 = 'RF16';

    // IVA per cassa (art. 32-bis, DL 83/2012)
    case RF17 = 'RF17';

    // Altro
    case RF18 = 'RF18';

    // Regime forfettario (art.1, c.54-89, L. 190/2014)
    case RF19 = 'RF19';
}
