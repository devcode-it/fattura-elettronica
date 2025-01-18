<?php

namespace DevCode\FatturaElettronica\Semplificata\Codifiche;
enum TipoDocumento : string {
    
        // fattura semplificata
        case TD07 = "TD07";
            
        // nota di credito semplificata
        case TD08 = "TD08";
            
        // nota di debito semplificata
        case TD09 = "TD09";
            
}
