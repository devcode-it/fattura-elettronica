<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiBollo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiCassaPrevidenziale;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiRitenuta;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\ScontoMaggiorazione;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente i dati generali della fattura
*/
class DatiGeneraliDocumento extends Elemento
{
    protected Testo $TipoDocumento;
    protected Testo $Divisa;
    protected Data $Data;
    protected Testo $Numero;
    protected Collezione $DatiRitenuta;
    protected DatiBollo $DatiBollo;
    protected Collezione $DatiCassaPrevidenziale;
    protected Collezione $ScontoMaggiorazione;
    protected Decimale $ImportoTotaleDocumento;
    protected Decimale $Arrotondamento;
    protected Testo $Causale;
    protected Testo $Art73;

    public function __construct(?string $TipoDocumento = null, ?string $Divisa = null, string|Carbon|\DateTime|null $Data = null, ?string $Numero = null, ?float $ImportoTotaleDocumento = null, ?float $Arrotondamento = null, ?string $Causale = null, ?string $Art73 = null)
    {
        parent::__construct(false);
        $this->TipoDocumento = new Testo(false, 4, 4, 1);
        $this->Divisa = new Testo(false, 3, 3, 1);
        $this->Data = new Data(false, 'YYYY-MM-DD');
        $this->Numero = new Testo(false, 1, 20, 1);
        $this->DatiRitenuta = new Collezione(DatiRitenuta::class, 0);
        $this->DatiBollo = new DatiBollo();
        $this->DatiCassaPrevidenziale = new Collezione(DatiCassaPrevidenziale::class, 0);
        $this->ScontoMaggiorazione = new Collezione(ScontoMaggiorazione::class, 0);
        $this->ImportoTotaleDocumento = new Decimale(true);
        $this->Arrotondamento = new Decimale(true);
        $this->Causale = new Testo(true, 1, 200);
        $this->Art73 = new Testo(true, 2, 2, 1);
        if (!is_null($TipoDocumento)) {
            $this->setTipoDocumento($TipoDocumento);
        }
        if (!is_null($Divisa)) {
            $this->setDivisa($Divisa);
        }
        if (!is_null($Data)) {
            $this->setData($Data);
        }
        if (!is_null($Numero)) {
            $this->setNumero($Numero);
        }
        if (!is_null($ImportoTotaleDocumento)) {
            $this->setImportoTotaleDocumento($ImportoTotaleDocumento);
        }
        if (!is_null($Arrotondamento)) {
            $this->setArrotondamento($Arrotondamento);
        }
        if (!is_null($Causale)) {
            $this->setCausale($Causale);
        }
        if (!is_null($Art73)) {
            $this->setArt73($Art73);
        }
    }

    public function getTipoDocumento(): ?string
    {
        return $this->TipoDocumento->get();
    }

    public function setTipoDocumento(?string $value)
    {
        $this->TipoDocumento->set($value);

        return $this;
    }

    public function getDivisa(): ?string
    {
        return $this->Divisa->get();
    }

    public function setDivisa(?string $value)
    {
        $this->Divisa->set($value);

        return $this;
    }

    public function getData(): ?string
    {
        return $this->Data->get();
    }

    public function setData(string|Carbon|\DateTime|null $value)
    {
        $this->Data->set($value);

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->Numero->get();
    }

    public function setNumero(?string $value)
    {
        $this->Numero->set($value);

        return $this;
    }

    public function getDatiRitenuta(): Collezione
    {
        return $this->DatiRitenuta;
    }

    public function getAllDatiRitenuta(): array
    {
        return $this->DatiRitenuta->toList();
    }

    public function addDatiRitenuta(DatiRitenuta $elemento)
    {
        $this->DatiRitenuta->add($elemento);

        return $this;
    }

    public function removeDatiRitenuta(int $index)
    {
        $this->DatiRitenuta->remove($index);

        return $this;
    }

    public function getDatiBollo(): DatiBollo
    {
        return $this->DatiBollo;
    }

    public function setDatiBollo(DatiBollo $DatiBollo)
    {
        $this->DatiBollo = $DatiBollo;

        return $this;
    }

    public function getDatiCassaPrevidenziale(): Collezione
    {
        return $this->DatiCassaPrevidenziale;
    }

    public function getAllDatiCassaPrevidenziale(): array
    {
        return $this->DatiCassaPrevidenziale->toList();
    }

    public function addDatiCassaPrevidenziale(DatiCassaPrevidenziale $elemento)
    {
        $this->DatiCassaPrevidenziale->add($elemento);

        return $this;
    }

    public function removeDatiCassaPrevidenziale(int $index)
    {
        $this->DatiCassaPrevidenziale->remove($index);

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

    public function getImportoTotaleDocumento(): ?float
    {
        return $this->ImportoTotaleDocumento->get();
    }

    public function setImportoTotaleDocumento(?float $value)
    {
        $this->ImportoTotaleDocumento->set($value);

        return $this;
    }

    public function getArrotondamento(): ?float
    {
        return $this->Arrotondamento->get();
    }

    public function setArrotondamento(?float $value)
    {
        $this->Arrotondamento->set($value);

        return $this;
    }

    public function getCausale(): ?string
    {
        return $this->Causale->get();
    }

    public function setCausale(?string $value)
    {
        $this->Causale->set($value);

        return $this;
    }

    public function getArt73(): ?string
    {
        return $this->Art73->get();
    }

    public function setArt73(?string $value)
    {
        $this->Art73->set($value);

        return $this;
    }
}
