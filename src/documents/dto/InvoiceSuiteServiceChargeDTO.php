<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

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
class InvoiceSuiteServiceChargeDTO implements JsonSerializable
{
    /**
     * The amount of the service fee
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\SerializedName('amount')]
    #[JMS\Type('float')]
    protected ?float $amount = null;

    /**
     * The identification of the service fee
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\SerializedName('description')]
    #[JMS\Type('string')]
    protected ?string $description = null;

    /**
     * The coded description of the tax category
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getTaxCategory', setter: 'setTaxCategory')]
    #[JMS\SerializedName('taxCategory')]
    #[JMS\Type('string')]
    protected ?string $taxCategory = null;

    /**
     * The coded description of the tax type
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getTaxType', setter: 'setTaxType')]
    #[JMS\SerializedName('taxType')]
    #[JMS\Type('string')]
    protected ?string $taxType = null;

    /**
     * The tax Rate (Percentage)
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getTaxPercent', setter: 'setTaxPercent')]
    #[JMS\SerializedName('taxPercent')]
    #[JMS\Type('float')]
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
        ?float $taxPercent = null
    ) {
        $this->setAmount($amount);
        $this->setDescription($description);
        $this->setTaxCategory($taxCategory);
        $this->setTaxType($taxType);
        $this->setTaxPercent($taxPercent);
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
     * @return static
     */
    public function setAmount(
        ?float $amount
    ): static {
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
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

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
     * @return static
     */
    public function setTaxCategory(
        ?string $taxCategory
    ): static {
        $this->taxCategory = InvoiceSuiteStringUtils::asNullWhenEmpty($taxCategory);

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
     * @return static
     */
    public function setTaxType(
        ?string $taxType
    ): static {
        $this->taxType = InvoiceSuiteStringUtils::asNullWhenEmpty($taxType);

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
     * @return static
     */
    public function setTaxPercent(
        ?float $taxPercent
    ): static {
        $this->taxPercent = $taxPercent;

        return $this;
    }
}
