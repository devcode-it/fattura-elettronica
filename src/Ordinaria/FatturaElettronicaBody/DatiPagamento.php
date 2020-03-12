<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Collection;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento\DettaglioPagamento;
use Dasc3er\FatturaElettronica\Tabelle\CondizioniPagamento;

class DatiPagamento extends ElementoFattura
{
    protected ?string $CondizioniPagamento;

    /** @var DettaglioPagamento[] */
    protected Collection $DettaglioPagamento;

    public function __construct()
    {
        parent::__construct();

        $this->CondizioniPagamento = CondizioniPagamento::Completo;
        $this->DettaglioPagamento = new Collection(DettaglioPagamento::class);
    }

    public static function build(
        ?string $CondizioniPagamento = null
    ) {
        $element = new static();

        if ($CondizioniPagamento) {
            $element->CondizioniPagamento = $CondizioniPagamento;
        }

        return $element;
    }

    public function getCondizioniPagamento(): ?string
    {
        return $this->CondizioniPagamento;
    }

    public function setCondizioniPagamento(?string $CondizioniPagamento): DatiPagamento
    {
        $this->CondizioniPagamento = $CondizioniPagamento;

        return $this;
    }

    /**
     * @return DettaglioPagamento[]
     */
    public function getDettaglioPagamento(): Collection
    {
        return $this->DettaglioPagamento;
    }

    /**
     * @return DettaglioPagamento[]
     */
    public function addPagamento(DettaglioPagamento $pagamento): DatiPagamento
    {
        $this->DettaglioPagamento->add($pagamento);

        return $this;
    }
}
