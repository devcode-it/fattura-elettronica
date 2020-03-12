<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\Interfaces\SerializableInterface;
use Dasc3er\FatturaElettronica\XML\SerializableTrait;

abstract class FatturaElettronica implements SerializableInterface, FatturaInterface
{
    use SerializableTrait;

    /**
     * {@inheritdoc}
     */
    public function isEmpty(): bool
    {
        return false;
    }

    /**
     * Restituisce il nome della fattura conforme all'SDI.
     */
    public function getFileName(): string
    {
        $idPaese = $this->FatturaElettronicaHeader->DatiTrasmissione->IdTrasmittente->IdPaese;
        $idCodice = $this->FatturaElettronicaHeader->DatiTrasmissione->IdTrasmittente->IdCodice;
        $progressivoInvio = $this->FatturaElettronicaHeader->DatiTrasmissione->ProgressivoInvio;

        return $idPaese.$idCodice.'_'.$progressivoInvio.'.xml';
    }
}
