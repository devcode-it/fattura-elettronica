<?php

namespace DevCode\FatturaElettronica;

/**
 * Tabella contenente le informazioni per i campi di tipo FormatoTrasmissione.
 */
enum FormatoTrasmissione: string
{
    case VersioneTrasmissione = '12'; // 1.2
    case VersioneTrasmissioneSemplificata = '10'; // 1.0

    case OrdinariaPA = 'FPA12';
    case OrdinariaPrivati = 'FPR12';
    case Semplificata = 'FSM10';
}
