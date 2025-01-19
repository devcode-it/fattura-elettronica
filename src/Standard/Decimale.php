<?php

namespace DevCode\FatturaElettronica\Standard;

use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\StringInterface;

/**
 * Classe per la gestione della formattazione automatica dei campi decimali.
 */
class Decimale implements FieldInterface, StringInterface
{
    protected bool $optional;
    protected int $decimals;
    protected int $min_decimals;
    protected int $max_decimals;
    protected ?float $value;

    public function __construct(
        bool $optional,
        int $decimals = 2,
        int $min_decimals = 2,
        int $max_decimals = 2,
        $value = null,
    ) {
        $this->optional = $optional;
        $this->decimals = $decimals;
        $this->min_decimals = $min_decimals ?? $decimals;
        $this->max_decimals = $max_decimals ?? $decimals;
        $this->value = null;
        if (!is_null($value)) {
            $this->set($value);
        }
    }

    public function __toString(): string
    {
        return number_format($this->value, $this->decimals, '.', '');
    }

    public function set($value, $decimals = null): void
    {
        if (!is_float($value) && is_numeric($value)) {
            $value = floatval($value);
        }

        if (is_float($value)) {
            $this->value = $value;
        } else {
            $this->value = null;
        }

        if (!is_null($decimals)) {
            $this->setDecimals($decimals);
        }
    }

    public function setDecimals($value = null): void
    {
        $min = $this->min_decimals;
        $max = $this->max_decimals;
        if (is_int($value)) {
            if (isset($min) && $value < $min) {
                throw new \InvalidArgumentException("Value lower than minimum allowed ($min)");
            }
            if (isset($max) && $value > $max) {
                throw new \InvalidArgumentException("Value exceeds maximum allowed ($max)");
            }

            $this->decimals = $decimals;

            return;
        }
    }

    public function get(): ?float
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
