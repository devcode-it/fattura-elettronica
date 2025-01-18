<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento\CondizioniPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento\DettaglioPagamento;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.4
 *
 * @name DatiPagamento
 *
 * Blocco destinato a descrivere le modalità di pagamento per la cessione/prestazione rappresentata in fattura
 *
 * Blocco relativo ai dati di Pagamento della Fattura Elettronica
 */
class DatiPagamento extends Elemento
{
    protected TestoEnum $CondizioniPagamento;
    protected Collezione $DettaglioPagamento;

    public function __construct()
    {
        parent::__construct(true);
        $this->CondizioniPagamento = new TestoEnum(false, CondizioniPagamento::class);
        $this->DettaglioPagamento = new Collezione(DettaglioPagamento::class, 1, null);
    }

    public function getCondizioniPagamento(): ?string
    {
        return $this->CondizioniPagamento->get();
    }

    public function setCondizioniPagamento(CondizioniPagamento|string $value)
    {
        $this->CondizioniPagamento->set($value);

        return $this;
    }

    public function getDettaglioPagamento(): Collezione
    {
        return $this->DettaglioPagamento;
    }

    public function getAllDettaglioPagamento(): array
    {
        return $this->DettaglioPagamento->toList();
    }

    public function addDettaglioPagamento(DettaglioPagamento $elemento)
    {
        $this->DettaglioPagamento->add($elemento);

        return $this;
    }

    public function removeDettaglioPagamento(int $index)
    {
        $this->DettaglioPagamento->remove($index);

        return $this;
    }
}
