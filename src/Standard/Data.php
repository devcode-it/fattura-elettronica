<?php

namespace DevCode\FatturaElettronica\Standard;

use Carbon\Carbon;

/**
 * Classe per la gestione virtuale di stringhe di tipo data.
 */
class Data extends Testo
{
    protected string $format;

    public function __construct(
        bool $optional,
        string $format,
        ?string $content = null,
    ) {
        $this->format = $format;
        parent::__construct($optional, 0, 19, 1);

        if (!empty($content)) {
            $this->set($content);
        }
    }

    public function set($value): void
    {
        if ($value instanceof \DateTime) {
            $value = Carbon::instance($value);
        }

        if (is_string($value)) {
            $value = Carbon::parse($value);
        }

        if ($value instanceof Carbon) {
            $value = $value->format($this->format);
        }

        parent::set($value);
    }
}
