<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\DatiTrasmissione;

use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/*
* Dati relativi ai contatti del trasmittente
*/
class ContattiTrasmittente extends Elemento
{
    protected Testo $Telefono;
    protected Testo $Email;

    public function __construct(?string $Telefono = null, ?string $Email = null)
    {
        parent::__construct(true);
        $this->Telefono = new Testo(true, 5, 12, 1);
        $this->Email = new Testo(true, 7, 256, 1);
        if (!is_null($Telefono)) {
            $this->setTelefono($Telefono);
        }
        if (!is_null($Email)) {
            $this->setEmail($Email);
        }
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono->get();
    }

    public function setTelefono(?string $value)
    {
        $this->Telefono->set($value);

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email->get();
    }

    public function setEmail(?string $value)
    {
        $this->Email->set($value);

        return $this;
    }
}
