<?php

declare(strict_types=1);

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use PHPUnit\Framework\TestCase;

final class DataTest extends TestCase
{
    public function testInit(): void
    {
        $campo = new Data(true, 'Y-m-d');

        $this->assertInstanceOf(Data::class, $campo);
    }

    public function testDataStringaDateTime(): void
    {
        $data = date('Y-m-d\TH:i:s');

        $campo = new Data(true, 'Y-m-d');
        $campo->set($data);
        $this->assertSame(substr($data, 0, 10), $campo->get());
    }

    public function testDataStringaDate(): void
    {
        $data = date('Y-m-d');

        $campo = new Data(true, 'Y-m-d');
        $campo->set($data);
        $this->assertSame($campo->get(), substr($data, 0, 10));
    }

    public function testDataOggettoDateTime(): void
    {
        $currentDateTime = new DateTime('now');

        $campo = new Data(true, 'Y-m-d');
        $campo->set($currentDateTime);
        $this->assertSame($currentDateTime->format('Y-m-d'), $campo->get());
    }

    public function testDataOggettoCarbon(): void
    {
        $currentDateTime = Carbon::now();

        $campo = new Data(true, 'Y-m-d');
        $campo->set($currentDateTime);
        $this->assertSame($currentDateTime->format('Y-m-d'), $campo->get());
    }

    public function testDataCompletaStringaDateTime(): void
    {
        $data = date('Y-m-d\TH:i:s');

        $campo = new Data(true, 'Y-m-d\TH:i:s');
        $campo->set($data);
        $this->assertSame($data, $campo->get());
    }

    public function testDataCompletaStringaDate(): void
    {
        $data = date('Y-m-d');

        $campo = new Data(true, 'Y-m-d\TH:i:s');
        $campo->set($data);
        $this->assertSame($data.'T00:00:00', $campo->get());
    }

    public function testDataCompletaOggettoDateTime(): void
    {
        $currentDateTime = new DateTime('now');

        $campo = new Data(true, 'Y-m-d\TH:i:s');
        $campo->set($currentDateTime);
        $this->assertSame($currentDateTime->format('Y-m-d\TH:i:s'), $campo->get());
    }

    public function testDataCompletaOggettoCarbon(): void
    {
        $currentDateTime = Carbon::now();

        $campo = new Data(true, 'Y-m-d\TH:i:s');
        $campo->set($currentDateTime);
        $this->assertSame($currentDateTime->format('Y-m-d\TH:i:s'), $campo->get());
    }
}
