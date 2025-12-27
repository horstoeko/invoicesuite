<?php

namespace horstoeko\invoicesuite\tests\traits;

use horstoeko\stringmanagement\PathUtils;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use SimpleXMLElement;

trait HandlesCompatXmlTests
{
    /**
     * @var ZugferdDocumentBuilder
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
    protected function assertXPathValue(string $xpath, string $expected): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey(0, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[0]);
    }

    /**
     * Assert a xpath with $expected value in a multiple element resultset
     *
     * @param  string $xpath
     * @param  int    $index
     * @param  string $expected
     * @return void
     */
    protected function assertXPathValueWithIndex(string $xpath, int $index, string $expected): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[$index]);
    }

    /**
     * Assert a xpath with $expected value in a multiple element resultset
     *
     * @param  string $xpath
     * @param  int    $index
     * @param  string $expected
     * @return void
     */
    protected function assertXPathValueStartsWithIndex(string $xpath, int $index, string $expected): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
        $this->assertEquals($expected, substr((string) $xmlvalue[$index], 0, strlen($expected)));
    }

    /**
     * Assert a xpath with $expected value and an expected attribute value
     *
     * @param  string $xpath
     * @param  string $expected
     * @param  string $expectedAttribute
     * @param  string $expectedAttributeValue
     * @return void
     */
    protected function assertXPathValueWithAttribute(string $xpath, string $expected, string $expectedAttribute, string $expectedAttributeValue): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey(0, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[0]);
        $this->assertNotNull($xmlvalue[0]->attributes()[$expectedAttribute]);
        $this->assertNotNull($xmlvalue[0]->attributes()[$expectedAttribute][0]);
        $this->assertEquals($expectedAttributeValue, (string) $xmlvalue[0]->attributes()[$expectedAttribute][0]);
    }

    /**
     * Assert a xpath with $expected value in a multiple resule and an expected attribute value
     *
     * @param  string $xpath
     * @param  string $expected
     * @param  string $expectedAttribute
     * @param  string $expectedAttributeValue
     * @return void
     */
    protected function assertXPathValueWithIndexAndAttribute(string $xpath, int $index, string $expected, string $expectedAttribute, string $expectedAttributeValue): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[$index]);
        $this->assertNotNull($xmlvalue[$index]->attributes()[$expectedAttribute]);
        $this->assertNotNull($xmlvalue[$index]->attributes()[$expectedAttribute][0]);
        $this->assertEquals($expectedAttributeValue, (string) $xmlvalue[$index]->attributes()[$expectedAttribute][0]);
    }

    /**
     * Assert a xpath with $expected value in a multiple resule and an non-expected attribute value
     *
     * @param  string $xpath
     * @param  string $expected
     * @param  string $notExpectedAttribute
     * @return void
     */
    protected function assertXPathValueWithIndexAndNotWithAttribute(string $xpath, int $index, string $expected, string $notExpectedAttribute): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
        $this->assertEquals($expected, (string) $xmlvalue[$index]);
        $this->assertNull($xmlvalue[$index]->attributes()[$notExpectedAttribute]);
    }

    /**
     * Assert a xpath with $expected value in a multiple resule and an expected attribute value
     *
     * @param  string $xpath
     * @param  string $expected
     * @param  string $expectedAttribute
     * @param  string $expectedAttributeValue
     * @return void
     */
    protected function assertXPathValueStartsWithIndexAndAttribute(string $xpath, int $index, string $expected, string $expectedAttribute, string $expectedAttributeValue): void
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
        $this->assertEquals($expected, substr((string) $xmlvalue[$index], 0, strlen($expected)));
        $this->assertNotNull($xmlvalue[$index]->attributes()[$expectedAttribute]);
        $this->assertNotNull($xmlvalue[$index]->attributes()[$expectedAttribute][0]);
        $this->assertEquals($expectedAttributeValue, (string) $xmlvalue[$index]->attributes()[$expectedAttribute][0]);
    }

    /**
     * Test that an xml element does not exist
     *
     * @param  string $xpath
     * @return void
     */
    protected function assertXPathExists(string $xpath)
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertNotEmpty($xmlvalue);
    }

    /**
     * Test that an xml element exists at index
     *
     * @param  string $xpath
     * @param  int    $index
     * @return void
     */
    protected function assertXPathExistsWithIndex(string $xpath, int $index)
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayHasKey($index, $xmlvalue);
    }

    /**
     * Test that an xml element does not exist
     *
     * @param  string $xpath
     * @return void
     */
    protected function assertXPathNotExists(string $xpath)
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertEmpty($xmlvalue);
    }

    /**
     * Test that an xml element does not exist at index
     *
     * @param  string $xpath
     * @param  int    $index
     * @return void
     */
    protected function assertXPathNotExistsWithIndex(string $xpath, int $index)
    {
        $xml = $this->getXml();
        $xmlvalue = $xml->xpath($xpath);
        $this->assertArrayNotHasKey($index, $xmlvalue);
    }

    /**
     * Register all namespaces on the document root.
     * The default namespace receives prefix "ns".
     *
     * @param  SimpleXMLElement $xml
     * @return void
     */
    private function registerAllNamespaces(SimpleXMLElement $xml): void
    {
        $ns = $xml->getDocNamespaces(true);
        foreach ($ns as $prefix => $uri) {
            $xml->registerXPathNamespace('' !== $prefix ? $prefix : 'ns', $uri);
        }
    }

    /**
     * Assert that XML was not changed by a call to $code
     *
     * @param  callable $code
     * @return void
     */
    private function assertXmlWasNotChanged($code): void
    {
        $previousXml = static::$document->getContent();

        call_user_func($code);

        $currentXml = static::$document->getContent();

        $this->assertEquals($previousXml, $currentXml, 'Nothing should be added to XML');
    }
}
