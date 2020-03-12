<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class Allegati extends ElementoFattura
{
    protected ?string $NomeAttachment;

    protected ?string $AlgoritmoCompressione;

    protected ?string $FormatoAttachment;

    protected ?string $DescrizioneAttachment;

    protected ?string $Attachment;

    public static function build(
        ?string $NomeAttachment = null,
        ?string $FormatoAttachment = null,
        ?string $DescrizioneAttachment = null,
        ?string $Attachment = null
    ) {
        $element = new static();

        $element->NomeAttachment = $NomeAttachment;
        $element->FormatoAttachment = $FormatoAttachment;
        $element->DescrizioneAttachment = $DescrizioneAttachment;
        $element->Attachment = $Attachment;

        return $element;
    }

    public function getNomeAttachment(): ?string
    {
        return $this->NomeAttachment;
    }

    public function setNomeAttachment(?string $NomeAttachment): Allegati
    {
        $this->NomeAttachment = $NomeAttachment;

        return $this;
    }

    public function getAlgoritmoCompressione(): ?string
    {
        return $this->AlgoritmoCompressione;
    }

    public function setAlgoritmoCompressione(?string $AlgoritmoCompressione): Allegati
    {
        $this->AlgoritmoCompressione = $AlgoritmoCompressione;

        return $this;
    }

    public function getFormatoAttachment(): ?string
    {
        return $this->FormatoAttachment;
    }

    public function setFormatoAttachment(?string $FormatoAttachment): Allegati
    {
        $this->FormatoAttachment = $FormatoAttachment;

        return $this;
    }

    public function getDescrizioneAttachment(): ?string
    {
        return $this->DescrizioneAttachment;
    }

    public function setDescrizioneAttachment(?string $DescrizioneAttachment): Allegati
    {
        $this->DescrizioneAttachment = $DescrizioneAttachment;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->Attachment;
    }

    public function setAttachment(?string $Attachment): Allegati
    {
        $this->Attachment = $Attachment;

        return $this;
    }
}
