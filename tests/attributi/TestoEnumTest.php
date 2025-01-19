<?php

declare(strict_types=1);

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\TipoDocumento;
use DevCode\FatturaElettronica\Standard\TestoEnum;
use PHPUnit\Framework\TestCase;

final class TestoEnumTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new TestoEnum(true, TipoDocumento::class);

        $this->assertInstanceOf(TestoEnum::class, $campo);
    }

    public function testTestoEnumValoreEnum(): void
    {
        $campo = new TestoEnum(true, TipoDocumento::class);
        $campo->set(TipoDocumento::TD01);
        $this->assertSame(TipoDocumento::TD01->value, $campo->get());
    }

    public function testTestoEnumValore(): void
    {
        $campo = new TestoEnum(true, TipoDocumento::class);
        $campo->set(TipoDocumento::TD01->value);
        $this->assertSame(TipoDocumento::TD01->value, $campo->get());
    }

    public function testTestoEnumVuoto(): void
    {
        $campo = new TestoEnum(true, TipoDocumento::class);
        $this->assertSame(null, $campo->get());
    }

    public function testTestoEnumErrore(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $campo = new TestoEnum(true, TipoDocumento::class);
        $this->assertSame(null, $campo->get());

        $campo->set('test');
    }
}
