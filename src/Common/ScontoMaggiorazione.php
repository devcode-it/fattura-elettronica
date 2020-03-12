<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;

class ScontoMaggiorazione extends ElementoFattura
{
    protected ?string $Tipo;
    protected Decimal $Percentuale;
    protected Decimal $Importo;

    public function __construct()
    {
        $this->Percentuale = new Decimal(2);
        $this->Importo = new Decimal(2);
    }

    public static function build(
        ?string $Tipo = null,
        ?float $Percentuale = null,
        ?float $Importo = null
    ) {
        $element = new static();

        $element->Tipo = $Tipo;
        $element->Percentuale = $Percentuale;
        $element->Importo = $Importo;

        return $element;
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
