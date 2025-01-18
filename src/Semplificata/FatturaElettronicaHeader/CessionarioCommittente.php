<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\AltriDatiIdentificativi;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaHeader\CessionarioCommittente\IdentificativiFiscali;
use DevCode\FatturaElettronica\Standard\Elemento;

/**
 * @riferimento 1.3
 *
 * @name CessionarioCommittente
 *
 * Blocco sempre obbligatorio contenente dati relativi al cessionario / committente (cliente)
 *
 * Blocco relativo ai dati del Cessionario / Committente
 */
class CessionarioCommittente extends Elemento
{
    protected IdentificativiFiscali $IdentificativiFiscali;
    protected AltriDatiIdentificativi $AltriDatiIdentificativi;

    public function __construct()
    {
        parent::__construct(false);
        $this->IdentificativiFiscali = new IdentificativiFiscali();
        $this->AltriDatiIdentificativi = new AltriDatiIdentificativi();
    }

    public function getIdentificativiFiscali(): IdentificativiFiscali
    {
        return $this->IdentificativiFiscali;
    }

    public function setIdentificativiFiscali(IdentificativiFiscali $IdentificativiFiscali)
    {
        $this->IdentificativiFiscali = $IdentificativiFiscali;

        return $this;
    }

    public function getAltriDatiIdentificativi(): AltriDatiIdentificativi
    {
        return $this->AltriDatiIdentificativi;
    }

    public function setAltriDatiIdentificativi(AltriDatiIdentificativi $AltriDatiIdentificativi)
    {
        $this->AltriDatiIdentificativi = $AltriDatiIdentificativi;

        return $this;
    }
}
