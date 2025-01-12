<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\RappresentanteFiscale\DatiAnagrafici;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco da valorizzare nei casi in cui il cedente / prestatore si avvalga di un rappresentante fiscale in Italia.
*/
class RappresentanteFiscale extends Elemento {
    protected DatiAnagrafici $DatiAnagrafici;
    public function __construct() {
        $this->DatiAnagrafici = new DatiAnagrafici();
        
    }
    
    public function getDatiAnagrafici() : DatiAnagrafici {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici) {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }
}
