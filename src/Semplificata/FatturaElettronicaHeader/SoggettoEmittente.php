<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

enum SoggettoEmittente: string
{
    /**
     * Cessionario / Committente.
     */
    case CC = 'CC';

    /**
     * Terzo.
     */
    case TZ = 'TZ';
}
