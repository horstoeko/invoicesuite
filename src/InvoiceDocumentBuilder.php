<?php

namespace horstoeko\invoicesuite;

use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use JMS\Serializer\Exception\InvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing the document builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceDocumentBuilder
{
    use HandlesFormatProviders;
    use HandlesCurrentFormatProvider;

    /**
     * Create a new InvoiceDocumentBuilder instance for the given format provider
     *
     * @param string $formatProviderUniqueId
     * @return InvoiceDocumentBuilder
     */
    public static function createByProviderUniqueId(string $formatProviderUniqueId): self
    {
        return new static($formatProviderUniqueId);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $formatProviderUniqueId
     * @return InvoiceDocumentBuilder
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    final protected function __construct(string $formatProviderUniqueId)
    {
        $this->resolveAvailableFormatProviders();
        $this->setCurrentFormatProvider($this->findFormatProviderByUniqueIdOrFail($formatProviderUniqueId));
        $this->getCurrentFormatProvider()->initBuilder();
    }

    /**
     * Get the content as XML string
     *
     * @return string
     */
    public function getContentAsXml(): string
    {
        return $this->getCurrentFormatProvider()->getBuilder()->getContentAsXml();
    }

    /**
     * Get the content as JSON string
     *
     * @return string
     */
    public function getContentAsJson(): string
    {
        return $this->getCurrentFormatProvider()->getBuilder()->getContentAsJson();
    }

    /**
     * Save the XML content to a file
     *
     * @param string $tofile
     * @return void
     */
    public function saveAsXmlFile(string $tofile): void
    {
        $this->getCurrentFormatProvider()->getBuilder()->saveAsXmlFile($tofile);
    }

    /**
     * Save the JSON content to a file
     *
     * @param string $tofile
     * @return void
     */
    public function saveAsJsonFile(string $tofile): void
    {
        $this->getCurrentFormatProvider()->getBuilder()->saveAsJsonFile($tofile);
    }
}
