<?php

namespace Dasc3er\FatturaElettronica\Fields;

use Dasc3er\FatturaElettronica\XML\StringInterface;

class Decimal implements StringInterface
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

    public function set(?float $value): void
    {
        $this->value = $value;
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
