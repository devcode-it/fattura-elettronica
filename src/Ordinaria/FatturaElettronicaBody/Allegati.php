<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati relativi ad eventuali allegati
*/
class Allegati extends Elemento {
    protected Testo $NomeAttachment;
	protected Testo $AlgoritmoCompressione;
	protected Testo $FormatoAttachment;
	protected Testo $DescrizioneAttachment;
	protected Testo $Attachment;
    public function __construct(?string $NomeAttachment = null, ?string $AlgoritmoCompressione = null, ?string $FormatoAttachment = null, ?string $DescrizioneAttachment = null, ?string $Attachment = null) {
        $this->NomeAttachment = new Testo(false, 1, 60, 1);
		$this->AlgoritmoCompressione = new Testo(true, 1, 10, 1);
		$this->FormatoAttachment = new Testo(true, 1, 10, 1);
		$this->DescrizioneAttachment = new Testo(true, 1, 100, 1);
		$this->Attachment = new Testo(false, 0, null, 1);
        if (!is_null($NomeAttachment)) $this->setNomeAttachment($NomeAttachment);
		if (!is_null($AlgoritmoCompressione)) $this->setAlgoritmoCompressione($AlgoritmoCompressione);
		if (!is_null($FormatoAttachment)) $this->setFormatoAttachment($FormatoAttachment);
		if (!is_null($DescrizioneAttachment)) $this->setDescrizioneAttachment($DescrizioneAttachment);
		if (!is_null($Attachment)) $this->setAttachment($Attachment);
    }
    
    public function getNomeAttachment() : ?string {
        return $this->NomeAttachment->get();
    }

    public function setNomeAttachment(?string $value) {
        $this->NomeAttachment->set($value);

        return $this;
    }

    public function getAlgoritmoCompressione() : ?string {
        return $this->AlgoritmoCompressione->get();
    }

    public function setAlgoritmoCompressione(?string $value) {
        $this->AlgoritmoCompressione->set($value);

        return $this;
    }

    public function getFormatoAttachment() : ?string {
        return $this->FormatoAttachment->get();
    }

    public function setFormatoAttachment(?string $value) {
        $this->FormatoAttachment->set($value);

        return $this;
    }

    public function getDescrizioneAttachment() : ?string {
        return $this->DescrizioneAttachment->get();
    }

    public function setDescrizioneAttachment(?string $value) {
        $this->DescrizioneAttachment->set($value);

        return $this;
    }

    public function getAttachment() : ?string {
        return $this->Attachment->get();
    }

    public function setAttachment(?string $value) {
        $this->Attachment->set($value);

        return $this;
    }
}
