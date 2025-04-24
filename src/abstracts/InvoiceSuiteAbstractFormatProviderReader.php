<?php

namespace horstoeko\invoicesuite\abstracts;

use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesRootObject;
use horstoeko\invoicesuite\concerns\HandlesSerializer;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing methods for a reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractFormatProviderReader
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
        $this->initSerializerByFormatProvider($this->getCurrentFormatProvider());
        $this->initRootObjectByFormatProvider($this->getCurrentFormatProvider());
    }

    /**
     * Deserialize from content (will guess)
     *
     * @param string $fromContent
     * @return InvoiceSuiteAbstractFormatProviderReader
     * @throws InvoiceSuiteUnknownContent
     */
    public function deserializeFromContent(string $fromContent): self
    {
        if (InvoiceSuiteContentTypeResolver::resolveContentType($fromContent) === InvoiceSuiteContentTypeResolver::JSON) {
            return $this->deserializeFromJsonContent($fromContent);
        }

        if (InvoiceSuiteContentTypeResolver::resolveContentType($fromContent) === InvoiceSuiteContentTypeResolver::XML) {
            return $this->deserializeFromXmlContent($fromContent);
        }

        throw new InvoiceSuiteUnknownContent();
    }

    /**
     * Read from XML content
     *
     * @param string $fromContent
     * @return InvoiceSuiteAbstractFormatProviderReader
     * @throws RuntimeException
     */
    protected function deserializeFromXmlContent(string $fromContent): self
    {
        $this->deserializeFromContentByContentType($fromContent, InvoiceSuiteContentTypeResolver::XML);

        return $this;
    }

    /**
     * Read from JSON content
     *
     * @param string $fromContent
     * @return InvoiceSuiteAbstractFormatProviderReader
     * @throws RuntimeException
     */
    protected function deserializeFromJsonContent(string $fromContent): self
    {
        $this->deserializeFromContentByContentType($fromContent, InvoiceSuiteContentTypeResolver::JSON);

        return $this;
    }

    /**
     * Read from content by type
     *
     * @param string $fromContent
     * @param string $contentType
     * @return InvoiceSuiteAbstractFormatProviderReader
     * @throws RuntimeException
     */
    protected function deserializeFromContentByContentType(string $fromContent, string $contentType): self
    {
        $this->setRootObject(
            $this->serializer->deserialize(
                $fromContent,
                $this->getCurrentFormatProvider()->getRootClassName(),
                $contentType,
                DeserializationContext::create()
            )
        );

        return $this;
    }
}
