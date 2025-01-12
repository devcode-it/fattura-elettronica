<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco da valorizzare nei casi di fatture per operazioni accessorie, emesse dagli 'autotrasportatori' per usufruire delle agevolazioni in materia di registrazione e pagamento dell' IVA
*/
class FatturaPrincipale extends Elemento {
    protected Testo $NumeroFatturaPrincipale;
	protected Data $DataFatturaPrincipale;
    public function __construct(?string $NumeroFatturaPrincipale = null, null|string|Carbon|\DateTime $DataFatturaPrincipale = null) {
        $this->NumeroFatturaPrincipale = new Testo(false, 1, 20, 1);
		$this->DataFatturaPrincipale = new Data(false);
        if (!is_null($NumeroFatturaPrincipale)) $this->setNumeroFatturaPrincipale($NumeroFatturaPrincipale);
		if (!is_null($DataFatturaPrincipale)) $this->setDataFatturaPrincipale($DataFatturaPrincipale);
    }
    
    public function getNumeroFatturaPrincipale() : ?string {
        return $this->NumeroFatturaPrincipale->get();
    }

    public function setNumeroFatturaPrincipale(?string $value) {
        $this->NumeroFatturaPrincipale->set($value);

        return $this;
    }

    public function getDataFatturaPrincipale() : ?string {
        return $this->DataFatturaPrincipale->get();
    }

    public function setDataFatturaPrincipale(null|string|Carbon|\DateTime $value) {
        $this->DataFatturaPrincipale->set($value);

        return $this;
    }
}
