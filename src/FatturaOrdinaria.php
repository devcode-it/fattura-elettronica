<?php

namespace DevCode\FatturaElettronica;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\TipoDocumento;

class FatturaOrdinaria extends FatturaElettronica
{
    protected ?string $schema = 'Schema_VFPR12.xsd';

    protected FatturaElettronicaHeader $FatturaElettronicaHeader;
    protected Collezione $FatturaElettronicaBody;

    public function __construct(?string $versione = null)
    {
        parent::__construct();

        $this->FatturaElettronicaHeader = new FatturaElettronicaHeader();
        $this->FatturaElettronicaHeader->DatiTrasmissione->FormatoTrasmissione = empty($this->versione) ? FormatoTrasmissione::OrdinariaPrivati->value : $this->versione;
        $this->FatturaElettronicaBody = new Collezione(FatturaElettronicaBody::class, 1);
    }

    public static function build(
        string|TipoDocumento $TipoDocumento,
        string $Data,
        string $Numero,
        string $ProgressivoInvio,
    ) {
        $element = new static();

        $element->FatturaElettronicaHeader->DatiTrasmissione->ProgressivoInvio = $ProgressivoInvio;

        $body = new FatturaElettronicaBody();
        $body->DatiGenerali->DatiGeneraliDocumento->TipoDocumento = $TipoDocumento;
        $body->DatiGenerali->DatiGeneraliDocumento->Data = $Data;
        $body->DatiGenerali->DatiGeneraliDocumento->Numero = $Numero;
        $element->FatturaElettronicaBody->add($body);

        return $element;
    }

    public function serialize(\XMLWriter $writer): void
    {
        // $writer->writePi('xml-stylesheet', 'type="text/xsl" encoding="UTF-8" indent="yes" href="http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2.1/fatturaPA_v1.2.1.xsl"');

        $writer->startElementNS('p', 'FatturaElettronica', null);
        $writer->writeAttribute('versione', $this->getFatturaElettronicaHeader()->getDatiTrasmissione()->getFormatoTrasmissione());
        $writer->writeAttributeNS('xmlns', 'ds', null, 'http://www.w3.org/2000/09/xmldsig#');
        $writer->writeAttributeNS('xmlns', 'p', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2');
        $writer->writeAttributeNS('xmlns', 'xsi', null, 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttributeNS('xsi', 'schemaLocation', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd');

        parent::serialize($writer);

        $writer->endElement();
    }

    public function getFatturaElettronicaHeader(): FatturaElettronicaHeader
    {
        return $this->FatturaElettronicaHeader;
    }

    public function setFatturaElettronicaHeader(FatturaElettronicaHeader $FatturaElettronicaHeader): FatturaOrdinaria
    {
        $this->FatturaElettronicaHeader = $FatturaElettronicaHeader;

        return $this;
    }

    public function getFatturaElettronicaBody(): Collezione
    {
        return $this->FatturaElettronicaBody;
    }

    public function addFatturaElettronicaBody(FatturaElettronicaBody $FatturaElettronicaBody): FatturaOrdinaria
    {
        $this->FatturaElettronicaBody->add($FatturaElettronicaBody);

        return $this;
    }

    public function removeFatturaElettronicaBody(int $index): FatturaOrdinaria
    {
        $this->FatturaElettronicaBody->remove($index);

        return $this;
    }

    public function getCedentePrestatore(): CedentePrestatore
    {
        return $this->getFatturaElettronicaHeader()->getCedentePrestatore();
    }

    public function getCessionarioCommittente(): CessionarioCommittente
    {
        return $this->getFatturaElettronicaHeader()->getCessionarioCommittente();
    }

    public function getDatiTrasmissione(): DatiTrasmissione
    {
        return $this->getFatturaElettronicaHeader()->getDatiTrasmissione();
    }

    public function getTerzoIntermediarioOSoggettoEmittente(): DatiAnagrafici
    {
        return $this->getFatturaElettronicaHeader()->getTerzoIntermediarioOSoggettoEmittente();
    }

    public function getDatiGenerali(): DatiGenerali
    {
        return $this->getFatturaElettronicaBody()->getElement(0)->getDatiGenerali();
    }

    public function getDatiPagamento(): DatiPagamento
    {
        return $this->getFatturaElettronicaBody()->getElement(0)->getDatiPagamento();
    }

    public function getDatiBeniServizi(): DatiBeniServizi
    {
        return $this->getFatturaElettronicaBody()->getElement(0)->getDatiBeniServizi();
    }

    public function getTipoDocumento(): string
    {
        return $this->getDatiGenerali()->getDatiGeneraliDocumento()->getTipoDocumento();
    }
}
