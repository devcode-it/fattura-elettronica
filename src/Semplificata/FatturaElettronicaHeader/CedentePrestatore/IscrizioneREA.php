<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco da valorizzare nei casi di società iscritte nel registro delle imprese ai sensi dell'art. 2250 del codice civile.
*/
class IscrizioneREA extends Elemento
{
    protected Testo $Ufficio;
    protected Testo $NumeroREA;
    protected Decimale $CapitaleSociale;
    protected Testo $SocioUnico;
    protected Testo $StatoLiquidazione;

    public function __construct(?string $Ufficio = null, ?string $NumeroREA = null, ?float $CapitaleSociale = null, ?string $SocioUnico = null, ?string $StatoLiquidazione = null)
    {
        parent::__construct(true);
        $this->Ufficio = new Testo(false, 2, 2, 1);
        $this->NumeroREA = new Testo(false, 1, 20, 1);
        $this->CapitaleSociale = new Decimale(true);
        $this->SocioUnico = new Testo(true, 2, 2, 1);
        $this->StatoLiquidazione = new Testo(false, 2, 2, 1);
        if (!is_null($Ufficio)) {
            $this->setUfficio($Ufficio);
        }
        if (!is_null($NumeroREA)) {
            $this->setNumeroREA($NumeroREA);
        }
        if (!is_null($CapitaleSociale)) {
            $this->setCapitaleSociale($CapitaleSociale);
        }
        if (!is_null($SocioUnico)) {
            $this->setSocioUnico($SocioUnico);
        }
        if (!is_null($StatoLiquidazione)) {
            $this->setStatoLiquidazione($StatoLiquidazione);
        }
    }

    public function getUfficio(): ?string
    {
        return $this->Ufficio->get();
    }

    public function setUfficio(?string $value)
    {
        $this->Ufficio->set($value);

        return $this;
    }

    public function getNumeroREA(): ?string
    {
        return $this->NumeroREA->get();
    }

    public function setNumeroREA(?string $value)
    {
        $this->NumeroREA->set($value);

        return $this;
    }

    public function getCapitaleSociale(): ?float
    {
        return $this->CapitaleSociale->get();
    }

    public function setCapitaleSociale(?float $value)
    {
        $this->CapitaleSociale->set($value);

        return $this;
    }

    public function getSocioUnico(): ?string
    {
        return $this->SocioUnico->get();
    }

    public function setSocioUnico(?string $value)
    {
        $this->SocioUnico->set($value);

        return $this;
    }

    public function getStatoLiquidazione(): ?string
    {
        return $this->StatoLiquidazione->get();
    }

    public function setStatoLiquidazione(?string $value)
    {
        $this->StatoLiquidazione->set($value);

        return $this;
    }
}
