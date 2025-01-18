<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

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

    /**
     * Inversione contabile (per le operazioni in reverse charge ovvero nei casi di autofatturazione per acquisti extra UE di servizi ovvero per importazioni di beni nei soli casi previsti).
     */
    case N6 = 'N6';

    /**
     * Inversione contabile - cessione di rottami e altri materiali di recupero.
     */
    case N6_1 = 'N6.1';

    /**
     * Inversione contabile - cessione di oro e argento ai sensi della legge 7/2000 nonché di oreficeria usata ad OPO.
     */
    case N6_2 = 'N6.2';

    /**
     * Inversione contabile - subappalto nel settore edile.
     */
    case N6_3 = 'N6.3';

    /**
     * Inversione contabile - cessione di fabbricati.
     */
    case N6_4 = 'N6.4';

    /**
     * Inversione contabile - cessione di telefoni cellulari.
     */
    case N6_5 = 'N6.5';

    /**
     * Inversione contabile - cessione di prodotti elettronici.
     */
    case N6_6 = 'N6.6';

    /**
     * Inversione contabile - prestazioni comparto edile e settori connessi.
     */
    case N6_7 = 'N6.7';

    /**
     * Inversione contabile - operazioni settore energetico.
     */
    case N6_8 = 'N6.8';

    /**
     * Inversione contabile - altri casi.
     */
    case N6_9 = 'N6.9';

    /**
     * IVA assolta in altro stato UE (prestazione di servizi di telecomunicazioni, tele-radiodiffusione ed elettronici ex art. 7-octies lett. a, b, art. 74-sexies DPR 633/72).
     */
    case N7 = 'N7';
}
