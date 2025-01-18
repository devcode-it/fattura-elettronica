<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Contatti;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Sede;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente dati relativi al cedente / prestatore (fornitore)
*/
class CedentePrestatore extends Elemento
{
    protected DatiAnagrafici $DatiAnagrafici;
    protected Sede $Sede;
    protected StabileOrganizzazione $StabileOrganizzazione;
    protected IscrizioneREA $IscrizioneREA;
    protected Contatti $Contatti;
    protected Testo $RiferimentoAmministrazione;

    public function __construct(?string $RiferimentoAmministrazione = null)
    {
        parent::__construct(false);
        $this->DatiAnagrafici = new DatiAnagrafici();
        $this->Sede = new Sede();
        $this->StabileOrganizzazione = new StabileOrganizzazione();
        $this->IscrizioneREA = new IscrizioneREA();
        $this->Contatti = new Contatti();
        $this->RiferimentoAmministrazione = new Testo(true, 1, 20, 1);
        if (!is_null($RiferimentoAmministrazione)) {
            $this->setRiferimentoAmministrazione($RiferimentoAmministrazione);
        }
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

    public function getIscrizioneREA(): IscrizioneREA
    {
        return $this->IscrizioneREA;
    }

    public function setIscrizioneREA(IscrizioneREA $IscrizioneREA)
    {
        $this->IscrizioneREA = $IscrizioneREA;

        return $this;
    }

    public function getContatti(): Contatti
    {
        return $this->Contatti;
    }

    public function setContatti(Contatti $Contatti)
    {
        $this->Contatti = $Contatti;

        return $this;
    }

    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->RiferimentoAmministrazione->get();
    }

    public function setRiferimentoAmministrazione(?string $value)
    {
        $this->RiferimentoAmministrazione->set($value);

        return $this;
    }
}
