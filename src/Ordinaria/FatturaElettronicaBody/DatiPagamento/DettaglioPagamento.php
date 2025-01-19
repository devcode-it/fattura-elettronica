<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento\DettaglioPagamento\ModalitaPagamento;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Intero;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.4.2
 *
 * @name DettaglioPagamento
 *
 * Dati di dettaglio del pagamento
 */
class DettaglioPagamento extends Elemento
{
    protected Testo $Beneficiario;
    protected TestoEnum $ModalitaPagamento;
    protected Data $DataRiferimentoTerminiPagamento;
    protected Intero $GiorniTerminiPagamento;
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

    public function __construct()
    {
        parent::__construct(false);
        $this->Beneficiario = new Testo(true, 1, 200, 1);
        $this->ModalitaPagamento = new TestoEnum(false, ModalitaPagamento::class);
        $this->DataRiferimentoTerminiPagamento = new Data(true, 'Y-m-d');
        $this->GiorniTerminiPagamento = new Intero(true, 0, 999);
        $this->DataScadenzaPagamento = new Data(true, 'Y-m-d');
        $this->ImportoPagamento = new Decimale(false, 2, 2, 2);
        $this->CodUfficioPostale = new Testo(true, 1, 20, 1);
        $this->CognomeQuietanzante = new Testo(true, 1, 60, 1);
        $this->NomeQuietanzante = new Testo(true, 1, 60, 1);
        $this->CFQuietanzante = new Testo(true, 16, 16, 1);
        $this->TitoloQuietanzante = new Testo(true, 2, 10, 1);
        $this->IstitutoFinanziario = new Testo(true, 1, 80, 1);
        $this->IBAN = new Testo(true, 11, 30, 1);
        $this->ABI = new Testo(true, 5, 5, 1);
        $this->CAB = new Testo(true, 5, 5, 1);
        $this->BIC = new Testo(true, 0, 1, 1);
        $this->ScontoPagamentoAnticipato = new Decimale(true, 2, 2, 2);
        $this->DataLimitePagamentoAnticipato = new Data(true, 'Y-m-d');
        $this->PenalitaPagamentiRitardati = new Decimale(true, 2, 2, 2);
        $this->DataDecorrenzaPenale = new Data(true, 'Y-m-d');
        $this->CodicePagamento = new Testo(true, 1, 60, 1);
    }

    public function getBeneficiario(): ?string
    {
        return $this->Beneficiario->get();
    }

    public function setBeneficiario(?string $value)
    {
        $this->Beneficiario->set($value);

        return $this;
    }

    public function getModalitaPagamento(): ?string
    {
        return $this->ModalitaPagamento->get();
    }

    public function setModalitaPagamento(ModalitaPagamento|string $value)
    {
        $this->ModalitaPagamento->set($value);

        return $this;
    }

    public function getDataRiferimentoTerminiPagamento(): ?string
    {
        return $this->DataRiferimentoTerminiPagamento->get();
    }

    public function setDataRiferimentoTerminiPagamento(string|Carbon|\DateTime|null $value)
    {
        $this->DataRiferimentoTerminiPagamento->set($value);

        return $this;
    }

    public function getGiorniTerminiPagamento(): ?int
    {
        return $this->GiorniTerminiPagamento->get();
    }

    public function setGiorniTerminiPagamento(?int $value)
    {
        $this->GiorniTerminiPagamento->set($value);

        return $this;
    }

    public function getDataScadenzaPagamento(): ?string
    {
        return $this->DataScadenzaPagamento->get();
    }

    public function setDataScadenzaPagamento(string|Carbon|\DateTime|null $value)
    {
        $this->DataScadenzaPagamento->set($value);

        return $this;
    }

    public function getImportoPagamento(): ?float
    {
        return $this->ImportoPagamento->get();
    }

    public function setImportoPagamento(?float $value)
    {
        $this->ImportoPagamento->set($value);

        return $this;
    }

    public function getCodUfficioPostale(): ?string
    {
        return $this->CodUfficioPostale->get();
    }

    public function setCodUfficioPostale(?string $value)
    {
        $this->CodUfficioPostale->set($value);

        return $this;
    }

    public function getCognomeQuietanzante(): ?string
    {
        return $this->CognomeQuietanzante->get();
    }

    public function setCognomeQuietanzante(?string $value)
    {
        $this->CognomeQuietanzante->set($value);

        return $this;
    }

    public function getNomeQuietanzante(): ?string
    {
        return $this->NomeQuietanzante->get();
    }

    public function setNomeQuietanzante(?string $value)
    {
        $this->NomeQuietanzante->set($value);

        return $this;
    }

    public function getCFQuietanzante(): ?string
    {
        return $this->CFQuietanzante->get();
    }

    public function setCFQuietanzante(?string $value)
    {
        $this->CFQuietanzante->set($value);

        return $this;
    }

    public function getTitoloQuietanzante(): ?string
    {
        return $this->TitoloQuietanzante->get();
    }

    public function setTitoloQuietanzante(?string $value)
    {
        $this->TitoloQuietanzante->set($value);

        return $this;
    }

    public function getIstitutoFinanziario(): ?string
    {
        return $this->IstitutoFinanziario->get();
    }

    public function setIstitutoFinanziario(?string $value)
    {
        $this->IstitutoFinanziario->set($value);

        return $this;
    }

    public function getIBAN(): ?string
    {
        return $this->IBAN->get();
    }

    public function setIBAN(?string $value)
    {
        $this->IBAN->set($value);

        return $this;
    }

    public function getABI(): ?string
    {
        return $this->ABI->get();
    }

    public function setABI(?string $value)
    {
        $this->ABI->set($value);

        return $this;
    }

    public function getCAB(): ?string
    {
        return $this->CAB->get();
    }

    public function setCAB(?string $value)
    {
        $this->CAB->set($value);

        return $this;
    }

    public function getBIC(): ?string
    {
        return $this->BIC->get();
    }

    public function setBIC(?string $value)
    {
        $this->BIC->set($value);

        return $this;
    }

    public function getScontoPagamentoAnticipato(): ?float
    {
        return $this->ScontoPagamentoAnticipato->get();
    }

    public function setScontoPagamentoAnticipato(?float $value)
    {
        $this->ScontoPagamentoAnticipato->set($value);

        return $this;
    }

    public function getDataLimitePagamentoAnticipato(): ?string
    {
        return $this->DataLimitePagamentoAnticipato->get();
    }

    public function setDataLimitePagamentoAnticipato(string|Carbon|\DateTime|null $value)
    {
        $this->DataLimitePagamentoAnticipato->set($value);

        return $this;
    }

    public function getPenalitaPagamentiRitardati(): ?float
    {
        return $this->PenalitaPagamentiRitardati->get();
    }

    public function setPenalitaPagamentiRitardati(?float $value)
    {
        $this->PenalitaPagamentiRitardati->set($value);

        return $this;
    }

    public function getDataDecorrenzaPenale(): ?string
    {
        return $this->DataDecorrenzaPenale->get();
    }

    public function setDataDecorrenzaPenale(string|Carbon|\DateTime|null $value)
    {
        $this->DataDecorrenzaPenale->set($value);

        return $this;
    }

    public function getCodicePagamento(): ?string
    {
        return $this->CodicePagamento->get();
    }

    public function setCodicePagamento(?string $value)
    {
        $this->CodicePagamento->set($value);

        return $this;
    }
}
