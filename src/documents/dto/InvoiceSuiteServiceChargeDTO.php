<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteServiceChargeDTO
{
    /**
     * The amount of the service fee
     *
     * @var null|float
     */
    protected ?float $amount = null;

    /**
     * The identification of the service fee
     *
     * @var null|string
     */
    protected ?string $description = null;

    /**
     * The coded description of the tax category
     *
     * @var null|string
     */
    protected ?string $taxCategory = null;

    /**
     * The coded description of the tax type
     *
     * @var null|string
     */
    protected ?string $taxType = null;

    /**
     * The tax Rate (Percentage)
     *
     * @var null|float
     */
    protected ?float $taxPercent = null;

    /**
     * Constructor
     *
     * @param null|float  $amount      The amount of the service fee
     * @param null|string $description The identification of the service fee
     * @param null|string $taxCategory The coded description of the tax category
     * @param null|string $taxType     The coded description of the tax type
     * @param null|float  $taxPercent  The tax Rate (Percentage)
     */
    public function __construct(
        ?float $amount = null,
        ?string $description = null,
        ?string $taxCategory = null,
        ?string $taxType = null,
        ?float $taxPercent = null,
    ) {
        $this->setAmount($amount);
        $this->setDescription($description);
        $this->setTaxCategory($taxCategory);
        $this->setTaxType($taxType);
        $this->setTaxPercent($taxPercent);
    }

    /**
     * Returns the amount of the service fee
     *
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets the amount of the service fee
     *
     * @param  null|float $amount The amount of the service fee
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Returns the identification of the service fee
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the identification of the service fee
     *
     * @param  null|string $description The identification of the service fee
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the coded description of the tax category
     *
     * @return null|string
     */
    public function getTaxCategory(): ?string
    {
        return $this->taxCategory;
    }

    /**
     * Sets the coded description of the tax category
     *
     * @param  null|string $taxCategory The coded description of the tax category
     * @return self
     */
    public function setTaxCategory(?string $taxCategory): self
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    /**
     * Returns the coded description of the tax type
     *
     * @return null|string
     */
    public function getTaxType(): ?string
    {
        return $this->taxType;
    }

    /**
     * Sets the coded description of the tax type
     *
     * @param  null|string $taxType The coded description of the tax type
     * @return self
     */
    public function setTaxType(?string $taxType): self
    {
        $this->taxType = $taxType;

        return $this;
    }

    /**
     * Returns the tax Rate (Percentage)
     *
     * @return null|float
     */
    public function getTaxPercent(): ?float
    {
        return $this->taxPercent;
    }

    /**
     * Sets the tax Rate (Percentage)
     *
     * @param  null|float $taxPercent The tax Rate (Percentage)
     * @return self
     */
    public function setTaxPercent(?float $taxPercent): self
    {
        $this->taxPercent = $taxPercent;

        return $this;
    }
}
