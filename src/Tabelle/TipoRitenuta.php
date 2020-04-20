<?php

namespace DevCode\FatturaElettronica\Tabelle;

/**
 * Tabella contenente le informazioni per i campi di tipo TipoRitenuta.
 */
class TipoRitenuta extends Tabella
{
    /**
     * {@inheritdoc}
     */
    public static function getCodifiche(): iterable
    {
        return [
            'RT01' => 'Ritenuta persone fisiche',
            'RT02' => 'Ritenuta persone giuridiche',
            'RT03' => 'Contributo INPS',
            'RT04' => 'Contributo ENASARCO',
            'RT05' => 'Contributo ENPAM',
            'RT06' => 'Altro contributo previdenziale',
        ];
    }
}
