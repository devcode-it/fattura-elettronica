<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

enum TipoCessionePrestazione: string
{
    /**
     * Sconto.
     */
    case SC = 'SC';

    /**
     * Premio.
     */
    case PR = 'PR';

    /**
     * Abbuono.
     */
    case AB = 'AB';

    /**
     * Spesa accessoria.
     */
    case AC = 'AC';
}
