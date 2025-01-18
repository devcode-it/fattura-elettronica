<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\RappresentanteFiscale;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 1.2.8.1
 *
 * @name IdFiscaleIVA
 *
 * Numero di identificazione fiscale ai fini IVA; i primi due caratteri rappresentano il paese ( IT, DE, ES
 * ..) ed i restanti (fino ad un massimo di 28) il codice vero e proprio che, per i residenti in Italia, corrisponde al numero di partita IVA.
 */
class IdFiscaleIVA extends Elemento
{
    protected Testo $IdPaese;
    protected Testo $IdCodice;

    public function __construct()
    {
        parent::__construct(false);
        $this->IdPaese = new Testo(false, 2, 2, 1);
        $this->IdCodice = new Testo(false, 1, 28, 1);
    }

    public function getIdPaese(): ?string
    {
        return $this->IdPaese->get();
    }

    public function setIdPaese(?string $value)
    {
        $this->IdPaese->set($value);

        return $this;
    }

    public function getIdCodice(): ?string
    {
        return $this->IdCodice->get();
    }

    public function setIdCodice(?string $value)
    {
        $this->IdCodice->set($value);

        return $this;
    }
}
