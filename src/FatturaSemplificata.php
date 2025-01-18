<?php

namespace DevCode\FatturaElettronica;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;
use DevCode\FatturaElettronica\Standard\Collezione;

class FatturaSemplificata extends FatturaElettronica
{
    protected ?string $schema = 'Schema_VFSM10.xsd';

    protected FatturaElettronicaHeader $FatturaElettronicaHeader;
    protected Collezione $FatturaElettronicaBody;

    public function __construct()
    {
        parent::__construct();

        $this->FatturaElettronicaHeader = new FatturaElettronicaHeader();
        $this->FatturaElettronicaHeader->DatiTrasmissione->FormatoTrasmissione = FormatoTrasmissione::Semplificata->value;
        $this->FatturaElettronicaBody = new Collezione(FatturaElettronicaBody::class, 1);
    }

    public static function build(
        string $TipoDocumento,
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
        // $writer->writePi('xml-stylesheet', 'type="text/xsl" encoding="UTF-8" indent="yes" href="http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.0.1/fatturaPA_v1.0.1.xsl"');

        $writer->startElementNS('p', 'FatturaElettronicaSemplificata', null);
        $writer->writeAttribute('versione', $this->getFatturaElettronicaHeader()->getDatiTrasmissione()->getFormatoTrasmissione());
        $writer->writeAttributeNS('xmlns', 'ds', null, 'http://www.w3.org/2000/09/xmldsig#');
        $writer->writeAttributeNS('xmlns', 'p', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.0');
        $writer->writeAttributeNS('xmlns', 'xsi', null, 'http://www.w3.org/2001/XMLSchema-instance');
        $writer->writeAttributeNS('xsi', 'schemaLocation', null, 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.0 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.0/Schema_del_file_xml_FatturaPA_versione_1.0.xsd');

        // FatturaElettronicaHeader
        $writer->startElement('FatturaElettronicaHeader');
        $this->FatturaElettronicaHeader->serialize($writer);
        $writer->endElement();

        // FatturaElettronicaBody
        foreach ($this->FatturaElettronicaBody as $i => $var) {
            $writer->startElement('FatturaElettronicaBody');
            $var->serialize($writer);
            $writer->endElement();
        }

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
}
