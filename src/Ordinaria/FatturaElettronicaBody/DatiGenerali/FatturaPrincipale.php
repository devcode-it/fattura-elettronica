<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;

use Carbon\Carbon;
use DevCode\FatturaElettronica\Standard\Data;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;

/**
 * @riferimento 2.1.10
 *
 * @name FatturaPrincipale
 *
 * Blocco da valorizzare nei casi di fatture per operazioni accessorie, emesse dagli 'autotrasportatori' per usufruire delle agevolazioni in materia di registrazione e pagamento dell' IVA
 */
class FatturaPrincipale extends Elemento
{
    protected Testo $NumeroFatturaPrincipale;
    protected Data $DataFatturaPrincipale;

    public function __construct()
    {
        parent::__construct(true);
        $this->NumeroFatturaPrincipale = new Testo(false, 1, 20, 1, "(\p{IsBasicLatin}{1,20})");
        $this->DataFatturaPrincipale = new Data(false, 'Y-m-d');
    }

    public function getNumeroFatturaPrincipale(): ?string
    {
        return $this->NumeroFatturaPrincipale->get();
    }

    public function setNumeroFatturaPrincipale(?string $value)
    {
        $this->NumeroFatturaPrincipale->set($value);

        return $this;
    }

    public function getDataFatturaPrincipale(): ?string
    {
        return $this->DataFatturaPrincipale->get();
    }

    public function setDataFatturaPrincipale(string|Carbon|\DateTime|null $value)
    {
        $this->DataFatturaPrincipale->set($value);

        return $this;
    }
}
