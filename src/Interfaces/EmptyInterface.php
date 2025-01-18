<?php

namespace DevCode\FatturaElettronica\Interfaces;

interface EmptyInterface
{
    /**
     * Controlla se l'elemento è vuoto.
     */
    public function isEmpty(): bool;

    /**
     * Controlla se l'elemento è opzionale.
     */
    public function isOptional(): bool;
}
