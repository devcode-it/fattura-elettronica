<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

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
