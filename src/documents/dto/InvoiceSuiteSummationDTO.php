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
class InvoiceSuiteSummationDTO
{
    /**
     * The sum of the net amounts of all invoice lines
     *
     * @var null|float
     */
    protected ?float $netAmount = null;

    /**
     * The sum of the charges
     *
     * @var null|float
     */
    protected ?float $chargeTotalAmount = null;

    /**
     * The sum of the discounts
     *
     * @var null|float
     */
    protected ?float $discountTotalAmount = null;

    /**
     * The total invoice amount excluding sales tax
     *
     * @var null|float
     */
    protected ?float $taxBasisAmount = null;

    /**
     * The total amount of the invoice sales tax (in the invoice currency)
     *
     * @var null|float
     */
    protected ?float $taxTotalAmount = null;

    /**
     * The total amount of the invoice sales tax (in the tax currency)
     *
     * @var null|float
     */
    protected ?float $taxTotalAmount2 = null;

    /**
     * The total invoice amount including sales tax
     *
     * @var null|float
     */
    protected ?float $grossAmount = null;

    /**
     * The payment amount due
     *
     * @var null|float
     */
    protected ?float $dueAmount = null;

    /**
     * The prepayment amount
     *
     * @var null|float
     */
    protected ?float $prepaidAmount = null;

    /**
     * The rounding amount
     *
     * @var null|float
     */
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
        ?float $roungingAmount = null,
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
     * @return self
     */
    public function setNetAmount(?float $netAmount): self
    {
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
     * @return self
     */
    public function setChargeTotalAmount(?float $chargeTotalAmount): self
    {
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
     * @return self
     */
    public function setDiscountTotalAmount(?float $discountTotalAmount): self
    {
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
     * @return self
     */
    public function setTaxBasisAmount(?float $taxBasisAmount): self
    {
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
     * @return self
     */
    public function setTaxTotalAmount(?float $taxTotalAmount): self
    {
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
     * @return self
     */
    public function setTaxTotalAmount2(?float $taxTotalAmount2): self
    {
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
     * @return self
     */
    public function setGrossAmount(?float $grossAmount): self
    {
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
     * @return self
     */
    public function setDueAmount(?float $dueAmount): self
    {
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
     * @return self
     */
    public function setPrepaidAmount(?float $prepaidAmount): self
    {
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
     * @return self
     */
    public function setRoungingAmount(?float $roungingAmount): self
    {
        $this->roungingAmount = $roungingAmount;

        return $this;
    }
}
