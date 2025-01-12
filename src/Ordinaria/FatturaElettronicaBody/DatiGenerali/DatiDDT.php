<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco da valorizzare nei casi di fattura "differita" per indicare il documento con cui è stato consegnato il bene (gli elementi informativi del blocco possono essere ripetuti se la fattura fa riferimento a più consegne e quindi a più documenti di trasporto)
*/
class DatiDDT extends Elemento {
    protected Testo $NumeroDDT;
	protected Data $DataDDT;
	protected int $RiferimentoNumeroLinea;
    public function __construct(?string $NumeroDDT = null, null|string|Carbon|\DateTime $DataDDT = null, ?int $RiferimentoNumeroLinea = null) {
        $this->NumeroDDT = new Testo(false, 1, 20, 1);
		$this->DataDDT = new Data(false);
		$this->RiferimentoNumeroLinea = 0;
        if (!is_null($NumeroDDT)) $this->setNumeroDDT($NumeroDDT);
		if (!is_null($DataDDT)) $this->setDataDDT($DataDDT);
		if (!is_null($RiferimentoNumeroLinea)) $this->setRiferimentoNumeroLinea($RiferimentoNumeroLinea);
    }
    
    public function getNumeroDDT() : ?string {
        return $this->NumeroDDT->get();
    }

    public function setNumeroDDT(?string $value) {
        $this->NumeroDDT->set($value);

        return $this;
    }

    public function getDataDDT() : ?string {
        return $this->DataDDT->get();
    }

    public function setDataDDT(null|string|Carbon|\DateTime $value) {
        $this->DataDDT->set($value);

        return $this;
    }

    public function getRiferimentoNumeroLinea() : ?int {
        return $this->RiferimentoNumeroLinea;
    }

    public function setRiferimentoNumeroLinea(int $value) {
        $this->RiferimentoNumeroLinea = $value;

        return $this;
    }
}
