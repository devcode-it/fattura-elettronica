<?php

namespace DevCode\FatturaElettronica\Ordinaria;

use DevCode\FatturaElettronica\Common\Allegati;
use DevCode\FatturaElettronica\ElementoFattura;
use DevCode\FatturaElettronica\Fields\Collection;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiVeicoli;

class Body extends ElementoFattura
{
    /** @var DatiGenerali */
    protected DatiGenerali $DatiGenerali;

    /** @var DatiBeniServizi */
    protected DatiBeniServizi $DatiBeniServizi;

    /** @var DatiPagamento */
    protected DatiPagamento $DatiPagamento;

    /** @var Allegati[] */
    protected Collection $Allegati;

    /** @var DatiVeicoli */
    protected DatiVeicoli $DatiVeicoli;

    public function __construct()
    {
        parent::__construct();

        $this->DatiGenerali = new DatiGenerali();
        $this->DatiBeniServizi = new DatiBeniServizi();
        $this->DatiPagamento = new DatiPagamento();
        $this->DatiVeicoli = new DatiVeicoli();

        $this->Allegati = new Collection(Allegati::class);
    }

    public static function build(
        string $TipoDocumento,
        string $Data,
        string $Numero
    ) {
        $element = new static();
        $element->DatiGenerali = DatiGenerali::build($TipoDocumento, $Data, $Numero);

        return $element;
    }

    public function getDatiGenerali(): DatiGenerali
    {
        return $this->DatiGenerali;
    }

    public function setDatiGenerali(DatiGenerali $DatiGenerali): Body
    {
        $this->DatiGenerali = $DatiGenerali;

        return $this;
    }

    public function getDatiBeniServizi(): DatiBeniServizi
    {
        return $this->DatiBeniServizi;
    }

    public function setDatiBeniServizi(DatiBeniServizi $DatiBeniServizi): Body
    {
        $this->DatiBeniServizi = $DatiBeniServizi;

        return $this;
    }

    public function getDatiPagamento(): DatiPagamento
    {
        return $this->DatiPagamento;
    }

    public function setDatiPagamento(DatiPagamento $DatiPagamento): Body
    {
        $this->DatiPagamento = $DatiPagamento;

        return $this;
    }

    public function getDatiVeicoli(): DatiVeicoli
    {
        return $this->DatiVeicoli;
    }

    public function setDatiVeicoli(DatiVeicoli $DatiVeicoli): Body
    {
        $this->DatiVeicoli = $DatiVeicoli;

        return $this;
    }

    /**
     * @return Allegati[]
     */
    public function getAllegati(): Collection
    {
        return $this->Allegati;
    }
}
