<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione\ContattiTrasmittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione\FormatoTrasmissione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione\IdTrasmittente;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 1.1
 *
 * @name DatiTrasmissione
 *
 * Blocco sempre obbligatorio contenente informazioni che identificano univocamente il soggetto che trasmette, il documento trasmesso, il formato in cui è stato trasmesso il documento, il soggetto destinatario
 *
 * Blocco relativo ai dati di trasmissione della Fattura Elettronica
 */
class DatiTrasmissione extends Elemento
{
    protected IdTrasmittente $IdTrasmittente;
    protected Testo $ProgressivoInvio;
    protected TestoEnum $FormatoTrasmissione;
    protected Testo $CodiceDestinatario;
    protected ContattiTrasmittente $ContattiTrasmittente;
    protected Testo $PECDestinatario;

    public function __construct()
    {
        parent::__construct(false);
        $this->IdTrasmittente = new IdTrasmittente();
        $this->ProgressivoInvio = new Testo(false, 1, 10, 1, "(\p{IsBasicLatin}{1,10})");
        $this->FormatoTrasmissione = new TestoEnum(false, FormatoTrasmissione::class);
        $this->CodiceDestinatario = new Testo(false, 6, 7, 1, '[A-Z0-9]{6,7}');
        $this->ContattiTrasmittente = new ContattiTrasmittente();
        $this->PECDestinatario = new Testo(true, 0, 256, 1, null);
    }

    public function getIdTrasmittente(): IdTrasmittente
    {
        return $this->IdTrasmittente;
    }

    public function setIdTrasmittente(IdTrasmittente $IdTrasmittente)
    {
        $this->IdTrasmittente = $IdTrasmittente;

        return $this;
    }

    public function getProgressivoInvio(): ?string
    {
        return $this->ProgressivoInvio->get();
    }

    public function setProgressivoInvio(?string $value)
    {
        $this->ProgressivoInvio->set($value);

        return $this;
    }

    public function getFormatoTrasmissione(): ?string
    {
        return $this->FormatoTrasmissione->get();
    }

    public function setFormatoTrasmissione(FormatoTrasmissione|string $value)
    {
        $this->FormatoTrasmissione->set($value);

        return $this;
    }

    public function getCodiceDestinatario(): ?string
    {
        return $this->CodiceDestinatario->get();
    }

    public function setCodiceDestinatario(?string $value)
    {
        $this->CodiceDestinatario->set($value);

        return $this;
    }

    public function getContattiTrasmittente(): ContattiTrasmittente
    {
        return $this->ContattiTrasmittente;
    }

    public function setContattiTrasmittente(ContattiTrasmittente $ContattiTrasmittente)
    {
        $this->ContattiTrasmittente = $ContattiTrasmittente;

        return $this;
    }

    public function getPECDestinatario(): ?string
    {
        return $this->PECDestinatario->get();
    }

    public function setPECDestinatario(?string $value)
    {
        $this->PECDestinatario->set($value);

        return $this;
    }
}
