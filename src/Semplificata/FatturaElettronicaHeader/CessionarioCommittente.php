<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\RappresentanteFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\Sede;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco sempre obbligatorio contenente dati relativi al cessionario / committente (cliente)
*/
class CessionarioCommittente extends Elemento {
    protected DatiAnagrafici $DatiAnagrafici;
	protected Sede $Sede;
	protected ?StabileOrganizzazione $StabileOrganizzazione;
	protected ?RappresentanteFiscale $RappresentanteFiscale;
    public function __construct() {
        $this->DatiAnagrafici = new DatiAnagrafici();
		$this->Sede = new Sede();
        
    }
    
    public function getDatiAnagrafici() : DatiAnagrafici {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici) {
        $this->DatiAnagrafici = $DatiAnagrafici;

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
