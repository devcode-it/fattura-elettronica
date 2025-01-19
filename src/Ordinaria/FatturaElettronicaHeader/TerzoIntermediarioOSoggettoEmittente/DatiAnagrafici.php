<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente\DatiAnagrafici\Anagrafica;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente\DatiAnagrafici\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 1.5.1
 *
 * @name DatiAnagrafici
 *
 * Blocco contenente i dati fiscali e anagrafici del terzo intermediario
 */
class DatiAnagrafici extends Elemento
{
    protected IdFiscaleIVA $IdFiscaleIVA;
    protected Testo $CodiceFiscale;
    protected Anagrafica $Anagrafica;

    public function __construct()
    {
        parent::__construct(false);
        $this->IdFiscaleIVA = new IdFiscaleIVA();
        $this->CodiceFiscale = new Testo(true, 11, 16, 1, '[A-Z0-9]{11,16}');
        $this->Anagrafica = new Anagrafica();
    }

    public function getIdFiscaleIVA(): IdFiscaleIVA
    {
        return $this->IdFiscaleIVA;
    }

    public function setIdFiscaleIVA(IdFiscaleIVA $IdFiscaleIVA)
    {
        $this->IdFiscaleIVA = $IdFiscaleIVA;

        return $this;
    }

    public function getCodiceFiscale(): ?string
    {
        return $this->CodiceFiscale->get();
    }

    public function setCodiceFiscale(?string $value)
    {
        $this->CodiceFiscale->set($value);

        return $this;
    }

    public function getAnagrafica(): Anagrafica
    {
        return $this->Anagrafica;
    }

    public function setAnagrafica(Anagrafica $Anagrafica)
    {
        $this->Anagrafica = $Anagrafica;

        return $this;
    }
}
