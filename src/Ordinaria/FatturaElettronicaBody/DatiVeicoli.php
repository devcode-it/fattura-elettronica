<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiVeicoli extends ElementoFattura
{
    protected ?string $Data;

    protected ?string $TotalePercorso;

    public function __construct(
        ?string $Data = null,
        ?string $TotalePercorso = null
    ) {
        $this->Data = $Data;
        $this->TotalePercorso = $TotalePercorso;
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
