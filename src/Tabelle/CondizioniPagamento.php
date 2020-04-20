<?php

namespace DevCode\FatturaElettronica\Tabelle;

/**
 * @source https://github.com/deved-it/fattura-elettronica
 *
 * Class CondizioniPagamento
 */
class CondizioniPagamento extends Tabella
{
    const Rate = 'TP01';
    const Completo = 'TP02';
    const Anticipo = 'TP03';

    /**
     * {@inheritdoc}
     */
    public static function getCodifiche(): iterable
    {
        return [
           'TP01' => 'Pagamento a rate',
           'TP02' => 'Pagamento completo',
           'TP03' => 'Anticipo',
        ];
    }
}
