<?php

require_once __DIR__.'/vendor/autoload.php';

use DevCode\FatturaElettronica\FatturaOrdinaria;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi\DettaglioLinee;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici as DatiAnagraficiCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\Sede as SedeCedentePrestatore;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\DatiAnagrafici as DatiAnagraficiCessionarioCommittente;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CessionarioCommittente\Sede as SedeCessionarioCommittente;
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
$errors = $fattura->validator();
/*
use DevCode\FatturaElettronica\FatturaElettronica;
use DevCode\FatturaElettronica\FatturaOrdinaria;

$t = FatturaElettronica::parse(
    "ST Fatturazione elettronica - ITHVQWPH73P42H501Y_00023_ITHVQWPH73P42H501Y_00023.xml"
);

print($t->__toString());
/*

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici\IdFiscaleIVA;
FatturaOrdinaria
$t = new IdFiscaleIVA();
$t->IdPaese = "IT";

print($t->__toString());*/
