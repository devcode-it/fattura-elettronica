<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Eventuale sconto o maggiorazione applicati al prezzo unitario (la molteplicità N del blocco consente di gestire la presenza di più sconti  o maggiorazioni a 'cascata')
*/
class ScontoMaggiorazione extends Elemento {
    protected Testo $Tipo;
	protected Decimale $Percentuale;
	protected Decimale $Importo;
    public function __construct(?string $Tipo = null, ?float $Percentuale = null, ?float $Importo = null) {
        $this->Tipo = new Testo(false, 2, 2, 1);
		$this->Percentuale = new Decimale(true);
		$this->Importo = new Decimale(true);
        if (!is_null($Tipo)) $this->setTipo($Tipo);
		if (!is_null($Percentuale)) $this->setPercentuale($Percentuale);
		if (!is_null($Importo)) $this->setImporto($Importo);
    }
    
    public function getTipo() : ?string {
        return $this->Tipo->get();
    }

    public function setTipo(?string $value) {
        $this->Tipo->set($value);

        return $this;
    }

    public function getPercentuale() : ?float {
        return $this->Percentuale->get();
    }

    public function setPercentuale(?float $value) {
        $this->Percentuale->set($value);

        return $this;
    }

    public function getImporto() : ?float {
        return $this->Importo->get();
    }

    public function setImporto(?float $value) {
        $this->Importo->set($value);

        return $this;
    }
}
