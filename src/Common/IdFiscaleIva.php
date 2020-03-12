<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class IdFiscaleIva extends ElementoFattura
{
    protected ?string $IdPaese;

    protected ?string $IdCodice;

    public static function build(
        ?string $IdPaese = null,
        ?string $IdCodice = null
    ) {
        $element = new static();

        $element->IdPaese = $IdPaese;
        $element->IdCodice = $IdCodice;

        return $element;
    }

    public function getIdPaese(): ?string
    {
        return $this->IdPaese;
    }

    public function setIdPaese(?string $IdPaese): IdFiscaleIva
    {
        $this->IdPaese = $IdPaese;

        return $this;
    }

    public function getIdCodice(): ?string
    {
        return $this->IdCodice;
    }

    public function setIdCodice(?string $IdCodice): IdFiscaleIva
    {
        $this->IdCodice = $IdCodice;

        return $this;
    }
}
