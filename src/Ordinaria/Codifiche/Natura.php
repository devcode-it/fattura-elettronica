<?php

namespace DevCode\FatturaElettronica\Ordinaria\Codifiche;
enum Natura : string {
    
        // escluse ex art. 15 del DPR 633/72
        case N1 = "N1";
            
        // non soggette ad IVA ai sensi degli artt. da 7 a 7-septies del DPR 633/72
        case N2_1 = "N2.1";
            
        // non soggette - altri casi
        case N2_2 = "N2.2";
            
        // non imponibili - esportazioni
        case N3_1 = "N3.1";
            
        // non imponibili - cessioni intracomunitarie
        case N3_2 = "N3.2";
            
        // non imponibili - cessioni verso San Marino
        case N3_3 = "N3.3";
            
        // non imponibili - operazioni assimilate alle cessioni all'esportazione
        case N3_4 = "N3.4";
            
        // non imponibili - a seguito di dichiarazioni d'intento
        case N3_5 = "N3.5";
            
        // non imponibili - altre operazioni che non concorrono alla formazione del plafond
        case N3_6 = "N3.6";
            
        // esenti
        case N4 = "N4";
            
        // regime del margine / IVA non esposta in fattura
        case N5 = "N5";
            
        // inversione contabile - cessione di rottami e altri materiali di recupero
        case N6_1 = "N6.1";
            
        // inversione contabile - cessione di oro e argento ai sensi della legge 7/2000 nonché di oreficeria usata ad OPO
        case N6_2 = "N6.2";
            
        // inversione contabile - subappalto nel settore edile
        case N6_3 = "N6.3";
            
        // inversione contabile - cessione di fabbricati
        case N6_4 = "N6.4";
            
        // inversione contabile - cessione di telefoni cellulari
        case N6_5 = "N6.5";
            
        // inversione contabile - cessione di prodotti elettronici
        case N6_6 = "N6.6";
            
        // inversione contabile - prestazioni comparto edile e settori connessi
        case N6_7 = "N6.7";
            
        // inversione contabile - operazioni settore energetico
        case N6_8 = "N6.8";
            
        // inversione contabile - altri casi
        case N6_9 = "N6.9";
            
        // IVA assolta in altro stato UE (prestazione di servizi di telecomunicazioni, tele-radiodiffusione ed elettronici ex art. 7-octies, comma 1 lett. a, b, art. 74-sexies DPR 633/72)
        case N7 = "N7";
            
}
