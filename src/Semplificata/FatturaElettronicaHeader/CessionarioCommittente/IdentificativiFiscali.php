<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\IdentificativiFiscali\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente gli identificativi fiscali del cessionario/committente
*/
class IdentificativiFiscali extends Elemento {
    protected ?IdFiscaleIVA $IdFiscaleIVA;
	protected Testo $CodiceFiscale;
    public function __construct(?string $CodiceFiscale = null) {
        $this->CodiceFiscale = new Testo(true, 11, 16, 1);
        if (!is_null($CodiceFiscale)) $this->setCodiceFiscale($CodiceFiscale);
    }
    
    public function getIdFiscaleIVA() : IdFiscaleIVA {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(?IdFiscaleIVA $IdFiscaleIVA) {
        $this->IdFiscaleIVA = $IdFiscaleIVA;

        return $this;
    }

    public function getCodiceFiscale() : ?string {
        return $this->CodiceFiscale->get();
    }

    public function setCodiceFiscale(?string $value) {
        $this->CodiceFiscale->set($value);

        return $this;
    }
}
