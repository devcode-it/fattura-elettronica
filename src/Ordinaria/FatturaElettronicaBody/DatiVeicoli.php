<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.3
 *
 * @name DatiVeicoli
 *
 * Dati relativi ai veicoli di cui all'art. 38, comma 4 del dl 331 del 1993
 *
 * Blocco relativo ai dati dei Veicoli della Fattura Elettronica (da indicare nei casi di cessioni tra Paesi
 * membri di mezzi di trasporto nuovi, in base all'art. 38, comma 4 del dl 331 del 1993)
 */
class DatiVeicoli extends Elemento
{
    protected Data $Data;
    protected Testo $TotalePercorso;

    public function __construct()
    {
        parent::__construct(true);
        $this->Data = new Data(false, 'Y-m-d');
        $this->TotalePercorso = new Testo(false, 1, 15, 1);
    }

    public function getData(): ?string
    {
        return $this->Data->get();
    }

    public function setData(string|Carbon|\DateTime|null $value)
    {
        $this->Data->set($value);

        return $this;
    }

    public function getTotalePercorso(): ?string
    {
        return $this->TotalePercorso->get();
    }

    public function setTotalePercorso(?string $value)
    {
        $this->TotalePercorso->set($value);

        return $this;
    }
}
