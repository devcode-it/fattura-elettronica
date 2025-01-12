<?php

namespace DevCode\FatturaElettronica;

use DevCode\FatturaElettronica\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente;
use DevCode\FatturaElettronica\FatturaElettronica;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;
use DevCode\FatturaElettronica\Validatore;

class FatturaOrdinaria extends FatturaElettronica
{
    protected FatturaElettronicaHeader $FatturaElettronicaHeader;
    protected FatturaElettronicaBody $FatturaElettronicaBody;

    public function __construct()
    {
        parent::__construct();

        $this->FatturaElettronicaHeader = new FatturaElettronicaHeader();
        $this->FatturaElettronicaBody = new FatturaElettronicaBody();
    }

    public static function build(
        string $TipoDocumento,
        string $Data,
        string $Numero,
        string $ProgressivoInvio
    ) {
        $element = new static();

        $element->FatturaElettronicaHeader->DatiTrasmissione->ProgressivoInvio = $ProgressivoInvio;
        $element->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->TipoDocumento = $TipoDocumento;
        $element->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->Data = $Data;
        $element->FatturaElettronicaBody->DatiGenerali->DatiGeneraliDocumento->Numero = $Numero;

        return $element;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(\XMLWriter $writer): void
    {
        $writer->writePi('xml-stylesheet', 'type="text/xsl" encoding="UTF-8" indent="yes" href="http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2.1/fatturaPA_v1.2.1.xsl"');

        $writer->startElementNS('p', 'FatturaElettronica', null);
        $writer->writeAttribute('versione', 'FPR12');
        $writer->writeAttributeNS('xmlns', 'ds', null, 'http://www.w3.org/2000/09/xmldsig#');
        $writer->writeAttributeNS('xmlns', 'p', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2');
        $writer->writeAttributeNS('xmlns', 'xsi', null, 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttributeNS('xsi', 'schemaLocation', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd');

        // FatturaElettronicaHeader
        $writer->startElement('FatturaElettronicaHeader');
        $this->FatturaElettronicaHeader->serialize($writer);
        $writer->endElement();

        // FatturaElettronicaBody
        $writer->startElement('FatturaElettronicaBody');
        $this->FatturaElettronicaBody->serialize($writer);
        $writer->endElement();

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

    public function getFatturaElettronicaBody(): FatturaElettronicaBody
    {
        return $this->FatturaElettronicaBody;
    }

    public function setFatturaElettronicaBody(FatturaElettronicaBody $FatturaElettronicaBody): FatturaOrdinaria
    {
        $this->FatturaElettronicaBody = $FatturaElettronicaBody;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCedentePrestatore(): CedentePrestatore
    {
        return $this->getFatturaElettronicaHeader()->getCedentePrestatore();
    }

    /**
     * {@inheritdoc}
     */
    public function getCessionarioCommittente(): CessionarioCommittente
    {
        return $this->getFatturaElettronicaHeader()->getCessionarioCommittente();
    }

    /**
     * {@inheritdoc}
     */
    public function getDatiTrasmissione(): DatiTrasmissione
    {
        return $this->getFatturaElettronicaHeader()->getDatiTrasmissione();
    }

    /**
     * {@inheritdoc}
     */
    public function getTerzoIntermediarioOSoggettoEmittente(): DatiAnagrafici
    {
        return $this->getFatturaElettronicaHeader()->getTerzoIntermediarioOSoggettoEmittente();
    }

    /**
     * {@inheritdoc}
     */
    public function getDatiGenerali(): DatiGenerali
    {
        return $this->getFatturaElettronicaBody()->getDatiGenerali();
    }

    /**
     * {@inheritdoc}
     */
    public function getDatiPagamento(): DatiPagamento
    {
        return $this->getFatturaElettronicaBody()->getDatiPagamento();
    }

    /**
     * {@inheritdoc}
     */
    public function getDatiBeniServizi(): DatiBeniServizi
    {
        return $this->getFatturaElettronicaBody()->getDatiBeniServizi();
    }

    /**
     * {@inheritdoc}
     */
    public function getTipoDocumento(): string
    {
        return $this->getDatiGenerali()->getDatiGeneraliDocumento()->getTipoDocumento();
    }

    /**
     * {@inheritdoc}
     */
    public function getModalitaPagamento(): string
    {
        //return $this->getFatturaElettronicaBody()->getDatiPagamento();
    }

    /**
     * Verifica l'xml della fattura.
     **.
     */
    public function validate(): iterable
    {
        $validatore = new Validatore();
        $isValid = $validatore->validate(
            $this->__toString(),
            __DIR__.'/../xsd/Schema_VFPR12.xsd'
        );

        return $validatore->getErrors();
    }
}
