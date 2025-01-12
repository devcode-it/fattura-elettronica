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
    protected ?float $value;

    public function __construct(
        bool $optional,
        int $decimals = 2,
        $value = null
    ) {
        $this->optional = $optional;
        $this->decimals = $decimals;
        $this->set($value);
    }

    public function __toString(): string
    {
        return number_format($this->value, $this->decimals, '.', '');
    }

    public function set($value): void
    {
        if (!is_float($value) && is_numeric($value)) {
            $value = floatval($value);
        }

        if (is_float($value)) {
            $this->value = $value;
        } else {
            $this->value = null;
        }
    }

    public function get(): ?float
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty(): bool
    {
        return !isset($this->value);
    }
    
    /**
     * {@inheritdoc}
     */
    public function isOptional(): bool
    {
        return $this->optional;
    }
}
