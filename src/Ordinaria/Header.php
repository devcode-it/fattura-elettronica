<?php

namespace Dasc3er\FatturaElettronica\Ordinaria;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

class Header extends ElementoFattura
{
    /** @var DatiTrasmissione */
    protected DatiTrasmissione $DatiTrasmissione;

    /** @var CedentePrestatore */
    protected CedentePrestatore $CedentePrestatore;

    /** @var CessionarioCommittente */
    protected CessionarioCommittente $CessionarioCommittente;

    /** @var DatiAnagrafici|null */
    protected DatiAnagrafici $TerzoIntermediarioOSoggettoEmittente;

    public function __construct()
    {
        parent::__construct();

        $this->DatiTrasmissione = new DatiTrasmissione();
        $this->CedentePrestatore = new CedentePrestatore();
        $this->CessionarioCommittente = new CessionarioCommittente();
    }

    public static function build(
        string $ProgressivoInvio
    ) {
        $element = new static();
        $element->getDatiTrasmissione()->setProgressivoInvio($ProgressivoInvio);

        return $element;
        /*
        $this->TerzoIntermediarioOSoggettoEmittente = new DatiAnagrafici();
        protected string $SoggettoEmittente = 'TZ';
        */
    }

    public function getDatiTrasmissione(): DatiTrasmissione
    {
        return $this->DatiTrasmissione;
    }

    public function setDatiTrasmissione(DatiTrasmissione $DatiTrasmissione): Header
    {
        $this->DatiTrasmissione = $DatiTrasmissione;

        return $this;
    }

    public function getCedentePrestatore(): CedentePrestatore
    {
        return $this->CedentePrestatore;
    }

    public function setCedentePrestatore(CedentePrestatore $CedentePrestatore): Header
    {
        $this->CedentePrestatore = $CedentePrestatore;

        return $this;
    }

    public function getCessionarioCommittente(): CessionarioCommittente
    {
        return $this->CessionarioCommittente;
    }

    public function setCessionarioCommittente(CessionarioCommittente $CessionarioCommittente): Header
    {
        $this->CessionarioCommittente = $CessionarioCommittente;

        return $this;
    }

    public function getTerzoIntermediarioOSoggettoEmittente(): ?DatiAnagrafici
    {
        return $this->TerzoIntermediarioOSoggettoEmittente;
    }

    public function setTerzoIntermediarioOSoggettoEmittente(?DatiAnagrafici $TerzoIntermediarioOSoggettoEmittente): Header
    {
        $this->TerzoIntermediarioOSoggettoEmittente = $TerzoIntermediarioOSoggettoEmittente;

        return $this;
    }

    protected function getXmlTags(): iterable
    {
        // Fix per IdTrasmittente non impostato
        $trasmittente = $this->DatiTrasmissione->getIdTrasmittente();
        $anagrafica = $this->CedentePrestatore->getDatiAnagrafici()->getIdFiscaleIVA();
        if ($trasmittente->isEmpty()) {
            $trasmittente->setIdPaese($anagrafica->getIdPaese());
            $trasmittente->setIdCodice($anagrafica->getIdCodice());
        }

        return parent::getXmlTags();
    }
}
