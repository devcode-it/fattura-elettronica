<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco che consente di agli utenti di inserire, con riferimento ad una linea di dettaglio, informazioni utili ai fini amministrativi, gestionali etc.
*/
class AltriDatiGestionali extends Elemento {
    protected Testo $TipoDato;
	protected Testo $RiferimentoTesto;
	protected Decimale $RiferimentoNumero;
	protected Testo $RiferimentoData;
    public function __construct(?string $TipoDato = null, ?string $RiferimentoTesto = null, ?float $RiferimentoNumero = null, ?string $RiferimentoData = null) {
        $this->TipoDato = new Testo(false, 1, 10, 1);
		$this->RiferimentoTesto = new Testo(true, 1, 60, 1);
		$this->RiferimentoNumero = new Decimale(true);
		$this->RiferimentoData = new Testo(true, 10, 10, 1);
        if (!is_null($TipoDato)) $this->setTipoDato($TipoDato);
		if (!is_null($RiferimentoTesto)) $this->setRiferimentoTesto($RiferimentoTesto);
		if (!is_null($RiferimentoNumero)) $this->setRiferimentoNumero($RiferimentoNumero);
		if (!is_null($RiferimentoData)) $this->setRiferimentoData($RiferimentoData);
    }
    
    public function getTipoDato() : ?string {
        return $this->TipoDato->get();
    }

    public function setTipoDato(?string $value) {
        $this->TipoDato->set($value);

        return $this;
    }

    public function getRiferimentoTesto() : ?string {
        return $this->RiferimentoTesto->get();
    }

    public function setRiferimentoTesto(?string $value) {
        $this->RiferimentoTesto->set($value);

        return $this;
    }

    public function getRiferimentoNumero() : ?float {
        return $this->RiferimentoNumero->get();
    }

    public function setRiferimentoNumero(?float $value) {
        $this->RiferimentoNumero->set($value);

        return $this;
    }

    public function getRiferimentoData() : ?string {
        return $this->RiferimentoData->get();
    }

    public function setRiferimentoData(?string $value) {
        $this->RiferimentoData->set($value);

        return $this;
    }
}
