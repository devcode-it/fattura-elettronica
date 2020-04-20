<?php

namespace DevCode\FatturaElettronica\Fields;

use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\StringInterface;

/**
 * Classe per la gestione della formattazione automatica dei campi decimali.
 */
class Decimal implements FieldInterface, StringInterface
{
    /** @var int */
    protected int $decimals;

    /** @var float|null */
    protected ?float $value;

    public function __construct(
        int $decimals = 2,
        $value = null
    ) {
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
}
