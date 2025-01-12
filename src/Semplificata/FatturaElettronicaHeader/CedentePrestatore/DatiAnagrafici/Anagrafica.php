<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati anagrafici identificativi del cedente / prestatore. 
*/
class Anagrafica extends Elemento {
    protected Testo $Denominazione;
	protected Testo $Nome;
	protected Testo $Cognome;
	protected Testo $Titolo;
	protected Testo $CodEORI;
    public function __construct(?string $Denominazione = null, ?string $Nome = null, ?string $Cognome = null, ?string $Titolo = null, ?string $CodEORI = null) {
        $this->Denominazione = new Testo(true, 1, 80, 1);
		$this->Nome = new Testo(true, 1, 60, 1);
		$this->Cognome = new Testo(true, 1, 60, 1);
		$this->Titolo = new Testo(true, 2, 10, 1);
		$this->CodEORI = new Testo(true, 13, 17, 1);
        if (!is_null($Denominazione)) $this->setDenominazione($Denominazione);
		if (!is_null($Nome)) $this->setNome($Nome);
		if (!is_null($Cognome)) $this->setCognome($Cognome);
		if (!is_null($Titolo)) $this->setTitolo($Titolo);
		if (!is_null($CodEORI)) $this->setCodEORI($CodEORI);
    }
    
    public function getDenominazione() : ?string {
        return $this->Denominazione->get();
    }

    public function setDenominazione(?string $value) {
        $this->Denominazione->set($value);

        return $this;
    }

    public function getNome() : ?string {
        return $this->Nome->get();
    }

    public function setNome(?string $value) {
        $this->Nome->set($value);

        return $this;
    }

    public function getCognome() : ?string {
        return $this->Cognome->get();
    }

    public function setCognome(?string $value) {
        $this->Cognome->set($value);

        return $this;
    }

    public function getTitolo() : ?string {
        return $this->Titolo->get();
    }

    public function setTitolo(?string $value) {
        $this->Titolo->set($value);

        return $this;
    }

    public function getCodEORI() : ?string {
        return $this->CodEORI->get();
    }

    public function setCodEORI(?string $value) {
        $this->CodEORI->set($value);

        return $this;
    }
}
