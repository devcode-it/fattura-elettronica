<?php

namespace Dasc3er\FatturaElettronica\Interfaces;

interface UnserializeInterface extends EmptyInterface
{
    /**
     * Gestisce la de-serializzazione dell'elemento da XML.
     */
    public function unserialize(array $content): void;
}
