<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\validators\kosit\InvoiceSuiteKositDocumentValidator;

/**
 * Legacy-class representing the KOSIT document validator for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdKositValidator
{
    /**
     * Internal KOSIT-Validator instance
     *
     * @var InvoiceSuiteKositDocumentValidator
     */
    private $internalKositValidator;

    /**
     * Constructor
     *
     * @param null|string|ZugferdDocument $document $document
     */
    public function __construct($document = null)
    {
        $this->setDocument($document);
    }

    /**
     * Create a KositValidator-Instance by a given content string
     *
     * @param  string                $document
     * @return ZugferdKositValidator
     */
    public static function fromString(string $document): self
    {
        return new self($document);
    }

    /**
     * Create a KositValidator-Instance by a given ZugferdDocument (ZugferdDocumentReader, ZugferdDocumentBuilder)
     *
     * @param  ZugferdDocument       $zugferdDocument
     * @return ZugferdKositValidator
     */
    public static function fromZugferdDocument(ZugferdDocument $zugferdDocument): self
    {
        return new self($zugferdDocument);
    }

    /**
     * Undocumented function
     *
     * @param  null|string|ZugferdDocument $document $document
     * @return static
     */
    private function setDocument(ZugferdDocument $document): static
    {
        unset($this->internalKositValidator);

        if (!is_string($document) && !($document instanceof ZugferdDocument)) {
            return $this;
        }

        if (is_string($document)) {
            $this->internalKositValidator = InvoiceSuiteKositDocumentValidator::createFromContent(
                $document
            );
        }

        if ($document instanceof ZugferdDocumentBuilder) {
            $this->internalKositValidator = InvoiceSuiteKositDocumentValidator::createFromDocumentBuilder(
                $document->getDocumentBuilderInstance()
            );
        }

        if ($document instanceof ZugferdDocumentReader) {
            $this->internalKositValidator = InvoiceSuiteKositDocumentValidator::createFromDocumentBuilder(
                $document->getDocumentReaderInstance()->copyToBuilder()
            );
        }

        return $this;
    }
}
