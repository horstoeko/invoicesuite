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
class InvoiceSuiteTaxDTO
{
    /**
     * The coded description of the tax category
     *
     * @var null|string
     */
    protected ?string $category = null;

    /**
     * The coded description of the tax type
     *
     * @var null|string
     */
    protected ?string $type = null;

    /**
     * The tax base amount
     *
     * @var null|float
     */
    protected ?float $basisAmount = null;

    /**
     * The tax total amount
     *
     * @var null|float
     */
    protected ?float $amount = null;

    /**
     * The tax Rate (Percentage)
     *
     * @var null|float
     */
    protected ?float $percent = null;

    /**
     * The reason for tax exemption (free text)
     *
     * @var null|string
     */
    protected ?string $exemptionReason = null;

    /**
     * The reason for tax exemption (Code)
     *
     * @var null|string
     */
    protected ?string $exemptionReasonCode = null;

    /**
     * The date on which tax is due
     *
     * @var null|DateTimeInterface
     */
    protected ?DateTimeInterface $dueDate = null;

    /**
     * The code for the date on which tax is due
     *
     * @var null|string
     */
    protected ?string $dueCode = null;

    /**
     * Constructor
     *
     * @param null|string            $category            The coded description of the tax category
     * @param null|string            $type                The coded description of the tax type
     * @param null|float             $basisAmount         The tax base amount
     * @param null|float             $amount              The tax total amount
     * @param null|float             $percent             The tax Rate (Percentage)
     * @param null|string            $exemptionReason     The reason for tax exemption (free text)
     * @param null|string            $exemptionReasonCode The reason for tax exemption (Code)
     * @param null|DateTimeInterface $dueDate             The date on which tax is due
     * @param null|string            $dueCode             The code for the date on which tax is due
     */
    public function __construct(
        ?string $category = null,
        ?string $type = null,
        ?float $basisAmount = null,
        ?float $amount = null,
        ?float $percent = null,
        ?string $exemptionReason = null,
        ?string $exemptionReasonCode = null,
        ?DateTimeInterface $dueDate = null,
        ?string $dueCode = null,
    ) {
        $this->setCategory($category);
        $this->setType($type);
        $this->setBasisAmount($basisAmount);
        $this->setAmount($amount);
        $this->setPercent($percent);
        $this->setExemptionReason($exemptionReason);
        $this->setExemptionReasonCode($exemptionReasonCode);
        $this->setDueDate($dueDate);
        $this->setDueCode($dueCode);
    }

    /**
     * Returns the coded description of the tax category
     *
     * @return null|string
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Sets the coded description of the tax category
     *
     * @param  null|string $category The coded description of the tax category
     * @return self
     */
    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Returns the coded description of the tax type
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets the coded description of the tax type
     *
     * @param  null|string $type The coded description of the tax type
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the tax base amount
     *
     * @return null|float
     */
    public function getBasisAmount(): ?float
    {
        return $this->basisAmount;
    }

    /**
     * Sets the tax base amount
     *
     * @param  null|float $basisAmount The tax base amount
     * @return self
     */
    public function setBasisAmount(?float $basisAmount): self
    {
        $this->basisAmount = $basisAmount;

        return $this;
    }

    /**
     * Returns the tax total amount
     *
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets the tax total amount
     *
     * @param  null|float $amount The tax total amount
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Returns the tax Rate (Percentage)
     *
     * @return null|float
     */
    public function getPercent(): ?float
    {
        return $this->percent;
    }

    /**
     * Sets the tax Rate (Percentage)
     *
     * @param  null|float $percent The tax Rate (Percentage)
     * @return self
     */
    public function setPercent(?float $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Returns the reason for tax exemption (free text)
     *
     * @return null|string
     */
    public function getExemptionReason(): ?string
    {
        return $this->exemptionReason;
    }

    /**
     * Sets the reason for tax exemption (free text)
     *
     * @param  null|string $exemptionReason The reason for tax exemption (free text)
     * @return self
     */
    public function setExemptionReason(?string $exemptionReason): self
    {
        $this->exemptionReason = $exemptionReason;

        return $this;
    }

    /**
     * Returns the reason for tax exemption (Code)
     *
     * @return null|string
     */
    public function getExemptionReasonCode(): ?string
    {
        return $this->exemptionReasonCode;
    }

    /**
     * Sets the reason for tax exemption (Code)
     *
     * @param  null|string $exemptionReasonCode The reason for tax exemption (Code)
     * @return self
     */
    public function setExemptionReasonCode(?string $exemptionReasonCode): self
    {
        $this->exemptionReasonCode = $exemptionReasonCode;

        return $this;
    }

    /**
     * Returns the date on which tax is due
     *
     * @return null|DateTimeInterface
     */
    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * Sets the date on which tax is due
     *
     * @param  null|DateTimeInterface $dueDate The date on which tax is due
     * @return self
     */
    public function setDueDate(?DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Returns the code for the date on which tax is due
     *
     * @return null|string
     */
    public function getDueCode(): ?string
    {
        return $this->dueCode;
    }

    /**
     * Sets the code for the date on which tax is due
     *
     * @param  null|string $dueCode The code for the date on which tax is due
     * @return self
     */
    public function setDueCode(?string $dueCode): self
    {
        $this->dueCode = $dueCode;

        return $this;
    }
}
