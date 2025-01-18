<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici\Anagrafica;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente i dati fiscali, anagrafici e professionali del cedente / prestatore
*/
class DatiAnagrafici extends Elemento
{
    protected IdFiscaleIVA $IdFiscaleIVA;
    protected Testo $CodiceFiscale;
    protected Anagrafica $Anagrafica;
    protected Testo $AlboProfessionale;
    protected Testo $ProvinciaAlbo;
    protected Testo $NumeroIscrizioneAlbo;
    protected Data $DataIscrizioneAlbo;
    protected Testo $RegimeFiscale;

    public function __construct(?string $CodiceFiscale = null, ?string $AlboProfessionale = null, ?string $ProvinciaAlbo = null, ?string $NumeroIscrizioneAlbo = null, string|Carbon|\DateTime|null $DataIscrizioneAlbo = null, ?string $RegimeFiscale = null)
    {
        parent::__construct(false);
        $this->IdFiscaleIVA = new IdFiscaleIVA();
        $this->CodiceFiscale = new Testo(true, 11, 16, 1);
        $this->Anagrafica = new Anagrafica();
        $this->AlboProfessionale = new Testo(true, 1, 60, 1);
        $this->ProvinciaAlbo = new Testo(true, 2, 2, 1);
        $this->NumeroIscrizioneAlbo = new Testo(true, 1, 60, 1);
        $this->DataIscrizioneAlbo = new Data(true, 'YYYY-MM-DD');
        $this->RegimeFiscale = new Testo(false, 4, 4, 1);
        if (!is_null($CodiceFiscale)) {
            $this->setCodiceFiscale($CodiceFiscale);
        }
        if (!is_null($AlboProfessionale)) {
            $this->setAlboProfessionale($AlboProfessionale);
        }
        if (!is_null($ProvinciaAlbo)) {
            $this->setProvinciaAlbo($ProvinciaAlbo);
        }
        if (!is_null($NumeroIscrizioneAlbo)) {
            $this->setNumeroIscrizioneAlbo($NumeroIscrizioneAlbo);
        }
        if (!is_null($DataIscrizioneAlbo)) {
            $this->setDataIscrizioneAlbo($DataIscrizioneAlbo);
        }
        if (!is_null($RegimeFiscale)) {
            $this->setRegimeFiscale($RegimeFiscale);
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

    public function getAlboProfessionale(): ?string
    {
        return $this->AlboProfessionale->get();
    }

    public function setAlboProfessionale(?string $value)
    {
        $this->AlboProfessionale->set($value);

        return $this;
    }

    public function getProvinciaAlbo(): ?string
    {
        return $this->ProvinciaAlbo->get();
    }

    public function setProvinciaAlbo(?string $value)
    {
        $this->ProvinciaAlbo->set($value);

        return $this;
    }

    public function getNumeroIscrizioneAlbo(): ?string
    {
        return $this->NumeroIscrizioneAlbo->get();
    }

    public function setNumeroIscrizioneAlbo(?string $value)
    {
        $this->NumeroIscrizioneAlbo->set($value);

        return $this;
    }

    public function getDataIscrizioneAlbo(): ?string
    {
        return $this->DataIscrizioneAlbo->get();
    }

    public function setDataIscrizioneAlbo(string|Carbon|\DateTime|null $value)
    {
        $this->DataIscrizioneAlbo->set($value);

        return $this;
    }

    public function getRegimeFiscale(): ?string
    {
        return $this->RegimeFiscale->get();
    }

    public function setRegimeFiscale(?string $value)
    {
        $this->RegimeFiscale->set($value);

        return $this;
    }
}
