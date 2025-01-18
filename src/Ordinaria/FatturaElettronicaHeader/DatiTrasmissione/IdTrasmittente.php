<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 1.1.1
 *
 * @name IdTrasmittente
 *
 * E' l’identificativo univoco del soggetto trasmittente; per i soggetti residenti in Italia, siano essi persone fisiche o giuridiche, corrisponde al codice fiscale preceduto da IT; per i soggetti non residenti corrisponde al numero identificativo IVA (dove i primi due caratteri rappresentano il paese secondo lo standard ISO 3166-1 alpha-2 code, ed i restanti, fino ad un massimo di 28, il codice vero e proprio)
 */
class IdTrasmittente extends Elemento
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
