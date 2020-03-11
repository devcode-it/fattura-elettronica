<?php

namespace Dasc3er\FatturaElettronica\Common;

use Dasc3er\FatturaElettronica\ElementoFattura;

class ContattiTrasmittente extends ElementoFattura
{
    protected ?string $Telefono;

    protected ?string $Email;

    public function __construct(
        ?string $Telefono = null,
        ?string $Email = null
    ) {
        $this->Telefono = $Telefono;
        $this->Email = $Email;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(?string $Telefono): ContattiTrasmittente
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): ContattiTrasmittente
    {
        $this->Email = $Email;

        return $this;
    }
}
