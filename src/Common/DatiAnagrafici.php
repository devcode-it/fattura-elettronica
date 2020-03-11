<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiAnagrafici extends ElementoFattura
{
    protected IdFiscaleIVA $IdFiscaleIVA;

    protected ?string $CodiceFiscale;

    /** @var Anagrafica */
    protected Anagrafica $Anagrafica;

    public function __construct(
        ?string $CodiceFiscale = null,
        ?string $IdPaese = null,
        ?string $IdCodice = null,
        ?string $Denominazione = null,
        ?string $Nome = null,
        ?string $Cognome = null
    ) {
        $this->CodiceFiscale = $CodiceFiscale;
        $this->IdFiscaleIVA = new IdFiscaleIVA($IdPaese, $IdCodice);

        $this->Anagrafica = new Anagrafica($Denominazione, $Nome, $Cognome);
    }

    public function setDenominazione(?string $value): DatiAnagrafici
    {
        $this->Anagrafica->Denominazione = $value;

        return $this;
    }

    public function setNome(?string $value): DatiAnagrafici
    {
        $this->Anagrafica->Nome = $value;

        return $this;
    }

    public function setCognome(?string $value): DatiAnagrafici
    {
        $this->Anagrafica->Cognome = $value;

        return $this;
    }

    public function getDenominazione(): string
    {
        return $this->Anagrafica->getDenominazione();
    }

    public function getNome(): string
    {
        return $this->Anagrafica->getNome();
    }

    public function getCognome(): string
    {
        return $this->Anagrafica->getCognome();
    }

    public function getIdFiscaleIVA(): IdFiscaleIVA
    {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(IdFiscaleIVA $IdFiscaleIVA): DatiAnagrafici
    {
        $this->IdFiscaleIVA = $IdFiscaleIVA;

        return $this;
    }

    public function getAnagrafica(): Anagrafica
    {
        return $this->Anagrafica;
    }

    public function setAnagrafica(Anagrafica $Anagrafica): DatiAnagrafici
    {
        $this->Anagrafica = $Anagrafica;

        return $this;
    }

    public function getCodiceFiscale(): ?string
    {
        return $this->CodiceFiscale;
    }

    public function setCodiceFiscale(?string $CodiceFiscale): DatiAnagrafici
    {
        $this->CodiceFiscale = $CodiceFiscale;

        return $this;
    }
}
