<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiContratto;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiConvenzione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiDDT;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiFattureCollegate;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiGeneraliDocumento;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiOrdineAcquisto;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiRicezione;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiSAL;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\DatiTrasporto;
use DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali\FatturaPrincipale;
use DevCode\FatturaElettronica\Standard\Collezione;
use DevCode\FatturaElettronica\Standard\Elemento;

/*
* Blocco sempre obbligatorio contenente i dati generali della fattura e quelli degli eventuali documenti correlati
*/
class DatiGenerali extends Elemento
{
    protected DatiGeneraliDocumento $DatiGeneraliDocumento;
    protected Collezione $DatiOrdineAcquisto;
    protected Collezione $DatiContratto;
    protected Collezione $DatiConvenzione;
    protected Collezione $DatiRicezione;
    protected Collezione $DatiFattureCollegate;
    protected Collezione $DatiSAL;
    protected Collezione $DatiDDT;
    protected DatiTrasporto $DatiTrasporto;
    protected FatturaPrincipale $FatturaPrincipale;

    public function __construct()
    {
        parent::__construct(false);
        $this->DatiGeneraliDocumento = new DatiGeneraliDocumento();
        $this->DatiOrdineAcquisto = new Collezione(DatiOrdineAcquisto::class, 0);
        $this->DatiContratto = new Collezione(DatiContratto::class, 0);
        $this->DatiConvenzione = new Collezione(DatiConvenzione::class, 0);
        $this->DatiRicezione = new Collezione(DatiRicezione::class, 0);
        $this->DatiFattureCollegate = new Collezione(DatiFattureCollegate::class, 0);
        $this->DatiSAL = new Collezione(DatiSAL::class, 0);
        $this->DatiDDT = new Collezione(DatiDDT::class, 0);
        $this->DatiTrasporto = new DatiTrasporto();
        $this->FatturaPrincipale = new FatturaPrincipale();
    }

    public function getDatiGeneraliDocumento(): DatiGeneraliDocumento
    {
        return $this->DatiGeneraliDocumento;
    }

    public function setDatiGeneraliDocumento(DatiGeneraliDocumento $DatiGeneraliDocumento)
    {
        $this->DatiGeneraliDocumento = $DatiGeneraliDocumento;

        return $this;
    }

    public function getDatiOrdineAcquisto(): Collezione
    {
        return $this->DatiOrdineAcquisto;
    }

    public function getAllDatiOrdineAcquisto(): array
    {
        return $this->DatiOrdineAcquisto->toList();
    }

    public function addDatiOrdineAcquisto(DatiOrdineAcquisto $elemento)
    {
        $this->DatiOrdineAcquisto->add($elemento);

        return $this;
    }

    public function removeDatiOrdineAcquisto(int $index)
    {
        $this->DatiOrdineAcquisto->remove($index);

        return $this;
    }

    public function getDatiContratto(): Collezione
    {
        return $this->DatiContratto;
    }

    public function getAllDatiContratto(): array
    {
        return $this->DatiContratto->toList();
    }

    public function addDatiContratto(DatiContratto $elemento)
    {
        $this->DatiContratto->add($elemento);

        return $this;
    }

    public function removeDatiContratto(int $index)
    {
        $this->DatiContratto->remove($index);

        return $this;
    }

    public function getDatiConvenzione(): Collezione
    {
        return $this->DatiConvenzione;
    }

    public function getAllDatiConvenzione(): array
    {
        return $this->DatiConvenzione->toList();
    }

    public function addDatiConvenzione(DatiConvenzione $elemento)
    {
        $this->DatiConvenzione->add($elemento);

        return $this;
    }

    public function removeDatiConvenzione(int $index)
    {
        $this->DatiConvenzione->remove($index);

        return $this;
    }

    public function getDatiRicezione(): Collezione
    {
        return $this->DatiRicezione;
    }

    public function getAllDatiRicezione(): array
    {
        return $this->DatiRicezione->toList();
    }

    public function addDatiRicezione(DatiRicezione $elemento)
    {
        $this->DatiRicezione->add($elemento);

        return $this;
    }

    public function removeDatiRicezione(int $index)
    {
        $this->DatiRicezione->remove($index);

        return $this;
    }

    public function getDatiFattureCollegate(): Collezione
    {
        return $this->DatiFattureCollegate;
    }

    public function getAllDatiFattureCollegate(): array
    {
        return $this->DatiFattureCollegate->toList();
    }

    public function addDatiFattureCollegate(DatiFattureCollegate $elemento)
    {
        $this->DatiFattureCollegate->add($elemento);

        return $this;
    }

    public function removeDatiFattureCollegate(int $index)
    {
        $this->DatiFattureCollegate->remove($index);

        return $this;
    }

    public function getDatiSAL(): Collezione
    {
        return $this->DatiSAL;
    }

    public function getAllDatiSAL(): array
    {
        return $this->DatiSAL->toList();
    }

    public function addDatiSAL(DatiSAL $elemento)
    {
        $this->DatiSAL->add($elemento);

        return $this;
    }

    public function removeDatiSAL(int $index)
    {
        $this->DatiSAL->remove($index);

        return $this;
    }

    public function getDatiDDT(): Collezione
    {
        return $this->DatiDDT;
    }

    public function getAllDatiDDT(): array
    {
        return $this->DatiDDT->toList();
    }

    public function addDatiDDT(DatiDDT $elemento)
    {
        $this->DatiDDT->add($elemento);

        return $this;
    }

    public function removeDatiDDT(int $index)
    {
        $this->DatiDDT->remove($index);

        return $this;
    }

    public function getDatiTrasporto(): DatiTrasporto
    {
        return $this->DatiTrasporto;
    }

    public function setDatiTrasporto(DatiTrasporto $DatiTrasporto)
    {
        $this->DatiTrasporto = $DatiTrasporto;

        return $this;
    }

    public function getFatturaPrincipale(): FatturaPrincipale
    {
        return $this->FatturaPrincipale;
    }

    public function setFatturaPrincipale(FatturaPrincipale $FatturaPrincipale)
    {
        $this->FatturaPrincipale = $FatturaPrincipale;

        return $this;
    }
}
