<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 2.2
 *
 * @name DatiBeniServizi
 *
 * Blocco sempre obbligatorio. Contiene natura, qualità, quantità e gli elementi necessari a determinare il valore dei beni e/o dei servizi formanti oggetto dell'operazione
 *
 * Blocco relativo ai dati di Beni Servizi della Fattura	Elettronica
 */
class DatiBeniServizi extends Elemento
{
    protected Collezione $DettaglioLinee;
    protected Collezione $DatiRiepilogo;

    public function __construct()
    {
        parent::__construct(false);
        $this->DettaglioLinee = new Collezione(DettaglioLinee::class, 1, null);
        $this->DatiRiepilogo = new Collezione(DatiRiepilogo::class, 1, null);
    }

    public function getDettaglioLinee(): Collezione
    {
        return $this->DettaglioLinee;
    }

    public function getAllDettaglioLinee(): array
    {
        return $this->DettaglioLinee->toList();
    }

    public function addDettaglioLinee(DettaglioLinee $elemento)
    {
        $this->DettaglioLinee->add($elemento);

        return $this;
    }

    public function removeDettaglioLinee(int $index)
    {
        $this->DettaglioLinee->remove($index);

        return $this;
    }

    public function getDatiRiepilogo(): Collezione
    {
        return $this->DatiRiepilogo;
    }

    public function getAllDatiRiepilogo(): array
    {
        return $this->DatiRiepilogo->toList();
    }

    public function addDatiRiepilogo(DatiRiepilogo $elemento)
    {
        $this->DatiRiepilogo->add($elemento);

        return $this;
    }

    public function removeDatiRiepilogo(int $index)
    {
        $this->DatiRiepilogo->remove($index);

        return $this;
    }
}
