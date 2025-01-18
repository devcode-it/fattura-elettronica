<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\ScontoMaggiorazione;

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
