<?php

namespace Dasc3er\FatturaElettronica\XML;

use Dasc3er\FatturaElettronica\Interfaces\SerializableInterface;
use Dasc3er\FatturaElettronica\Interfaces\StringInterface;

trait SerializableTrait
{
    /**
     * Restituisce l'elemento sotto formato stringa.
     */
    public function __toString(): string
    {
        $writer = new \XMLWriter();

        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->setIndent(4);

        $this->toXml($writer);

        return $writer->outputMemory(true);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty(): bool
    {
        $vars = $this->getXmlTags();

        foreach ($vars as $var) {
            if (is_scalar($var) && isset($var)) {
                return false;
            } else {
                if (is_iterable($var)) {
                    $elements = $var;
                } else {
                    $elements = [$var];
                }

                foreach ($elements as $element) {
                    if (!isset($element)) {
                        continue;
                    }

                    if (is_scalar($element)) {
                        return false;
                    } elseif (!$element->isEmpty()) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function toXml(\XMLWriter $writer): void
    {
        $vars = $this->getXmlTags();

        foreach ($vars as $key => $var) {
            self::writeXml($writer, $key, $var);
        }
    }

    /**
     * Scrive un elemento composto.
     *
     * @param $key
     * @param $element
     */
    protected static function writeXml(\XMLWriter $writer, $key, $element): void
    {
        if (!isset($element)) {
            return;
        }

        if (is_scalar($element)) {
            $writer->writeElement($key, $element);
        } elseif ($element instanceof StringInterface) {
            if (!$element->isEmpty()) {
                $writer->writeElement($key, $element);
            }
        } elseif ($element instanceof SerializableInterface) {
            if (!$element->isEmpty()) {
                $writer->startElement($key);
                $element->toXml($writer);
                $writer->endElement();
            }
        } elseif (is_iterable($element)) {
            foreach ($element as $i => $var) {
                self::writeXml($writer, $key, $var);
            }
        }
    }

    /**
     * Restituisce gli elementi da inserire nell'XML.
     */
    protected function getXmlTags(): iterable
    {
        return get_object_vars($this);
    }
}
