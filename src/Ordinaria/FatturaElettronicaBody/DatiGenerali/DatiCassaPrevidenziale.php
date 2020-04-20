<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\ElementoFattura;
use DevCode\FatturaElettronica\Fields\Decimal;

class DatiCassaPrevidenziale extends ElementoFattura
{
    protected ?string $TipoCassa;

    protected Decimal $AlCassa;

    protected Decimal $ImportoContributoCassa;

    protected Decimal $ImponibileCassa;

    protected Decimal $AliquotaIVA;

    protected ?string $Ritenuta;

    protected ?string $Natura;

    protected ?string $RiferimentoAmministrazione;

    public function __construct()
    {
        parent::__construct();

        $this->AlCassa = new Decimal(2);
        $this->ImportoContributoCassa = new Decimal(2);
        $this->ImponibileCassa = new Decimal(2);
        $this->AliquotaIVA = new Decimal(2);
    }

    public static function build(
        ?string $TipoCassa = null,
        ?float $AlCassa = null,
        ?float $ImportoContributoCassa = null,
        ?float $ImponibileCassa = null,
        ?float $AliquotaIVA = null,
        ?string $Ritenuta = null,
        ?string $Natura = null,
        ?string $RiferimentoAmministrazione = null
    ) {
        $element = new static();

        $element->TipoCassa = $TipoCassa;
        $element->Ritenuta = $Ritenuta;
        $element->Natura = $Natura;
        $element->RiferimentoAmministrazione = $RiferimentoAmministrazione;

        $element->AlCassa = $AlCassa;
        $element->ImportoContributoCassa = $ImportoContributoCassa;
        $element->ImponibileCassa = $ImponibileCassa;
        $element->AliquotaIVA = $AliquotaIVA;

        return $element;
    }

    public function getTipoCassa(): ?string
    {
        return $this->TipoCassa;
    }

    public function setTipoCassa(?string $TipoCassa): DatiCassaPrevidenziale
    {
        $this->TipoCassa = $TipoCassa;

        return $this;
    }

    public function getAlCassa(): ?float
    {
        return $this->AlCassa->get();
    }

    public function setAlCassa(?float $AlCassa): DatiCassaPrevidenziale
    {
        $this->AlCassa->set($AlCassa);

        return $this;
    }

    public function getImportoContributoCassa(): ?float
    {
        return $this->ImportoContributoCassa->get();
    }

    public function setImportoContributoCassa(?float $ImportoContributoCassa): DatiCassaPrevidenziale
    {
        $this->ImportoContributoCassa->set($ImportoContributoCassa);

        return $this;
    }

    public function getImponibileCassa(): ?float
    {
        return $this->ImponibileCassa->get();
    }

    public function setImponibileCassa(?float $ImponibileCassa): DatiCassaPrevidenziale
    {
        $this->ImponibileCassa->set($ImponibileCassa);

        return $this;
    }

    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $AliquotaIVA): DatiCassaPrevidenziale
    {
        $this->AliquotaIVA->set($AliquotaIVA);

        return $this;
    }

    public function getRitenuta(): ?string
    {
        return $this->Ritenuta;
    }

    public function setRitenuta(?string $Ritenuta): DatiCassaPrevidenziale
    {
        $this->Ritenuta = $Ritenuta;

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura;
    }

    public function setNatura(?string $Natura): DatiCassaPrevidenziale
    {
        $this->Natura = $Natura;

        return $this;
    }

    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->RiferimentoAmministrazione;
    }

    public function setRiferimentoAmministrazione(?string $RiferimentoAmministrazione): DatiCassaPrevidenziale
    {
        $this->RiferimentoAmministrazione = $RiferimentoAmministrazione;

        return $this;
    }
}
