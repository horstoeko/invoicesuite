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
class InvoiceSuiteAllowanceChargeDTO implements JsonSerializable
{
    /**
     * The switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     *
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getChargeIndicator', setter: 'setChargeIndicator')]
    #[JMS\SerializedName('chargeIndicator')]
    #[JMS\Type('bool')]
    protected ?bool $chargeIndicator = null;

    /**
     * The amount of the surcharge or discount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\SerializedName('amount')]
    #[JMS\Type('float')]
    protected ?float $amount = null;

    /**
     * The base amount that may be used in conjunction with the percentage of the surcharge or discount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getBaseAmount', setter: 'setBaseAmount')]
    #[JMS\SerializedName('baseAmount')]
    #[JMS\Type('float')]
    protected ?float $baseAmount = null;

    /**
     * The Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPercent', setter: 'setPercent')]
    #[JMS\SerializedName('percent')]
    #[JMS\Type('float')]
    protected ?float $percent = null;

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
     * The reason given in text form for the surcharge or discount
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getReason', setter: 'setReason')]
    #[JMS\SerializedName('reason')]
    #[JMS\Type('string')]
    protected ?string $reason = null;

    /**
     * The Reason given as a code for the surcharge or discount
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getReasonCode', setter: 'setReasonCode')]
    #[JMS\SerializedName('reasonCode')]
    #[JMS\Type('string')]
    protected ?string $reasonCode = null;

    /**
     * Constructor
     *
     * @param null|bool   $chargeIndicator The switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param null|float  $amount          The amount of the surcharge or discount
     * @param null|float  $baseAmount      The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param null|float  $percent         The Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @param null|string $taxCategory     The coded description of the tax category
     * @param null|string $taxType         The coded description of the tax type
     * @param null|float  $taxPercent      The tax Rate (Percentage)
     * @param null|string $reason          The reason given in text form for the surcharge or discount
     * @param null|string $reasonCode      The Reason given as a code for the surcharge or discount
     */
    public function __construct(
        ?bool $chargeIndicator = null,
        ?float $amount = null,
        ?float $baseAmount = null,
        ?float $percent = null,
        ?string $taxCategory = null,
        ?string $taxType = null,
        ?float $taxPercent = null,
        ?string $reason = null,
        ?string $reasonCode = null
    ) {
        $this->setChargeIndicator($chargeIndicator);
        $this->setAmount($amount);
        $this->setBaseAmount($baseAmount);
        $this->setPercent($percent);
        $this->setTaxCategory($taxCategory);
        $this->setTaxType($taxType);
        $this->setTaxPercent($taxPercent);
        $this->setReason($reason);
        $this->setReasonCode($reasonCode);
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
     * Returns the switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     *
     * @return null|bool
     */
    public function getChargeIndicator(): ?bool
    {
        return $this->chargeIndicator;
    }

    /**
     * Sets the switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     *
     * @param  null|bool $chargeIndicator The switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @return static
     */
    public function setChargeIndicator(
        ?bool $chargeIndicator
    ): static {
        $this->chargeIndicator = $chargeIndicator;

        return $this;
    }

    /**
     * Returns the amount of the surcharge or discount
     *
     * @return null|float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets the amount of the surcharge or discount
     *
     * @param  null|float $amount The amount of the surcharge or discount
     * @return static
     */
    public function setAmount(
        ?float $amount
    ): static {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Returns the base amount that may be used in conjunction with the percentage of the surcharge or discount
     *
     * @return null|float
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * Sets the base amount that may be used in conjunction with the percentage of the surcharge or discount
     *
     * @param  null|float $baseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @return static
     */
    public function setBaseAmount(
        ?float $baseAmount
    ): static {
        $this->baseAmount = $baseAmount;

        return $this;
    }

    /**
     * Returns the Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     *
     * @return null|float
     */
    public function getPercent(): ?float
    {
        return $this->percent;
    }

    /**
     * Sets the Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     *
     * @param  null|float $percent The Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function setPercent(
        ?float $percent
    ): static {
        $this->percent = $percent;

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

    /**
     * Returns the reason given in text form for the surcharge or discount
     *
     * @return null|string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Sets the reason given in text form for the surcharge or discount
     *
     * @param  null|string $reason The reason given in text form for the surcharge or discount
     * @return static
     */
    public function setReason(
        ?string $reason
    ): static {
        $this->reason = InvoiceSuiteStringUtils::asNullWhenEmpty($reason);

        return $this;
    }

    /**
     * Returns the Reason given as a code for the surcharge or discount
     *
     * @return null|string
     */
    public function getReasonCode(): ?string
    {
        return $this->reasonCode;
    }

    /**
     * Sets the Reason given as a code for the surcharge or discount
     *
     * @param  null|string $reasonCode The Reason given as a code for the surcharge or discount
     * @return static
     */
    public function setReasonCode(
        ?string $reasonCode
    ): static {
        $this->reasonCode = InvoiceSuiteStringUtils::asNullWhenEmpty($reasonCode);

        return $this;
    }
}
