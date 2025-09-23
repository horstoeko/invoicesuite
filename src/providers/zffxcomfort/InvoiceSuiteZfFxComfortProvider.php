<?php

namespace horstoeko\invoicesuite\providers\zffxcomfort;

use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;
use horstoeko\invoicesuite\models\zffxcomfort\rsm\CrossIndustryInvoice;

class InvoiceSuiteZfFxComfortProvider extends InvoiceSuiteAbstractFormatProvider
{
    /**
     * @inheritDoc
     */
    public function getUniqueId(): string
    {
        return 'zffxcomfort';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return 'The EN 16931 (COMFORT) profile completely maps the EN 16931-1 and focuses on the core elements ' .
            'of an electronic invoice.';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'ContextParameter' => 'urn:cen.eu:en16931:2017',
            'AlternativeContextParameters' => [],
            'PDFEmbeddable' => true,
            'PDFXmpName' => 'EN 16931',
            'PDFXmpVersion' => '1.0',
            'PDFXmlAttachmentFilename' => 'factur-x.xml',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerMetadataDirectories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuiteZfFxComfortSerializerHandler::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerListeners(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerSubscribers(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getSerializerGroups(): array
    {
        return ["zffx"];
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiableBy(string $content): bool
    {
        $prevUseInternalErrors = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $contextParameters = array_merge(
                [$this->getFormatProviderParameterValue('ContextParameter', '')],
                $this->getFormatProviderParameterValue('AlternativeContextParameters', '')
            );

            foreach ($contextParameters as $contextParameter) {
                $contentDomDocument = new \DOMDocument();
                $contentDomDocument->loadXML($content);
                $contentDomXPath = new \DOMXPath($contentDomDocument);
                $contentDomXPath->registerNamespace('rsm', 'urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100');
                $contentDomXPath->registerNamespace('ram', 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100');

                $contentQuery = sprintf(
                    "//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID[text()='%s']",
                    $contextParameter
                );

                $contentEntries = $contentDomXPath->query($contentQuery);

                if ($contentEntries === false) {
                    continue;
                }

                if ($contentEntries->length === 1) {
                    return true;
                }
            }
        } catch (\Throwable) {
            // Do nothing
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function getRootClassName(): string
    {
        return CrossIndustryInvoice::class;
    }

    /**
     * @inheritDoc
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuiteZfFxComfortProviderReader::class;
    }

    /**
     * @inheritDoc
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuiteZfFxComfortProviderBuilder::class;
    }
}
