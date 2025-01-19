<?php

declare(strict_types=1);

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici\IdFiscaleIVA;
use DevCode\FatturaElettronica\Standard\Collezione;
use PHPUnit\Framework\TestCase;

final class CollezioneTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new Collezione(IdFiscaleIVA::class, 0, 2);

        $this->assertInstanceOf(Collezione::class, $campo);
    }

    public function testAggiunta(): void
    {
        $campo = new Collezione(IdFiscaleIVA::class, 0, 2);
        $campo->add(new IdFiscaleIVA());
        $campo->add(new IdFiscaleIVA());

        $this->assertSame(2, count($campo->toArray()));

        $this->assertInstanceOf(IdFiscaleIVA::class, $campo->getElement(0));
        $this->assertInstanceOf(IdFiscaleIVA::class, $campo->getElement(1));
    }

    public function testRimozione(): void
    {
        $campo = new Collezione(IdFiscaleIVA::class, 0, 2);
        $campo->add(new IdFiscaleIVA());
        $campo->add(new IdFiscaleIVA());

        $this->assertSame(2, count($campo->toArray()));

        $campo->remove(0);

        $this->assertSame(1, count($campo->toArray()));
        $this->assertInstanceOf(IdFiscaleIVA::class, $campo->getElement(0));
    }
}
