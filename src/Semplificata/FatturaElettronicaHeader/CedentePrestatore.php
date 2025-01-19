<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IdFiscaleIVA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\RappresentanteFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\RegimeFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\Sede;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\StabileOrganizzazione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 1.2
 *
 * @name CedentePrestatore
 *
 * Blocco sempre obbligatorio contenente dati relativi al cedente / prestatore (fornitore)
 *
 * Blocco relativo ai dati del Cedente / Prestatore
 */
class CedentePrestatore extends Elemento
{
    protected IdFiscaleIVA $IdFiscaleIVA;
    protected Testo $CodiceFiscale;
    protected Testo $Denominazione;
    protected Testo $Nome;
    protected Testo $Cognome;
    protected Sede $Sede;
    protected StabileOrganizzazione $StabileOrganizzazione;
    protected RappresentanteFiscale $RappresentanteFiscale;
    protected IscrizioneREA $IscrizioneREA;
    protected TestoEnum $RegimeFiscale;

    public function __construct()
    {
        parent::__construct(false);
        $this->IdFiscaleIVA = new IdFiscaleIVA();
        $this->CodiceFiscale = new Testo(true, 11, 16, 1, '[A-Z0-9]{11,16}');
        $this->Denominazione = new Testo(true, 1, 80, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,80}");
        $this->Nome = new Testo(true, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
        $this->Cognome = new Testo(true, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
        $this->Sede = new Sede();
        $this->StabileOrganizzazione = new StabileOrganizzazione();
        $this->RappresentanteFiscale = new RappresentanteFiscale();
        $this->IscrizioneREA = new IscrizioneREA();
        $this->RegimeFiscale = new TestoEnum(false, RegimeFiscale::class);
    }

    public function getIdFiscaleIVA(): IdFiscaleIVA
    {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(IdFiscaleIVA $IdFiscaleIVA)
    {
        $this->IdFiscaleIVA = $IdFiscaleIVA;

        return $this;
    }

    public function getCodiceFiscale(): ?string
    {
        return $this->CodiceFiscale->get();
    }

    public function setCodiceFiscale(?string $value)
    {
        $this->CodiceFiscale->set($value);

        return $this;
    }

    public function getDenominazione(): ?string
    {
        return $this->Denominazione->get();
    }

    public function setDenominazione(?string $value)
    {
        $this->Denominazione->set($value);

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->Nome->get();
    }

    public function setNome(?string $value)
    {
        $this->Nome->set($value);

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->Cognome->get();
    }

    public function setCognome(?string $value)
    {
        $this->Cognome->set($value);

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

    public function getIscrizioneREA(): IscrizioneREA
    {
        return $this->IscrizioneREA;
    }

    public function setIscrizioneREA(IscrizioneREA $IscrizioneREA)
    {
        $this->IscrizioneREA = $IscrizioneREA;

        return $this;
    }

    public function getRegimeFiscale(): ?string
    {
        return $this->RegimeFiscale->get();
    }

    public function setRegimeFiscale(RegimeFiscale|string $value)
    {
        $this->RegimeFiscale->set($value);

        return $this;
    }
}
