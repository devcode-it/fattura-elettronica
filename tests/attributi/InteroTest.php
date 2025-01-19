<?php

declare(strict_types=1);

use DevCode\FatturaElettronica\Standard\Intero;
use PHPUnit\Framework\TestCase;

final class InteroTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new Intero(true);

        $this->assertInstanceOf(Intero::class, $campo);
    }

    public function testIntero(): void
    {
        $campo = new Intero(true);
        $campo->set(1);
        $this->assertSame(1, $campo->get());
    }

    public function testDefault(): void
    {
        $campo = new Intero(true, 5, 999);
        $this->assertSame(null, $campo->get());

        $campo = new Intero(false, 5, 999);
        $this->assertSame(5, $campo->get());
    }

    public function testMax(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $campo = new Intero(true, 1, 999);
        $campo->set(1000);
    }

    public function testMin(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $campo = new Intero(true, 1, 999);
        $campo->set(-1);
    }
}
