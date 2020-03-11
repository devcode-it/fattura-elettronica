<?php

namespace Dasc3er\FatturaElettronica\XML;

interface StringInterface extends EmptyInterface
{
    /**
     * Restituisce l'elemento sotto formato stringa.
     */
    public function __toString(): string;
}
