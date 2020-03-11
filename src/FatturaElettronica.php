<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\XML\SerializableInterface;
use Dasc3er\FatturaElettronica\XML\Serializer;

abstract class FatturaElettronica implements SerializableInterface, FatturaInterface
{
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

    /**
     * Restituisce l'xml della fattura elettronica.
     *
     * @throws \Exception
     */
    public function toXml(): string
    {
        return Serializer::serialize($this);
    }
}
