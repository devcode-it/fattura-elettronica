<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo\EsigibilitaIVA;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo\Natura;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.2.2
 *
 * @name DatiRiepilogo
 *
 * Blocco obbligatorio, gli elementi informativi che lo compongono riepilogano le informazioni di dettaglio, aggregandole per aliquota IVA distinta oppure per aliquota IVA nulla e <Natura> distinta oppure, a parità di questi elementi, per valore distinto di <Esigbilità>
 */
class DatiRiepilogo extends Elemento
{
    protected Decimale $AliquotaIVA;
    protected TestoEnum $Natura;
    protected Decimale $SpeseAccessorie;
    protected Decimale $Arrotondamento;
    protected Decimale $ImponibileImporto;
    protected Decimale $Imposta;
    protected TestoEnum $EsigibilitaIVA;
    protected Testo $RiferimentoNormativo;

    public function __construct()
    {
        parent::__construct(false);
        $this->AliquotaIVA = new Decimale(false, 2, 2, 2);
        $this->Natura = new TestoEnum(true, Natura::class);
        $this->SpeseAccessorie = new Decimale(true, 2, 2, 2);
        $this->Arrotondamento = new Decimale(true, 2, 2, 8);
        $this->ImponibileImporto = new Decimale(false, 2, 2, 2);
        $this->Imposta = new Decimale(false, 2, 2, 2);
        $this->EsigibilitaIVA = new TestoEnum(true, EsigibilitaIVA::class);
        $this->RiferimentoNormativo = new Testo(true, 1, 100, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,100}");
    }

    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value)
    {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura->get();
    }

    public function setNatura(Natura|string|null $value)
    {
        $this->Natura->set($value);

        return $this;
    }

    public function getSpeseAccessorie(): ?float
    {
        return $this->SpeseAccessorie->get();
    }

    public function setSpeseAccessorie(?float $value)
    {
        $this->SpeseAccessorie->set($value);

        return $this;
    }

    public function getArrotondamento(): ?float
    {
        return $this->Arrotondamento->get();
    }

    public function setArrotondamento(?float $value)
    {
        $this->Arrotondamento->set($value);

        return $this;
    }

    public function getImponibileImporto(): ?float
    {
        return $this->ImponibileImporto->get();
    }

    public function setImponibileImporto(?float $value)
    {
        $this->ImponibileImporto->set($value);

        return $this;
    }

    public function getImposta(): ?float
    {
        return $this->Imposta->get();
    }

    public function setImposta(?float $value)
    {
        $this->Imposta->set($value);

        return $this;
    }

    public function getEsigibilitaIVA(): ?string
    {
        return $this->EsigibilitaIVA->get();
    }

    public function setEsigibilitaIVA(EsigibilitaIVA|string|null $value)
    {
        $this->EsigibilitaIVA->set($value);

        return $this;
    }

    public function getRiferimentoNormativo(): ?string
    {
        return $this->RiferimentoNormativo->get();
    }

    public function setRiferimentoNormativo(?string $value)
    {
        $this->RiferimentoNormativo->set($value);

        return $this;
    }
}
