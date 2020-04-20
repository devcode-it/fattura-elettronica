<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use DevCode\FatturaElettronica\ElementoFattura;

class CodiceArticolo extends ElementoFattura
{
    protected ?string $CodiceTipo;

    protected ?string $CodiceValore;

    public static function build(
        ?string $CodiceTipo = null,
        ?string $CodiceValore = null
    ) {
        $element = new static();

        $element->CodiceTipo = $CodiceTipo;
        $element->CodiceValore = $CodiceValore;

        return $element;
    }

    public function getCodiceTipo(): ?string
    {
        return $this->CodiceTipo;
    }

    public function setCodiceTipo(?string $CodiceTipo): CodiceArticolo
    {
        $this->CodiceTipo = $CodiceTipo;

        return $this;
    }

    public function getCodiceValore(): ?string
    {
        return $this->CodiceValore;
    }

    public function setCodiceValore(?string $CodiceValore): CodiceArticolo
    {
        $this->CodiceValore = $CodiceValore;

        return $this;
    }
}
