<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco dati relativi alla ritenuta
*/
class DatiRitenuta extends Elemento
{
    protected Testo $TipoRitenuta;
    protected Decimale $ImportoRitenuta;
    protected Decimale $AliquotaRitenuta;
    protected Testo $CausalePagamento;

    public function __construct(?string $TipoRitenuta = null, ?float $ImportoRitenuta = null, ?float $AliquotaRitenuta = null, ?string $CausalePagamento = null)
    {
        parent::__construct(true);
        $this->TipoRitenuta = new Testo(false, 4, 4, 1);
        $this->ImportoRitenuta = new Decimale(false);
        $this->AliquotaRitenuta = new Decimale(false);
        $this->CausalePagamento = new Testo(false, 1, 2, 1);
        if (!is_null($TipoRitenuta)) {
            $this->setTipoRitenuta($TipoRitenuta);
        }
        if (!is_null($ImportoRitenuta)) {
            $this->setImportoRitenuta($ImportoRitenuta);
        }
        if (!is_null($AliquotaRitenuta)) {
            $this->setAliquotaRitenuta($AliquotaRitenuta);
        }
        if (!is_null($CausalePagamento)) {
            $this->setCausalePagamento($CausalePagamento);
        }
    }

    public function getTipoRitenuta(): ?string
    {
        return $this->TipoRitenuta->get();
    }

    public function setTipoRitenuta(?string $value)
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

    public function setCausalePagamento(?string $value)
    {
        $this->CausalePagamento->set($value);

        return $this;
    }
}
