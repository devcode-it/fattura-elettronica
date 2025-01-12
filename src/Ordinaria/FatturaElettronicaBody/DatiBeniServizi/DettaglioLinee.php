<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\AltriDatiGestionali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\CodiceArticolo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\ScontoMaggiorazione;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente le linee di dettaglio del documento (gli elementi informativi del blocco si ripetono per ogni riga di dettaglio).
*/
class DettaglioLinee extends Elemento {
    protected int $NumeroLinea;
	protected Testo $TipoCessionePrestazione;
	protected Collezione $CodiceArticolo;
	protected Testo $Descrizione;
	protected Decimale $Quantita;
	protected Testo $UnitaMisura;
	protected Data $DataInizioPeriodo;
	protected Data $DataFinePeriodo;
	protected Decimale $PrezzoUnitario;
	protected Collezione $ScontoMaggiorazione;
	protected Decimale $PrezzoTotale;
	protected Decimale $AliquotaIVA;
	protected Testo $Ritenuta;
	protected Testo $Natura;
	protected Testo $RiferimentoAmministrazione;
	protected Collezione $AltriDatiGestionali;
    public function __construct(?int $NumeroLinea = null, ?string $TipoCessionePrestazione = null, ?string $Descrizione = null, ?float $Quantita = null, ?string $UnitaMisura = null, null|string|Carbon|\DateTime $DataInizioPeriodo = null, null|string|Carbon|\DateTime $DataFinePeriodo = null, ?float $PrezzoUnitario = null, ?float $PrezzoTotale = null, ?float $AliquotaIVA = null, ?string $Ritenuta = null, ?string $Natura = null, ?string $RiferimentoAmministrazione = null) {
        $this->NumeroLinea = 0;
		$this->TipoCessionePrestazione = new Testo(true, 2, 2, 1);
		$this->CodiceArticolo = new Collezione(CodiceArticolo::class, 0);
		$this->Descrizione = new Testo(false, 1, 1000, 1);
		$this->Quantita = new Decimale(true);
		$this->UnitaMisura = new Testo(true, 1, 10, 1);
		$this->DataInizioPeriodo = new Data(true);
		$this->DataFinePeriodo = new Data(true);
		$this->PrezzoUnitario = new Decimale(false);
		$this->ScontoMaggiorazione = new Collezione(ScontoMaggiorazione::class, 0);
		$this->PrezzoTotale = new Decimale(false);
		$this->AliquotaIVA = new Decimale(false);
		$this->Ritenuta = new Testo(true, 2, 2, 1);
		$this->Natura = new Testo(true, 2, 4, 1);
		$this->RiferimentoAmministrazione = new Testo(true, 1, 20, 1);
		$this->AltriDatiGestionali = new Collezione(AltriDatiGestionali::class, 0);
        if (!is_null($NumeroLinea)) $this->setNumeroLinea($NumeroLinea);
		if (!is_null($TipoCessionePrestazione)) $this->setTipoCessionePrestazione($TipoCessionePrestazione);
		if (!is_null($Descrizione)) $this->setDescrizione($Descrizione);
		if (!is_null($Quantita)) $this->setQuantita($Quantita);
		if (!is_null($UnitaMisura)) $this->setUnitaMisura($UnitaMisura);
		if (!is_null($DataInizioPeriodo)) $this->setDataInizioPeriodo($DataInizioPeriodo);
		if (!is_null($DataFinePeriodo)) $this->setDataFinePeriodo($DataFinePeriodo);
		if (!is_null($PrezzoUnitario)) $this->setPrezzoUnitario($PrezzoUnitario);
		if (!is_null($PrezzoTotale)) $this->setPrezzoTotale($PrezzoTotale);
		if (!is_null($AliquotaIVA)) $this->setAliquotaIVA($AliquotaIVA);
		if (!is_null($Ritenuta)) $this->setRitenuta($Ritenuta);
		if (!is_null($Natura)) $this->setNatura($Natura);
		if (!is_null($RiferimentoAmministrazione)) $this->setRiferimentoAmministrazione($RiferimentoAmministrazione);
    }
    
    public function getNumeroLinea() : ?int {
        return $this->NumeroLinea;
    }

    public function setNumeroLinea(int $value) {
        $this->NumeroLinea = $value;

        return $this;
    }

    public function getTipoCessionePrestazione() : ?string {
        return $this->TipoCessionePrestazione->get();
    }

    public function setTipoCessionePrestazione(?string $value) {
        $this->TipoCessionePrestazione->set($value);

        return $this;
    }

    public function getCodiceArticolo() : Collezione {
        return $this->CodiceArticolo;
    }

    public function getAllCodiceArticolo() : array {
        return $this->CodiceArticolo->toList();
    }

    public function addCodiceArticolo(CodiceArticolo $elemento) {
        $this->CodiceArticolo->add($elemento);

        return $this;
    }

    public function removeCodiceArticolo(int $index) {
        $this->CodiceArticolo->remove($index);

        return $this;
    }

    public function getDescrizione() : ?string {
        return $this->Descrizione->get();
    }

    public function setDescrizione(?string $value) {
        $this->Descrizione->set($value);

        return $this;
    }

    public function getQuantita() : ?float {
        return $this->Quantita->get();
    }

    public function setQuantita(?float $value) {
        $this->Quantita->set($value);

        return $this;
    }

    public function getUnitaMisura() : ?string {
        return $this->UnitaMisura->get();
    }

    public function setUnitaMisura(?string $value) {
        $this->UnitaMisura->set($value);

        return $this;
    }

    public function getDataInizioPeriodo() : ?string {
        return $this->DataInizioPeriodo->get();
    }

    public function setDataInizioPeriodo(null|string|Carbon|\DateTime $value) {
        $this->DataInizioPeriodo->set($value);

        return $this;
    }

    public function getDataFinePeriodo() : ?string {
        return $this->DataFinePeriodo->get();
    }

    public function setDataFinePeriodo(null|string|Carbon|\DateTime $value) {
        $this->DataFinePeriodo->set($value);

        return $this;
    }

    public function getPrezzoUnitario() : ?float {
        return $this->PrezzoUnitario->get();
    }

    public function setPrezzoUnitario(?float $value) {
        $this->PrezzoUnitario->set($value);

        return $this;
    }

    public function getScontoMaggiorazione() : Collezione {
        return $this->ScontoMaggiorazione;
    }

    public function getAllScontoMaggiorazione() : array {
        return $this->ScontoMaggiorazione->toList();
    }

    public function addScontoMaggiorazione(ScontoMaggiorazione $elemento) {
        $this->ScontoMaggiorazione->add($elemento);

        return $this;
    }

    public function removeScontoMaggiorazione(int $index) {
        $this->ScontoMaggiorazione->remove($index);

        return $this;
    }

    public function getPrezzoTotale() : ?float {
        return $this->PrezzoTotale->get();
    }

    public function setPrezzoTotale(?float $value) {
        $this->PrezzoTotale->set($value);

        return $this;
    }

    public function getAliquotaIVA() : ?float {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value) {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getRitenuta() : ?string {
        return $this->Ritenuta->get();
    }

    public function setRitenuta(?string $value) {
        $this->Ritenuta->set($value);

        return $this;
    }

    public function getNatura() : ?string {
        return $this->Natura->get();
    }

    public function setNatura(?string $value) {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoAmministrazione() : ?string {
        return $this->RiferimentoAmministrazione->get();
    }

    public function setRiferimentoAmministrazione(?string $value) {
        $this->RiferimentoAmministrazione->set($value);

        return $this;
    }

    public function getAltriDatiGestionali() : Collezione {
        return $this->AltriDatiGestionali;
    }

    public function getAllAltriDatiGestionali() : array {
        return $this->AltriDatiGestionali->toList();
    }

    public function addAltriDatiGestionali(AltriDatiGestionali $elemento) {
        $this->AltriDatiGestionali->add($elemento);

        return $this;
    }

    public function removeAltriDatiGestionali(int $index) {
        $this->AltriDatiGestionali->remove($index);

        return $this;
    }
}
