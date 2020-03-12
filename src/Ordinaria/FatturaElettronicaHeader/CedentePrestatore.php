<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use Dasc3er\FatturaElettronica\Common\Contatti;
use Dasc3er\FatturaElettronica\Common\Sede;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\DatiAnagrafici;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;

class CedentePrestatore extends ElementoFattura
{
    protected DatiAnagrafici $DatiAnagrafici;

    protected Sede $Sede;

    protected IscrizioneREA $IscrizioneREA;

    protected Contatti $Contatti;

    public function __construct()
    {
        parent::__construct();

        $this->DatiAnagrafici = new DatiAnagrafici();
        $this->Sede = new Sede();
        $this->Contatti = new Contatti();
        $this->IscrizioneREA = new IscrizioneRea();
    }

    public static function build(
        ?DatiAnagrafici $DatiAnagrafici = null,
        ?Sede $Sede = null,
        ?IscrizioneREA $IscrizioneREA = null
    ) {
        $element = new static();
        $element->DatiAnagrafici = $DatiAnagrafici;
        $element->Sede = $Sede ?: new Sede();
        $element->IscrizioneREA = $IscrizioneREA;

        return $element;
    }

    public function getDatiAnagrafici(): DatiAnagrafici
    {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici): CedentePrestatore
    {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }

    public function getSede(): Sede
    {
        return $this->Sede;
    }

    public function setSede(Sede $Sede): CedentePrestatore
    {
        $this->Sede = $Sede;

        return $this;
    }

    public function getIscrizioneREA(): IscrizioneREA
    {
        return $this->IscrizioneREA;
    }

    public function setIscrizioneREA(IscrizioneREA $IscrizioneREA): CedentePrestatore
    {
        $this->IscrizioneREA = $IscrizioneREA;

        return $this;
    }
}
