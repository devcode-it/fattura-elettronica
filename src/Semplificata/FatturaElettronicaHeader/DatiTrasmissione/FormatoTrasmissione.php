<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\DatiTrasmissione;

enum FormatoTrasmissione: string
{
    /**
     * Fattura verso privati semplificata.
     */
    case FSM10 = 'FSM10';
}
