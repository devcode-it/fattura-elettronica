<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto\DatiAnagraficiVettore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto\IndirizzoResa;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco valorizzabile nei casi di fattura "accompagnatoria" per inserire informazioni relative al trasporto
*/
class DatiTrasporto extends Elemento
{
    protected DatiAnagraficiVettore $DatiAnagraficiVettore;
    protected Testo $MezzoTrasporto;
    protected Testo $CausaleTrasporto;
    protected ?int $NumeroColli;
    protected Testo $Descrizione;
    protected Testo $UnitaMisuraPeso;
    protected Decimale $PesoLordo;
    protected Decimale $PesoNetto;
    protected Data $DataOraRitiro;
    protected Data $DataInizioTrasporto;
    protected Testo $TipoResa;
    protected IndirizzoResa $IndirizzoResa;
    protected Data $DataOraConsegna;

    public function __construct(?string $MezzoTrasporto = null, ?string $CausaleTrasporto = null, ?int $NumeroColli = null, ?string $Descrizione = null, ?string $UnitaMisuraPeso = null, ?float $PesoLordo = null, ?float $PesoNetto = null, string|Carbon|\DateTime|null $DataOraRitiro = null, string|Carbon|\DateTime|null $DataInizioTrasporto = null, ?string $TipoResa = null, string|Carbon|\DateTime|null $DataOraConsegna = null)
    {
        parent::__construct(true);
        $this->DatiAnagraficiVettore = new DatiAnagraficiVettore();
        $this->MezzoTrasporto = new Testo(true, 1, 80, 1);
        $this->CausaleTrasporto = new Testo(true, 1, 100, 1);
        $this->Descrizione = new Testo(true, 1, 100, 1);
        $this->UnitaMisuraPeso = new Testo(true, 1, 10, 1);
        $this->PesoLordo = new Decimale(true);
        $this->PesoNetto = new Decimale(true);
        $this->DataOraRitiro = new Data(true, 'YYYY-MM-DDTHH:MM:SS');
        $this->DataInizioTrasporto = new Data(true, 'YYYY-MM-DD');
        $this->TipoResa = new Testo(true, 3, 3, 1);
        $this->IndirizzoResa = new IndirizzoResa();
        $this->DataOraConsegna = new Data(true, 'YYYY-MM-DDTHH:MM:SS');
        if (!is_null($MezzoTrasporto)) {
            $this->setMezzoTrasporto($MezzoTrasporto);
        }
        if (!is_null($CausaleTrasporto)) {
            $this->setCausaleTrasporto($CausaleTrasporto);
        }
        if (!is_null($NumeroColli)) {
            $this->setNumeroColli($NumeroColli);
        }
        if (!is_null($Descrizione)) {
            $this->setDescrizione($Descrizione);
        }
        if (!is_null($UnitaMisuraPeso)) {
            $this->setUnitaMisuraPeso($UnitaMisuraPeso);
        }
        if (!is_null($PesoLordo)) {
            $this->setPesoLordo($PesoLordo);
        }
        if (!is_null($PesoNetto)) {
            $this->setPesoNetto($PesoNetto);
        }
        if (!is_null($DataOraRitiro)) {
            $this->setDataOraRitiro($DataOraRitiro);
        }
        if (!is_null($DataInizioTrasporto)) {
            $this->setDataInizioTrasporto($DataInizioTrasporto);
        }
        if (!is_null($TipoResa)) {
            $this->setTipoResa($TipoResa);
        }
        if (!is_null($DataOraConsegna)) {
            $this->setDataOraConsegna($DataOraConsegna);
        }
    }

    public function getDatiAnagraficiVettore(): DatiAnagraficiVettore
    {
        return $this->DatiAnagraficiVettore;
    }

    public function setDatiAnagraficiVettore(DatiAnagraficiVettore $DatiAnagraficiVettore)
    {
        $this->DatiAnagraficiVettore = $DatiAnagraficiVettore;

        return $this;
    }

    public function getMezzoTrasporto(): ?string
    {
        return $this->MezzoTrasporto->get();
    }

    public function setMezzoTrasporto(?string $value)
    {
        $this->MezzoTrasporto->set($value);

        return $this;
    }

    public function getCausaleTrasporto(): ?string
    {
        return $this->CausaleTrasporto->get();
    }

    public function setCausaleTrasporto(?string $value)
    {
        $this->CausaleTrasporto->set($value);

        return $this;
    }

    public function getNumeroColli(): ?int
    {
        return $this->NumeroColli;
    }

    public function setNumeroColli(?int $value)
    {
        $this->NumeroColli = $value;

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

    public function getUnitaMisuraPeso(): ?string
    {
        return $this->UnitaMisuraPeso->get();
    }

    public function setUnitaMisuraPeso(?string $value)
    {
        $this->UnitaMisuraPeso->set($value);

        return $this;
    }

    public function getPesoLordo(): ?float
    {
        return $this->PesoLordo->get();
    }

    public function setPesoLordo(?float $value)
    {
        $this->PesoLordo->set($value);

        return $this;
    }

    public function getPesoNetto(): ?float
    {
        return $this->PesoNetto->get();
    }

    public function setPesoNetto(?float $value)
    {
        $this->PesoNetto->set($value);

        return $this;
    }

    public function getDataOraRitiro(): ?string
    {
        return $this->DataOraRitiro->get();
    }

    public function setDataOraRitiro(string|Carbon|\DateTime|null $value)
    {
        $this->DataOraRitiro->set($value);

        return $this;
    }

    public function getDataInizioTrasporto(): ?string
    {
        return $this->DataInizioTrasporto->get();
    }

    public function setDataInizioTrasporto(string|Carbon|\DateTime|null $value)
    {
        $this->DataInizioTrasporto->set($value);

        return $this;
    }

    public function getTipoResa(): ?string
    {
        return $this->TipoResa->get();
    }

    public function setTipoResa(?string $value)
    {
        $this->TipoResa->set($value);

        return $this;
    }

    public function getIndirizzoResa(): IndirizzoResa
    {
        return $this->IndirizzoResa;
    }

    public function setIndirizzoResa(IndirizzoResa $IndirizzoResa)
    {
        $this->IndirizzoResa = $IndirizzoResa;

        return $this;
    }

    public function getDataOraConsegna(): ?string
    {
        return $this->DataOraConsegna->get();
    }

    public function setDataOraConsegna(string|Carbon|\DateTime|null $value)
    {
        $this->DataOraConsegna->set($value);

        return $this;
    }
}
