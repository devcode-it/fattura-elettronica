<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Collection;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiContratto;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiConvenzione;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiDDT;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiSal;

class DatiGenerali extends ElementoFattura
{
    /** @var DatiGeneraliDocumento */
    public DatiGeneraliDocumento $DatiGeneraliDocumento;

    /** @var DatiContratto[] */
    public Collection $DatiContratto;

    /** @var DatiSal */
    public DatiSal $DatiSal;

    /** @var DatiConvenzione[] */
    public Collection $DatiConvenzione;

    /** @var DatiDDT[] */
    public Collection $DatiDDT;

    public function __construct()
    {
        parent::__construct();

        $this->DatiGeneraliDocumento = new DatiGeneraliDocumento();
        $this->DatiSal = new DatiSal();

        $this->DatiContratto = new Collection(DatiContratto::class);
        $this->DatiConvenzione = new Collection(DatiConvenzione::class);
        $this->DatiDDT = new Collection(DatiDDT::class);
    }

    public static function build(
        string $TipoDocumento,
        string $Data,
        string $Numero,
        ?float $ImportoTotaleDocumento = null,
        ?string $Divisa = null
    ) {
        $element = new static();
        $element->DatiGeneraliDocumento = DatiGeneraliDocumento::build($TipoDocumento, $Data, $Numero, $ImportoTotaleDocumento, $Divisa);

        return $element;
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
    public function getDatiContratto(): Collection
    {
        return $this->DatiContratto;
    }

    /**
     * @return DatiConvenzione[]
     */
    public function getDatiConvenzione(): Collection
    {
        return $this->DatiConvenzione;
    }

    /**
     * @return DatiDDT[]
     */
    public function getDatiDDT(): Collection
    {
        return $this->DatiDDT;
    }
}
