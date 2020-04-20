<?php

namespace DevCode\FatturaElettronica\Fields;

use ArrayIterator;
use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\UnserializeInterface;
use IteratorAggregate;

/**
 * Classe per la gestione virtuale di elementi che possono essere presenti più volte in una stessa sezione.
 */
class Collection implements IteratorAggregate, FieldInterface, UnserializeInterface
{
    protected $values;
    protected string $class;

    public function __construct(string $class)
    {
        $this->class = $class;

        $this->values = [];
    }

    /**
     * Aggiunge un elemento alla collezione.
     *
     * @param $value
     */
    public function add($value): ?int
    {
        if ($value instanceof $this->class) {
            $this->values[] = $value;

            return array_key_last($this->values);
        }

        return null;
    }

    /**
     * Rimuove l'elemento di indice indicato dalla collezione.
     */
    public function remove(int $index): void
    {
        if (isset($this->values[$index])) {
            unset($this->values[$index]);
        }
    }

    /**
     * Restituisce l'elemento di indice indicato dalla collezione.
     */
    public function getElement(int $index)
    {
        if (isset($this->values[$index])) {
            return $this->values[$index];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function set($value): void
    {
        // TODO: Implement set() method.
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return $this->values;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->values);
    }

    public function isEmpty(): bool
    {
        return empty($this->values);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize(array $content): void
    {
        if (!isset($content[0])) {
            $content = [$content];
        }

        $class = $this->class;
        foreach ($content as $i => $var) {
            $element = new $class();
            $element->unserialize($var);

            $this->add($element);
        }
    }
}
