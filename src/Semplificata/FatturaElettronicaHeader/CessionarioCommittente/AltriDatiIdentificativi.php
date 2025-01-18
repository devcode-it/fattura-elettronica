<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi\RappresentanteFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi\Sede;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente gli altri dati identificativi  del cessionario/committente
*/
class AltriDatiIdentificativi extends Elemento {
    protected Testo $Denominazione;
	protected Testo $Nome;
	protected Testo $Cognome;
	protected Sede $Sede;
	protected ?StabileOrganizzazione $StabileOrganizzazione;
	protected ?RappresentanteFiscale $RappresentanteFiscale;
    public function __construct(?string $Denominazione = null, ?string $Nome = null, ?string $Cognome = null) {
        $this->Denominazione = new Testo(true, 1, 80, 1);
		$this->Nome = new Testo(true, 1, 60, 1);
		$this->Cognome = new Testo(true, 1, 60, 1);
		$this->Sede = new Sede();
        if (!is_null($Denominazione)) $this->setDenominazione($Denominazione);
		if (!is_null($Nome)) $this->setNome($Nome);
		if (!is_null($Cognome)) $this->setCognome($Cognome);
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

    public function getSede() : Sede {
        return $this->Sede;
    }

    public function setSede(Sede $Sede) {
        $this->Sede = $Sede;

        return $this;
    }

    public function getStabileOrganizzazione() : StabileOrganizzazione {
        return $this->StabileOrganizzazione;
    }

    public function setStabileOrganizzazione(?StabileOrganizzazione $StabileOrganizzazione) {
        $this->StabileOrganizzazione = $StabileOrganizzazione;

        return $this;
    }

    public function getRappresentanteFiscale() : RappresentanteFiscale {
        return $this->RappresentanteFiscale;
    }

    public function setRappresentanteFiscale(?RappresentanteFiscale $RappresentanteFiscale) {
        $this->RappresentanteFiscale = $RappresentanteFiscale;

        return $this;
    }
}
