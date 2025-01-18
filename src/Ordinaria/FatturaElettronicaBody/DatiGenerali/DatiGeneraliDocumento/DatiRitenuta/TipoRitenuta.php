<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiRitenuta;

enum TipoRitenuta: string
{
    /**
     * Ritenuta di acconto persone fisiche.
     */
    case RT01 = 'RT01';

    /**
     * Ritenuta di acconto persone giuridiche.
     */
    case RT02 = 'RT02';

    /**
     * Contributo INPS.
     */
    case RT03 = 'RT03';

    /**
     * Contributo ENASARCO.
     */
    case RT04 = 'RT04';

    /**
     * Contributo ENPAM.
     */
    case RT05 = 'RT05';

    /**
     * Altro contributo previdenziale.
     */
    case RT06 = 'RT06';
}
