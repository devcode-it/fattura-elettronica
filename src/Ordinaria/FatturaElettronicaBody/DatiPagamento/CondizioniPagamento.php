<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;

enum CondizioniPagamento: string
{
    /**
     * pagamento a rate.
     */
    case TP01 = 'TP01';

    /**
     * pagamento completo.
     */
    case TP02 = 'TP02';

    /**
     * anticipo.
     */
    case TP03 = 'TP03';
}
