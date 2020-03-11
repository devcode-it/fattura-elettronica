<?php

namespace Dasc3er\FatturaElettronica\XML;

interface SerializableInterface extends EmptyInterface
{
    /**
     * Gestisce la serializzazione dell'elemento in XML.
     */
    public function toXmlBlock(\XMLWriter $writer): void;
}
