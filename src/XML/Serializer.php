<?php

namespace Dasc3er\FatturaElettronica\XML;

class Serializer
{
    public static function serialize(SerializableInterface $element): string
    {
        $writer = new \XMLWriter();

        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->setIndent(4);

        $element->toXmlBlock($writer);

        return $writer->outputMemory(true);
    }
}
