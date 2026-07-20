<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Intero;

/**
 * @riferimento 2.1.7
 *
 * @name DatiSAL
 *
 * Blocco da valorizzare nei casi di fattura per stato di avanzamento
 */
class DatiSAL extends Elemento
{
    protected Intero $RiferimentoFase;

    public function __construct()
    {
        parent::__construct(true);
        $this->RiferimentoFase = new Intero(false, 1, 999);
    }

    public function getRiferimentoFase(): ?int
    {
        return $this->RiferimentoFase->get();
    }

    public function setRiferimentoFase(?int $value)
    {
        $this->RiferimentoFase->set($value);

        return $this;
    }
}
