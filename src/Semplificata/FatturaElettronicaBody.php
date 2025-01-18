<?php

namespace DevCode\FatturaElettronica\Semplificata;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\Allegati;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 2
 *
 * @name FatturaElettronicaBody
 *
 * Il blocco ha molteplicità pari a 1 nel caso di fattura singola; nel caso di lotto di fatture, si ripete per ogni fattura componente il lotto stesso
 */
class FatturaElettronicaBody extends Elemento
{
    protected DatiGenerali $DatiGenerali;
    protected Collezione $DatiBeniServizi;
    protected Collezione $Allegati;

    public function __construct()
    {
        parent::__construct(false);
        $this->DatiGenerali = new DatiGenerali();
        $this->DatiBeniServizi = new Collezione(DatiBeniServizi::class, 1, null);
        $this->Allegati = new Collezione(Allegati::class, 0, null);
    }

    public function getDatiGenerali(): DatiGenerali
    {
        return $this->DatiGenerali;
    }

    public function setDatiGenerali(DatiGenerali $DatiGenerali)
    {
        $this->DatiGenerali = $DatiGenerali;

        return $this;
    }

    public function getDatiBeniServizi(): Collezione
    {
        return $this->DatiBeniServizi;
    }

    public function getAllDatiBeniServizi(): array
    {
        return $this->DatiBeniServizi->toList();
    }

    public function addDatiBeniServizi(DatiBeniServizi $elemento)
    {
        $this->DatiBeniServizi->add($elemento);

        return $this;
    }

    public function removeDatiBeniServizi(int $index)
    {
        $this->DatiBeniServizi->remove($index);

        return $this;
    }

    public function getAllegati(): Collezione
    {
        return $this->Allegati;
    }

    public function getAllAllegati(): array
    {
        return $this->Allegati->toList();
    }

    public function addAllegati(Allegati $elemento)
    {
        $this->Allegati->add($elemento);

        return $this;
    }

    public function removeAllegati(int $index)
    {
        $this->Allegati->remove($index);

        return $this;
    }
}
