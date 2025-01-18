<?php

namespace DevCode\FatturaElettronica\Semplificata;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\DatiTrasmissione;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Il blocco ha molteplicit� pari a 1, sia nel caso di fattura singola che nel caso di lotto di fatture
*/
class FatturaElettronicaHeader extends Elemento
{
    protected DatiTrasmissione $DatiTrasmissione;
    protected CedentePrestatore $CedentePrestatore;
    protected CessionarioCommittente $CessionarioCommittente;
    protected Testo $SoggettoEmittente;

    public function __construct(?string $SoggettoEmittente = null)
    {
        parent::__construct(false);
        $this->DatiTrasmissione = new DatiTrasmissione();
        $this->CedentePrestatore = new CedentePrestatore();
        $this->CessionarioCommittente = new CessionarioCommittente();
        $this->SoggettoEmittente = new Testo(true, 2, 2, 1);
        if (!is_null($SoggettoEmittente)) {
            $this->setSoggettoEmittente($SoggettoEmittente);
        }
    }

    public function getDatiTrasmissione(): DatiTrasmissione
    {
        return $this->DatiTrasmissione;
    }

    public function setDatiTrasmissione(DatiTrasmissione $DatiTrasmissione)
    {
        $this->DatiTrasmissione = $DatiTrasmissione;

        return $this;
    }

    public function getCedentePrestatore(): CedentePrestatore
    {
        return $this->CedentePrestatore;
    }

    public function setCedentePrestatore(CedentePrestatore $CedentePrestatore)
    {
        $this->CedentePrestatore = $CedentePrestatore;

        return $this;
    }

    public function getCessionarioCommittente(): CessionarioCommittente
    {
        return $this->CessionarioCommittente;
    }

    public function setCessionarioCommittente(CessionarioCommittente $CessionarioCommittente)
    {
        $this->CessionarioCommittente = $CessionarioCommittente;

        return $this;
    }

    public function getSoggettoEmittente(): ?string
    {
        return $this->SoggettoEmittente->get();
    }

    public function setSoggettoEmittente(?string $value)
    {
        $this->SoggettoEmittente->set($value);

        return $this;
    }
}
