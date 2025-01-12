<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco dati relativi alla cassa professionale di appartenenza
*/
class DatiCassaPrevidenziale extends Elemento {
    protected Testo $TipoCassa;
	protected Decimale $AlCassa;
	protected Decimale $ImportoContributoCassa;
	protected Decimale $ImponibileCassa;
	protected Decimale $AliquotaIVA;
	protected Testo $Ritenuta;
	protected Testo $Natura;
	protected Testo $RiferimentoAmministrazione;
    public function __construct(?string $TipoCassa = null, ?float $AlCassa = null, ?float $ImportoContributoCassa = null, ?float $ImponibileCassa = null, ?float $AliquotaIVA = null, ?string $Ritenuta = null, ?string $Natura = null, ?string $RiferimentoAmministrazione = null) {
        $this->TipoCassa = new Testo(false, 4, 4, 1);
		$this->AlCassa = new Decimale(false);
		$this->ImportoContributoCassa = new Decimale(false);
		$this->ImponibileCassa = new Decimale(true);
		$this->AliquotaIVA = new Decimale(false);
		$this->Ritenuta = new Testo(true, 2, 2, 1);
		$this->Natura = new Testo(true, 2, 4, 1);
		$this->RiferimentoAmministrazione = new Testo(true, 1, 20, 1);
        if (!is_null($TipoCassa)) $this->setTipoCassa($TipoCassa);
		if (!is_null($AlCassa)) $this->setAlCassa($AlCassa);
		if (!is_null($ImportoContributoCassa)) $this->setImportoContributoCassa($ImportoContributoCassa);
		if (!is_null($ImponibileCassa)) $this->setImponibileCassa($ImponibileCassa);
		if (!is_null($AliquotaIVA)) $this->setAliquotaIVA($AliquotaIVA);
		if (!is_null($Ritenuta)) $this->setRitenuta($Ritenuta);
		if (!is_null($Natura)) $this->setNatura($Natura);
		if (!is_null($RiferimentoAmministrazione)) $this->setRiferimentoAmministrazione($RiferimentoAmministrazione);
    }
    
    public function getTipoCassa() : ?string {
        return $this->TipoCassa->get();
    }

    public function setTipoCassa(?string $value) {
        $this->TipoCassa->set($value);

        return $this;
    }

    public function getAlCassa() : ?float {
        return $this->AlCassa->get();
    }

    public function setAlCassa(?float $value) {
        $this->AlCassa->set($value);

        return $this;
    }

    public function getImportoContributoCassa() : ?float {
        return $this->ImportoContributoCassa->get();
    }

    public function setImportoContributoCassa(?float $value) {
        $this->ImportoContributoCassa->set($value);

        return $this;
    }

    public function getImponibileCassa() : ?float {
        return $this->ImponibileCassa->get();
    }

    public function setImponibileCassa(?float $value) {
        $this->ImponibileCassa->set($value);

        return $this;
    }

    public function getAliquotaIVA() : ?float {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value) {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getRitenuta() : ?string {
        return $this->Ritenuta->get();
    }

    public function setRitenuta(?string $value) {
        $this->Ritenuta->set($value);

        return $this;
    }

    public function getNatura() : ?string {
        return $this->Natura->get();
    }

    public function setNatura(?string $value) {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoAmministrazione() : ?string {
        return $this->RiferimentoAmministrazione->get();
    }

    public function setRiferimentoAmministrazione(?string $value) {
        $this->RiferimentoAmministrazione->set($value);

        return $this;
    }
}
