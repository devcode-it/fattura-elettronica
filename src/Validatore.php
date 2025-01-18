<?php

namespace DevCode\FatturaElettronica;

class Validatore
{
    public array $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validator($xml, $schema): bool
    {
        if ('' === trim($xml)) {
            throw new \InvalidArgumentException(sprintf('File %s does not contain valid XML, it is empty.', $xml));
        }

        $internalErrors = libxml_use_internal_errors(true);

        // $disableEntities = libxml_disable_entity_loader(true);
        libxml_clear_errors();

        $dom = new \DOMDocument();
        $dom->validateOnParse = true;
        if (!$dom->loadXML($xml, LIBXML_NONET | (defined('LIBXML_COMPACT') ? LIBXML_COMPACT : 0))) {
            // libxml_disable_entity_loader($disableEntities);
            $this->errors = $this->getXmlErrors($internalErrors);

            return false;
        }

        $dom->normalizeDocument();

        libxml_use_internal_errors($internalErrors);
        // libxml_disable_entity_loader($disableEntities);

        foreach ($dom->childNodes as $child) {
            if ($child->nodeType === XML_DOCUMENT_TYPE_NODE) {
                throw new \InvalidArgumentException('Document types are not allowed.');
            }
        }

        if (null !== $schema) {
            $internalErrors = libxml_use_internal_errors(true);
            libxml_clear_errors();

            $e = null;
            if (!is_array($schema) && is_file((string) $schema)) {
                $valid = @$dom->schemaValidate($schema);
            } else {
                libxml_use_internal_errors($internalErrors);

                throw new \InvalidArgumentException('The schema argument has to be a valid path to XSD file or callable.');
            }

            if (!$valid) {
                $this->errors = $this->getXmlErrors($internalErrors);

                return false;
            }
        }

        libxml_clear_errors();
        libxml_use_internal_errors($internalErrors);

        return true;
    }

    public function isValid()
    {
        return !$this->getErrors();
    }

    private function getXmlErrors($internalErrors)
    {
        $errors = [];
        foreach (libxml_get_errors() as $error) {
            $errors[] = $error;
        }

        libxml_clear_errors();
        libxml_use_internal_errors($internalErrors);

        return $errors;
    }
}
