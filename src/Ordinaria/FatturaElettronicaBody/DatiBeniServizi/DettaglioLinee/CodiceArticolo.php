<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.2.1.3
 *
 * @name CodiceArticolo
 *
 * Eventuale codifica dell'articolo (la molteplicità N del blocco consente di gestire la presenza di più codifiche per la medesima riga)
 */
class CodiceArticolo extends Elemento
{
    protected Testo $CodiceTipo;
    protected Testo $CodiceValore;

    public function __construct()
    {
        parent::__construct(true);
        $this->CodiceTipo = new Testo(false, 1, 35, 1, "(\p{IsBasicLatin}{1,35})");
        $this->CodiceValore = new Testo(false, 1, 35, 1, null);
    }

    public function getCodiceTipo(): ?string
    {
        return $this->CodiceTipo->get();
    }

    public function setCodiceTipo(?string $value)
    {
        $this->CodiceTipo->set($value);

        return $this;
    }

    public function getCodiceValore(): ?string
    {
        return $this->CodiceValore->get();
    }

    public function setCodiceValore(?string $value)
    {
        $this->CodiceValore->set($value);

        return $this;
    }
}
