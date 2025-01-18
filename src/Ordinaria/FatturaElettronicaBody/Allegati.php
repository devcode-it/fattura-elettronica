<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.5
 *
 * @name Allegati
 *
 * Dati relativi ad eventuali allegati
 *
 * Blocco relativo ai dati di eventuali allegati
 */
class Allegati extends Elemento
{
    protected Testo $NomeAttachment;
    protected Testo $AlgoritmoCompressione;
    protected Testo $FormatoAttachment;
    protected Testo $DescrizioneAttachment;
    protected Testo $Attachment;

    public function __construct()
    {
        parent::__construct(true);
        $this->NomeAttachment = new Testo(false, 1, 60, 1);
        $this->AlgoritmoCompressione = new Testo(true, 1, 10, 1);
        $this->FormatoAttachment = new Testo(true, 1, 10, 1);
        $this->DescrizioneAttachment = new Testo(true, 1, 100, 1);
        $this->Attachment = new Testo(false, 0, null, 1);
    }

    public function getNomeAttachment(): ?string
    {
        return $this->NomeAttachment->get();
    }

    public function setNomeAttachment(?string $value)
    {
        $this->NomeAttachment->set($value);

        return $this;
    }

    public function getAlgoritmoCompressione(): ?string
    {
        return $this->AlgoritmoCompressione->get();
    }

    public function setAlgoritmoCompressione(?string $value)
    {
        $this->AlgoritmoCompressione->set($value);

        return $this;
    }

    public function getFormatoAttachment(): ?string
    {
        return $this->FormatoAttachment->get();
    }

    public function setFormatoAttachment(?string $value)
    {
        $this->FormatoAttachment->set($value);

        return $this;
    }

    public function getDescrizioneAttachment(): ?string
    {
        return $this->DescrizioneAttachment->get();
    }

    public function setDescrizioneAttachment(?string $value)
    {
        $this->DescrizioneAttachment->set($value);

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->Attachment->get();
    }

    public function setAttachment(?string $value)
    {
        $this->Attachment->set($value);

        return $this;
    }
}
