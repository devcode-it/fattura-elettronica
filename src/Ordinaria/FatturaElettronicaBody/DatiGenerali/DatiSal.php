<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\ElementoFattura;

class DatiSal extends ElementoFattura
{
    protected ?int $RiferimentoFase;

    public static function build(
?int $RiferimentoFase = null
    ) {
        $element = new static();

        $element->RiferimentoFase = $RiferimentoFase;

        return $element;
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
