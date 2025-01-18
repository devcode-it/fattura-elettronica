<?php

namespace DevCode\FatturaElettronica\Ordinaria;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\Allegati;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiVeicoli;
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
    protected DatiBeniServizi $DatiBeniServizi;
    protected DatiVeicoli $DatiVeicoli;
    protected Collezione $DatiPagamento;
    protected Collezione $Allegati;

    public function __construct()
    {
        parent::__construct(false);
        $this->DatiGenerali = new DatiGenerali();
        $this->DatiBeniServizi = new DatiBeniServizi();
        $this->DatiVeicoli = new DatiVeicoli();
        $this->DatiPagamento = new Collezione(DatiPagamento::class, 0, null);
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

    public function getDatiBeniServizi(): DatiBeniServizi
    {
        return $this->DatiBeniServizi;
    }

    public function setDatiBeniServizi(DatiBeniServizi $DatiBeniServizi)
    {
        $this->DatiBeniServizi = $DatiBeniServizi;

        return $this;
    }

    public function getDatiVeicoli(): DatiVeicoli
    {
        return $this->DatiVeicoli;
    }

    public function setDatiVeicoli(DatiVeicoli $DatiVeicoli)
    {
        $this->DatiVeicoli = $DatiVeicoli;

        return $this;
    }

    public function getDatiPagamento(): Collezione
    {
        return $this->DatiPagamento;
    }

    public function getAllDatiPagamento(): array
    {
        return $this->DatiPagamento->toList();
    }

    public function addDatiPagamento(DatiPagamento $elemento)
    {
        $this->DatiPagamento->add($elemento);

        return $this;
    }

    public function removeDatiPagamento(int $index)
    {
        $this->DatiPagamento->remove($index);

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
