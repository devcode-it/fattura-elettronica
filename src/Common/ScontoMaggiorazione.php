<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;

class ScontoMaggiorazione extends ElementoFattura
{
    protected ?string $Tipo;
    protected Decimal $Percentuale;
    protected Decimal $Importo;

    /**
     * ScontoMaggiorazione constructor.
     */
    public function __construct(
        ?string $Tipo = null,
        ?float $Percentuale = null,
        ?float $Importo = null
    ) {
        $this->Tipo = $Tipo;
        $this->Percentuale = new Decimal(2, $Percentuale);
        $this->Importo = new Decimal(2, $Importo);
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(?string $Tipo): ScontoMaggiorazione
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getPercentuale(): ?float
    {
        return $this->Percentuale->get();
    }

    public function setPercentuale(?float $Percentuale): ScontoMaggiorazione
    {
        $this->Percentual->set($Percentuale);

        return $this;
    }

    public function getImporto(): ?float
    {
        return $this->Importo->get();
    }

    public function setImporto(?float $Importo): ScontoMaggiorazione
    {
        $this->Importo->set($Importo);

        return $this;
    }
}
