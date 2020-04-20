<?php

namespace DevCode\FatturaElettronica\Interfaces;

interface FieldInterface extends EmptyInterface
{
    /**
     * Restituisce il contenuto dell'elemento.
     */
    public function get();

    /**
     * Imposta il contentuo dell'elemento.
     */
    public function set($value): void;
}
