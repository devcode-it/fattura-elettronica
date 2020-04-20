<?php

namespace DevCode\FatturaElettronica\Ordinaria;

use DevCode\FatturaElettronica\Common\DatiAnagrafici;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

interface FatturaInterface extends \DevCode\FatturaElettronica\FatturaInterface
{
    /**
     * Restituisce il cedente/prestatore della fattura.
     */
    public function getCedentePrestatore(): CedentePrestatore;

    /**
     * Restituisce il cessionario/committente della fattura.
     */
    public function getCessionarioCommittente(): CessionarioCommittente;

    /**
     * Ritorna i dati trasmissione.
     */
    public function getDatiTrasmissione(): DatiTrasmissione;

    /**
     * Restituisce i dati dell'intermediario/soggetto emittente.
     */
    public function getTerzoIntermediarioOSoggettoEmittente(): DatiAnagrafici;

    /**
     * Riotrna i dati generali.
     */
    public function getDatiGenerali(): DatiGenerali;

    /**
     * Ritorna i dati pagamento.
     */
    public function getDatiPagamento(): DatiPagamento;

    /**
     * Ritorna dati beni servizi.
     */
    public function getDatiBeniServizi(): DatiBeniServizi;

    /**
     * Ritorna il tipo documento.
     */
    public function getTipoDocumento(): string;

    /**
     * Ritorna la modalità pagamento.
     */
    public function getModalitaPagamento(): string;
}
