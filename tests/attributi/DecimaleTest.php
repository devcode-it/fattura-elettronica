<?php

declare(strict_types=1);

use DevCode\FatturaElettronica\Standard\Decimale;
use PHPUnit\Framework\TestCase;

final class DecimaleTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new Decimale(true);

        $this->assertInstanceOf(Decimale::class, $campo);
    }

    public function testDecimale(): void
    {
        $campo = new Decimale(true);
        $campo->set(1);
        $this->assertSame(1.0, $campo->get());
        $this->assertSame('1.00', $campo->__toString());

        $campo->set(1.678122);
        $this->assertSame(1.678122, $campo->get());
        $this->assertSame('1.68', $campo->__toString());
    }

    public function testCambioDecimali(): void
    {
        $campo = new Decimale(true, 1, 1, 999);
        $campo->set(1000);
        $this->assertSame('1000.0', $campo->__toString());

        $campo->set(1.678122, 5);
        $this->assertSame(1.678122, $campo->get());
        $this->assertSame('1.67812', $campo->__toString());
    }
}
