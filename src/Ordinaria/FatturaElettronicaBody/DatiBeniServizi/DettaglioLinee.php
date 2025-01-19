<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\AltriDatiGestionali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\CodiceArticolo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\Natura;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\Ritenuta;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\ScontoMaggiorazione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee\TipoCessionePrestazione;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Intero;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.2.1
 *
 * @name DettaglioLinee
 *
 * Blocco contenente le linee di dettaglio del documento (gli elementi informativi del blocco si ripetono per ogni riga di dettaglio).
 */
class DettaglioLinee extends Elemento
{
    protected Intero $NumeroLinea;
    protected TestoEnum $TipoCessionePrestazione;
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
    protected TestoEnum $Ritenuta;
    protected TestoEnum $Natura;
    protected Testo $RiferimentoAmministrazione;
    protected Collezione $AltriDatiGestionali;

    public function __construct()
    {
        parent::__construct(false);
        $this->NumeroLinea = new Intero(false, 1, 9999);
        $this->TipoCessionePrestazione = new TestoEnum(true, TipoCessionePrestazione::class);
        $this->CodiceArticolo = new Collezione(CodiceArticolo::class, 0, null);
        $this->Descrizione = new Testo(false, 1, 1000, 1, "[\p{IsBasicLatin}\p{IsLatin-1Supplement}]{1,1000}");
        $this->Quantita = new Decimale(true, 2, 2, 8);
        $this->UnitaMisura = new Testo(true, 1, 10, 1, "(\p{IsBasicLatin}{1,10})");
        $this->DataInizioPeriodo = new Data(true, 'Y-m-d');
        $this->DataFinePeriodo = new Data(true, 'Y-m-d');
        $this->PrezzoUnitario = new Decimale(false, 2, 2, 8);
        $this->ScontoMaggiorazione = new Collezione(ScontoMaggiorazione::class, 0, null);
        $this->PrezzoTotale = new Decimale(false, 2, 2, 8);
        $this->AliquotaIVA = new Decimale(false, 2, 2, 2);
        $this->Ritenuta = new TestoEnum(true, Ritenuta::class);
        $this->Natura = new TestoEnum(true, Natura::class);
        $this->RiferimentoAmministrazione = new Testo(true, 1, 20, 1, "(\p{IsBasicLatin}{1,20})");
        $this->AltriDatiGestionali = new Collezione(AltriDatiGestionali::class, 0, null);
    }

    public function getNumeroLinea(): ?int
    {
        return $this->NumeroLinea->get();
    }

    public function setNumeroLinea(?int $value)
    {
        $this->NumeroLinea->set($value);

        return $this;
    }

    public function getTipoCessionePrestazione(): ?string
    {
        return $this->TipoCessionePrestazione->get();
    }

    public function setTipoCessionePrestazione(TipoCessionePrestazione|string|null $value)
    {
        $this->TipoCessionePrestazione->set($value);

        return $this;
    }

    public function getCodiceArticolo(): Collezione
    {
        return $this->CodiceArticolo;
    }

    public function getAllCodiceArticolo(): array
    {
        return $this->CodiceArticolo->toList();
    }

    public function addCodiceArticolo(CodiceArticolo $elemento)
    {
        $this->CodiceArticolo->add($elemento);

        return $this;
    }

    public function removeCodiceArticolo(int $index)
    {
        $this->CodiceArticolo->remove($index);

        return $this;
    }

    public function getDescrizione(): ?string
    {
        return $this->Descrizione->get();
    }

    public function setDescrizione(?string $value)
    {
        $this->Descrizione->set($value);

        return $this;
    }

    public function getQuantita(): ?float
    {
        return $this->Quantita->get();
    }

    public function setQuantita(?float $value)
    {
        $this->Quantita->set($value);

        return $this;
    }

    public function getUnitaMisura(): ?string
    {
        return $this->UnitaMisura->get();
    }

    public function setUnitaMisura(?string $value)
    {
        $this->UnitaMisura->set($value);

        return $this;
    }

    public function getDataInizioPeriodo(): ?string
    {
        return $this->DataInizioPeriodo->get();
    }

    public function setDataInizioPeriodo(string|Carbon|\DateTime|null $value)
    {
        $this->DataInizioPeriodo->set($value);

        return $this;
    }

    public function getDataFinePeriodo(): ?string
    {
        return $this->DataFinePeriodo->get();
    }

    public function setDataFinePeriodo(string|Carbon|\DateTime|null $value)
    {
        $this->DataFinePeriodo->set($value);

        return $this;
    }

    public function getPrezzoUnitario(): ?float
    {
        return $this->PrezzoUnitario->get();
    }

    public function setPrezzoUnitario(?float $value)
    {
        $this->PrezzoUnitario->set($value);

        return $this;
    }

    public function getScontoMaggiorazione(): Collezione
    {
        return $this->ScontoMaggiorazione;
    }

    public function getAllScontoMaggiorazione(): array
    {
        return $this->ScontoMaggiorazione->toList();
    }

    public function addScontoMaggiorazione(ScontoMaggiorazione $elemento)
    {
        $this->ScontoMaggiorazione->add($elemento);

        return $this;
    }

    public function removeScontoMaggiorazione(int $index)
    {
        $this->ScontoMaggiorazione->remove($index);

        return $this;
    }

    public function getPrezzoTotale(): ?float
    {
        return $this->PrezzoTotale->get();
    }

    public function setPrezzoTotale(?float $value)
    {
        $this->PrezzoTotale->set($value);

        return $this;
    }

    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value)
    {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getRitenuta(): ?string
    {
        return $this->Ritenuta->get();
    }

    public function setRitenuta(Ritenuta|string|null $value)
    {
        $this->Ritenuta->set($value);

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura->get();
    }

    public function setNatura(Natura|string|null $value)
    {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->RiferimentoAmministrazione->get();
    }

    public function setRiferimentoAmministrazione(?string $value)
    {
        $this->RiferimentoAmministrazione->set($value);

        return $this;
    }

    public function getAltriDatiGestionali(): Collezione
    {
        return $this->AltriDatiGestionali;
    }

    public function getAllAltriDatiGestionali(): array
    {
        return $this->AltriDatiGestionali->toList();
    }

    public function addAltriDatiGestionali(AltriDatiGestionali $elemento)
    {
        $this->AltriDatiGestionali->add($elemento);

        return $this;
    }

    public function removeAltriDatiGestionali(int $index)
    {
        $this->AltriDatiGestionali->remove($index);

        return $this;
    }
}
