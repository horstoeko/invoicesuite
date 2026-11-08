<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

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
class InvoiceSuiteSummationDTO implements JsonSerializable
{
    /**
     * The sum of the net amounts of all invoice lines
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getNetAmount', setter: 'setNetAmount')]
    #[JMS\SerializedName('netAmount')]
    #[JMS\Type('float')]
    protected ?float $netAmount = null;

    /**
     * The sum of the charges
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getChargeTotalAmount', setter: 'setChargeTotalAmount')]
    #[JMS\SerializedName('chargeTotalAmount')]
    #[JMS\Type('float')]
    protected ?float $chargeTotalAmount = null;

    /**
     * The sum of the discounts
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getDiscountTotalAmount', setter: 'setDiscountTotalAmount')]
    #[JMS\SerializedName('discountTotalAmount')]
    #[JMS\Type('float')]
    protected ?float $discountTotalAmount = null;

    /**
     * The total invoice amount excluding sales tax
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getTaxBasisAmount', setter: 'setTaxBasisAmount')]
    #[JMS\SerializedName('taxBasisAmount')]
    #[JMS\Type('float')]
    protected ?float $taxBasisAmount = null;

    /**
     * The total amount of the invoice sales tax (in the invoice currency)
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getTaxTotalAmount', setter: 'setTaxTotalAmount')]
    #[JMS\SerializedName('taxTotalAmount')]
    #[JMS\Type('float')]
    protected ?float $taxTotalAmount = null;

    /**
     * The total amount of the invoice sales tax (in the tax currency)
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getTaxTotalAmount2', setter: 'setTaxTotalAmount2')]
    #[JMS\SerializedName('taxTotalAmount2')]
    #[JMS\Type('float')]
    protected ?float $taxTotalAmount2 = null;

    /**
     * The total invoice amount including sales tax
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getGrossAmount', setter: 'setGrossAmount')]
    #[JMS\SerializedName('grossAmount')]
    #[JMS\Type('float')]
    protected ?float $grossAmount = null;

    /**
     * The payment amount due
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getDueAmount', setter: 'setDueAmount')]
    #[JMS\SerializedName('dueAmount')]
    #[JMS\Type('float')]
    protected ?float $dueAmount = null;

    /**
     * The prepayment amount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPrepaidAmount', setter: 'setPrepaidAmount')]
    #[JMS\SerializedName('prepaidAmount')]
    #[JMS\Type('float')]
    protected ?float $prepaidAmount = null;

    /**
     * The rounding amount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getRoungingAmount', setter: 'setRoungingAmount')]
    #[JMS\SerializedName('roungingAmount')]
    #[JMS\Type('float')]
    protected ?float $roungingAmount = null;

    /**
     * Constructor
     *
     * @param null|float $netAmount           The sum of the net amounts of all invoice lines
     * @param null|float $chargeTotalAmount   The sum of the charges
     * @param null|float $discountTotalAmount The sum of the discounts
     * @param null|float $taxBasisAmount      The total invoice amount excluding sales tax
     * @param null|float $taxTotalAmount      The total amount of the invoice sales tax (in the invoice currency)
     * @param null|float $taxTotalAmount2     The total amount of the invoice sales tax (in the tax currency)
     * @param null|float $grossAmount         The total invoice amount including sales tax
     * @param null|float $dueAmount           The payment amount due
     * @param null|float $prepaidAmount       The prepayment amount
     * @param null|float $roungingAmount      The rounding amount
     */
    public function __construct(
        ?float $netAmount = null,
        ?float $chargeTotalAmount = null,
        ?float $discountTotalAmount = null,
        ?float $taxBasisAmount = null,
        ?float $taxTotalAmount = null,
        ?float $taxTotalAmount2 = null,
        ?float $grossAmount = null,
        ?float $dueAmount = null,
        ?float $prepaidAmount = null,
        ?float $roungingAmount = null
    ) {
        $this->setNetAmount($netAmount);
        $this->setChargeTotalAmount($chargeTotalAmount);
        $this->setDiscountTotalAmount($discountTotalAmount);
        $this->setTaxBasisAmount($taxBasisAmount);
        $this->setTaxTotalAmount($taxTotalAmount);
        $this->setTaxTotalAmount2($taxTotalAmount2);
        $this->setGrossAmount($grossAmount);
        $this->setDueAmount($dueAmount);
        $this->setPrepaidAmount($prepaidAmount);
        $this->setRoungingAmount($roungingAmount);
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
     * Returns the sum of the net amounts of all invoice lines
     *
     * @return null|float
     */
    public function getNetAmount(): ?float
    {
        return $this->netAmount;
    }

    /**
     * Sets the sum of the net amounts of all invoice lines
     *
     * @param  null|float $netAmount The sum of the net amounts of all invoice lines
     * @return static
     */
    public function setNetAmount(
        ?float $netAmount
    ): static {
        $this->netAmount = $netAmount;

        return $this;
    }

    /**
     * Returns the sum of the charges
     *
     * @return null|float
     */
    public function getChargeTotalAmount(): ?float
    {
        return $this->chargeTotalAmount;
    }

    /**
     * Sets the sum of the charges
     *
     * @param  null|float $chargeTotalAmount The sum of the charges
     * @return static
     */
    public function setChargeTotalAmount(
        ?float $chargeTotalAmount
    ): static {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * Returns the sum of the discounts
     *
     * @return null|float
     */
    public function getDiscountTotalAmount(): ?float
    {
        return $this->discountTotalAmount;
    }

    /**
     * Sets the sum of the discounts
     *
     * @param  null|float $discountTotalAmount The sum of the discounts
     * @return static
     */
    public function setDiscountTotalAmount(
        ?float $discountTotalAmount
    ): static {
        $this->discountTotalAmount = $discountTotalAmount;

        return $this;
    }

    /**
     * Returns the total invoice amount excluding sales tax
     *
     * @return null|float
     */
    public function getTaxBasisAmount(): ?float
    {
        return $this->taxBasisAmount;
    }

    /**
     * Sets the total invoice amount excluding sales tax
     *
     * @param  null|float $taxBasisAmount The total invoice amount excluding sales tax
     * @return static
     */
    public function setTaxBasisAmount(
        ?float $taxBasisAmount
    ): static {
        $this->taxBasisAmount = $taxBasisAmount;

        return $this;
    }

    /**
     * Returns the total amount of the invoice sales tax (in the invoice currency)
     *
     * @return null|float
     */
    public function getTaxTotalAmount(): ?float
    {
        return $this->taxTotalAmount;
    }

    /**
     * Sets the total amount of the invoice sales tax (in the invoice currency)
     *
     * @param  null|float $taxTotalAmount The total amount of the invoice sales tax (in the invoice currency)
     * @return static
     */
    public function setTaxTotalAmount(
        ?float $taxTotalAmount
    ): static {
        $this->taxTotalAmount = $taxTotalAmount;

        return $this;
    }

    /**
     * Returns the total amount of the invoice sales tax (in the tax currency)
     *
     * @return null|float
     */
    public function getTaxTotalAmount2(): ?float
    {
        return $this->taxTotalAmount2;
    }

    /**
     * Sets the total amount of the invoice sales tax (in the tax currency)
     *
     * @param  null|float $taxTotalAmount2 The total amount of the invoice sales tax (in the tax currency)
     * @return static
     */
    public function setTaxTotalAmount2(
        ?float $taxTotalAmount2
    ): static {
        $this->taxTotalAmount2 = $taxTotalAmount2;

        return $this;
    }

    /**
     * Returns the total invoice amount including sales tax
     *
     * @return null|float
     */
    public function getGrossAmount(): ?float
    {
        return $this->grossAmount;
    }

    /**
     * Sets the total invoice amount including sales tax
     *
     * @param  null|float $grossAmount The total invoice amount including sales tax
     * @return static
     */
    public function setGrossAmount(
        ?float $grossAmount
    ): static {
        $this->grossAmount = $grossAmount;

        return $this;
    }

    /**
     * Returns the payment amount due
     *
     * @return null|float
     */
    public function getDueAmount(): ?float
    {
        return $this->dueAmount;
    }

    /**
     * Sets the payment amount due
     *
     * @param  null|float $dueAmount The payment amount due
     * @return static
     */
    public function setDueAmount(
        ?float $dueAmount
    ): static {
        $this->dueAmount = $dueAmount;

        return $this;
    }

    /**
     * Returns the prepayment amount
     *
     * @return null|float
     */
    public function getPrepaidAmount(): ?float
    {
        return $this->prepaidAmount;
    }

    /**
     * Sets the prepayment amount
     *
     * @param  null|float $prepaidAmount The prepayment amount
     * @return static
     */
    public function setPrepaidAmount(
        ?float $prepaidAmount
    ): static {
        $this->prepaidAmount = $prepaidAmount;

        return $this;
    }

    /**
     * Returns the rounding amount
     *
     * @return null|float
     */
    public function getRoungingAmount(): ?float
    {
        return $this->roungingAmount;
    }

    /**
     * Sets the rounding amount
     *
     * @param  null|float $roungingAmount The rounding amount
     * @return static
     */
    public function setRoungingAmount(
        ?float $roungingAmount
    ): static {
        $this->roungingAmount = $roungingAmount;

        return $this;
    }
}
