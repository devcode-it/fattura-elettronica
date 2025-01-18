<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente\DatiAnagrafici;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 1.5
 *
 * @name TerzoIntermediarioOSoggettoEmittente
 *
 * Dati relativi al soggetto terzo che emette fattura per conto del cedente / prestatore
 *
 * Blocco relativo ai dati del Terzo Intermediario che emette fattura elettronica per conto del Cedente/Prestatore
 */
class TerzoIntermediarioOSoggettoEmittente extends Elemento
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
