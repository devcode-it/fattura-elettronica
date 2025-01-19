<?php

namespace DevCode\FatturaElettronica\Standard;

use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\UnserializeInterface;

/**
 * Classe per la gestione virtuale di elementi che possono essere presenti più volte in una stessa sezione.
 */
class Collezione implements \IteratorAggregate, FieldInterface, UnserializeInterface
{
    protected string $class;
    protected int $min;
    protected ?int $max;

    protected $values;

    public function __construct(string $class, int $min, ?int $max = null)
    {
        $this->class = $class;
        $this->min = $min;
        $this->max = $max;

        $this->values = [];
    }

    /**
     * Aggiunge un elemento alla collezione.
     */
    public function add($value): ?int
    {
        $len = strlen($value);
        if (!is_null($this->max) && count($this->values) + 1 > $this->max) {
            throw new \InvalidArgumentException("Too many elements added to collection of {$this->class} (min: {$this->min}, max: {$this->max})");
        }

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
            array_splice(
                $this->values,
                $index,
                1
            );
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

    public function set($value): void
    {
        // TODO: Implement set() method.
    }

    public function get()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return $this->values;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->values);
    }

    public function isEmpty(): bool
    {
        return empty($this->values);
    }

    public function isOptional(): bool
    {
        return $this->min == 0;
    }

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
