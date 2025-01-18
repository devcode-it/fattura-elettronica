<?php

namespace DevCode\FatturaElettronica\Standard;

use DevCode\FatturaElettronica\Interfaces\EmptyInterface;
use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\SerializeInterface;
use DevCode\FatturaElettronica\Interfaces\StringInterface;
use DevCode\FatturaElettronica\Interfaces\UnserializeInterface;

abstract class Elemento implements SerializeInterface, UnserializeInterface
{
    protected bool $optional;

    public function __construct(
        bool $optional = false,
    ) {
        $this->optional = $optional;
    }

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $class = get_class($this);
            throw new \InvalidArgumentException("Property {$name} does not exist in {$class}");
        }

        if (method_exists($this, 'get'.$name)) {
            return $this->{'get'.$name}();
        } elseif ($this->{$name} instanceof FieldInterface) {
            return $this->{$name}->get();
        }

        return $this->{$name};
    }

    public function __set($name, $value)
    {
        if (!property_exists($this, $name)) {
            $class = get_class($this);
            throw new \InvalidArgumentException("Property {$name} does not exist in {$class}");
        }

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

    public function isOptional(): bool
    {
        return $this->optional;
    }

    public function isEmpty(): bool
    {
        $vars = $this->getXmlTags();

        foreach ($vars as $key => $var) {
            if (is_scalar($var) && isset($var)) {
                return false;
            } else {
                if (!is_null($var) && $var instanceof Elemento) {
                    if (!$var->isEmpty()) {
                        return false;
                    }
                } elseif (!is_null($var) && $var instanceof EmptyInterface) {
                    if (!$var->isEmpty()) {
                        return false;
                    }
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
        }

        return true;
    }

    public function serialize(\XMLWriter $writer): void
    {
        $vars = $this->getXmlTags();

        foreach ($vars as $key => $var) {
            self::writeXml($writer, $key, $var);
        }
    }

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
            } elseif (!is_null($this->{$key}) && $this->{$key} instanceof UnserializeInterface) {
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
        $tags = get_object_vars($this);
        unset($tags['optional']);

        return $tags;
    }

    /**
     * Scrive un elemento composto.
     */
    protected static function writeXml(\XMLWriter $writer, $key, $element): void
    {
        if (!isset($element) || $key == 'optional') {
            return;
        }

        if (is_scalar($element)) {
            $writer->writeElement($key, $element);
        } elseif ($element instanceof StringInterface) {
            if (!$element->isEmpty() || !$element->isOptional()) {
                $writer->writeElement($key, $element);
            }
        } elseif ($element instanceof SerializeInterface) {
            if (!$element->isEmpty() || !$element->isOptional()) {
                $writer->startElement($key);
                $element->serialize($writer);
                $writer->endElement();
            }
        } elseif (is_iterable($element)) {
            if (!$element->isEmpty()) {
                foreach ($element as $i => $var) {
                    self::writeXml($writer, $key, $var);
                }
            } elseif (!$element->isOptional()) {
                $writer->startElement($key);
                $writer->endElement();
            }
        }
    }
}
