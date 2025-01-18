<?php

declare(strict_types=1);
use DevCode\FatturaElettronica\FatturaOrdinaria;
use DevCode\FatturaElettronica\Ordinaria\Codifiche\RegimeFiscale;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Sede as SedeCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici as DatiAnagraficiCessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\Sede as SedeCessionarioCommittente;
use DevCode\FatturaElettronica\TipoDocumento;
use PHPUnit\Framework\TestCase;

final class WriteTest extends TestCase
{
    public function testFatturaOrdinaria(): void
    {
        $fattura = FatturaOrdinaria::build(
            TipoDocumento::Fattura->value,
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
        $anagraficaCedente = (new DatiAnagraficiCedentePrestatore())
            ->setRegimeFiscale(RegimeFiscale::RF01->value);
        $anagraficaCedente->IdFiscaleIVA->setIdPaese('IT');
        $anagraficaCedente->IdFiscaleIVA->setIdCodice('12345678901');

        $anagraficaCedente->Anagrafica
            ->setDenominazione('Acme SpA');

        $sedeCedente = new SedeCedentePrestatore(
            'Via Roma 10',
            null,
            '33018',
            'Tarvisio',
            'UD',
            'IT',
        );

        $cedente = $fattura->getCedentePrestatore()
            ->setDatiAnagrafici($anagraficaCedente)
            ->setSede($sedeCedente);

        // Anagrafica cessionario
        $anagraficaCessionario = new DatiAnagraficiCessionarioCommittente(
            'XYZYZX77M04H888K',
        );
        $anagraficaCessionario->Anagrafica->setDenominazione('Pinco Palla');

        $sedeCessionario = new SedeCessionarioCommittente(
            'Via Diaz 35',
            null,
            '33018',
            'Tarvisio',
            'UD',
            'IT',
        );
        $cessionario = $fattura->getCessionarioCommittente();
        $cessionario->setDatiAnagrafici($anagraficaCessionario);
        $cessionario->setSede($sedeCessionario);

        $fattura->getDatiGenerali()
            ->getDatiGeneraliDocumento()
            ->setImportoTotaleDocumento(122)
            ->setDivisa('EUR');

        $linea = (new DettaglioLinee())
            ->setDescrizione('Articolo1')
            ->setPrezzoUnitario(60)
            ->setPrezzoTotale(120)
            ->setAliquotaIVA(10);
        $fattura->getDatiBeniServizi()->addDettaglioLinee($linea);

        $riepliogo = (new DatiRiepilogo())
            ->setAliquotaIVA(22)
            ->setImponibileImporto(5)
            ->setImposta(1.1)
            ->setEsigibilitaIVA('I');
        $fattura->getDatiBeniServizi()->addDatiRiepilogo($riepliogo);

        $this->assertTrue($fattura->validator()->isValid());
        $this->assertSame($fattura->__toString(), file_get_contents(__DIR__.'/risorse/fattura_ordinaria.xml'));
        $this->assertSame($fattura->getFileName(), 'IT01234567890_001.xml');
    }

    public function testFatturaSemplificata(): void
    {
        $this->assertSame('', '');
    }
}
