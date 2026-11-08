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
class InvoiceSuiteReferenceDocumentLineDTO implements JsonSerializable
{
    /**
     * Reference number
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getReferenceNumber', setter: 'setReferenceNumber')]
    #[JMS\SerializedName('referenceNumber')]
    #[JMS\Type('string')]
    protected ?string $referenceNumber = null;

    /**
     * Reference line number
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getReferenceLineNumber', setter: 'setReferenceLineNumber')]
    #[JMS\SerializedName('referenceLineNumber')]
    #[JMS\Type('string')]
    protected ?string $referenceLineNumber = null;

    /**
     * Issue date of the reference
     *
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getReferenceDate', setter: 'setReferenceDate')]
    #[JMS\SerializedName('referenceDate')]
    #[JMS\Type('DateTimeInterface<\'Y-m-d\TH:i:s.uP\'>')]
    protected ?DateTimeInterface $referenceDate = null;

    /**
     * Constructor
     *
     * @param null|string            $referenceNumber     Reference number
     * @param null|string            $referenceLineNumber Reference line number
     * @param null|DateTimeInterface $referenceDate       Issue date of the reference
     */
    public function __construct(
        ?string $referenceNumber = null,
        ?string $referenceLineNumber = null,
        ?DateTimeInterface $referenceDate = null
    ) {
        $this->setReferenceNumber($referenceNumber);
        $this->setReferenceLineNumber($referenceLineNumber);
        $this->setReferenceDate($referenceDate);
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
     * Returns reference number
     *
     * @return null|string
     */
    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    /**
     * Sets reference number
     *
     * @param  null|string $referenceNumber Reference number
     * @return static
     */
    public function setReferenceNumber(
        ?string $referenceNumber
    ): static {
        $this->referenceNumber = InvoiceSuiteStringUtils::asNullWhenEmpty($referenceNumber);

        return $this;
    }

    /**
     * Returns reference line number
     *
     * @return null|string
     */
    public function getReferenceLineNumber(): ?string
    {
        return $this->referenceLineNumber;
    }

    /**
     * Sets reference line number
     *
     * @param  null|string $referenceLineNumber Reference line number
     * @return static
     */
    public function setReferenceLineNumber(
        ?string $referenceLineNumber
    ): static {
        $this->referenceLineNumber = InvoiceSuiteStringUtils::asNullWhenEmpty($referenceLineNumber);

        return $this;
    }

    /**
     * Returns issue date of the reference
     *
     * @return null|DateTimeInterface
     */
    public function getReferenceDate(): ?DateTimeInterface
    {
        return $this->referenceDate;
    }

    /**
     * Sets issue date of the reference
     *
     * @param  null|DateTimeInterface $referenceDate Issue date of the reference
     * @return static
     */
    public function setReferenceDate(
        ?DateTimeInterface $referenceDate
    ): static {
        $this->referenceDate = $referenceDate;

        return $this;
    }
}
