<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Intero;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.1.2
 *
 * @name DatiOrdineAcquisto
 *
 * Blocco contenente le informazioni relative all'ordine di acquisto
 */
class DatiOrdineAcquisto extends Elemento
{
    protected Intero $RiferimentoNumeroLinea;
    protected Testo $IdDocumento;
    protected Data $Data;
    protected Testo $NumItem;
    protected Testo $CodiceCommessaConvenzione;
    protected Testo $CodiceCUP;
    protected Testo $CodiceCIG;

    public function __construct()
    {
        parent::__construct(true);
        $this->RiferimentoNumeroLinea = new Intero(true, 1, 9999);
        $this->IdDocumento = new Testo(false, 1, 20, 1);
        $this->Data = new Data(true, 'YYYY-MM-DD');
        $this->NumItem = new Testo(true, 1, 20, 1);
        $this->CodiceCommessaConvenzione = new Testo(true, 1, 100, 1);
        $this->CodiceCUP = new Testo(true, 1, 15, 1);
        $this->CodiceCIG = new Testo(true, 1, 15, 1);
    }

    public function getRiferimentoNumeroLinea(): ?int
    {
        return $this->RiferimentoNumeroLinea->get();
    }

    public function setRiferimentoNumeroLinea(?int $value)
    {
        $this->RiferimentoNumeroLinea->set($value);

        return $this;
    }

    public function getIdDocumento(): ?string
    {
        return $this->IdDocumento->get();
    }

    public function setIdDocumento(?string $value)
    {
        $this->IdDocumento->set($value);

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

    public function getNumItem(): ?string
    {
        return $this->NumItem->get();
    }

    public function setNumItem(?string $value)
    {
        $this->NumItem->set($value);

        return $this;
    }

    public function getCodiceCommessaConvenzione(): ?string
    {
        return $this->CodiceCommessaConvenzione->get();
    }

    public function setCodiceCommessaConvenzione(?string $value)
    {
        $this->CodiceCommessaConvenzione->set($value);

        return $this;
    }

    public function getCodiceCUP(): ?string
    {
        return $this->CodiceCUP->get();
    }

    public function setCodiceCUP(?string $value)
    {
        $this->CodiceCUP->set($value);

        return $this;
    }

    public function getCodiceCIG(): ?string
    {
        return $this->CodiceCIG->get();
    }

    public function setCodiceCIG(?string $value)
    {
        $this->CodiceCIG->set($value);

        return $this;
    }
}
