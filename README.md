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

L'aggiornamento delle classi disponibili per la fattura elettronica può essere effettuato tramite lo script `build/generate.py` in Python.

Questo script sovrascriverà i contenuti delle cartelle `src/Semplificata` e `src/Ordinaria` con classi aggiornate sulla base dei contenuti del file Excel con i dettagli dello schema.

Riferimento per lo schema ufficiale: https://www.agenziaentrate.gov.it/portale/web/guest/specifiche-tecniche-versione-1.8

## Generazione fattura

```php
require_once __DIR__.'/vendor/autoload.php';

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici as DatiAnagraficiCessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Sede as SedeCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\Sede as SedeCessionarioCommittente;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedente;
use DevCode\FatturaElettronica\FatturaOrdinaria;
use DevCode\FatturaElettronica\TipoDocumento;

$fattura = FatturaOrdinaria::build(
    TipoDocumento::Fattura->value,
    '2018-11-22',
    '2018221111',
    '001'
);

// Anagrafica cedente
$anagraficaCedente = new DatiAnagraficiCedentePrestatore(
    '12345678901',
    'IT',
    '12345678901',
    'Acme SpA',
);
$sedeCedente = new SedeCedentePrestatore(
    'Via Roma 10',
    null,
    'Tarvisio',
    '33018',
    'UD',
    'IT',
);

$cedente = $fattura->getCedentePrestatore();
$cedente->setDatiAnagrafici($anagraficaCedente);
$cedente->setSede($sedeCedente);

// Anagrafica cessionario
$anagraficaCessionario = new DatiAnagraficiCessionarioCommittente(
    'XYZYZX77M04H888K',
    null,
    null,
    'Pinco Palla'
);

$sedeCessionario = new SedeCessionarioCommittente(
    'Via Diaz 35',
    null,
    'Tarvisio',
    '33018',
    'UD',
    'IT',
);
$cessionario = $fattura->getCessionarioCommittente();
$cessionario->setDatiAnagrafici($anagraficaCessionario);
$cessionario->setSede($sedeCessionario);

$fattura->getDatiGenerali()
    ->getDatiGeneraliDocumento()
    ->setImportoTotaleDocumento(122);

$linea = new DettaglioLinee();
$linea->setDescrizione('Articolo1');
$linea->setPrezzoUnitario(60);
$linea->setPrezzoTotale(120);
$linea->setAliquotaIVA(10);
$fattura->getDatiBeniServizi()->addDettaglioLinee($linea);

// Generazione
$xml = $fattura->__toString();
$filename = $fattura->getFileName();
$errors = $fattura->validate();
```

## Lettura fattura elettronica

```php
<?php

require __DIR__.'/vendor/autoload.php';

use DevCode\FatturaElettronica\FatturaElettronica;

// Lettura
$fattura = FatturaElettronica::parse(__DIR__.'/test.xml');
```
