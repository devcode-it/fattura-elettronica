<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

enum FormatoTrasmissione: string
{
    /**
     * Fattura verso PA.
     */
    case FPA12 = 'FPA12';

    /**
     * Fattura verso privati.
     */
    case FPR12 = 'FPR12';
}
