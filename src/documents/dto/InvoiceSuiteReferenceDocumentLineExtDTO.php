<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteReferenceDocumentLineExtDTO extends InvoiceSuiteReferenceDocumentLineDTO implements JsonSerializable
{
    /**
     * The additional document type code
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getTypeCode', setter: 'setTypeCode')]
    #[JMS\SerializedName('typeCode')]
    #[JMS\Type('string')]
    protected ?string $typeCode = null;

    /**
     * The additional document reference-type code
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getReferenceTypeCode', setter: 'setReferenceTypeCode')]
    #[JMS\SerializedName('referenceTypeCode')]
    #[JMS\Type('string')]
    protected ?string $referenceTypeCode = null;

    /**
     * The additional document description
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\SerializedName('description')]
    #[JMS\Type('string')]
    protected ?string $description = null;

    /**
     * The additional document description
     *
     * @var null|InvoiceSuiteAttachment
     */
    #[JMS\Accessor(getter: 'getAttachment', setter: 'setAttachment')]
    #[JMS\SerializedName('attachment')]
    #[JMS\Type('horstoeko\invoicesuite\utils\InvoiceSuiteAttachment')]
    protected ?InvoiceSuiteAttachment $attachment = null;

    /**
     * Constructor
     *
     * @param null|string                 $referenceNumber     Reference number
     * @param null|string                 $referenceLineNumber Reference line number
     * @param null|DateTimeInterface      $referenceDate       Issue date of the reference
     * @param null|string                 $typeCode            The additional document type code
     * @param null|string                 $referenceTypeCode   The additional document reference-type code
     * @param null|string                 $description         The additional document description
     * @param null|InvoiceSuiteAttachment $attachment          The additional document description
     */
    public function __construct(
        ?string $referenceNumber = null,
        ?string $referenceLineNumber = null,
        ?DateTimeInterface $referenceDate = null,
        ?string $typeCode = null,
        ?string $referenceTypeCode = null,
        ?string $description = null,
        ?InvoiceSuiteAttachment $attachment = null
    ) {
        parent::__construct($referenceNumber, $referenceLineNumber, $referenceDate);

        $this->setTypeCode($typeCode);
        $this->setReferenceTypeCode($referenceTypeCode);
        $this->setDescription($description);
        $this->setAttachment($attachment);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
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
     * @return static
     */
    public function setTypeCode(
        ?string $typeCode
    ): static {
        $this->typeCode = InvoiceSuiteStringUtils::asNullWhenEmpty($typeCode);

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
     * @return static
     */
    public function setReferenceTypeCode(
        ?string $referenceTypeCode
    ): static {
        $this->referenceTypeCode = InvoiceSuiteStringUtils::asNullWhenEmpty($referenceTypeCode);

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
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

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
     * @return static
     */
    public function setAttachment(
        ?InvoiceSuiteAttachment $attachment
    ): static {
        $this->attachment = $attachment;

        return $this;
    }
}
