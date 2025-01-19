<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA\SocioUnico;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA\StatoLiquidazione;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 1.2.9
 *
 * @name IscrizioneREA
 *
 * Blocco da valorizzare nei casi di società iscritte nel registro delle imprese ai sensi dell'art. 2250 del codice civile.
 */
class IscrizioneREA extends Elemento
{
    protected Testo $Ufficio;
    protected Testo $NumeroREA;
    protected Decimale $CapitaleSociale;
    protected TestoEnum $SocioUnico;
    protected TestoEnum $StatoLiquidazione;

    public function __construct()
    {
        parent::__construct(true);
        $this->Ufficio = new Testo(false, 2, 2, 1, '[A-Z]{2}');
        $this->NumeroREA = new Testo(false, 1, 20, 1, "(\p{IsBasicLatin}{1,20})");
        $this->CapitaleSociale = new Decimale(true, 2, 2, 2);
        $this->SocioUnico = new TestoEnum(true, SocioUnico::class);
        $this->StatoLiquidazione = new TestoEnum(false, StatoLiquidazione::class);
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

    public function setSocioUnico(SocioUnico|string|null $value)
    {
        $this->SocioUnico->set($value);

        return $this;
    }

    public function getStatoLiquidazione(): ?string
    {
        return $this->StatoLiquidazione->get();
    }

    public function setStatoLiquidazione(StatoLiquidazione|string $value)
    {
        $this->StatoLiquidazione->set($value);

        return $this;
    }
}
