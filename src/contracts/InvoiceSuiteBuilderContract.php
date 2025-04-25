<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\contracts;

use DateTimeInterface;

/**
 * Interface representing the required methods for a builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
interface InvoiceSuiteBuilderContract
{
    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param string $newDocumentNo
     * @return static
     */
    public function setDocumentNo(string $newDocumentNo): self;

    /**
     * Sets the new document type code
     *
     * @param string $newDocumentType
     * @return static
     */
    public function setDocumentType(string $newDocumentType): self;

    /**
     * Sets the new document description
     *
     * @param string $newDocumentDescription
     * @return self
     */
    public function setDocumentDescription(string $newDocumentDescription): self;

    /**
     * Sets the new document language
     *
     * @param string $newDocumentLanguage
     * @return self
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface $newDocumentDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self;

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface $newCompleteDate
     * @return InvoiceSuiteBuilderContract
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self;

    /**
     * Sets the new document currency
     *
     * @param string $newDocumentCurrency
     * @return self
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self;

    /**
     * Sets the new document tax currency
     *
     * @param string $newDocumentTaxCurrency
     * @return self
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self;
}
