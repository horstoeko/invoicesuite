<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators\documents;

use horstoeko\invoicesuite\concerns\HandlesMessageBag;
use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

/**
 * Class representing methods base functionallity for a document validator
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentValidator
{
    use HandlesMessageBag;
    use HandlesRawContents;

    /**
     * Constructor (hidden)
     *
     * @param string $newRawDocumentContent
     */
    final protected function __construct(string $newRawDocumentContent)
    {
        $this->setRawDocumentContent($newRawDocumentContent);
        $this->intializeAfterConstruct();
    }

    /**
     * Some initialization after constructing an instance
     *
     * @return static
     */
    protected function intializeAfterConstruct(): static
    {
        return $this;
    }

    /**
     * Create a validator instance by a file which contains the document to validate
     *
     * @param  string $fromFilename
     * @return static
     */
    public static function createFromFile(string $fromFilename): static
    {
        if (!file_exists($fromFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fromFilename);
        }

        $rawDocumentContent = file_get_contents($fromFilename);

        if ($rawDocumentContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromFilename);
        }

        return static::createFromContent($rawDocumentContent);
    }

    /**
     * Create a validator instance by the XML content of a given InvoiceSuiteDocumentBuilder
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     */
    public static function createFromDocumentBuilderAsXml(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): static
    {
        return static::createFromContent($fromDocumentBuilder->getContentAsXml());
    }

    /**
     * Create a validator instance by the JSON content of a given InvoiceSuiteDocumentBuilder
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     */
    public static function createFromDocumentBuilderAsJson(InvoiceSuiteDocumentBuilder $fromDocumentBuilder): static
    {
        return static::createFromContent($fromDocumentBuilder->getContentAsJson());
    }

    /**
     * Create a validator instance by a given document content
     *
     * @param  string $fromDocumentContent
     * @return static
     */
    public static function createFromContent(string $fromDocumentContent): static
    {
        return new static($fromDocumentContent);
    }

    /**
     * The validation entry point
     *
     * @return static
     */
    abstract public function validate(): static;
}
