<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class Anagrafica extends ElementoFattura
{
    protected ?string $Denominazione;

    protected ?string $Nome;

    protected ?string $Cognome;

    public static function build(
        ?string $Denominazione = null,
        ?string $Nome = null,
        ?string $Cognome = null
    ) {
        $element = new static();

        $element->Denominazione = $Denominazione;
        $element->Nome = $Nome;
        $element->Cognome = $Cognome;

        return $element;
    }

    public function getDenominazione(): ?string
    {
        return $this->Denominazione;
    }

    public function setDenominazione(?string $Denominazione): Anagrafica
    {
        $this->Denominazione = $Denominazione;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(?string $Nome): Anagrafica
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->Cognome;
    }

    public function setCognome(?string $Cognome): Anagrafica
    {
        $this->Cognome = $Cognome;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getXmlTags(): iterable
    {
        if (!empty($this->Denominazione)) {
            $this->Nome = null;
            $this->Cognome = null;
        }

        return parent::getXmlTags();
    }
}
