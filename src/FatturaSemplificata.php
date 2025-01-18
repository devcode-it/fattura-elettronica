<?php

namespace DevCode\FatturaElettronica;

use DevCode\FatturaElettronica\FatturaElettronicaHeader\TerzoIntermediarioOSoggettoEmittente;
use DevCode\FatturaElettronica\FatturaElettronica;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;
use DevCode\FatturaElettronica\Validatore;

class FatturaSemplificata extends FatturaElettronica
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

        $element->FatturaElettronicaHeader = FatturaElettronicaHeader::build($ProgressivoInvio);
        $element->FatturaElettronicaBody = FatturaElettronicaBody::build($TipoDocumento, $Data, $Numero);

        return $element;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(\XMLWriter $writer): void
    {
        $writer->writePi('xml-stylesheet', 'type="text/xsl" encoding="UTF-8" indent="yes" href="http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2.1/fatturaPA_v1.2.1.xsl"');

        $writer->startElementNS('p', 'FatturaElettronica', null);
        $writer->writeAttribute('versione', 'FSM10');
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

    public function setFatturaElettronicaHeader(FatturaElettronicaHeader $FatturaElettronicaHeader): FatturaSemplificata
    {
        $this->FatturaElettronicaHeader = $FatturaElettronicaHeader;

        return $this;
    }

    public function getFatturaElettronicaBody(): FatturaElettronicaBody
    {
        return $this->FatturaElettronicaBody;
    }

    public function setFatturaElettronicaBody(FatturaElettronicaBody $FatturaElettronicaBody): FatturaSemplificata
    {
        $this->FatturaElettronicaBody = $FatturaElettronicaBody;

        return $this;
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
            __DIR__.'/../specification/Schema_VFSM10.xsd'
        );

        return $validatore->getErrors();
    }
}
