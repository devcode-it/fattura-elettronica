<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\DatiTrasmissione\ContattiTrasmittente;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\DatiTrasmissione\IdTrasmittente;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco sempre obbligatorio contenente informazioni che identificano univocamente il soggetto che trasmette, il documento trasmesso, il formato in cui è stato trasmesso il documento, il soggetto destinatario
*/
class DatiTrasmissione extends Elemento {
    protected IdTrasmittente $IdTrasmittente;
	protected Testo $ProgressivoInvio;
	protected Testo $FormatoTrasmissione;
	protected Testo $CodiceDestinatario;
	protected ?ContattiTrasmittente $ContattiTrasmittente;
	protected Testo $PECDestinatario;
    public function __construct(?string $ProgressivoInvio = null, ?string $FormatoTrasmissione = null, ?string $CodiceDestinatario = null, ?string $PECDestinatario = null) {
        $this->IdTrasmittente = new IdTrasmittente();
		$this->ProgressivoInvio = new Testo(false, 1, 10, 1);
		$this->FormatoTrasmissione = new Testo(false, 5, 5, 1);
		$this->CodiceDestinatario = new Testo(false, 6, 7, 1);
		$this->PECDestinatario = new Testo(true, 7, 256, 1);
        if (!is_null($ProgressivoInvio)) $this->setProgressivoInvio($ProgressivoInvio);
		if (!is_null($FormatoTrasmissione)) $this->setFormatoTrasmissione($FormatoTrasmissione);
		if (!is_null($CodiceDestinatario)) $this->setCodiceDestinatario($CodiceDestinatario);
		if (!is_null($PECDestinatario)) $this->setPECDestinatario($PECDestinatario);
    }
    
    public function getIdTrasmittente() : IdTrasmittente {
        return $this->IdTrasmittente;
    }

    public function setIdTrasmittente(IdTrasmittente $IdTrasmittente) {
        $this->IdTrasmittente = $IdTrasmittente;

        return $this;
    }

    public function getProgressivoInvio() : ?string {
        return $this->ProgressivoInvio->get();
    }

    public function setProgressivoInvio(?string $value) {
        $this->ProgressivoInvio->set($value);

        return $this;
    }

    public function getFormatoTrasmissione() : ?string {
        return $this->FormatoTrasmissione->get();
    }

    public function setFormatoTrasmissione(?string $value) {
        $this->FormatoTrasmissione->set($value);

        return $this;
    }

    public function getCodiceDestinatario() : ?string {
        return $this->CodiceDestinatario->get();
    }

    public function setCodiceDestinatario(?string $value) {
        $this->CodiceDestinatario->set($value);

        return $this;
    }

    public function getContattiTrasmittente() : ContattiTrasmittente {
        return $this->ContattiTrasmittente;
    }

    public function setContattiTrasmittente(?ContattiTrasmittente $ContattiTrasmittente) {
        $this->ContattiTrasmittente = $ContattiTrasmittente;

        return $this;
    }

    public function getPECDestinatario() : ?string {
        return $this->PECDestinatario->get();
    }

    public function setPECDestinatario(?string $value) {
        $this->PECDestinatario->set($value);

        return $this;
    }
}
