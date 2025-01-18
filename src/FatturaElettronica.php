<?php

namespace DevCode\FatturaElettronica;

use DevCode\FatturaElettronica\Interfaces\SerializeInterface;
use DevCode\FatturaElettronica\Standard\Elemento;

abstract class FatturaElettronica extends Elemento implements SerializeInterface
{
    protected ?string $schema = null;

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

    public static function parse(string $file): FatturaSemplificata|FatturaOrdinaria
    {
        $content = file_get_contents($file);

        libxml_use_internal_errors(true);

        $xml = simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($xml === false) {
            $message = libxml_get_last_error()->message;

            throw new \Exception($message);
        }

        $versione = (string) $xml['versione'];
        if ($versione == FormatoTrasmissione::Semplificata->value) {
            $result = new FatturaSemplificata();
        } else {
            $result = new FatturaOrdinaria($versione);
        }

        $content = json_decode(json_encode($xml), true);
        $result->unserialize($content);

        return $result;
    }

    /**
     * Valida il contenuto XML della fattura contro il formato XSD disponibile.
     */
    public function validator(): Validatore
    {
        $validatore = new Validatore();

        $validatore->validator(
            $this->__toString(),
            __DIR__.'/../specification/'.$this->schema
        );

        return $validatore;
    }
}
