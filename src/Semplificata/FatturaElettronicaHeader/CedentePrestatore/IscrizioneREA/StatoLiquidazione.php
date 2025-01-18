<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;

enum StatoLiquidazione: string
{
    /**
     * in liquidazione.
     */
    case LS = 'LS';

    /**
     * non in liquidazione.
     */
    case LN = 'LN';
}
