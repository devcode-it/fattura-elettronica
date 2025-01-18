<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto\DatiAnagraficiVettore\Anagrafica;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto\DatiAnagraficiVettore\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente i dati fiscali e anagrafici del vettore
*/
class DatiAnagraficiVettore extends Elemento
{
    protected IdFiscaleIVA $IdFiscaleIVA;
    protected Testo $CodiceFiscale;
    protected Anagrafica $Anagrafica;
    protected Testo $NumeroLicenzaGuida;

    public function __construct(?string $CodiceFiscale = null, ?string $NumeroLicenzaGuida = null)
    {
        parent::__construct(true);
        $this->IdFiscaleIVA = new IdFiscaleIVA();
        $this->CodiceFiscale = new Testo(true, 11, 16, 1);
        $this->Anagrafica = new Anagrafica();
        $this->NumeroLicenzaGuida = new Testo(true, 1, 20, 1);
        if (!is_null($CodiceFiscale)) {
            $this->setCodiceFiscale($CodiceFiscale);
        }
        if (!is_null($NumeroLicenzaGuida)) {
            $this->setNumeroLicenzaGuida($NumeroLicenzaGuida);
        }
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

    public function getNumeroLicenzaGuida(): ?string
    {
        return $this->NumeroLicenzaGuida->get();
    }

    public function setNumeroLicenzaGuida(?string $value)
    {
        $this->NumeroLicenzaGuida->set($value);

        return $this;
    }
}
