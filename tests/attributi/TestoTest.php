<?php

declare(strict_types=1);

use DevCode\FatturaElettronica\Standard\Testo;
use PHPUnit\Framework\TestCase;

final class TestoTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new Testo(true, 0, 20);

        $this->assertInstanceOf(Testo::class, $campo);
    }

    public function testTestoValore(): void
    {
        $campo = new Testo(true, 0, 20);
        $campo->set('test');
        $this->assertSame('test', $campo->get());
    }

    public function testTestoVuoto(): void
    {
        $campo = new Testo(true, 0, 20);
        $this->assertSame(null, $campo->get());
    }

    public function testTestoErroreMinimo(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $campo = new Testo(true, 20, 20, 1);
        $this->assertSame(null, $campo->get());

        $campo->set('test');
    }

    public function testTestoErroreMassimo(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $campo = new Testo(true, 20, 20, 1);
        $this->assertSame(null, $campo->get());

        $campo->set('testtesttesttesttesttesttest');
    }

    public function testTestoReplica(): void
    {
        $campo = new Testo(true, 20, 20, null);
        $this->assertSame(null, $campo->get());

        $campo->set('testtesttesttesttesttesttest');
        $this->assertSame('testtesttesttesttesttesttest', $campo->get());

        $this->assertSame(['testtesttesttesttest', 'testtest'], $campo->toArray());
    }
}
