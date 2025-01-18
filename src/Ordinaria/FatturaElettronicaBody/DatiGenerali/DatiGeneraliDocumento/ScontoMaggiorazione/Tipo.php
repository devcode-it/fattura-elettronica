<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\ScontoMaggiorazione;

enum Tipo: string
{
    /**
     * SC = Sconto.
     */
    case SC = 'SC';

    /**
     * MG = Maggiorazione.
     */
    case MG = 'MG';
}
