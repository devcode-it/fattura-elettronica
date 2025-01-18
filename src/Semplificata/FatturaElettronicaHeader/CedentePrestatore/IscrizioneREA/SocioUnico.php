<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;

enum SocioUnico: string
{
    /**
     * socio unico.
     */
    case SU = 'SU';

    /**
     * più soci.
     */
    case SM = 'SM';
}
