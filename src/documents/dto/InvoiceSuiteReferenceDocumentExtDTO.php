<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteReferenceDocumentExtDTO extends InvoiceSuiteReferenceDocumentDTO
{
    /**
     * The additional document type code
     *
     * @var null|string
     */
    protected ?string $typeCode = null;

    /**
     * The additional document reference-type code
     *
     * @var null|string
     */
    protected ?string $referenceTypeCode = null;

    /**
     * The additional document description
     *
     * @var null|string
     */
    protected ?string $description = null;

    /**
     * The additional document description
     *
     * @var null|InvoiceSuiteAttachment
     */
    protected ?InvoiceSuiteAttachment $attachment = null;

    /**
     * Constructor
     *
     * @param null|string                 $referenceNumber   Reference number
     * @param null|DateTimeInterface      $referenceDate     Issue date of the reference
     * @param null|string                 $typeCode          The additional document type code
     * @param null|string                 $referenceTypeCode The additional document reference-type code
     * @param null|string                 $description       The additional document description
     * @param null|InvoiceSuiteAttachment $attachment        The additional document description
     */
    public function __construct(
        ?string $referenceNumber = null,
        ?DateTimeInterface $referenceDate = null,
        ?string $typeCode = null,
        ?string $referenceTypeCode = null,
        ?string $description = null,
        ?InvoiceSuiteAttachment $attachment = null,
    ) {
        parent::__construct($referenceNumber, $referenceDate);

        $this->setTypeCode($typeCode);
        $this->setReferenceTypeCode($referenceTypeCode);
        $this->setDescription($description);
        $this->setAttachment($attachment);
    }

    /**
     * Returns the additional document type code
     *
     * @return null|string
     */
    public function getTypeCode(): ?string
    {
        return $this->typeCode;
    }

    /**
     * Sets the additional document type code
     *
     * @param  null|string $typeCode The additional document type code
     * @return self
     */
    public function setTypeCode(?string $typeCode): self
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * Returns the additional document reference-type code
     *
     * @return null|string
     */
    public function getReferenceTypeCode(): ?string
    {
        return $this->referenceTypeCode;
    }

    /**
     * Sets the additional document reference-type code
     *
     * @param  null|string $referenceTypeCode The additional document reference-type code
     * @return self
     */
    public function setReferenceTypeCode(?string $referenceTypeCode): self
    {
        $this->referenceTypeCode = $referenceTypeCode;

        return $this;
    }

    /**
     * Returns the additional document description
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the additional document description
     *
     * @param  null|string $description The additional document description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the additional document description
     *
     * @return null|InvoiceSuiteAttachment
     */
    public function getAttachment(): ?InvoiceSuiteAttachment
    {
        return $this->attachment;
    }

    /**
     * Sets the additional document description
     *
     * @param  null|InvoiceSuiteAttachment $attachment The additional document description
     * @return self
     */
    public function setAttachment(?InvoiceSuiteAttachment $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }
}
