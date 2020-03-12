<?php

namespace Dasc3er\FatturaElettronica\Interfaces;

interface SerializableInterface extends EmptyInterface
{
    /**
     * Gestisce la serializzazione dell'elemento in XML.
     */
    public function toXml(\XMLWriter $writer): void;
}
