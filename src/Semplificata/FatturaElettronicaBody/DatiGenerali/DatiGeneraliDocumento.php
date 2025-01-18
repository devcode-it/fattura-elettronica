<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente i dati generali della fattura
*/
class DatiGeneraliDocumento extends Elemento
{
    protected Testo $TipoDocumento;
    protected Testo $Divisa;
    protected Data $Data;
    protected Testo $Numero;
    protected Testo $BolloVirtuale;

    public function __construct(?string $TipoDocumento = null, ?string $Divisa = null, string|Carbon|\DateTime|null $Data = null, ?string $Numero = null, ?string $BolloVirtuale = null)
    {
        parent::__construct(false);
        $this->TipoDocumento = new Testo(false, 4, 4, 1);
        $this->Divisa = new Testo(false, 3, 3, 1);
        $this->Data = new Data(false, 'YYYY-MM-DD');
        $this->Numero = new Testo(false, 1, 20, 1);
        $this->BolloVirtuale = new Testo(true, 2, 2, 1);
        if (!is_null($TipoDocumento)) {
            $this->setTipoDocumento($TipoDocumento);
        }
        if (!is_null($Divisa)) {
            $this->setDivisa($Divisa);
        }
        if (!is_null($Data)) {
            $this->setData($Data);
        }
        if (!is_null($Numero)) {
            $this->setNumero($Numero);
        }
        if (!is_null($BolloVirtuale)) {
            $this->setBolloVirtuale($BolloVirtuale);
        }
    }

    public function getTipoDocumento(): ?string
    {
        return $this->TipoDocumento->get();
    }

    public function setTipoDocumento(?string $value)
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

    public function setBolloVirtuale(?string $value)
    {
        $this->BolloVirtuale->set($value);

        return $this;
    }
}
