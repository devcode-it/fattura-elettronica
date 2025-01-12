<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati dell'indirizzo di resa
*/
class IndirizzoResa extends Elemento {
    protected Testo $Indirizzo;
	protected Testo $NumeroCivico;
	protected Testo $CAP;
	protected Testo $Comune;
	protected Testo $Provincia;
	protected Testo $Nazione;
    public function __construct(?string $Indirizzo = null, ?string $NumeroCivico = null, ?string $CAP = null, ?string $Comune = null, ?string $Provincia = null, ?string $Nazione = null) {
        $this->Indirizzo = new Testo(false, 1, 60, 1);
		$this->NumeroCivico = new Testo(true, 1, 8, 1);
		$this->CAP = new Testo(false, 5, 5, 1);
		$this->Comune = new Testo(false, 1, 60, 1);
		$this->Provincia = new Testo(true, 2, 2, 1);
		$this->Nazione = new Testo(false, 2, 2, 1);
        if (!is_null($Indirizzo)) $this->setIndirizzo($Indirizzo);
		if (!is_null($NumeroCivico)) $this->setNumeroCivico($NumeroCivico);
		if (!is_null($CAP)) $this->setCAP($CAP);
		if (!is_null($Comune)) $this->setComune($Comune);
		if (!is_null($Provincia)) $this->setProvincia($Provincia);
		if (!is_null($Nazione)) $this->setNazione($Nazione);
    }
    
    public function getIndirizzo() : ?string {
        return $this->Indirizzo->get();
    }

    public function setIndirizzo(?string $value) {
        $this->Indirizzo->set($value);

        return $this;
    }

    public function getNumeroCivico() : ?string {
        return $this->NumeroCivico->get();
    }

    public function setNumeroCivico(?string $value) {
        $this->NumeroCivico->set($value);

        return $this;
    }

    public function getCAP() : ?string {
        return $this->CAP->get();
    }

    public function setCAP(?string $value) {
        $this->CAP->set($value);

        return $this;
    }

    public function getComune() : ?string {
        return $this->Comune->get();
    }

    public function setComune(?string $value) {
        $this->Comune->set($value);

        return $this;
    }

    public function getProvincia() : ?string {
        return $this->Provincia->get();
    }

    public function setProvincia(?string $value) {
        $this->Provincia->set($value);

        return $this;
    }

    public function getNazione() : ?string {
        return $this->Nazione->get();
    }

    public function setNazione(?string $value) {
        $this->Nazione->set($value);

        return $this;
    }
}
