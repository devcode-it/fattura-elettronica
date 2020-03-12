<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiVeicoli extends ElementoFattura
{
    protected ?string $Data;

    protected ?string $TotalePercorso;

    public static function build(
        ?string $Data = null,
        ?string $TotalePercorso = null
    ) {
        $element = new static();

        $element->Data = $Data;
        $element->TotalePercorso = $TotalePercorso;

        return $element;
    }

    public function getData(): ?string
    {
        return $this->Data;
    }

    public function setData(?string $Data): DatiVeicoli
    {
        $this->Data = $Data;

        return $this;
    }

    public function getTotalePercorso(): ?string
    {
        return $this->TotalePercorso;
    }

    public function setTotalePercorso(?string $TotalePercorso): DatiVeicoli
    {
        $this->TotalePercorso = $TotalePercorso;

        return $this;
    }
}
