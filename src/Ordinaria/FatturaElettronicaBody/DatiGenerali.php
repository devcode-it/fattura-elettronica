<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiContratto;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiConvenzione;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiDdt;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiSal;

class DatiGenerali extends ElementoFattura
{
    /** @var DatiGeneraliDocumento */
    public DatiGeneraliDocumento $DatiGeneraliDocumento;

    /** @var DatiContratto[] */
    public iterable $DatiContratto = [];

    /** @var DatiSal */
    public DatiSal $DatiSal;

    /** @var DatiConvenzione[] */
    public iterable $DatiConvenzione = [];

    /** @var DatiDdt[] */
    public iterable $DatiDdt = [];

    public function __construct(
        string $TipoDocumento,
        string $Data,
        string $Numero,
        ?float $ImportoTotaleDocumento = null,
        ?string $Divisa = null
    ) {
        $this->DatiGeneraliDocumento = new DatiGeneraliDocumento($TipoDocumento, $Data, $Numero, $ImportoTotaleDocumento, $Divisa);
        $this->DatiSal = new DatiSal();

        $this->DatiContratto = [];
        $this->DatiConvenzione = [];
        $this->DatiDdt = [];
    }

    public function getDatiGeneraliDocumento(): DatiGeneraliDocumento
    {
        return $this->DatiGeneraliDocumento;
    }

    public function setDatiGeneraliDocumento(DatiGeneraliDocumento $DatiGeneraliDocumento): DatiGenerali
    {
        $this->DatiGeneraliDocumento = $DatiGeneraliDocumento;

        return $this;
    }

    public function getDatiSal(): DatiSal
    {
        return $this->DatiSal;
    }

    public function setDatiSal(DatiSal $DatiSal): DatiGenerali
    {
        $this->DatiSal = $DatiSal;

        return $this;
    }

    /**
     * @return DatiContratto[]
     */
    public function getDatiContratto(): iterable
    {
        return $this->DatiContratto;
    }

    /**
     * @return DatiConvenzione[]
     */
    public function getDatiConvenzione(): iterable
    {
        return $this->DatiConvenzione;
    }

    /**
     * @return DatiDdt[]
     */
    public function getDatiDdt(): iterable
    {
        return $this->DatiDdt;
    }
}
