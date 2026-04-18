<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\fatturapa;

use Closure;
use DOMDocument;
use DOMElement;
use DOMXPath;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronica;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use z4kn4fein\SemVer\Version;

class InvoiceSuiteFatturaPaProvider extends InvoiceSuiteAbstractDocumentFormatProvider
{
    /**
     * Get the unique identificator for this provider
     *
     * @return string
     */
    public function getUniqueId(): string
    {
        return 'fatturapa';
    }

    /**
     * Returns the content type of the (invoice) document
     *
     * @return InvoiceSuiteContentType
     */
    public function getContentType(): InvoiceSuiteContentType
    {
        return InvoiceSuiteContentType::XML;
    }

    /**
     * Get a short description for the provider
     *
     * @return string
     */
    public function getDescription(): string
    {
        return 'Fatturazione Elettronica verso la Pubblica Amministrazione';
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): Version
    {
        return Version::create(0, 1, 0, 'alpha');
    }

    /**
     * Get parameters
     *
     * @return array<string,mixed>
     */
    public function getParameters(): array
    {
        return [];
    }

    /**
     * Get meta data directories
     *
     * @return array<string,string>
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * Get custom handlers
     *
     * @return array<int,string>
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuiteFatturaPaSerializerHandler::class,
        ];
    }

    /**
     * Get custom listeners
     *
     * @return array<string,Closure>
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * Get event subscribers
     *
     * @return array<int,string>
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * Get context groups
     *
     * @return array<string>
     */
    public function getSerializerGroups(): array
    {
        return ['fatturapa'];
    }

    /**
     * Returns true if the content matches the requirements for this format provider, otherwise false
     *
     * @param  string $serializedContent
     * @return bool
     */
    public function getSerializedContentMatchesScheme(
        string $serializedContent
    ): bool {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contentDomDocument = new DOMDocument();

            if (!$contentDomDocument->loadXML($serializedContent)) {
                return false;
            }

            $contentDomXPath = new DOMXPath($contentDomDocument);

            $contentDomDocumentRoot = $contentDomDocument->documentElement;

            if (!$contentDomDocumentRoot instanceof DOMElement) {
                return false;
            }

            $contentDomDocumentRootNs = $contentDomDocumentRoot->namespaceURI ?? '';

            if ('' !== $contentDomDocumentRootNs) {
                $contentDomXPath->registerNamespace('d', $contentDomDocumentRootNs);
            }

            $contentDomXPathQuery = ('' !== $contentDomDocumentRootNs)
                ? '//d:FatturaElettronica/FatturaElettronicaHeader'
                : '//FatturaElettronica/FatturaElettronicaHeader';

            $contentEntries = $contentDomXPath->query($contentDomXPathQuery);

            if (false === $contentEntries) {
                return false;
            }

            if (1 === $contentEntries->length) {
                return true;
            }
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }

    /**
     * Returns the classname of the root invoice-object
     *
     * @return string
     */
    public function getRootClassName(): string
    {
        return FatturaElettronica::class;
    }

    /**
     * Returns the reader classname for this format provider
     *
     * @return string
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteFatturaPaProviderReader::class;
    }

    /**
     * Returns the builder classname for this format provider
     *
     * @return string
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteFatturaPaProviderBuilder::class;
    }

    /**
     * Returns a list of valid PDF attachment filenames
     *
     * @return array<string>
     */
    public function getPdfAllowedAttachmentFilenames(): array
    {
        return [];
    }

    /**
     * Get the default PDF attachment filename
     *
     * @return string
     */
    public function getPdfDefaultAttachmentFilename(): string
    {
        return '';
    }

    /**
     * Returns the PDF constructor classname for this format provider
     *
     * @return string
     */
    public function getPdfConstructorClassName(): string
    {
        return '';
    }

    /**
     * Returns the full file name (including path) for the XSD schema that matches this provider.
     *
     * @return string
     */
    public function getValidationXsdFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, 'xsd'),
            'Schema_VFPR12_v1.2.3.xsd'
        );
    }
}
