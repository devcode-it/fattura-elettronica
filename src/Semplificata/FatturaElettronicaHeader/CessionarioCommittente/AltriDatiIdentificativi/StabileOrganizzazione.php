<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 1.3.2.5
 *
 * @name StabileOrganizzazione
 *
 * Blocco da valorizzare nei casi di cessionario / committente non residente, con stabile organizzazione in Italia
 */
class StabileOrganizzazione extends Elemento
{
    protected Testo $Indirizzo;
    protected Testo $NumeroCivico;
    protected Testo $CAP;
    protected Testo $Comune;
    protected Testo $Provincia;
    protected Testo $Nazione;

    public function __construct()
    {
        parent::__construct(true);
        $this->Indirizzo = new Testo(false, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
        $this->NumeroCivico = new Testo(true, 1, 8, 1, "(\p{IsBasicLatin}{1,8})");
        $this->CAP = new Testo(false, 5, 5, 1, '[0-9][0-9][0-9][0-9][0-9]');
        $this->Comune = new Testo(false, 1, 60, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,60}");
        $this->Provincia = new Testo(true, 2, 2, 1, '[A-Z]{2}');
        $this->Nazione = new Testo(false, 2, 2, 1, '[A-Z]{2}');
    }

    public function getIndirizzo(): ?string
    {
        return $this->Indirizzo->get();
    }

    public function setIndirizzo(?string $value)
    {
        $this->Indirizzo->set($value);

        return $this;
    }

    public function getNumeroCivico(): ?string
    {
        return $this->NumeroCivico->get();
    }

    public function setNumeroCivico(?string $value)
    {
        $this->NumeroCivico->set($value);

        return $this;
    }

    public function getCAP(): ?string
    {
        return $this->CAP->get();
    }

    public function setCAP(?string $value)
    {
        $this->CAP->set($value);

        return $this;
    }

    public function getComune(): ?string
    {
        return $this->Comune->get();
    }

    public function setComune(?string $value)
    {
        $this->Comune->set($value);

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->Provincia->get();
    }

    public function setProvincia(?string $value)
    {
        $this->Provincia->set($value);

        return $this;
    }

    public function getNazione(): ?string
    {
        return $this->Nazione->get();
    }

    public function setNazione(?string $value)
    {
        $this->Nazione->set($value);

        return $this;
    }
}
