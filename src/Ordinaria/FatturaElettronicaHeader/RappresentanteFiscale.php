<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\RappresentanteFiscale\DatiAnagrafici;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 1.3
 *
 * @name RappresentanteFiscale
 *
 * Blocco da valorizzare nei casi in cui il cedente / prestatore si avvalga di un rappresentante fiscale in Italia.
 *
 * Blocco relativo ai dati del Rappresentante Fiscale
 */
class RappresentanteFiscale extends Elemento
{
    protected DatiAnagrafici $DatiAnagrafici;

    public function __construct()
    {
        parent::__construct(true);
        $this->DatiAnagrafici = new DatiAnagrafici();
    }

    public function getDatiAnagrafici(): DatiAnagrafici
    {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici)
    {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }
}
