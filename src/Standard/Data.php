<?php

namespace DevCode\FatturaElettronica\Standard;

use ArrayIterator;
use DevCode\FatturaElettronica\Standard\Testo;
use IteratorAggregate;
use Carbon\Carbon;

/**
 * Classe per la gestione virtuale di stringhe di tipo data.
 */
class Data extends Testo
{
    public function __construct(
        bool $optional,
        ?string $content = null
    ) {
        parent::__construct($optional, 10, 10, 1);
        
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function set($value): void
    {
        if ($value instanceof \DateTime){
            $value = Carbon::instance($value);
        }

        if ($value instanceof Carbon){
            $value = $value->toDateString();
        }

        parent::set($value);
    }
}
