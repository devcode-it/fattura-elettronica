<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiDdt extends ElementoFattura
{
    protected ?string $NumeroDDT;

    protected ?string $DataDDT;

    /** @var int[] */
    protected iterable $RiferimentoNumeroLinea;

    /**
     * DatiDdt constructor.
     */
    public function __construct(
        ?string $NumeroDDT = null,
        ?string $DataDDT = null
    ) {
        $this->NumeroDDT = $NumeroDDT;
        $this->DataDDT = $DataDDT;

        $this->RiferimentoNumeroLinea = [];
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

    public function getNumeroDDT(): ?string
    {
        return $this->NumeroDDT;
    }

    public function setNumeroDDT(?string $NumeroDDT): DatiDdt
    {
        $this->NumeroDDT = $NumeroDDT;

        return $this;
    }

    public function getDataDDT(): ?string
    {
        return $this->DataDDT;
    }

    public function setDataDDT(?string $DataDDT): DatiDdt
    {
        $this->DataDDT = $DataDDT;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getRiferimentoNumeroLinea(): iterable
    {
        return $this->RiferimentoNumeroLinea;
    }
}
