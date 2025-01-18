<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi;

enum Natura: string
{
    /**
     * Escluse ex. art. 15 del D.P.R. 633/1972.
     */
    case N1 = 'N1';

    /**
     * Non soggette.
     */
    case N2 = 'N2';

    /**
     * Non soggette ad IVA ai sensi degli artt. da 7 a 7-septies del DPR 633/72.
     */
    case N2_1 = 'N2.1';

    /**
     * Non soggette - altri casi.
     */
    case N2_2 = 'N2.2';

    /**
     * Non imponibili.
     */
    case N3 = 'N3';

    /**
     * Non Imponibili - esportazioni.
     */
    case N3_1 = 'N3.1';

    /**
     * Non Imponibili - cessioni intracomunitarie.
     */
    case N3_2 = 'N3.2';

    /**
     * Non Imponibili - cessioni verso San Marino.
     */
    case N3_3 = 'N3.3';

    /**
     * Non Imponibili - operazioni assimilate alle cessioni all'esportazione.
     */
    case N3_4 = 'N3.4';

    /**
     * Non Imponibili - a seguito di dichiarazioni d'intento.
     */
    case N3_5 = 'N3.5';

    /**
     * Non Imponibili - altre operazioni che non concorrono alla formazione del plafond.
     */
    case N3_6 = 'N3.6';

    /**
     * Esenti.
     */
    case N4 = 'N4';

    /**
     * Regime del margine/IVA non esposta in fattura.
     */
    case N5 = 'N5';
}
