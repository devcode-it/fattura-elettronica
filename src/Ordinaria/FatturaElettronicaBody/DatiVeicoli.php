<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati relativi ai veicoli di cui all'art. 38, comma 4 del dl 331 del 1993
*/
class DatiVeicoli extends Elemento
{
    protected Data $Data;
    protected Testo $TotalePercorso;

    public function __construct(string|Carbon|\DateTime|null $Data = null, ?string $TotalePercorso = null)
    {
        parent::__construct(true);
        $this->Data = new Data(false, 'YYYY-MM-DD');
        $this->TotalePercorso = new Testo(false, 1, 15, 1);
        if (!is_null($Data)) {
            $this->setData($Data);
        }
        if (!is_null($TotalePercorso)) {
            $this->setTotalePercorso($TotalePercorso);
        }
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
