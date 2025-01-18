<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\IdentificativiFiscali;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco sempre obbligatorio contenente dati relativi al cessionario / committente (cliente)
*/
class CessionarioCommittente extends Elemento {
    protected IdentificativiFiscali $IdentificativiFiscali;
	protected ?AltriDatiIdentificativi $AltriDatiIdentificativi;
    public function __construct() {
        $this->IdentificativiFiscali = new IdentificativiFiscali();
        
    }
    
    public function getIdentificativiFiscali() : IdentificativiFiscali {
        return $this->IdentificativiFiscali;
    }

    public function setIdentificativiFiscali(IdentificativiFiscali $IdentificativiFiscali) {
        $this->IdentificativiFiscali = $IdentificativiFiscali;

        return $this;
    }

    public function getAltriDatiIdentificativi() : AltriDatiIdentificativi {
        return $this->AltriDatiIdentificativi;
    }

    public function setAltriDatiIdentificativi(?AltriDatiIdentificativi $AltriDatiIdentificativi) {
        $this->AltriDatiIdentificativi = $AltriDatiIdentificativi;

        return $this;
    }
}
