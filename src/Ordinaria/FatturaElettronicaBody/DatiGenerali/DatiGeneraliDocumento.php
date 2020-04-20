<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\ElementoFattura;
use DevCode\FatturaElettronica\Fields\Collection;
use DevCode\FatturaElettronica\Fields\Decimal;
use DevCode\FatturaElettronica\Fields\Text;
use DevCode\FatturaElettronica\Tabelle\TipoDocumento;

class DatiGeneraliDocumento extends ElementoFattura
{
    protected string $TipoDocumento;

    protected string $Divisa;

    protected string $Data;

    protected string $Numero;

    /** @var DatiRitenuta[] */
    protected Collection $DatiRitenuta;

    /** @var DatiCassaPrevidenziale[] */
    protected Collection $DatiCassaPrevidenziale;

    protected Decimal $ImportoTotaleDocumento;

    protected Text $Causale;

    public function __construct()
    {
        parent::__construct();

        $this->ImportoTotaleDocumento = new Decimal(2);

        $this->DatiRitenuta = new Collection(DatiRitenuta::class);
        $this->DatiCassaPrevidenziale = new Collection(DatiCassaPrevidenziale::class);

        $this->Causale = new Text(200);
    }

    public static function build(
        ?string $TipoDocumento = null,
        ?string $Data = null,
        ?string $Numero = null,
        ?float $ImportoTotaleDocumento = null,
        ?string $Divisa = null
    ) {
        $element = new static();
        $element->TipoDocumento = $TipoDocumento ?: TipoDocumento::Fattura;

        $element->Data = $Data;
        $element->Numero = $Numero;
        $element->Divisa = $Divisa ?: 'EUR';

        $element->ImportoTotaleDocumento->set($ImportoTotaleDocumento);

        return $element;
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
    public function getDatiRitenuta(): Collection
    {
        return $this->DatiRitenuta;
    }

    /**
     * @return DatiCassaPrevidenziale[]
     */
    public function getDatiCassaPrevidenziale(): Collection
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

    public function getCausale(): string
    {
        return $this->Causale->get();
    }

    public function setCausale(?string $Causale): DatiGeneraliDocumento
    {
        $this->Causale->set($Causale);

        return $this;
    }
}
