<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\Interfaces\FieldInterface;
use Dasc3er\FatturaElettronica\Interfaces\SerializeInterface;
use Dasc3er\FatturaElettronica\Interfaces\StringInterface;
use Dasc3er\FatturaElettronica\Interfaces\UnserializeInterface;

abstract class ElementoFattura implements SerializeInterface, UnserializeInterface
{
    public function __construct()
    {
    }

    public function __get($name)
    {
        if (method_exists($this, 'get'.$name)) {
            return $this->{'get'.$name}();
        } elseif ($this->{$name} instanceof FieldInterface) {
            return $this->{$name}->get();
        }

        return $this->{$name};
    }

    public function __set($name, $value)
    {
        if (method_exists($this, 'set'.$name)) {
            $this->{'set'.$name}($value);
        } elseif ($this->{$name} instanceof FieldInterface) {
            $this->{$name}->set($value);
        } else {
            $this->{$name} = $value;
        }

        return;
    }

    public function __toString(): string
    {
        $writer = new \XMLWriter();

        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->setIndent(8);

        $this->serialize($writer);

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
    public function serialize(\XMLWriter $writer): void
    {
        $vars = $this->getXmlTags();

        foreach ($vars as $key => $var) {
            self::writeXml($writer, $key, $var);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize(array $content): void
    {
        foreach ($content as $key => $var) {
            if ($key == '@attributes') {
                continue;
            }

            if (is_scalar($var)) {
                if (isset($this->{$key}) && $this->{$key} instanceof FieldInterface) {
                    $this->{$key}->set($var);
                } else {
                    $this->{$key} = $var;
                }
            } elseif (isset($this->{$key}) && $this->{$key} instanceof UnserializeInterface) {
                $this->{$key}->unserialize($var);
            } elseif (is_iterable($var)) {
                foreach ($var as $i => $element) {
                    $this->{$key}[] = $var;
                }
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
        } elseif ($element instanceof SerializeInterface) {
            if (!$element->isEmpty()) {
                $writer->startElement($key);
                $element->serialize($writer);
                $writer->endElement();
            }
        } elseif (is_iterable($element)) {
            foreach ($element as $i => $var) {
                self::writeXml($writer, $key, $var);
            }
        }
    }
}
