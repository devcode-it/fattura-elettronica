<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi\RappresentanteFiscale\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 1.3.2.6
 *
 * @name RappresentanteFiscale
 *
 * Blocco da valorizzare nei casi in cui il cessionario / committente si avvalga di un rappresentante fiscale in Italia.
 *
 * Blocco relativo ai dati del Rappresentante Fiscale
 */
class RappresentanteFiscale extends Elemento
{
    protected IdFiscaleIVA $IdFiscaleIVA;
    protected Testo $Denominazione;
    protected Testo $Nome;
    protected Testo $Cognome;

    public function __construct()
    {
        parent::__construct(true);
        $this->IdFiscaleIVA = new IdFiscaleIVA();
        $this->Denominazione = new Testo(true, 1, 80, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,80}");
        $this->Nome = new Testo(true, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
        $this->Cognome = new Testo(true, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
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
}
