<?php

namespace DevCode\FatturaElettronica\Standard;

use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\StringInterface;

/**
 * Classe per la gestione della formattazione automatica dei campi decimali.
 */
class Intero implements FieldInterface, StringInterface
{
    protected bool $optional;
    protected ?int $min;
    protected ?int $max;
    protected ?int $value;

    public function __construct(
        bool $optional,
        ?int $min = null,
        ?int $max = null,
        ?int $value = null,
    ) {
        $this->optional = $optional;
        $this->min = $min;
        $this->max = $max;

        $this->value = null;
        if (!is_null($value)) {
            $this->set($value);
        } elseif (!$optional) {
            $this->set($min);
        }
    }

    public function __toString(): string
    {
        return number_format($this->value, 0, '.', '');
    }

    public function set($value): void
    {
        if (!is_int($value) && is_numeric($value)) {
            $value = intval($value);
        }

        $min = $this->min;
        $max = $this->max;
        if (is_int($value)) {
            if (isset($min) && $value < $min) {
                throw new \InvalidArgumentException("Value lower than minimum allowed ($min)");
            }
            if (isset($max) && $value > $max) {
                throw new \InvalidArgumentException("Value exceeds maximum allowed ($max)");
            }

            $this->value = $value;

            return;
        }

        throw new \InvalidArgumentException('Value not allowed');
    }

    public function get(): ?int
    {
        return $this->value;
    }

    public function isEmpty(): bool
    {
        return !isset($this->value);
    }

    public function isOptional(): bool
    {
        return $this->optional;
    }
}
