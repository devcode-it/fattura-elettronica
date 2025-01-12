<?php

namespace DevCode\FatturaElettronica\Ordinaria\Codifiche;
enum ModalitaPagamento : string {
    
        // contanti
        case MP01 = "MP01";
            
        // assegno
        case MP02 = "MP02";
            
        // assegno circolare
        case MP03 = "MP03";
            
        // contanti presso Tesoreria
        case MP04 = "MP04";
            
        // bonifico
        case MP05 = "MP05";
            
        // vaglia cambiario
        case MP06 = "MP06";
            
        // bollettino bancario
        case MP07 = "MP07";
            
        // carta di pagamento
        case MP08 = "MP08";
            
        // RID
        case MP09 = "MP09";
            
        // RID utenze
        case MP10 = "MP10";
            
        // RID veloce
        case MP11 = "MP11";
            
        // RIBA
        case MP12 = "MP12";
            
        // MAV
        case MP13 = "MP13";
            
        // quietanza erario
        case MP14 = "MP14";
            
        // giroconto su conti di contabilità speciale
        case MP15 = "MP15";
            
        // domiciliazione bancaria
        case MP16 = "MP16";
            
        // domiciliazione postale
        case MP17 = "MP17";
            
        // bollettino di c/c postale
        case MP18 = "MP18";
            
        // SEPA Direct Debit
        case MP19 = "MP19";
            
        // SEPA Direct Debit CORE
        case MP20 = "MP20";
            
        // SEPA Direct Debit B2B
        case MP21 = "MP21";
            
        // Trattenuta su somme già riscosse
        case MP22 = "MP22";
            
        // PagoPA
        case MP23 = "MP23";
            
}
