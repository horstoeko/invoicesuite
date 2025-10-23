<?php

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProviderReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

class ZfFxExtendedProviderReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    protected static $document;

    public static function setUpBeforeClass(): void
    {
        self::$document = new InvoiceSuiteZfFxExtendedProviderReader(new InvoiceSuiteZfFxExtendedProvider());

        self::$document->deserializeFromContent(
            file_get_contents(
                InvoiceSuitePathUtils::combinePathWithFile(
                    InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets"),
                    "02_technical_xml_zffx_extended.xml"
                )
            )
        );
    }

    public function testGetDocumentNo(): void
    {
        self::$document->getDocumentNo($newDocumentNo);

        $this->assertSame('2025-04-000001', $newDocumentNo);
    }

    public function testGetDocumentType(): void
    {
        self::$document->getDocumentType($newDocumentType);

        $this->assertSame('380', $newDocumentType);
    }
}
