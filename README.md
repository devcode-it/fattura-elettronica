[![Latest Version on Packagist](https://img.shields.io/packagist/v/deved/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/deved/fattura-elettronica)
[![Build Status](https://travis-ci.org/deved-it/fattura-elettronica.svg?branch=master)](https://travis-ci.org/deved-it/fattura-elettronica)
[![Total Downloads](https://img.shields.io/packagist/dt/deved/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/deved/fattura-elettronica)
[![License](https://poser.pugx.org/deved/fattura-elettronica/license)](https://packagist.org/packages/deved/fattura-elettronica)

# Libreria Fattura Elettronica

Libreria per la gestione della Fatturazione elettronica per la creazione delle fatture elettroniche italiane, testata e mantenuta.

La libreria nasce originalmente come fork della versione 1.1.12 di [deved-it/fattura-elettronica](https://github.com/deved-it/fattura-elettronica), ma integra molte funzionalità aggiuntive rispetto alla versione originale.

## Installazione

Per ora non è disponibile un pacchetto registrato tramite Composer.

Per installare la libreria deved-it/fattura-elettronica:
```bash
composer require devcode/fattura-elettronica
```

## Aggiornamento contenuti

L'aggiornamento delle classi disponibili per la fattura elettronica può essere effettuato tramite il comando `composer generate`.

Se si desidera usare la variante in Python per la generazione, eseguire manualmente il file `build/generate.py` in Python e poi eseguire `composer format` per sistemare la formattazione dei contenuti PHP.

Questo script sovrascriverà i contenuti delle cartelle `src/Semplificata` e `src/Ordinaria` con classi aggiornate sulla base dei contenuti del file Excel con i dettagli dello schema.

Riferimento per lo schema ufficiale: https://www.agenziaentrate.gov.it/portale/web/guest/specifiche-tecniche-versione-1.8

## Generazione fattura

```php
require_once __DIR__.'/vendor/autoload.php';

use DevCode\FatturaElettronica\FatturaOrdinaria;
use DevCode\FatturaElettronica\Ordinaria\Codifiche\RegimeFiscale;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DatiRiepilogo;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Sede as SedeCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici as DatiAnagraficiCessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\Sede as SedeCessionarioCommittente;
use DevCode\FatturaElettronica\TipoDocumento;

$fattura = FatturaOrdinaria::build(
    TipoDocumento::TD01,
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

$sedeCedente = (new SedeCedentePrestatore())
    ->setIndirizzo('Via Roma 10')
    ->setCAP('33018')
    ->setComune('Tarvisio')
    ->setProvincia('UD')
    ->setNazione('IT');

$cedente = $fattura->getCedentePrestatore()
    ->setDatiAnagrafici($anagraficaCedente)
    ->setSede($sedeCedente);

// Anagrafica cessionario
$anagraficaCessionario = (new DatiAnagraficiCessionarioCommittente())
    ->setCodiceFiscale('XYZYZX77M04H888K');
$anagraficaCessionario->Anagrafica->setDenominazione('Pinco Palla');

$sedeCessionario = (new SedeCessionarioCommittente())
    ->setIndirizzo('Via Diaz 35')
    ->setCAP('33018')
    ->setComune('Tarvisio')
    ->setProvincia('UD')
    ->setNazione('IT');
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

// Generazione
$xml = $fattura->__toString();
$filename = $fattura->getFileName();
$isValid = $fattura->validator()->isValid();
$errors = $fattura->validator()->getErrors();
```

## Lettura fattura elettronica

```php
<?php

require __DIR__.'/vendor/autoload.php';

use DevCode\FatturaElettronica\FatturaElettronica;

// Lettura
$fattura = FatturaElettronica::parse(__DIR__.'/test.xml');
```
