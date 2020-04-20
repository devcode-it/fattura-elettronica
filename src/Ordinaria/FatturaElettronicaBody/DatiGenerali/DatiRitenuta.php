<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\ElementoFattura;
use DevCode\FatturaElettronica\Fields\Decimal;

class DatiRitenuta extends ElementoFattura
{
    protected ?string $TipoRitenuta;

    protected Decimal $ImportoRitenuta;

    protected Decimal $AliquotaRitenuta;

    protected ?string $CausalePagamento;

    public function __construct()
    {
        parent::__construct();

        $this->ImportoRitenuta = new Decimal(2);
        $this->AliquotaRitenuta = new Decimal(2);
    }

    public static function build(
        ?string $TipoRitenuta,
        ?float $ImportoRitenuta,
        ?float $AliquotaRitenuta,
        ?string $CausalePagamento
    ) {
        $element = new static();

        $element->TipoRitenuta = $TipoRitenuta;
        $element->ImportoRitenuta = $ImportoRitenuta;
        $element->AliquotaRitenuta = $AliquotaRitenuta;
        $element->CausalePagamento = $CausalePagamento;

        return $element;
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
