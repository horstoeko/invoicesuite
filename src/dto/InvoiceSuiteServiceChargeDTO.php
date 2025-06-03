<?php

namespace horstoeko\invoicesuite\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteServiceChargeDTO
{
    /**
     * The amount of the service fee
     *
     * @var float|null
     */
    protected ?float $amount = null;

    /**
     * The identification of the service fee
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * The coded description of the tax category
     *
     * @var string|null
     */
    protected ?string $taxCategory = null;

    /**
     * The coded description of the tax type
     *
     * @var string|null
     */
    protected ?string $taxType = null;

    /**
     * The tax Rate (Percentage)
     *
     * @var float|null
     */
    protected ?float $taxPercent = null;

    /**
     * Constructor
     *
     * @param float|null $amount The amount of the service fee
     * @param string|null $description The identification of the service fee
     * @param string|null $taxCategory The coded description of the tax category
     * @param string|null $taxType The coded description of the tax type
     * @param float|null $taxPercent The tax Rate (Percentage)
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
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets the amount of the service fee
     *
     * @param float|null $amount The amount of the service fee
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the identification of the service fee
     *
     * @param string|null $description The identification of the service fee
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
     * @return string|null
     */
    public function getTaxCategory(): ?string
    {
        return $this->taxCategory;
    }

    /**
     * Sets the coded description of the tax category
     *
     * @param string|null $taxCategory The coded description of the tax category
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
     * @return string|null
     */
    public function getTaxType(): ?string
    {
        return $this->taxType;
    }

    /**
     * Sets the coded description of the tax type
     *
     * @param string|null $taxType The coded description of the tax type
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
     * @return float|null
     */
    public function getTaxPercent(): ?float
    {
        return $this->taxPercent;
    }

    /**
     * Sets the tax Rate (Percentage)
     *
     * @param float|null $taxPercent The tax Rate (Percentage)
     * @return self
     */
    public function setTaxPercent(?float $taxPercent): self
    {
        $this->taxPercent = $taxPercent;

        return $this;
    }
}
