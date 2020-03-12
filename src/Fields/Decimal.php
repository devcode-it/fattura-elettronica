<?php

namespace Dasc3er\FatturaElettronica\Fields;

use Dasc3er\FatturaElettronica\Interfaces\FieldInterface;
use Dasc3er\FatturaElettronica\Interfaces\StringInterface;

class Decimal implements FieldInterface, StringInterface
{
    /** @var int */
    protected int $decimals;

    /** @var float|null */
    protected ?float $value;

    public function __construct(
        int $decimals = 2,
        ?float $value = null
    ) {
        $this->decimals = $decimals;
        $this->value = $value;
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

        if (!is_float($value)) {
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
