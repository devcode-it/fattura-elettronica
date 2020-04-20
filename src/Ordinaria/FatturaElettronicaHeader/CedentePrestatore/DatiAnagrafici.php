<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;

use DevCode\FatturaElettronica\Common\DatiAnagrafici as Original;
use DevCode\FatturaElettronica\Tabelle\RegimeFiscale;

class DatiAnagrafici extends Original
{
    protected ?string $RegimeFiscale;

    public static function build(
        ?string $CodiceFiscale = null,
        ?string $IdPaese = null,
        ?string $IdCodice = null,
        ?string $Denominazione = null,
        ?string $Nome = null,
        ?string $Cognome = null,
        ?string $RegimeFiscale = null
    ) {
        $element = parent::build($CodiceFiscale, $IdPaese, $IdCodice, $Denominazione, $Nome, $Cognome);

        $element->RegimeFiscale = $RegimeFiscale ?: RegimeFiscale::Ordinario;

        return $element;
    }

    public function isEmpty(): bool
    {
        return parent::isEmpty();
    }

    protected function getXmlTags(): iterable
    {
        $vars = parent::getXmlTags();

        // Fix ordine tag
        unset($vars['RegimeFiscale']);
        $vars['RegimeFiscale'] = $this->RegimeFiscale;

        return $vars;
    }
}
