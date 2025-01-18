<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco dati relativi al bollo
*/
class DatiBollo extends Elemento
{
    protected Testo $BolloVirtuale;
    protected Decimale $ImportoBollo;

    public function __construct(?string $BolloVirtuale = null, ?float $ImportoBollo = null)
    {
        parent::__construct(true);
        $this->BolloVirtuale = new Testo(false, 2, 2, 1);
        $this->ImportoBollo = new Decimale(true);
        if (!is_null($BolloVirtuale)) {
            $this->setBolloVirtuale($BolloVirtuale);
        }
        if (!is_null($ImportoBollo)) {
            $this->setImportoBollo($ImportoBollo);
        }
    }

    public function getBolloVirtuale(): ?string
    {
        return $this->BolloVirtuale->get();
    }

    public function setBolloVirtuale(?string $value)
    {
        $this->BolloVirtuale->set($value);

        return $this;
    }

    public function getImportoBollo(): ?float
    {
        return $this->ImportoBollo->get();
    }

    public function setImportoBollo(?float $value)
    {
        $this->ImportoBollo->set($value);

        return $this;
    }
}
