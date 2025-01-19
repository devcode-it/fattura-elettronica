<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\BolloVirtuale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\TipoDocumento;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.1.1
 *
 * @name DatiGeneraliDocumento
 *
 * Blocco sempre obbligatorio contenente i dati generali della fattura
 */
class DatiGeneraliDocumento extends Elemento
{
    protected TestoEnum $TipoDocumento;
    protected Testo $Divisa;
    protected Data $Data;
    protected Testo $Numero;
    protected TestoEnum $BolloVirtuale;

    public function __construct()
    {
        parent::__construct(false);
        $this->TipoDocumento = new TestoEnum(false, TipoDocumento::class);
        $this->Divisa = new Testo(false, 3, 3, 1, '[A-Z]{3}');
        $this->Data = new Data(false, 'Y-m-d');
        $this->Numero = new Testo(false, 1, 20, 1, "(\p{IsBasicLatin}{1,20})");
        $this->BolloVirtuale = new TestoEnum(true, BolloVirtuale::class);
    }

    public function getTipoDocumento(): ?string
    {
        return $this->TipoDocumento->get();
    }

    public function setTipoDocumento(TipoDocumento|string $value)
    {
        $this->TipoDocumento->set($value);

        return $this;
    }

    public function getDivisa(): ?string
    {
        return $this->Divisa->get();
    }

    public function setDivisa(?string $value)
    {
        $this->Divisa->set($value);

        return $this;
    }

    public function getData(): ?string
    {
        return $this->Data->get();
    }

    public function setData(string|Carbon|\DateTime|null $value)
    {
        $this->Data->set($value);

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->Numero->get();
    }

    public function setNumero(?string $value)
    {
        $this->Numero->set($value);

        return $this;
    }

    public function getBolloVirtuale(): ?string
    {
        return $this->BolloVirtuale->get();
    }

    public function setBolloVirtuale(BolloVirtuale|string|null $value)
    {
        $this->BolloVirtuale->set($value);

        return $this;
    }
}
