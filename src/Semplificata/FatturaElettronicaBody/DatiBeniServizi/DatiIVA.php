<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Dati relativi all'imposta sul valore aggiunto
*/
class DatiIVA extends Elemento {
    protected Decimale $Imposta;
	protected Decimale $Aliquota;
    public function __construct(?float $Imposta = null, ?float $Aliquota = null) {
        $this->Imposta = new Decimale(true);
		$this->Aliquota = new Decimale(true);
        if (!is_null($Imposta)) $this->setImposta($Imposta);
		if (!is_null($Aliquota)) $this->setAliquota($Aliquota);
    }
    
    public function getImposta() : ?float {
        return $this->Imposta->get();
    }

    public function setImposta(?float $value) {
        $this->Imposta->set($value);

        return $this;
    }

    public function getAliquota() : ?float {
        return $this->Aliquota->get();
    }

    public function setAliquota(?float $value) {
        $this->Aliquota->set($value);

        return $this;
    }
}
