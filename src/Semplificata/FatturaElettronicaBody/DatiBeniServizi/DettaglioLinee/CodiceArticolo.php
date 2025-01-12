<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Eventuale codifica dell'articolo (la molteplicità N del blocco consente di gestire la presenza di più codifiche per la medesima riga)
*/
class CodiceArticolo extends Elemento {
    protected Testo $CodiceTipo;
	protected Testo $CodiceValore;
    public function __construct(?string $CodiceTipo = null, ?string $CodiceValore = null) {
        $this->CodiceTipo = new Testo(false, 1, 35, 1);
		$this->CodiceValore = new Testo(false, 1, 35, 1);
        if (!is_null($CodiceTipo)) $this->setCodiceTipo($CodiceTipo);
		if (!is_null($CodiceValore)) $this->setCodiceValore($CodiceValore);
    }
    
    public function getCodiceTipo() : ?string {
        return $this->CodiceTipo->get();
    }

    public function setCodiceTipo(?string $value) {
        $this->CodiceTipo->set($value);

        return $this;
    }

    public function getCodiceValore() : ?string {
        return $this->CodiceValore->get();
    }

    public function setCodiceValore(?string $value) {
        $this->CodiceValore->set($value);

        return $this;
    }
}
