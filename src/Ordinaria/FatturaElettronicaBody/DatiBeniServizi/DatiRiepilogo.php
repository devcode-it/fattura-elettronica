<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use Dasc3er\FatturaElettronica\ElementoFattura;

class DatiRiepilogo extends ElementoFattura
{
    public $aliquotaIVA;

    public $imponibileImporto;

    public $imposta;

    public $esigibilitaIVA = 'I';

    /** @var DatiRiepilogo[] */
    public $datiRiepilogoAggiuntivi = [];

    /**
     * DatiRiepilogo constructor.
     *
     * @param $imponibileImporto
     * @param $aliquotaIVA
     * @param string $esigibilitaIVA
     * @param bool   $imposta
     */
    public function __construct($imponibileImporto, $aliquotaIVA, $esigibilitaIVA = 'I', $imposta = false)
    {
        if ($imposta === false) {
            $this->imposta = ($imponibileImporto / 100) * $aliquotaIVA;
        } else {
            $this->imposta = $imposta;
        }
        $this->imponibileImporto = $imponibileImporto;
        $this->aliquotaIVA = $aliquotaIVA;
        $this->esigibilitaIVA = $esigibilitaIVA;
        $this->datiRiepilogoAggiuntivi[] = $this;
    }

    /**
    public function toXmlBlock(\XMLWriter $writer): void
    {
        foreach ($this as $block) {
            $natura = $block->natura;
            $writer->startElement('DatiRiepilogo');
            $writer->writeElement('AliquotaIVA', fe_number_format($block->aliquotaIVA, 2));
            $block->writeXmlField('Natura', $writer);
            $writer->writeElement('ImponibileImporto', fe_number_format($block->imponibileImporto, 2));
            $writer->writeElement('Imposta', fe_number_format($block->imposta, 2));
            if (!$natura) {
                $writer->writeElement('EsigibilitaIVA', $block->esigibilitaIVA);
            }
            $block->writeXmlFields($writer);
            $writer->endElement();
        }
    }

     * {@inheritdoc}
     */
    public function addDatiRiepilogo(DatiRiepilogo $datiRiepilogo)
    {
        $this->datiRiepilogoAggiuntivi[] = $datiRiepilogo;
    }
}
