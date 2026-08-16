<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\traits;

use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\stringmanagement\PathUtils;
use SimpleXMLElement;

trait HandlesXmlTests
{
    /**
     * @var InvoiceSuiteAbstractDocumentFormatBuilder|InvoiceSuiteDocumentBuilder
     */
    protected static $document;

    /**
     * Cache for latest rendered XML
     *
     * @var SimpleXMLElement
     */
    protected $latestXml;

    /**
     * Dont render xml content
     *
     * @var bool
     */
    protected $renderingOfXmlDisabled = false;

    /**
     * Custom namespaces
     *
     * @var array<string,string>
     */
    protected $customXmlNamespaces = [];

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->enableRenderXmlContent();
    }

    /**
     * Helper for writing the XML to a file
     *
     * @return void
     */
    public function debugWriteFile(): void
    {
        file_put_contents(
            PathUtils::combinePathWithFile(PathUtils::combineAllPaths(__DIR__, '..', '..'), 'myfile_dbg.xml'),
            static::$document->getContent()
        );
    }

    /**
     * Get XML-Object from documents content
     *
     * @return SimpleXMLElement
     */
    protected function getXml(): SimpleXMLElement
    {
        if (false === $this->renderingOfXmlDisabled || null === $this->latestXml) {
            $this->latestXml = new SimpleXMLElement(static::$document->getContent());
            $this->registerAllNamespaces($this->latestXml);
        }

        return $this->latestXml;
    }

    /**
     * Disable rendering of test content
     *
     * @return void
     */
    protected function disableRenderXmlContent()
    {
        $this->latestXml = new SimpleXMLElement(static::$document->getContent());
        $this->registerAllNamespaces($this->latestXml);
        $this->renderingOfXmlDisabled = true;
    }

    /**
     * Enable rendering of test content
     *
     * @return void
     */
    protected function enableRenderXmlContent()
    {
        $this->renderingOfXmlDisabled = false;
    }

    /**
     * Assert a xpath with $expected value
     *
     * @param  string $xpath
     * @param  string $expected
     * @return void
     */
    protected function assertXPathValue(
        string $xpath,
        string $expected
    ): void {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey(0, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[0]);
    }

    /**
     * Assert a xpath with a value starting with $expected
     *
     * @param  string $xpath
     * @param  string $expected
     * @return void
     */
    protected function assertXPathValueStartsWith(
        string $xpath,
        string $expected
    ): void {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey(0, $xmlvalue);
        $this->assertEquals($expected, substr((string) $xmlvalue[0], 0, strlen($expected)));
    }

    /**
     * Test that an xml element does not exist
     *
     * @param  string $xpath
     * @return void
     */
    protected function assertXPathExists(
        string $xpath
    ) {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertNotEmpty($xmlvalue);
    }

    /**
     * Test that an xml element does not exist
     *
     * @param  string $xpath
     * @return void
     */
    protected function assertXPathNotExists(
        string $xpath
    ) {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertEmpty($xmlvalue);
    }

    /**
     * Register all namespaces on the document root.
     * The default namespace receives prefix "ns".
     *
     * @param  SimpleXMLElement $xml
     * @return void
     */
    private function registerAllNamespaces(
        SimpleXMLElement $xml
    ): void {
        $ns = $xml->getDocNamespaces(true);
        foreach ($ns as $prefix => $uri) {
            $xml->registerXPathNamespace('' !== $prefix ? $prefix : 'ns', $uri);
        }

        foreach ($this->customXmlNamespaces as $prefix => $uri) {
            $xml->registerXPathNamespace($prefix, $uri);
        }
    }

    /**
     * Register a custom namespace
     *
     * @param  string $prefix
     * @param  string $uri
     * @return void
     */
    private function registerCustomNamespace(
        string $prefix,
        string $uri
    ): void {
        $this->customXmlNamespaces[$prefix] = $uri;
    }

    /**
     * Assert that XML was not changed by a call to $code
     *
     * @param  callable $code
     * @return void
     */
    private function assertXmlWasNotChanged(
        $code
    ): void {
        $previousXml = static::$document->getContent();

        call_user_func($code);

        $currentXml = static::$document->getContent();

        $this->assertEquals($previousXml, $currentXml, 'Nothing should be added to XML');
    }
}
