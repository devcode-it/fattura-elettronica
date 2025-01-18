<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

enum TipoDocumento: string
{
    /**
     * Fattura semplificata.
     */
    case TD07 = 'TD07';

    /**
     * Nota di credito semplificata.
     */
    case TD08 = 'TD08';

    /**
     * Nota di debito semplificata.
     */
    case TD09 = 'TD09';
}
