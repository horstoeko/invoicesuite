<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

use DateTimeInterface;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteReferenceDocumentDTO
{
    /**
     * Reference number
     *
     * @var null|string
     */
    protected ?string $referenceNumber = null;

    /**
     * Issue date of the reference
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $referenceDate = null;

    /**
     * Constructor
     *
     * @param null|string            $referenceNumber Reference number
     * @param null|DateTimeInterface $referenceDate   Issue date of the reference
     */
    public function __construct(?string $referenceNumber = null, ?DateTimeInterface $referenceDate = null)
    {
        $this->setReferenceNumber($referenceNumber);
        $this->setReferenceDate($referenceDate);
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
     * @return self
     */
    public function setReferenceNumber(?string $referenceNumber): self
    {
        $this->referenceNumber = $referenceNumber;

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
     * @return self
     */
    public function setReferenceDate(?DateTimeInterface $referenceDate): self
    {
        $this->referenceDate = $referenceDate;

        return $this;
    }
}
