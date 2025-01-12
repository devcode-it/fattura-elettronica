<?php

namespace DevCode\FatturaElettronica;

/**
 * Tabella contenente le informazioni per i campi di tipo TipoDocumento.
 */
enum TipoDocumento : string
{
    case Fattura = 'TD01';
    case AccontoSuFattura = 'TD02';
    case AccontoSuParcella = 'TD03';
    case NotaDiCredito = 'TD04';
    case NotaDiDebito = 'TD05';
    case Parcella = 'TD06';
}