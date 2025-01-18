<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiCassaPrevidenziale\Natura;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiCassaPrevidenziale\Ritenuta;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento\DatiCassaPrevidenziale\TipoCassa;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.1.1.7
 *
 * @name DatiCassaPrevidenziale
 *
 * Blocco dati relativi alla cassa professionale di appartenenza
 */
class DatiCassaPrevidenziale extends Elemento
{
    protected TestoEnum $TipoCassa;
    protected Decimale $AlCassa;
    protected Decimale $ImportoContributoCassa;
    protected Decimale $ImponibileCassa;
    protected Decimale $AliquotaIVA;
    protected TestoEnum $Ritenuta;
    protected TestoEnum $Natura;
    protected Testo $RiferimentoAmministrazione;

    public function __construct()
    {
        parent::__construct(true);
        $this->TipoCassa = new TestoEnum(false, TipoCassa::class);
        $this->AlCassa = new Decimale(false);
        $this->ImportoContributoCassa = new Decimale(false);
        $this->ImponibileCassa = new Decimale(true);
        $this->AliquotaIVA = new Decimale(false);
        $this->Ritenuta = new TestoEnum(true, Ritenuta::class);
        $this->Natura = new TestoEnum(true, Natura::class);
        $this->RiferimentoAmministrazione = new Testo(true, 1, 20, 1);
    }

    public function getTipoCassa(): ?string
    {
        return $this->TipoCassa->get();
    }

    public function setTipoCassa(TipoCassa|string $value)
    {
        $this->TipoCassa->set($value);

        return $this;
    }

    public function getAlCassa(): ?float
    {
        return $this->AlCassa->get();
    }

    public function setAlCassa(?float $value)
    {
        $this->AlCassa->set($value);

        return $this;
    }

    public function getImportoContributoCassa(): ?float
    {
        return $this->ImportoContributoCassa->get();
    }

    public function setImportoContributoCassa(?float $value)
    {
        $this->ImportoContributoCassa->set($value);

        return $this;
    }

    public function getImponibileCassa(): ?float
    {
        return $this->ImponibileCassa->get();
    }

    public function setImponibileCassa(?float $value)
    {
        $this->ImponibileCassa->set($value);

        return $this;
    }

    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value)
    {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getRitenuta(): ?string
    {
        return $this->Ritenuta->get();
    }

    public function setRitenuta(Ritenuta|string|null $value)
    {
        $this->Ritenuta->set($value);

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura->get();
    }

    public function setNatura(Natura|string|null $value)
    {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->RiferimentoAmministrazione->get();
    }

    public function setRiferimentoAmministrazione(?string $value)
    {
        $this->RiferimentoAmministrazione->set($value);

        return $this;
    }
}
