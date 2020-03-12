<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiDocumento extends ElementoFattura
{
    /** @var int[] */
    public iterable $RiferimentoNumeroLinea;

    protected ?string $IdDocumento;

    protected ?string $Data;

    protected ?string $NumItem;

    protected ?string $CodiceCommessaConvenzione;

    protected ?string $CodiceCUP;

    protected ?string $CodiceCIG;

    public function __construct()
    {
        $this->RiferimentoNumeroLinea = [];
    }

    public static function build(
        ?string $IdDocumento = null,
        ?string $Data = null,
        ?string $NumItem = null,
        ?string $CodiceCommessaConvenzione = null,
        ?string $CodiceCUP = null,
        ?string $CodiceCIG = null
    ) {
        $element = new static();

        $element->IdDocumento = $IdDocumento;
        $element->Data = $Data;
        $element->NumItem = $NumItem;
        $element->CodiceCommessaConvenzione = $CodiceCommessaConvenzione;
        $element->CodiceCUP = $CodiceCUP;
        $element->CodiceCIG = $CodiceCIG;

        return $element;
    }

    /**
     * Aggiunge il riferimento indicato all'elenco.
     *
     * @param $value
     */
    public function addRiferimento($value): void
    {
        $this->RiferimentoNumeroLinee[] = $value;
    }

    /**
     * @return int[]
     */
    public function getRiferimentoNumeroLinea(): iterable
    {
        return $this->RiferimentoNumeroLinea;
    }

    public function getIdDocumento(): ?string
    {
        return $this->IdDocumento;
    }

    public function setIdDocumento(?string $IdDocumento): DatiDocumento
    {
        $this->IdDocumento = $IdDocumento;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->Data;
    }

    public function setData(?string $Data): DatiDocumento
    {
        $this->Data = $Data;

        return $this;
    }

    public function getNumItem(): ?string
    {
        return $this->NumItem;
    }

    public function setNumItem(?string $NumItem): DatiDocumento
    {
        $this->NumItem = $NumItem;

        return $this;
    }

    public function getCodiceCommessaConvenzione(): ?string
    {
        return $this->CodiceCommessaConvenzione;
    }

    public function setCodiceCommessaConvenzione(?string $CodiceCommessaConvenzione): DatiDocumento
    {
        $this->CodiceCommessaConvenzione = $CodiceCommessaConvenzione;

        return $this;
    }

    public function getCodiceCUP(): ?string
    {
        return $this->CodiceCUP;
    }

    public function setCodiceCUP(?string $CodiceCUP): DatiDocumento
    {
        $this->CodiceCUP = $CodiceCUP;

        return $this;
    }

    public function getCodiceCIG(): ?string
    {
        return $this->CodiceCIG;
    }

    public function setCodiceCIG(?string $CodiceCIG): DatiDocumento
    {
        $this->CodiceCIG = $CodiceCIG;

        return $this;
    }
}
