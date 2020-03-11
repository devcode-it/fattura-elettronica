<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;
use Dasc3er\FatturaElettronica\Tabelle\TipoDocumento;

class DatiGeneraliDocumento extends ElementoFattura
{
    protected string $TipoDocumento;

    protected string $Divisa;

    protected string $Data;

    protected string $Numero;

    /** @var DatiRitenuta[] */
    protected iterable $DatiRitenuta;

    /** @var DatiCassaPrevidenziale[] */
    protected iterable $DatiCassaPrevidenziale;

    protected Decimal $ImportoTotaleDocumento;

    public function __construct(
        ?string $TipoDocumento = null,
        ?string $Data = null,
        ?string $Numero = null,
        ?float $ImportoTotaleDocumento = null,
        ?string $Divisa = null
    ) {
        $this->TipoDocumento = $TipoDocumento ?: TipoDocumento::Fattura;

        $this->Data = $Data;
        $this->Numero = $Numero;
        $this->Divisa = $Divisa ?: 'EUR';

        $this->ImportoTotaleDocumento = new Decimal(2, $ImportoTotaleDocumento);

        $this->DatiRitenuta = [];
        $this->DatiCassaPrevidenziale = [];
    }

    public function getDivisa(): string
    {
        return $this->Divisa;
    }

    public function setDivisa(string $Divisa): DatiGeneraliDocumento
    {
        $this->Divisa = $Divisa;

        return $this;
    }

    public function getData(): string
    {
        return $this->Data;
    }

    public function setData(string $Data): DatiGeneraliDocumento
    {
        $this->Data = $Data;

        return $this;
    }

    public function getNumero(): string
    {
        return $this->Numero;
    }

    public function setNumero(string $Numero): DatiGeneraliDocumento
    {
        $this->Numero = $Numero;

        return $this;
    }

    /**
     * @return DatiRitenuta[]
     */
    public function getDatiRitenuta(): iterable
    {
        return $this->DatiRitenuta;
    }

    /**
     * @return DatiCassaPrevidenziale[]
     */
    public function getDatiCassaPrevidenziale(): iterable
    {
        return $this->DatiCassaPrevidenziale;
    }

    public function getImportoTotaleDocumento(): ?float
    {
        return $this->ImportoTotaleDocumento->get();
    }

    public function setImportoTotaleDocumento(?float $ImportoTotaleDocumento): DatiGeneraliDocumento
    {
        $this->ImportoTotaleDocumento->set($ImportoTotaleDocumento);

        return $this;
    }

    public function getTipoDocumento(): string
    {
        return $this->TipoDocumento;
    }

    public function setTipoDocumento(string $TipoDocumento): DatiGeneraliDocumento
    {
        $this->TipoDocumento = $TipoDocumento;

        return $this;
    }
}
