<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class CodiceArticolo extends ElementoFattura
{
    protected ?string $CodiceTipo;

    protected ?string $CodiceValore;

    public function __construct(
        ?string $CodiceTipo = null,
        ?string $CodiceValore = null
    ) {
        $this->CodiceTipo = $CodiceTipo;
        $this->CodiceValore = $CodiceValore;
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
