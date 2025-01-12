<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiPagamento\DettaglioPagamento;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco destinato a descrivere le modalità di pagamento per la cessione/prestazione rappresentata in fattura
*/
class DatiPagamento extends Elemento {
    protected Testo $CondizioniPagamento;
	protected Collezione $DettaglioPagamento;
    public function __construct(?string $CondizioniPagamento = null) {
        $this->CondizioniPagamento = new Testo(false, 4, 4, 1);
		$this->DettaglioPagamento = new Collezione(DettaglioPagamento::class, 1);
        if (!is_null($CondizioniPagamento)) $this->setCondizioniPagamento($CondizioniPagamento);
    }
    
    public function getCondizioniPagamento() : ?string {
        return $this->CondizioniPagamento->get();
    }

    public function setCondizioniPagamento(?string $value) {
        $this->CondizioniPagamento->set($value);

        return $this;
    }

    public function getDettaglioPagamento() : Collezione {
        return $this->DettaglioPagamento;
    }

    public function getAllDettaglioPagamento() : array {
        return $this->DettaglioPagamento->toList();
    }

    public function addDettaglioPagamento(DettaglioPagamento $elemento) {
        $this->DettaglioPagamento->add($elemento);

        return $this;
    }

    public function removeDettaglioPagamento(int $index) {
        $this->DettaglioPagamento->remove($index);

        return $this;
    }
}
