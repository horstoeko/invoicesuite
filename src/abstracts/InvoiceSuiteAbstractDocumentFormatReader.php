<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\abstracts;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;
use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\contracts\InvoiceSuiteDocumentReaderContract;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContent;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;

/**
 * Class representing methods for a reader
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentFormatReader implements InvoiceSuiteDocumentReaderContract
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentRootObject;
    use HandlesDocumentSerializer;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $newProvider
     */
    public function __construct(InvoiceSuiteAbstractDocumentFormatProvider $newProvider)
    {
        $this->setCurrentDocumentFormatProvider($newProvider);
        $this->createAndInitDocumentSerializerByFormatProvider();
    }

    /**
     * Deserialize from content (will guess)
     *
     * @param  string $fromContent
     * @return InvoiceSuiteAbstractDocumentFormatReader
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
     * @param  string $fromContent
     * @return InvoiceSuiteAbstractDocumentFormatReader
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
     * @param  string $fromContent
     * @return InvoiceSuiteAbstractDocumentFormatReader
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
     * @param  string $fromContent
     * @param  string $contentType
     * @return InvoiceSuiteAbstractDocumentFormatReader
     * @throws RuntimeException
     */
    protected function deserializeFromContentByContentType(string $fromContent, string $contentType): self
    {
        $this->setDocumentRootObject(
            $this->documentSerializer->deserialize(
                $fromContent,
                $this->getCurrentDocumentFormatProvider()->getRootClassName(),
                $contentType,
                DeserializationContext::create()
            )
        );

        return $this;
    }
}
