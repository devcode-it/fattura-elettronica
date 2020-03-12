<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use Dasc3er\FatturaElettronica\Common\ContattiTrasmittente;
use Dasc3er\FatturaElettronica\Common\IdFiscaleIva;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Collection;

class DatiTrasmissione extends ElementoFattura
{
    const FORMATO_PA = 'FPA12';
    const FORMATO_PRIVATO = 'FPR12';

    public IdFiscaleIva $IdTrasmittente;

    /** @var ContattiTrasmittente[] */
    public Collection $ContattiTrasmittente;

    protected string $ProgressivoInvio;

    protected string $FormatoTrasmissione;

    protected string $CodiceDestinatario;

    protected ?string $PECDestinatario;

    public function __construct(
        string $ProgressivoInvio,
        ?string $IdPaese = null,
        ?string $IdCodice = null,
        ?string $CodiceDestinatario = null,
        ?string $PECDestinatario = null,
        ?bool $is_pubblica_amministrazione = false
    ) {
        $this->IdTrasmittente = new IdFiscaleIva($IdPaese, $IdCodice);
        $this->ProgressivoInvio = $ProgressivoInvio;
        $this->CodiceDestinatario = $CodiceDestinatario ?: '0000000';
        $this->PECDestinatario = $PECDestinatario;

        $this->ContattiTrasmittente = new Collection(ContattiTrasmittente::class);

        $this->FormatoTrasmissione = $is_pubblica_amministrazione ? self::FORMATO_PA : self::FORMATO_PRIVATO;
    }

    public function addContattiTrasmittente(
        ?string $Telefono = null,
        ?string $Email = null
    ) {
        $this->ContattiTrasmittente->add(new ContattiTrasmittente($Telefono, $Email));
    }

    public function getProgressivoInvio(): string
    {
        return $this->ProgressivoInvio;
    }

    public function setProgressivoInvio(string $ProgressivoInvio): DatiTrasmissione
    {
        $this->ProgressivoInvio = $ProgressivoInvio;

        return $this;
    }

    public function getFormatoTrasmissione(): string
    {
        return $this->FormatoTrasmissione;
    }

    public function setFormatoTrasmissione(string $FormatoTrasmissione): DatiTrasmissione
    {
        $this->FormatoTrasmissione = $FormatoTrasmissione;

        return $this;
    }

    public function getCodiceDestinatario(): string
    {
        return $this->CodiceDestinatario;
    }

    public function setCodiceDestinatario(string $CodiceDestinatario): DatiTrasmissione
    {
        $this->CodiceDestinatario = $CodiceDestinatario;

        return $this;
    }

    public function getPECDestinatario(): ?string
    {
        return $this->PECDestinatario;
    }

    public function setPECDestinatario(?string $PECDestinatario): DatiTrasmissione
    {
        $this->PECDestinatario = $PECDestinatario;

        return $this;
    }

    public function getIdTrasmittente(): IdFiscaleIva
    {
        return $this->IdTrasmittente;
    }

    public function setIdTrasmittente(IdFiscaleIva $IdTrasmittente): DatiTrasmissione
    {
        $this->IdTrasmittente = $IdTrasmittente;

        return $this;
    }

    public function getContattiTrasmittente(): Collection
    {
        return $this->ContattiTrasmittente;
    }
}
