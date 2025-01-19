<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\ScontoMaggiorazione\Tipo;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.2.1.10
 *
 * @name ScontoMaggiorazione
 *
 * Eventuale sconto o maggiorazione applicati al prezzo unitario (la molteplicità N del blocco consente di gestire la presenza di più sconti  o maggiorazioni a 'cascata')
 */
class ScontoMaggiorazione extends Elemento
{
    protected TestoEnum $Tipo;
    protected Decimale $Percentuale;
    protected Decimale $Importo;

    public function __construct()
    {
        parent::__construct(true);
        $this->Tipo = new TestoEnum(false, Tipo::class);
        $this->Percentuale = new Decimale(true, 2, 2, 2);
        $this->Importo = new Decimale(true, 2, 2, 8);
    }

    public function getTipo(): ?string
    {
        return $this->Tipo->get();
    }

    public function setTipo(Tipo|string $value)
    {
        $this->Tipo->set($value);

        return $this;
    }

    public function getPercentuale(): ?float
    {
        return $this->Percentuale->get();
    }

    public function setPercentuale(?float $value)
    {
        $this->Percentuale->set($value);

        return $this;
    }

    public function getImporto(): ?float
    {
        return $this->Importo->get();
    }

    public function setImporto(?float $value)
    {
        $this->Importo->set($value);

        return $this;
    }
}
