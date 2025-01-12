<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati di dettaglio del pagamento
*/
class DettaglioPagamento extends Elemento {
    protected Testo $Beneficiario;
	protected Testo $ModalitaPagamento;
	protected Data $DataRiferimentoTerminiPagamento;
	protected ?int $GiorniTerminiPagamento;
	protected Data $DataScadenzaPagamento;
	protected Decimale $ImportoPagamento;
	protected Testo $CodUfficioPostale;
	protected Testo $CognomeQuietanzante;
	protected Testo $NomeQuietanzante;
	protected Testo $CFQuietanzante;
	protected Testo $TitoloQuietanzante;
	protected Testo $IstitutoFinanziario;
	protected Testo $IBAN;
	protected Testo $ABI;
	protected Testo $CAB;
	protected Testo $BIC;
	protected Decimale $ScontoPagamentoAnticipato;
	protected Data $DataLimitePagamentoAnticipato;
	protected Decimale $PenalitaPagamentiRitardati;
	protected Data $DataDecorrenzaPenale;
	protected Testo $CodicePagamento;
    public function __construct(?string $Beneficiario = null, ?string $ModalitaPagamento = null, null|string|Carbon|\DateTime $DataRiferimentoTerminiPagamento = null, ?int $GiorniTerminiPagamento = null, null|string|Carbon|\DateTime $DataScadenzaPagamento = null, ?float $ImportoPagamento = null, ?string $CodUfficioPostale = null, ?string $CognomeQuietanzante = null, ?string $NomeQuietanzante = null, ?string $CFQuietanzante = null, ?string $TitoloQuietanzante = null, ?string $IstitutoFinanziario = null, ?string $IBAN = null, ?string $ABI = null, ?string $CAB = null, ?string $BIC = null, ?float $ScontoPagamentoAnticipato = null, null|string|Carbon|\DateTime $DataLimitePagamentoAnticipato = null, ?float $PenalitaPagamentiRitardati = null, null|string|Carbon|\DateTime $DataDecorrenzaPenale = null, ?string $CodicePagamento = null) {
        $this->Beneficiario = new Testo(true, 1, 200, 1);
		$this->ModalitaPagamento = new Testo(false, 4, 4, 1);
		$this->DataRiferimentoTerminiPagamento = new Data(true);
		$this->DataScadenzaPagamento = new Data(true);
		$this->ImportoPagamento = new Decimale(false);
		$this->CodUfficioPostale = new Testo(true, 1, 20, 1);
		$this->CognomeQuietanzante = new Testo(true, 1, 60, 1);
		$this->NomeQuietanzante = new Testo(true, 1, 60, 1);
		$this->CFQuietanzante = new Testo(true, 16, 16, 1);
		$this->TitoloQuietanzante = new Testo(true, 2, 10, 1);
		$this->IstitutoFinanziario = new Testo(true, 1, 80, 1);
		$this->IBAN = new Testo(true, 15, 34, 1);
		$this->ABI = new Testo(true, 5, 5, 1);
		$this->CAB = new Testo(true, 5, 5, 1);
		$this->BIC = new Testo(true, 8, 11, 1);
		$this->ScontoPagamentoAnticipato = new Decimale(true);
		$this->DataLimitePagamentoAnticipato = new Data(true);
		$this->PenalitaPagamentiRitardati = new Decimale(true);
		$this->DataDecorrenzaPenale = new Data(true);
		$this->CodicePagamento = new Testo(true, 1, 60, 1);
        if (!is_null($Beneficiario)) $this->setBeneficiario($Beneficiario);
		if (!is_null($ModalitaPagamento)) $this->setModalitaPagamento($ModalitaPagamento);
		if (!is_null($DataRiferimentoTerminiPagamento)) $this->setDataRiferimentoTerminiPagamento($DataRiferimentoTerminiPagamento);
		if (!is_null($GiorniTerminiPagamento)) $this->setGiorniTerminiPagamento($GiorniTerminiPagamento);
		if (!is_null($DataScadenzaPagamento)) $this->setDataScadenzaPagamento($DataScadenzaPagamento);
		if (!is_null($ImportoPagamento)) $this->setImportoPagamento($ImportoPagamento);
		if (!is_null($CodUfficioPostale)) $this->setCodUfficioPostale($CodUfficioPostale);
		if (!is_null($CognomeQuietanzante)) $this->setCognomeQuietanzante($CognomeQuietanzante);
		if (!is_null($NomeQuietanzante)) $this->setNomeQuietanzante($NomeQuietanzante);
		if (!is_null($CFQuietanzante)) $this->setCFQuietanzante($CFQuietanzante);
		if (!is_null($TitoloQuietanzante)) $this->setTitoloQuietanzante($TitoloQuietanzante);
		if (!is_null($IstitutoFinanziario)) $this->setIstitutoFinanziario($IstitutoFinanziario);
		if (!is_null($IBAN)) $this->setIBAN($IBAN);
		if (!is_null($ABI)) $this->setABI($ABI);
		if (!is_null($CAB)) $this->setCAB($CAB);
		if (!is_null($BIC)) $this->setBIC($BIC);
		if (!is_null($ScontoPagamentoAnticipato)) $this->setScontoPagamentoAnticipato($ScontoPagamentoAnticipato);
		if (!is_null($DataLimitePagamentoAnticipato)) $this->setDataLimitePagamentoAnticipato($DataLimitePagamentoAnticipato);
		if (!is_null($PenalitaPagamentiRitardati)) $this->setPenalitaPagamentiRitardati($PenalitaPagamentiRitardati);
		if (!is_null($DataDecorrenzaPenale)) $this->setDataDecorrenzaPenale($DataDecorrenzaPenale);
		if (!is_null($CodicePagamento)) $this->setCodicePagamento($CodicePagamento);
    }
    
    public function getBeneficiario() : ?string {
        return $this->Beneficiario->get();
    }

    public function setBeneficiario(?string $value) {
        $this->Beneficiario->set($value);

        return $this;
    }

    public function getModalitaPagamento() : ?string {
        return $this->ModalitaPagamento->get();
    }

    public function setModalitaPagamento(?string $value) {
        $this->ModalitaPagamento->set($value);

        return $this;
    }

    public function getDataRiferimentoTerminiPagamento() : ?string {
        return $this->DataRiferimentoTerminiPagamento->get();
    }

    public function setDataRiferimentoTerminiPagamento(null|string|Carbon|\DateTime $value) {
        $this->DataRiferimentoTerminiPagamento->set($value);

        return $this;
    }

    public function getGiorniTerminiPagamento() : ?int {
        return $this->GiorniTerminiPagamento;
    }

    public function setGiorniTerminiPagamento(?int $value) {
        $this->GiorniTerminiPagamento = $value;

        return $this;
    }

    public function getDataScadenzaPagamento() : ?string {
        return $this->DataScadenzaPagamento->get();
    }

    public function setDataScadenzaPagamento(null|string|Carbon|\DateTime $value) {
        $this->DataScadenzaPagamento->set($value);

        return $this;
    }

    public function getImportoPagamento() : ?float {
        return $this->ImportoPagamento->get();
    }

    public function setImportoPagamento(?float $value) {
        $this->ImportoPagamento->set($value);

        return $this;
    }

    public function getCodUfficioPostale() : ?string {
        return $this->CodUfficioPostale->get();
    }

    public function setCodUfficioPostale(?string $value) {
        $this->CodUfficioPostale->set($value);

        return $this;
    }

    public function getCognomeQuietanzante() : ?string {
        return $this->CognomeQuietanzante->get();
    }

    public function setCognomeQuietanzante(?string $value) {
        $this->CognomeQuietanzante->set($value);

        return $this;
    }

    public function getNomeQuietanzante() : ?string {
        return $this->NomeQuietanzante->get();
    }

    public function setNomeQuietanzante(?string $value) {
        $this->NomeQuietanzante->set($value);

        return $this;
    }

    public function getCFQuietanzante() : ?string {
        return $this->CFQuietanzante->get();
    }

    public function setCFQuietanzante(?string $value) {
        $this->CFQuietanzante->set($value);

        return $this;
    }

    public function getTitoloQuietanzante() : ?string {
        return $this->TitoloQuietanzante->get();
    }

    public function setTitoloQuietanzante(?string $value) {
        $this->TitoloQuietanzante->set($value);

        return $this;
    }

    public function getIstitutoFinanziario() : ?string {
        return $this->IstitutoFinanziario->get();
    }

    public function setIstitutoFinanziario(?string $value) {
        $this->IstitutoFinanziario->set($value);

        return $this;
    }

    public function getIBAN() : ?string {
        return $this->IBAN->get();
    }

    public function setIBAN(?string $value) {
        $this->IBAN->set($value);

        return $this;
    }

    public function getABI() : ?string {
        return $this->ABI->get();
    }

    public function setABI(?string $value) {
        $this->ABI->set($value);

        return $this;
    }

    public function getCAB() : ?string {
        return $this->CAB->get();
    }

    public function setCAB(?string $value) {
        $this->CAB->set($value);

        return $this;
    }

    public function getBIC() : ?string {
        return $this->BIC->get();
    }

    public function setBIC(?string $value) {
        $this->BIC->set($value);

        return $this;
    }

    public function getScontoPagamentoAnticipato() : ?float {
        return $this->ScontoPagamentoAnticipato->get();
    }

    public function setScontoPagamentoAnticipato(?float $value) {
        $this->ScontoPagamentoAnticipato->set($value);

        return $this;
    }

    public function getDataLimitePagamentoAnticipato() : ?string {
        return $this->DataLimitePagamentoAnticipato->get();
    }

    public function setDataLimitePagamentoAnticipato(null|string|Carbon|\DateTime $value) {
        $this->DataLimitePagamentoAnticipato->set($value);

        return $this;
    }

    public function getPenalitaPagamentiRitardati() : ?float {
        return $this->PenalitaPagamentiRitardati->get();
    }

    public function setPenalitaPagamentiRitardati(?float $value) {
        $this->PenalitaPagamentiRitardati->set($value);

        return $this;
    }

    public function getDataDecorrenzaPenale() : ?string {
        return $this->DataDecorrenzaPenale->get();
    }

    public function setDataDecorrenzaPenale(null|string|Carbon|\DateTime $value) {
        $this->DataDecorrenzaPenale->set($value);

        return $this;
    }

    public function getCodicePagamento() : ?string {
        return $this->CodicePagamento->get();
    }

    public function setCodicePagamento(?string $value) {
        $this->CodicePagamento->set($value);

        return $this;
    }
}
