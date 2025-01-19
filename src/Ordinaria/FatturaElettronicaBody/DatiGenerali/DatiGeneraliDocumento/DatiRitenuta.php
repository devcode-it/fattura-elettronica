<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiRitenuta\CausalePagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiRitenuta\TipoRitenuta;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.1.1.5
 *
 * @name DatiRitenuta
 *
 * Blocco dati relativi alla ritenuta
 */
class DatiRitenuta extends Elemento
{
    protected TestoEnum $TipoRitenuta;
    protected Decimale $ImportoRitenuta;
    protected Decimale $AliquotaRitenuta;
    protected TestoEnum $CausalePagamento;

    public function __construct()
    {
        parent::__construct(true);
        $this->TipoRitenuta = new TestoEnum(false, TipoRitenuta::class);
        $this->ImportoRitenuta = new Decimale(false, 2, 2, 2);
        $this->AliquotaRitenuta = new Decimale(false, 2, 2, 2);
        $this->CausalePagamento = new TestoEnum(false, CausalePagamento::class);
    }

    public function getTipoRitenuta(): ?string
    {
        return $this->TipoRitenuta->get();
    }

    public function setTipoRitenuta(TipoRitenuta|string $value)
    {
        $this->TipoRitenuta->set($value);

        return $this;
    }

    public function getImportoRitenuta(): ?float
    {
        return $this->ImportoRitenuta->get();
    }

    public function setImportoRitenuta(?float $value)
    {
        $this->ImportoRitenuta->set($value);

        return $this;
    }

    public function getAliquotaRitenuta(): ?float
    {
        return $this->AliquotaRitenuta->get();
    }

    public function setAliquotaRitenuta(?float $value)
    {
        $this->AliquotaRitenuta->set($value);

        return $this;
    }

    public function getCausalePagamento(): ?string
    {
        return $this->CausalePagamento->get();
    }

    public function setCausalePagamento(CausalePagamento|string $value)
    {
        $this->CausalePagamento->set($value);

        return $this;
    }
}
