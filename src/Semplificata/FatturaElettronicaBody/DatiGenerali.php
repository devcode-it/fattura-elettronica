<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiFatturaRettificata;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 2.1
 *
 * @name DatiGenerali
 *
 * Blocco sempre obbligatorio contenente i dati generali della fattura e quelli degli eventuali documenti correlati
 *
 * Blocco relativo ai Dati Generali della Fattura Elettronica
 */
class DatiGenerali extends Elemento
{
    protected DatiGeneraliDocumento $DatiGeneraliDocumento;
    protected DatiFatturaRettificata $DatiFatturaRettificata;

    public function __construct()
    {
        parent::__construct(false);
        $this->DatiGeneraliDocumento = new DatiGeneraliDocumento();
        $this->DatiFatturaRettificata = new DatiFatturaRettificata();
    }

    public function getDatiGeneraliDocumento(): DatiGeneraliDocumento
    {
        return $this->DatiGeneraliDocumento;
    }

    public function setDatiGeneraliDocumento(DatiGeneraliDocumento $DatiGeneraliDocumento)
    {
        $this->DatiGeneraliDocumento = $DatiGeneraliDocumento;

        return $this;
    }

    public function getDatiFatturaRettificata(): DatiFatturaRettificata
    {
        return $this->DatiFatturaRettificata;
    }

    public function setDatiFatturaRettificata(DatiFatturaRettificata $DatiFatturaRettificata)
    {
        $this->DatiFatturaRettificata = $DatiFatturaRettificata;

        return $this;
    }
}
