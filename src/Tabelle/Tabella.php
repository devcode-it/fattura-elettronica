<?php

namespace DevCode\FatturaElettronica\Tabelle;

/**
 * Struttura dedicata alla gestione delle tabelle di informazioni per la Fattura Elettronica.
 */
abstract class Tabella
{
    /**
     * Descrizione della codifica.
     */
    public static function descrizione(string $codice): ?string
    {
        $elenco = static::getCodifiche();

        $descrizione = null;
        try {
            $descrizione = $elenco[$codice];
        } catch (\Exception $exception) {
        }

        return $descrizione;
    }

    /**
     * Restituisce la lista delle codifiche previste dalla tabella.
     */
    abstract public static function getCodifiche(): iterable;
}
