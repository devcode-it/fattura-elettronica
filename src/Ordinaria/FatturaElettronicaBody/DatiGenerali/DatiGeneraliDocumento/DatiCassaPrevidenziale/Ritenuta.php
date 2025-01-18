<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiCassaPrevidenziale;

enum Ritenuta: string
{
    /**
     * SI = Cessione / Prestazione soggetta a ritenuta.
     */
    case SI = 'SI';
}
