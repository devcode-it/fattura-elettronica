<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco da valorizzare nei casi di fattura per stato di avanzamento
*/
class DatiSAL extends Elemento
{
    protected int $RiferimentoFase;

    public function __construct(?int $RiferimentoFase = null)
    {
        parent::__construct(true);
        $this->RiferimentoFase = 1;
        if (!is_null($RiferimentoFase)) {
            $this->setRiferimentoFase($RiferimentoFase);
        }
    }

    public function getRiferimentoFase(): ?int
    {
        return $this->RiferimentoFase;
    }

    public function setRiferimentoFase(int $value)
    {
        $this->RiferimentoFase = $value;

        return $this;
    }
}
