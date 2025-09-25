<?php

namespace horstoeko\invoicesuite\abstracts;

use JMS\Serializer\SerializationContext;
use horstoeko\invoicesuite\concerns\HandlesRootObject;
use horstoeko\invoicesuite\concerns\HandlesSerializer;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\contracts\InvoiceSuiteDocumentBuilderContract;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;

/**
 * Class representing methods for a builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractFormatProviderBuilder implements InvoiceSuiteDocumentBuilderContract
{
    use HandlesCurrentFormatProvider;
    use HandlesRootObject;
    use HandlesSerializer;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider
     */
    public function __construct(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider)
    {
        $this->setCurrentFormatProvider($invoiceSuiteAbstractFormatProvider);
        $this->createAndInitSerializerByFormatProvider();
        $this->createAndInitRootObjectByFormatProvider();
    }

    /**
     * Get the content as XML string
     *
     * @return string
     */
    public function getContentAsXml(): string
    {
        return $this->getContentByType(InvoiceSuiteContentTypeResolver::XML);
    }

    /**
     * Get the content as JSON string
     *
     * @return string
     */
    public function getContentAsJson(): string
    {
        return $this->getContentByType(InvoiceSuiteContentTypeResolver::JSON);
    }

    /**
     * Get the content by type
     *
     * @return string
     */
    protected function getContentByType(string $contentType): string
    {
        return $this->serializer->serialize(
            $this->getRootObject(),
            $contentType,
            SerializationContext::create()->setGroups($this->getCurrentFormatProvider()->getSerializerGroups())
        );
    }

    /**
     * Save the XML content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsXmlFile(string $tofile): void
    {
        file_put_contents($tofile, $this->getContentAsXml());
    }

    /**
     * Save the JSON content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsJsonFile(string $tofile): void
    {
        file_put_contents($tofile, $this->getContentAsJson());
    }
}
