<?php

declare(strict_types=1);
use DevCode\FatturaElettronica\FatturaSemplificata;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServiz;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\TipoDocumento;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\RegimeFiscale;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CedentePrestatore\Sede as SedeCedentePrestatore;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\DatiIVA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi;

use PHPUnit\Framework\TestCase;

final class WriteSemplificataTest extends TestCase
{
    public function testFatturaSemplificata(): void
    {
        $fattura = FatturaSemplificata::build(
            TipoDocumento::TD07,
            '2018-11-22',
            '2018221111',
            '001'
        );

        $fattura->getFatturaElettronicaHeader()
            ->getDatiTrasmissione()
            ->getIdTrasmittente()
            ->setIdPaese('IT')
            ->setIdCodice('01234567890');

        $fattura->getFatturaElettronicaHeader()
            ->getDatiTrasmissione()
            ->setCodiceDestinatario('ABC1234');

        // Anagrafica cedente
        $sedeCedente = (new SedeCedentePrestatore())
            ->setIndirizzo('Via Roma 10')
            ->setCAP('33018')
            ->setComune('Tarvisio')
            ->setProvincia('UD')
            ->setNazione('IT');

        $cedente = $fattura->getCedentePrestatore()
            ->setRegimeFiscale(RegimeFiscale::RF01->value)
            ->setDenominazione('Acme SpA')
            ->setSede($sedeCedente);

        $cedente->IdFiscaleIVA->setIdPaese('IT');
        $cedente->IdFiscaleIVA->setIdCodice('12345678901');

        $fattura->getDatiGenerali()
            ->getDatiGeneraliDocumento()
            ->setDivisa('EUR');

        $body = $fattura->getFatturaElettronicaBody()->getElement(0);
        $linea = (new DatiBeniServizi())
            ->setDescrizione('Articolo1')
            ->setImporto(60)
            ->setDatiIVA(
                (new DatiIVA())
                ->setImposta(6)
                ->setAliquota(10)
            );
        $body->addDatiBeniServizi($linea);

        $this->assertSame($fattura->validator()->getErrors(), []);
        $this->assertTrue($fattura->validator()->isValid());
        $this->assertSame($fattura->__toString(), file_get_contents(__DIR__.'/risorse/fattura_semplificata.xml'));
        $this->assertSame($fattura->getFileName(), 'IT01234567890_001.xml');
    }
}
