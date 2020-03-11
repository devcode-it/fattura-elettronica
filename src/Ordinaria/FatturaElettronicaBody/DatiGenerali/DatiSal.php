<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiSal extends ElementoFattura
{
    protected ?int $RiferimentoFase;

    public function __construct(?int $RiferimentoFase = null)
    {
        $this->RiferimentoFase = $RiferimentoFase;
    }

    public function getRiferimentoFase(): ?int
    {
        return $this->RiferimentoFase;
    }

    public function setRiferimentoFase(?int $RiferimentoFase): DatiSal
    {
        $this->RiferimentoFase = $RiferimentoFase;

        return $this;
    }
}
