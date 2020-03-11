<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class Sede extends ElementoFattura
{
    protected ?string $Indirizzo;

    protected ?string $NumeroCivico;

    protected ?string $CAP;

    protected ?string $Comune;

    protected ?string $Provincia;

    protected ?string $Nazione;

    public function __construct(
        ?string $Indirizzo = null,
        ?string $NumeroCivico = null,
        ?string $Comune = null,
        ?string $CAP = null,
        ?string $Provincia = null,
        ?string $Nazione = null
    ) {
        $this->Indirizzo = $Indirizzo;
        $this->NumeroCivico = $NumeroCivico;
        $this->Comune = $Comune;
        $this->CAP = $CAP;
        $this->Provincia = $Provincia;
        $this->Nazione = $Nazione;
    }

    public function getIndirizzo(): ?string
    {
        return $this->Indirizzo;
    }

    public function setIndirizzo(?string $Indirizzo): Sede
    {
        $this->Indirizzo = $Indirizzo;

        return $this;
    }

    public function getNumeroCivico(): ?string
    {
        return $this->NumeroCivico;
    }

    public function setNumeroCivico(?string $NumeroCivico): Sede
    {
        $this->NumeroCivico = $NumeroCivico;

        return $this;
    }

    public function getCAP(): ?string
    {
        return $this->CAP;
    }

    public function setCAP(?string $CAP): Sede
    {
        $this->CAP = $CAP;

        return $this;
    }

    public function getComune(): ?string
    {
        return $this->Comune;
    }

    public function setComune(?string $Comune): Sede
    {
        $this->Comune = $Comune;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->Provincia;
    }

    public function setProvincia(?string $Provincia): Sede
    {
        $this->Provincia = $Provincia;

        return $this;
    }

    public function getNazione(): ?string
    {
        return $this->Nazione;
    }

    public function setNazione(?string $Nazione): Sede
    {
        $this->Nazione = $Nazione;

        return $this;
    }
}
