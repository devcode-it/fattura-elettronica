<?php

namespace Dasc3er\FatturaElettronica\Ordinaria;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\FatturaElettronica;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;
use Dasc3er\FatturaElettronica\XML\Validator;

class FatturaOrdinaria extends FatturaElettronica implements FatturaInterface
{
    protected Header $FatturaElettronicaHeader;
    protected Body $FatturaElettronicaBody;

    public function __construct()
    {
        parent::__construct();

        $this->FatturaElettronicaHeader = new Header();
        $this->FatturaElettronicaBody = new Body();
    }

    public static function build(
        string $TipoDocumento,
        string $Data,
        string $Numero,
        string $ProgressivoInvio
    ) {
        $element = new static();

        $element->FatturaElettronicaHeader = Header::build($ProgressivoInvio);
        $element->FatturaElettronicaBody = Body::build($TipoDocumento, $Data, $Numero);

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

    public function getFatturaElettronicaHeader(): Header
    {
        return $this->FatturaElettronicaHeader;
    }

    public function setFatturaElettronicaHeader(Header $FatturaElettronicaHeader): FatturaOrdinaria
    {
        $this->FatturaElettronicaHeader = $FatturaElettronicaHeader;

        return $this;
    }

    public function getFatturaElettronicaBody(): Body
    {
        return $this->FatturaElettronicaBody;
    }

    public function setFatturaElettronicaBody(Body $FatturaElettronicaBody): FatturaOrdinaria
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
        $validator = new Validator();
        $isValid = $validator->validate(
            $this->serialize(),
            __DIR__.'/../../xsd/fattura_pa_1.2.1.xsd'
        );

        return $validator->getErrors();
    }
}
