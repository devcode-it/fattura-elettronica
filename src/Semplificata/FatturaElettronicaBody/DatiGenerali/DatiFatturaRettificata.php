<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.1.2
 *
 * @name DatiFatturaRettificata
 *
 * Blocco contenente le informazioni relative alla fattura rettificata. Vale per le fatture emesse ai sensi dell'articolo 26 DPR 633/72
 */
class DatiFatturaRettificata extends Elemento
{
    protected Testo $NumeroFR;
    protected Data $DataFR;
    protected Testo $ElementiRettificati;

    public function __construct()
    {
        parent::__construct(true);
        $this->NumeroFR = new Testo(false, 1, 20, 1, "(\p{IsBasicLatin}{1,20})");
        $this->DataFR = new Data(false, 'Y-m-d');
        $this->ElementiRettificati = new Testo(false, 1, 1000, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,1000}");
    }

    public function getNumeroFR(): ?string
    {
        return $this->NumeroFR->get();
    }

    public function setNumeroFR(?string $value)
    {
        $this->NumeroFR->set($value);

        return $this;
    }

    public function getDataFR(): ?string
    {
        return $this->DataFR->get();
    }

    public function setDataFR(string|Carbon|\DateTime|null $value)
    {
        $this->DataFR->set($value);

        return $this;
    }

    public function getElementiRettificati(): ?string
    {
        return $this->ElementiRettificati->get();
    }

    public function setElementiRettificati(?string $value)
    {
        $this->ElementiRettificati->set($value);

        return $this;
    }
}
