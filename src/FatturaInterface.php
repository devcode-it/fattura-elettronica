<?php

namespace DevCode\FatturaElettronica;

interface FatturaInterface
{
    /**
     * Restituisce l'XML della fattura elettronica.
     *
     * @throws \Exception
     */
    public function __toString(): string;

    /**
     * Restituisce il nome della fattura conforme all'SDI.
     */
    public function getFileName(): string;
}
