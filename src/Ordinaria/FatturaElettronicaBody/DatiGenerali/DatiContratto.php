<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use DevCode\FatturaElettronica\Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco contenente le informazioni relative al contratto; contiene gli stessi elementi informativi previsti per il blocco 2.1.2
*/
class DatiContratto extends Elemento {
    protected int $RiferimentoNumeroLinea;
	protected Testo $IdDocumento;
	protected Data $Data;
	protected Testo $NumItem;
	protected Testo $CodiceCommessaConvenzione;
	protected Testo $CodiceCUP;
	protected Testo $CodiceCIG;
    public function __construct(?int $RiferimentoNumeroLinea = null, ?string $IdDocumento = null, null|string|Carbon|\DateTime $Data = null, ?string $NumItem = null, ?string $CodiceCommessaConvenzione = null, ?string $CodiceCUP = null, ?string $CodiceCIG = null) {
        $this->RiferimentoNumeroLinea = 0;
		$this->IdDocumento = new Testo(false, 1, 20, 1);
		$this->Data = new Data(true);
		$this->NumItem = new Testo(true, 1, 20, 1);
		$this->CodiceCommessaConvenzione = new Testo(true, 1, 100, 1);
		$this->CodiceCUP = new Testo(true, 1, 15, 1);
		$this->CodiceCIG = new Testo(true, 1, 15, 1);
        if (!is_null($RiferimentoNumeroLinea)) $this->setRiferimentoNumeroLinea($RiferimentoNumeroLinea);
		if (!is_null($IdDocumento)) $this->setIdDocumento($IdDocumento);
		if (!is_null($Data)) $this->setData($Data);
		if (!is_null($NumItem)) $this->setNumItem($NumItem);
		if (!is_null($CodiceCommessaConvenzione)) $this->setCodiceCommessaConvenzione($CodiceCommessaConvenzione);
		if (!is_null($CodiceCUP)) $this->setCodiceCUP($CodiceCUP);
		if (!is_null($CodiceCIG)) $this->setCodiceCIG($CodiceCIG);
    }
    
    public function getRiferimentoNumeroLinea() : ?int {
        return $this->RiferimentoNumeroLinea;
    }

    public function setRiferimentoNumeroLinea(int $value) {
        $this->RiferimentoNumeroLinea = $value;

        return $this;
    }

    public function getIdDocumento() : ?string {
        return $this->IdDocumento->get();
    }

    public function setIdDocumento(?string $value) {
        $this->IdDocumento->set($value);

        return $this;
    }

    public function getData() : ?string {
        return $this->Data->get();
    }

    public function setData(null|string|Carbon|\DateTime $value) {
        $this->Data->set($value);

        return $this;
    }

    public function getNumItem() : ?string {
        return $this->NumItem->get();
    }

    public function setNumItem(?string $value) {
        $this->NumItem->set($value);

        return $this;
    }

    public function getCodiceCommessaConvenzione() : ?string {
        return $this->CodiceCommessaConvenzione->get();
    }

    public function setCodiceCommessaConvenzione(?string $value) {
        $this->CodiceCommessaConvenzione->set($value);

        return $this;
    }

    public function getCodiceCUP() : ?string {
        return $this->CodiceCUP->get();
    }

    public function setCodiceCUP(?string $value) {
        $this->CodiceCUP->set($value);

        return $this;
    }

    public function getCodiceCIG() : ?string {
        return $this->CodiceCIG->get();
    }

    public function setCodiceCIG(?string $value) {
        $this->CodiceCIG->set($value);

        return $this;
    }
}
