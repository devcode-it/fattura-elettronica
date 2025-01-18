<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\RappresentanteFiscale;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\Sede;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 1.4
 *
 * @name CessionarioCommittente
 *
 * Blocco sempre obbligatorio contenente dati relativi al cessionario / committente (cliente)
 *
 * Blocco relativo ai dati del Cessionario / Committente
 */
class CessionarioCommittente extends Elemento
{
    protected DatiAnagrafici $DatiAnagrafici;
    protected Sede $Sede;
    protected StabileOrganizzazione $StabileOrganizzazione;
    protected RappresentanteFiscale $RappresentanteFiscale;

    public function __construct()
    {
        parent::__construct(false);
        $this->DatiAnagrafici = new DatiAnagrafici();
        $this->Sede = new Sede();
        $this->StabileOrganizzazione = new StabileOrganizzazione();
        $this->RappresentanteFiscale = new RappresentanteFiscale();
    }

    public function getDatiAnagrafici(): DatiAnagrafici
    {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici)
    {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }

    public function getSede(): Sede
    {
        return $this->Sede;
    }

    public function setSede(Sede $Sede)
    {
        $this->Sede = $Sede;

        return $this;
    }

    public function getStabileOrganizzazione(): StabileOrganizzazione
    {
        return $this->StabileOrganizzazione;
    }

    public function setStabileOrganizzazione(StabileOrganizzazione $StabileOrganizzazione)
    {
        $this->StabileOrganizzazione = $StabileOrganizzazione;

        return $this;
    }

    public function getRappresentanteFiscale(): RappresentanteFiscale
    {
        return $this->RappresentanteFiscale;
    }

    public function setRappresentanteFiscale(RappresentanteFiscale $RappresentanteFiscale)
    {
        $this->RappresentanteFiscale = $RappresentanteFiscale;

        return $this;
    }
}
