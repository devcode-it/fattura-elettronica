<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Intero;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.1.8
 *
 * @name DatiDDT
 *
 * Blocco da valorizzare nei casi di fattura "differita" per indicare il documento con cui è stato consegnato il bene (gli elementi informativi del blocco possono essere ripetuti se la fattura fa riferimento a più consegne e quindi a più documenti di trasporto)
 */
class DatiDDT extends Elemento
{
    protected Testo $NumeroDDT;
    protected Data $DataDDT;
    protected Intero $RiferimentoNumeroLinea;

    public function __construct()
    {
        parent::__construct(true);
        $this->NumeroDDT = new Testo(false, 1, 20, 1);
        $this->DataDDT = new Data(false, 'Y-m-d');
        $this->RiferimentoNumeroLinea = new Intero(true, 1, 9999);
    }

    public function getNumeroDDT(): ?string
    {
        return $this->NumeroDDT->get();
    }

    public function setNumeroDDT(?string $value)
    {
        $this->NumeroDDT->set($value);

        return $this;
    }

    public function getDataDDT(): ?string
    {
        return $this->DataDDT->get();
    }

    public function setDataDDT(string|Carbon|\DateTime|null $value)
    {
        $this->DataDDT->set($value);

        return $this;
    }

    public function getRiferimentoNumeroLinea(): ?int
    {
        return $this->RiferimentoNumeroLinea->get();
    }

    public function setRiferimentoNumeroLinea(?int $value)
    {
        $this->RiferimentoNumeroLinea->set($value);

        return $this;
    }
}
