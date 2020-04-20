<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;

use DevCode\FatturaElettronica\ElementoFattura;

class IscrizioneREA extends ElementoFattura
{
    const SOCIO_UNICO = 'SU';
    const SOCIETA_PLURIPERSONALE = 'SM';
    const NON_IN_LIQUIDAZIONE = 'LN';
    const IN_LIQUIDAZIONE = 'LS';

    protected ?string $Ufficio;

    protected ?string $NumeroRea;

    protected ?float $CapitaleSociale;

    protected ?string $SocioUnico;

    protected string $StatoLiquidazione;

    public static function build(
        ?string $ufficio = null,
        ?string $numeroRea = null,
        ?string $capitaleSociale = null,
        ?string $socioUnico = null,
        ?string $statoLiquidazione = 'LN'
    ) {
        $element = new static();

        $element->Ufficio = $ufficio;
        $element->NumeroRea = $numeroRea;
        $element->CapitaleSociale = $capitaleSociale;
        $element->SocioUnico = $socioUnico;
        $element->StatoLiquidazione = $statoLiquidazione;

        return $element;
    }

    public function isEmpty(): bool
    {
        return empty($this->Ufficio);
    }

    public function getCapitaleSociale(): ?float
    {
        return $this->CapitaleSociale;
    }

    public function setCapitaleSociale(?float $CapitaleSociale): IscrizioneREA
    {
        $this->CapitaleSociale = $CapitaleSociale;

        return $this;
    }

    public function getUfficio(): ?string
    {
        return $this->Ufficio;
    }

    public function setUfficio(?string $Ufficio): IscrizioneREA
    {
        $this->Ufficio = $Ufficio;

        return $this;
    }

    public function getNumeroRea(): ?string
    {
        return $this->NumeroRea;
    }

    public function setNumeroRea(?string $NumeroRea): IscrizioneREA
    {
        $this->NumeroRea = $NumeroRea;

        return $this;
    }

    public function getSocioUnico(): ?string
    {
        return $this->SocioUnico;
    }

    public function setSocioUnico(?string $SocioUnico): IscrizioneREA
    {
        $this->SocioUnico = $SocioUnico;

        return $this;
    }

    public function getStatoLiquidazione(): ?string
    {
        return $this->StatoLiquidazione;
    }

    public function setStatoLiquidazione(?string $StatoLiquidazione): IscrizioneREA
    {
        $this->StatoLiquidazione = $StatoLiquidazione;

        return $this;
    }
}
