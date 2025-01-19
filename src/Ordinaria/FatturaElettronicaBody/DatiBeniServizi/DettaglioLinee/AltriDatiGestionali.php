<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.2.1.16
 *
 * @name AltriDatiGestionali
 *
 * Blocco che consente di agli utenti di inserire, con riferimento ad una linea di dettaglio, informazioni utili ai fini amministrativi, gestionali etc.
 */
class AltriDatiGestionali extends Elemento
{
    protected Testo $TipoDato;
    protected Testo $RiferimentoTesto;
    protected Decimale $RiferimentoNumero;
    protected Data $RiferimentoData;

    public function __construct()
    {
        parent::__construct(true);
        $this->TipoDato = new Testo(false, 1, 10, 1);
        $this->RiferimentoTesto = new Testo(true, 1, 60, 1);
        $this->RiferimentoNumero = new Decimale(true, 2, 2, 8);
        $this->RiferimentoData = new Data(true, 'Y-m-d');
    }

    public function getTipoDato(): ?string
    {
        return $this->TipoDato->get();
    }

    public function setTipoDato(?string $value)
    {
        $this->TipoDato->set($value);

        return $this;
    }

    public function getRiferimentoTesto(): ?string
    {
        return $this->RiferimentoTesto->get();
    }

    public function setRiferimentoTesto(?string $value)
    {
        $this->RiferimentoTesto->set($value);

        return $this;
    }

    public function getRiferimentoNumero(): ?float
    {
        return $this->RiferimentoNumero->get();
    }

    public function setRiferimentoNumero(?float $value)
    {
        $this->RiferimentoNumero->set($value);

        return $this;
    }

    public function getRiferimentoData(): ?string
    {
        return $this->RiferimentoData->get();
    }

    public function setRiferimentoData(string|Carbon|\DateTime|null $value)
    {
        $this->RiferimentoData->set($value);

        return $this;
    }
}
