<?php

namespace DevCode\FatturaElettronica\Interfaces;

interface StringInterface extends EmptyInterface
{
    /**
     * Restituisce l'elemento sotto formato stringa.
     */
    public function __toString(): string;
}
