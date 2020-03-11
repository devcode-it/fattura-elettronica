<?php

namespace Dasc3er\FatturaElettronica;

interface FatturaInterface
{
    /**
     * Restituisce il nome della fattura conforme all'SDI.
     */
    public function getFileName(): string;

    /**
     * Restituisce l'XML della fattura elettronica.
     *
     * @throws \Exception
     */
    public function toXml(): string;
}
