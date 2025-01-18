<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente le informazioni relative alla fattura rettificata. Vale per le fatture emesse ai sensi dell'articolo 26 DPR 633/72
*/
class DatiFatturaRettificata extends Elemento {
    protected Testo $NumeroFR;
	protected Data $DataFR;
	protected Testo $ElementiRettificati;
    public function __construct(?string $NumeroFR = null, null|string|Carbon|\DateTime $DataFR = null, ?string $ElementiRettificati = null) {
        $this->NumeroFR = new Testo(false, 1, null, 1);
		$this->DataFR = new Data(false);
		$this->ElementiRettificati = new Testo(false, 1, 1000, 1);
        if (!is_null($NumeroFR)) $this->setNumeroFR($NumeroFR);
		if (!is_null($DataFR)) $this->setDataFR($DataFR);
		if (!is_null($ElementiRettificati)) $this->setElementiRettificati($ElementiRettificati);
    }
    
    public function getNumeroFR() : ?string {
        return $this->NumeroFR->get();
    }

    public function setNumeroFR(?string $value) {
        $this->NumeroFR->set($value);

        return $this;
    }

    public function getDataFR() : ?string {
        return $this->DataFR->get();
    }

    public function setDataFR(null|string|Carbon|\DateTime $value) {
        $this->DataFR->set($value);

        return $this;
    }

    public function getElementiRettificati() : ?string {
        return $this->ElementiRettificati->get();
    }

    public function setElementiRettificati(?string $value) {
        $this->ElementiRettificati->set($value);

        return $this;
    }
}
