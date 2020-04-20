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
composer require deved/fattura-elettronica
```

## Generazione fattura

```php
use DevCode\FatturaElettronica\Common\DatiAnagrafici;
use DevCode\FatturaElettronica\Common\Sede;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedente;
use DevCode\FatturaElettronica\Ordinaria\FatturaOrdinaria;
use DevCode\FatturaElettronica\Tabelle\TipoDocumento;

require __DIR__.'/vendor/autoload.php';

$fattura = FatturaOrdinaria::build(
    TipoDocumento::Fattura,
    '2018-11-22',
    '2018221111',
    '001'
);

// Anagrafica cedente
$anagraficaCedente = DatiAnagraficiCedente::build(
    '12345678901',
    'IT',
    '12345678901',
    'Acme SpA',
);
$sedeCedente = Sede::build(
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
$anagraficaCessionario = DatiAnagrafici::build(
    'XYZYZX77M04H888K',
    null,
    null,
    'Pinco Palla'
);

$sedeCessionario = Sede::build(
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

$linea = DettaglioLinee::build('Articolo1', 50, 'ABC', 120, 10);
$fattura->getDatiBeniServizi()->addLinea($linea);

// Generazione
$xml = $fattura->__toString();
$filename = $fattura->getFileName();
$errors = $fattura->validate();
```

## Lettura fattura elettronica

```php
<?php

use DevCode\FatturaElettronica\FatturaElettronica;

require __DIR__.'/vendor/autoload.php';

// Lettura
$fattura = FatturaElettronica::parse(__DIR__.'/test.xml');
```
