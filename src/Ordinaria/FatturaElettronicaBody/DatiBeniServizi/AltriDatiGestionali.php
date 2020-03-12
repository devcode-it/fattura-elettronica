<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use Dasc3er\FatturaElettronica\ElementoFattura;

class AltriDatiGestionali extends ElementoFattura
{
    protected ?string $TipoDato;

    protected ?string $RiferimentoTesto;

    protected ?string $RiferimentoNumero;

    protected ?string $RiferimentoData;

    public static function build(
        ?string $TipoDato = null,
        ?string $RiferimentoTesto = null,
        ?string $RiferimentoNumero = null,
        ?string $RiferimentoData = null
    ) {
        $element = new static();

        $element->TipoDato = $TipoDato;
        $element->RiferimentoTesto = $RiferimentoTesto;
        $element->RiferimentoNumero = $RiferimentoNumero;
        $element->RiferimentoData = $RiferimentoData;

        return $element;
    }

    public function getTipoDato(): ?string
    {
        return $this->TipoDato;
    }

    public function setTipoDato(?string $TipoDato): AltriDatiGestionali
    {
        $this->TipoDato = $TipoDato;

        return $this;
    }

    public function getRiferimentoTesto(): ?string
    {
        return $this->RiferimentoTesto;
    }

    public function setRiferimentoTesto(?string $RiferimentoTesto): AltriDatiGestionali
    {
        $this->RiferimentoTesto = $RiferimentoTesto;

        return $this;
    }

    public function getRiferimentoNumero(): ?string
    {
        return $this->RiferimentoNumero;
    }

    public function setRiferimentoNumero(?string $RiferimentoNumero): AltriDatiGestionali
    {
        $this->RiferimentoNumero = $RiferimentoNumero;

        return $this;
    }

    public function getRiferimentoData(): ?string
    {
        return $this->RiferimentoData;
    }

    public function setRiferimentoData(?string $RiferimentoData): AltriDatiGestionali
    {
        $this->RiferimentoData = $RiferimentoData;

        return $this;
    }
}
