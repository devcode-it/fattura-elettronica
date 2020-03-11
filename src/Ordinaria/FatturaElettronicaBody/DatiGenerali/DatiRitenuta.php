<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;

class DatiRitenuta extends ElementoFattura
{
    protected ?string $TipoRitenuta;

    protected Decimal $ImportoRitenuta;

    protected Decimal $AliquotaRitenuta;

    protected ?string $CausalePagamento;

    public function __construct(
        ?string $TipoRitenuta,
        ?float $ImportoRitenuta,
        ?float $AliquotaRitenuta,
        ?string $CausalePagamento
    ) {
        $this->TipoRitenuta = $TipoRitenuta;
        $this->ImportoRitenuta = $ImportoRitenuta;
        $this->AliquotaRitenuta = $AliquotaRitenuta;
        $this->CausalePagamento = $CausalePagamento;
    }

    public function getTipoRitenuta(): ?string
    {
        return $this->TipoRitenuta;
    }

    public function setTipoRitenuta(?string $TipoRitenuta): DatiRitenuta
    {
        $this->TipoRitenuta = $TipoRitenuta;

        return $this;
    }

    public function getImportoRitenuta(): ?float
    {
        return $this->ImportoRitenuta->get();
    }

    public function setImportoRitenuta(?float $ImportoRitenuta): DatiRitenuta
    {
        $this->ImportoRitenuta->set($ImportoRitenuta);

        return $this;
    }

    public function getAliquotaRitenuta(): ?float
    {
        return $this->AliquotaRitenuta->get();
    }

    public function setAliquotaRitenuta(?float $AliquotaRitenuta): DatiRitenuta
    {
        $this->AliquotaRitenuta->set($AliquotaRitenuta);

        return $this;
    }

    public function getCausalePagamento(): ?string
    {
        return $this->CausalePagamento;
    }

    public function setCausalePagamento(?string $CausalePagamento): DatiRitenuta
    {
        $this->CausalePagamento = $CausalePagamento;

        return $this;
    }
}
