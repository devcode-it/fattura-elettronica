<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiBollo\BolloVirtuale;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.1.1.6
 *
 * @name DatiBollo
 *
 * Blocco dati relativi al bollo
 */
class DatiBollo extends Elemento
{
    protected TestoEnum $BolloVirtuale;
    protected Decimale $ImportoBollo;

    public function __construct()
    {
        parent::__construct(true);
        $this->BolloVirtuale = new TestoEnum(false, BolloVirtuale::class);
        $this->ImportoBollo = new Decimale(true, 2, 2, 2);
    }

    public function getBolloVirtuale(): ?string
    {
        return $this->BolloVirtuale->get();
    }

    public function setBolloVirtuale(BolloVirtuale|string $value)
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
