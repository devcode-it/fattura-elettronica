<?php

namespace Dasc3er\FatturaElettronica\Ordinaria;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

interface FatturaInterface extends \Dasc3er\FatturaElettronica\FatturaInterface
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
