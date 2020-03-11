<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

class DatiBeniServizi extends ElementoFattura
{
    /** @var DettaglioLinee */
    public iterable $DettaglioLinee;

    /** @var DatiRiepilogo */
    public iterable $DatiRiepilogo;

    /**
     * DatiBeniServizi constructor.
     */
    public function __construct()
    {
        $this->DettaglioLinee = [];
        $this->DatiRiepilogo = [];
    }

    public function addLinea(DettaglioLinee $linea): DatiBeniServizi
    {
        $this->DettaglioLinee[] = $linea;

        return $this;
    }

    public function getDettaglioLinee(): DettaglioLinee
    {
        return $this->DettaglioLinee;
    }

    public function getDatiRiepilogo(): DatiRiepilogo
    {
        return $this->DatiRiepilogo;
    }

    /**
     * {@inheritdoc}
     */
    public function getXmlTags(): iterable
    {
        if (empty($this->datiRiepilogo)) {
            //$this->DatiRiepilogo = $this->calcolaDatiRiepilogo();
        }

        return parent::getXmlTags();
    }

    protected function calcolaDatiRiepilogo(): iterable
    {
        $results = [];

        $imponibile = 0;
        $aliquota = 22;

        foreach ($this->DettaglioLinee as $linea) {
            $imponibile += $linea->prezzoTotale(false);
            $aliquota = $linea->getAliquotaIva();

            $results[] = new DatiRiepilogo($imponibile, $aliquota);
        }

        return $results;
    }
}
