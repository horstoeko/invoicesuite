<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\abstracts;

use JMS\Serializer\SerializationContext;
use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
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
abstract class InvoiceSuiteAbstractDocumentFormatBuilder implements InvoiceSuiteDocumentBuilderContract
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
        $this->createAndInitDocumentRootObjectByFormatProvider();
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
        return $this->documentSerializer->serialize(
            $this->getDocumentRootObject(),
            $contentType,
            SerializationContext::create()->setGroups($this->getCurrentDocumentFormatProvider()->getSerializerGroups())
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
