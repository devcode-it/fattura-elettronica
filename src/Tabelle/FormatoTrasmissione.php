<?php

namespace Dasc3er\FatturaElettronica\Tabelle;

class FormatoTrasmissione extends Tabella
{
    const VersioneTrasmissione = '12'; // 1.2
    const VersioneTrasmissioneSemplificata = '10'; // 1.0

    const OrdinariaPA = 'FPA'.self::VersioneTrasmissione;
    const OrdinariaPrivati = 'FPR'.self::VersioneTrasmissione;
    const Semplificata = 'FSM'.self::VersioneTrasmissioneSemplificata;

    /**
     * {@inheritdoc}
     */
    public static function getCodifiche(): iterable
    {
        return [
            self::OrdinariaPA => 'Fattura ordinaria verso la PA',
            self::OrdinariaPrivati => 'Fattura ordinaria verso privati',
            self::Semplificata => 'Fattura semplificata verso privati in forma semplificata',
        ];
    }
}
