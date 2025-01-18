<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IdFiscaleIVA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\RappresentanteFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\Sede;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente dati relativi al cedente / prestatore (fornitore)
*/
class CedentePrestatore extends Elemento {
    protected IdFiscaleIVA $IdFiscaleIVA;
	protected Testo $CodiceFiscale;
	protected Testo $Denominazione;
	protected Testo $Nome;
	protected Testo $Cognome;
	protected Sede $Sede;
	protected ?StabileOrganizzazione $StabileOrganizzazione;
	protected ?RappresentanteFiscale $RappresentanteFiscale;
	protected ?IscrizioneREA $IscrizioneREA;
	protected Testo $RegimeFiscale;
    public function __construct(?string $CodiceFiscale = null, ?string $Denominazione = null, ?string $Nome = null, ?string $Cognome = null, ?string $RegimeFiscale = null) {
        $this->IdFiscaleIVA = new IdFiscaleIVA();
		$this->CodiceFiscale = new Testo(true, 11, 16, 1);
		$this->Denominazione = new Testo(true, 1, 80, 1);
		$this->Nome = new Testo(true, 1, 60, 1);
		$this->Cognome = new Testo(true, 1, 60, 1);
		$this->Sede = new Sede();
		$this->RegimeFiscale = new Testo(false, 4, 4, 1);
        if (!is_null($CodiceFiscale)) $this->setCodiceFiscale($CodiceFiscale);
		if (!is_null($Denominazione)) $this->setDenominazione($Denominazione);
		if (!is_null($Nome)) $this->setNome($Nome);
		if (!is_null($Cognome)) $this->setCognome($Cognome);
		if (!is_null($RegimeFiscale)) $this->setRegimeFiscale($RegimeFiscale);
    }
    
    public function getIdFiscaleIVA() : IdFiscaleIVA {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(IdFiscaleIVA $IdFiscaleIVA) {
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

    public function getIscrizioneREA() : IscrizioneREA {
        return $this->IscrizioneREA;
    }

    public function setIscrizioneREA(?IscrizioneREA $IscrizioneREA) {
        $this->IscrizioneREA = $IscrizioneREA;

        return $this;
    }

    public function getRegimeFiscale() : ?string {
        return $this->RegimeFiscale->get();
    }

    public function setRegimeFiscale(?string $value) {
        $this->RegimeFiscale->set($value);

        return $this;
    }
}
