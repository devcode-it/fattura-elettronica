<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi\RappresentanteFiscale\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco da valorizzare nei casi in cui il cessionario / committente si avvalga di un rappresentante fiscale in Italia.
*/
class RappresentanteFiscale extends Elemento {
    protected IdFiscaleIVA $IdFiscaleIVA;
	protected Testo $Denominazione;
	protected Testo $Nome;
	protected Testo $Cognome;
    public function __construct(?string $Denominazione = null, ?string $Nome = null, ?string $Cognome = null) {
        $this->IdFiscaleIVA = new IdFiscaleIVA();
		$this->Denominazione = new Testo(true, 1, 80, 1);
		$this->Nome = new Testo(true, 1, 60, 1);
		$this->Cognome = new Testo(true, 1, 60, 1);
        if (!is_null($Denominazione)) $this->setDenominazione($Denominazione);
		if (!is_null($Nome)) $this->setNome($Nome);
		if (!is_null($Cognome)) $this->setCognome($Cognome);
    }
    
    public function getIdFiscaleIVA() : IdFiscaleIVA {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(IdFiscaleIVA $IdFiscaleIVA) {
        $this->IdFiscaleIVA = $IdFiscaleIVA;

        return $this;
    }

    public function getDenominazione() : ?string {
        return $this->Denominazione->get();
    }

    public function setDenominazione(?string $value) {
        $this->Denominazione->set($value);

        return $this;
    }

    public function getNome() : ?string {
        return $this->Nome->get();
    }

    public function setNome(?string $value) {
        $this->Nome->set($value);

        return $this;
    }

    public function getCognome() : ?string {
        return $this->Cognome->get();
    }

    public function setCognome(?string $value) {
        $this->Cognome->set($value);

        return $this;
    }
}
