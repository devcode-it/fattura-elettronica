<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente\DatiAnagrafici;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Dati relativi al soggetto terzo che emette fattura per conto del cedente / prestatore
*/
class TerzoIntermediarioOSoggettoEmittente extends Elemento {
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
