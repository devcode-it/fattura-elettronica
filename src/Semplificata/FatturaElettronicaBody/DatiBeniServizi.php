<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\DatiIVA;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio. Contiene natura, qualità, quantità e gli elementi necessari a determinare il valore dei beni e/o dei servizi formanti oggetto dell'operazione
*/
class DatiBeniServizi extends Elemento {
    protected Testo $Descrizione;
	protected Decimale $Importo;
	protected DatiIVA $DatiIVA;
	protected Testo $Natura;
	protected Testo $RiferimentoNormativo;
    public function __construct(?string $Descrizione = null, ?float $Importo = null, ?string $Natura = null, ?string $RiferimentoNormativo = null) {
        $this->Descrizione = new Testo(false, 1, 1000, 1);
		$this->Importo = new Decimale(false);
		$this->DatiIVA = new DatiIVA();
		$this->Natura = new Testo(true, 2, 4, 1);
		$this->RiferimentoNormativo = new Testo(true, 1, 100, 1);
        if (!is_null($Descrizione)) $this->setDescrizione($Descrizione);
		if (!is_null($Importo)) $this->setImporto($Importo);
		if (!is_null($Natura)) $this->setNatura($Natura);
		if (!is_null($RiferimentoNormativo)) $this->setRiferimentoNormativo($RiferimentoNormativo);
    }
    
    public function getDescrizione() : ?string {
        return $this->Descrizione->get();
    }

    public function setDescrizione(?string $value) {
        $this->Descrizione->set($value);

        return $this;
    }

    public function getImporto() : ?float {
        return $this->Importo->get();
    }

    public function setImporto(?float $value) {
        $this->Importo->set($value);

        return $this;
    }

    public function getDatiIVA() : DatiIVA {
        return $this->DatiIVA;
    }

    public function setDatiIVA(DatiIVA $DatiIVA) {
        $this->DatiIVA = $DatiIVA;

        return $this;
    }

    public function getNatura() : ?string {
        return $this->Natura->get();
    }

    public function setNatura(?string $value) {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoNormativo() : ?string {
        return $this->RiferimentoNormativo->get();
    }

    public function setRiferimentoNormativo(?string $value) {
        $this->RiferimentoNormativo->set($value);

        return $this;
    }
}
