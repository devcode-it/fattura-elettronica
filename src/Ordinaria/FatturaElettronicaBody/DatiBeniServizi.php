<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco sempre obbligatorio. Contiene natura, qualità, quantità e gli elementi necessari a determinare il valore dei beni e/o dei servizi formanti oggetto dell'operazione
*/
class DatiBeniServizi extends Elemento {
    protected Collezione $DettaglioLinee;
	protected Collezione $DatiRiepilogo;
    public function __construct() {
        $this->DettaglioLinee = new Collezione(DettaglioLinee::class, 1);
		$this->DatiRiepilogo = new Collezione(DatiRiepilogo::class, 1);
        
    }
    
    public function getDettaglioLinee() : Collezione {
        return $this->DettaglioLinee;
    }

    public function getAllDettaglioLinee() : array {
        return $this->DettaglioLinee->toList();
    }

    public function addDettaglioLinee(DettaglioLinee $elemento) {
        $this->DettaglioLinee->add($elemento);

        return $this;
    }

    public function removeDettaglioLinee(int $index) {
        $this->DettaglioLinee->remove($index);

        return $this;
    }

    public function getDatiRiepilogo() : Collezione {
        return $this->DatiRiepilogo;
    }

    public function getAllDatiRiepilogo() : array {
        return $this->DatiRiepilogo->toList();
    }

    public function addDatiRiepilogo(DatiRiepilogo $elemento) {
        $this->DatiRiepilogo->add($elemento);

        return $this;
    }

    public function removeDatiRiepilogo(int $index) {
        $this->DatiRiepilogo->remove($index);

        return $this;
    }
}
