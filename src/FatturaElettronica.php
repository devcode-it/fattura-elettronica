<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\Interfaces\SerializeInterface;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaOrdinaria;
use Dasc3er\FatturaElettronica\Tabelle\FormatoTrasmissione;

abstract class FatturaElettronica extends ElementoFattura implements SerializeInterface, FatturaInterface
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
        $idPaese = $this->FatturaElettronicaHeader->getDatiTrasmissione()->getIdTrasmittente()->IdPaese;
        $idCodice = $this->FatturaElettronicaHeader->getDatiTrasmissione()->getIdTrasmittente()->IdCodice;
        $progressivoInvio = $this->FatturaElettronicaHeader->DatiTrasmissione->ProgressivoInvio;

        return $idPaese.$idCodice.'_'.$progressivoInvio.'.xml';
    }

    public static function parse(string $file): FatturaInterface
    {
        $content = file_get_contents($file);

        libxml_use_internal_errors(true);

        $xml = simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($xml === false) {
            $message = libxml_get_last_error()->message;

            throw new Exception($message);
        }

        $versione = (string) $xml['versione'];
        $content = json_decode(json_encode($xml), true);

        if ($versione == FormatoTrasmissione::Semplificata) {
            // TODO
        } else {
            $result = new FatturaOrdinaria();
        }

        $result->unserialize($content);

        return $result;
    }
}
