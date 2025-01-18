<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;

enum EsigibilitaIVA: string
{
    /**
     * esigibilità differita.
     */
    case D = 'D';

    /**
     * esigibilità immediata.
     */
    case I = 'I';

    /**
     * scissione dei pagamenti.
     */
    case S = 'S';
}
