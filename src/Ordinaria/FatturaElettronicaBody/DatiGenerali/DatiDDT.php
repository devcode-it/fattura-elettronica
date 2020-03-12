<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiDDT extends ElementoFattura
{
    protected ?string $NumeroDDT;

    protected ?string $DataDDT;

    /** @var int[] */
    protected iterable $RiferimentoNumeroLinea;

    public function __construct()
    {
        parent::__construct();

        $this->RiferimentoNumeroLinea = [];
    }

    public static function build(
        ?string $NumeroDDT = null,
        ?string $DataDDT = null
    ) {
        $element = new static();

        $element->NumeroDDT = $NumeroDDT;
        $element->DataDDT = $DataDDT;

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

    public function getNumeroDDT(): ?string
    {
        return $this->NumeroDDT;
    }

    public function setNumeroDDT(?string $NumeroDDT): DatiDDT
    {
        $this->NumeroDDT = $NumeroDDT;

        return $this;
    }

    public function getDataDDT(): ?string
    {
        return $this->DataDDT;
    }

    public function setDataDDT(?string $DataDDT): DatiDDT
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

    /**
     * {@inheritdoc}
     */
    public function unserialize(array $content): void
    {
        if (isset($content['RiferimentoNumeroLinea']) && !is_array($content['RiferimentoNumeroLinea'])) {
            $content['RiferimentoNumeroLinea'] = [
                $content['RiferimentoNumeroLinea'],
            ];
        }

        parent::unserialize($content);
    }
}
