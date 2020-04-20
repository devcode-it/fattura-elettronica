<?php

namespace DevCode\FatturaElettronica\Interfaces;

interface SerializeInterface extends EmptyInterface
{
    /**
     * Gestisce la serializzazione dell'elemento in XML.
     */
    public function serialize(\XMLWriter $writer): void;
}
