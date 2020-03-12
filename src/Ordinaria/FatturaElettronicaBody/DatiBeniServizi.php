<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Collection;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

class DatiBeniServizi extends ElementoFattura
{
    /** @var DettaglioLinee[] */
    public Collection $DettaglioLinee;

    /** @var DatiRiepilogo[] */
    public Collection $DatiRiepilogo;

    public function __construct()
    {
        parent::__construct();

        $this->DettaglioLinee = new Collection(DettaglioLinee::class);
        $this->DatiRiepilogo = new Collection(DatiRiepilogo::class);
    }

    public static function build(): self
    {
        return new static();
    }

    public function addLinea(DettaglioLinee $linea): DatiBeniServizi
    {
        $this->DettaglioLinee->add($linea);

        return $this;
    }

    public function getDettaglioLinee(): Collection
    {
        return $this->DettaglioLinee;
    }

    public function getDatiRiepilogo(): Collection
    {
        return $this->DatiRiepilogo;
    }

    /**
     * {@inheritdoc}
     */
    protected function getXmlTags(): iterable
    {
        if ($this->DatiRiepilogo->isEmpty()) {
            $this->calcolaDatiRiepilogo();
        }

        return parent::getXmlTags();
    }

    protected function calcolaDatiRiepilogo(): void
    {
        $righe = collect($this->getDettaglioLinee()->toArray());

        // Riepiloghi per IVA per percentuale
        $riepiloghi_percentuali = $righe->filter(function ($item, $key) {
            return empty($item->AliquotaIVA);
        })->groupBy(function ($item, $key) {
            return $item->AliquotaIVA;
        });
        foreach ($riepiloghi_percentuali as $riepilogo) {
            $totale = $riepilogo->sum(function ($item) {
                return $item->PrezzoTotale;
            });
            $percentuale = $riepilogo->first()->AliquotaIVA;
            $imposta = $totale * $percentuale / 100;

            // Creazione dettaglio
            $dettaglio = new DatiRiepilogo(
                $percentuale,
                null,
                null,
                null,
                $totale,
                $imposta
            );
            $this->DatiRiepilogo->add($dettaglio);
        }

        // Riepiloghi per IVA per natura
        $riepiloghi_natura = $righe->filter(function ($item, $key) {
            return !empty($item->Natura);
        })->groupBy(function ($item, $key) {
            return $item->Natura;
        });
        foreach ($riepiloghi_natura as $riepilogo) {
            $totale = $riepilogo->sum(function ($item) {
                return $item->PrezzoTotale;
            });
            $percentuale = $riepilogo->first()->AliquotaIVA;
            $natura = $riepilogo->first()->Natura;
            $imposta = $totale * $percentuale / 100;

            // Creazione dettaglio
            $dettaglio = new DatiRiepilogo(
                $percentuale,
                $natura,
                null,
                null,
                $totale,
                $imposta
            );
            $this->DatiRiepilogo->add($dettaglio);
        }
    }
}
