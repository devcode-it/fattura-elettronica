<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Blocco obbligatorio, gli elementi informativi che lo compongono riepilogano le informazioni di dettaglio, aggregandole per aliquota IVA distinta oppure per aliquota IVA nulla e <Natura> distinta oppure, a parità di questi elementi, per valore distinto di <Esigbilità>
*/
class DatiRiepilogo extends Elemento {
    protected Decimale $AliquotaIVA;
	protected Testo $Natura;
	protected Decimale $SpeseAccessorie;
	protected Decimale $Arrotondamento;
	protected Decimale $ImponibileImporto;
	protected Decimale $Imposta;
	protected Testo $EsigibilitaIVA;
	protected Testo $RiferimentoNormativo;
    public function __construct(?float $AliquotaIVA = null, ?string $Natura = null, ?float $SpeseAccessorie = null, ?float $Arrotondamento = null, ?float $ImponibileImporto = null, ?float $Imposta = null, ?string $EsigibilitaIVA = null, ?string $RiferimentoNormativo = null) {
        $this->AliquotaIVA = new Decimale(false);
		$this->Natura = new Testo(true, 2, 4, 1);
		$this->SpeseAccessorie = new Decimale(true);
		$this->Arrotondamento = new Decimale(true);
		$this->ImponibileImporto = new Decimale(false);
		$this->Imposta = new Decimale(false);
		$this->EsigibilitaIVA = new Testo(true, 1, 1, 1);
		$this->RiferimentoNormativo = new Testo(true, 1, 100, 1);
        if (!is_null($AliquotaIVA)) $this->setAliquotaIVA($AliquotaIVA);
		if (!is_null($Natura)) $this->setNatura($Natura);
		if (!is_null($SpeseAccessorie)) $this->setSpeseAccessorie($SpeseAccessorie);
		if (!is_null($Arrotondamento)) $this->setArrotondamento($Arrotondamento);
		if (!is_null($ImponibileImporto)) $this->setImponibileImporto($ImponibileImporto);
		if (!is_null($Imposta)) $this->setImposta($Imposta);
		if (!is_null($EsigibilitaIVA)) $this->setEsigibilitaIVA($EsigibilitaIVA);
		if (!is_null($RiferimentoNormativo)) $this->setRiferimentoNormativo($RiferimentoNormativo);
    }
    
    public function getAliquotaIVA() : ?float {
        return $this->AliquotaIVA->get();
    }

    public function setAliquotaIVA(?float $value) {
        $this->AliquotaIVA->set($value);

        return $this;
    }

    public function getNatura() : ?string {
        return $this->Natura->get();
    }

    public function setNatura(?string $value) {
        $this->Natura->set($value);

        return $this;
    }

    public function getSpeseAccessorie() : ?float {
        return $this->SpeseAccessorie->get();
    }

    public function setSpeseAccessorie(?float $value) {
        $this->SpeseAccessorie->set($value);

        return $this;
    }

    public function getArrotondamento() : ?float {
        return $this->Arrotondamento->get();
    }

    public function setArrotondamento(?float $value) {
        $this->Arrotondamento->set($value);

        return $this;
    }

    public function getImponibileImporto() : ?float {
        return $this->ImponibileImporto->get();
    }

    public function setImponibileImporto(?float $value) {
        $this->ImponibileImporto->set($value);

        return $this;
    }

    public function getImposta() : ?float {
        return $this->Imposta->get();
    }

    public function setImposta(?float $value) {
        $this->Imposta->set($value);

        return $this;
    }

    public function getEsigibilitaIVA() : ?string {
        return $this->EsigibilitaIVA->get();
    }

    public function setEsigibilitaIVA(?string $value) {
        $this->EsigibilitaIVA->set($value);

        return $this;
    }

    public function getRiferimentoNormativo() : ?string {
        return $this->RiferimentoNormativo->get();
    }

    public function setRiferimentoNormativo(?string $value) {
        $this->RiferimentoNormativo->set($value);

        return $this;
    }
}
