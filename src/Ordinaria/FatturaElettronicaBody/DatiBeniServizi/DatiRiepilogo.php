<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;

class DatiRiepilogo extends ElementoFattura
{
    public string $EsigibilitaIVA = 'I';

    public ?string $RiferimentoNormativo;

    protected Decimal $AliquotaIVA;

    protected ?string $Natura;

    protected Decimal $SpeseAccessorie;

    protected Decimal $Arrotondamento;

    protected Decimal $ImponibileImporto;

    protected Decimal $Imposta;

    public function __construct(
        ?float $AliquotaIVA = null,
        ?string $Natura = null,
        ?float $SpeseAccessorie = null,
        ?float $Arrotondamento = null,
        ?float $ImponibileImporto = null,
        ?float $Imposta = null,
        ?string $EsigibilitaIVA = null,
        ?string $RiferimentoNormativo = null
    ) {
        $this->AliquotaIVA = new Decimal(2, $AliquotaIVA);
        $this->SpeseAccessorie = new Decimal(2, $SpeseAccessorie);
        $this->Arrotondamento = new Decimal(2, $Arrotondamento);
        $this->ImponibileImporto = new Decimal(2, $ImponibileImporto);
        $this->Imposta = new Decimal(2, $Imposta);

        $this->Natura = $Natura;
        $this->EsigibilitaIVA = $EsigibilitaIVA ?: 'I';
        $this->RiferimentoNormativo = $RiferimentoNormativo;
    }

    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $AliquotaIVA): DatiRiepilogo
    {
        $this->AliquotaIVA->set($AliquotaIVA);

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura;
    }

    public function setNatura(?string $Natura): DatiRiepilogo
    {
        $this->Natura = $Natura;

        return $this;
    }

    public function getSpeseAccessorie(): ?float
    {
        return $this->SpeseAccessorie->get();
    }

    public function setSpeseAccessorie(?float $SpeseAccessorie): DatiRiepilogo
    {
        $this->SpeseAccessorie->set($SpeseAccessorie);

        return $this;
    }

    public function getArrotondamento(): ?float
    {
        return $this->Arrotondamento->get();
    }

    public function setArrotondamento(?float $Arrotondamento): DatiRiepilogo
    {
        $this->Arrotondamento->set($Arrotondamento);

        return $this;
    }

    public function getImponibileImporto(): ?float
    {
        return $this->ImponibileImporto->get();
    }

    public function setImponibileImporto(?float $ImponibileImporto): DatiRiepilogo
    {
        $this->ImponibileImporto->set($ImponibileImporto);

        return $this;
    }

    public function getImposta(): ?float
    {
        return $this->Imposta->get();
    }

    public function setImposta(?float $Imposta): DatiRiepilogo
    {
        $this->Imposta->set($Imposta);

        return $this;
    }

    public function getEsigibilitaIVA(): string
    {
        return $this->EsigibilitaIVA;
    }

    public function setEsigibilitaIVA(string $EsigibilitaIVA): DatiRiepilogo
    {
        $this->EsigibilitaIVA = $EsigibilitaIVA;

        return $this;
    }

    public function getRiferimentoNormativo(): ?string
    {
        return $this->RiferimentoNormativo;
    }

    public function setRiferimentoNormativo(?string $RiferimentoNormativo): DatiRiepilogo
    {
        $this->RiferimentoNormativo = $RiferimentoNormativo;

        return $this;
    }
}
