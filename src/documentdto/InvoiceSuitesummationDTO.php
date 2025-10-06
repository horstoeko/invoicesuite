<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documentdto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteSummationDTO
{
    /**
     * The sum of the net amounts of all invoice lines
     *
     * @var float|null
     */
    protected ?float $netAmount = null;

    /**
     * The sum of the charges
     *
     * @var float|null
     */
    protected ?float $chargeTotalAmount = null;

    /**
     * The sum of the discounts
     *
     * @var float|null
     */
    protected ?float $discountTotalAmount = null;

    /**
     * The total invoice amount excluding sales tax
     *
     * @var float|null
     */
    protected ?float $taxBasisAmount = null;

    /**
     * The total amount of the invoice sales tax (in the invoice currency)
     *
     * @var float|null
     */
    protected ?float $taxTotalAmount = null;

    /**
     * The total amount of the invoice sales tax (in the tax currency)
     *
     * @var float|null
     */
    protected ?float $taxTotalAmount2 = null;

    /**
     * The total invoice amount including sales tax
     *
     * @var float|null
     */
    protected ?float $grossAmount = null;

    /**
     * The payment amount due
     *
     * @var float|null
     */
    protected ?float $dueAmount = null;

    /**
     * The prepayment amount
     *
     * @var float|null
     */
    protected ?float $prepaidAmount = null;

    /**
     * The rounding amount
     *
     * @var float|null
     */
    protected ?float $roungingAmount = null;

    /**
     * Constructor
     *
     * @param float|null $netAmount The sum of the net amounts of all invoice lines
     * @param float|null $chargeTotalAmount The sum of the charges
     * @param float|null $discountTotalAmount The sum of the discounts
     * @param float|null $taxBasisAmount The total invoice amount excluding sales tax
     * @param float|null $taxTotalAmount The total amount of the invoice sales tax (in the invoice currency)
     * @param float|null $taxTotalAmount2 The total amount of the invoice sales tax (in the tax currency)
     * @param float|null $grossAmount The total invoice amount including sales tax
     * @param float|null $dueAmount The payment amount due
     * @param float|null $prepaidAmount The prepayment amount
     * @param float|null $roungingAmount The rounding amount
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
     * @return float|null
     */
    public function getNetAmount(): ?float
    {
        return $this->netAmount;
    }

    /**
     * Sets the sum of the net amounts of all invoice lines
     *
     * @param float|null $netAmount The sum of the net amounts of all invoice lines
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
     * @return float|null
     */
    public function getChargeTotalAmount(): ?float
    {
        return $this->chargeTotalAmount;
    }

    /**
     * Sets the sum of the charges
     *
     * @param float|null $chargeTotalAmount The sum of the charges
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
     * @return float|null
     */
    public function getDiscountTotalAmount(): ?float
    {
        return $this->discountTotalAmount;
    }

    /**
     * Sets the sum of the discounts
     *
     * @param float|null $discountTotalAmount The sum of the discounts
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
     * @return float|null
     */
    public function getTaxBasisAmount(): ?float
    {
        return $this->taxBasisAmount;
    }

    /**
     * Sets the total invoice amount excluding sales tax
     *
     * @param float|null $taxBasisAmount The total invoice amount excluding sales tax
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
     * @return float|null
     */
    public function getTaxTotalAmount(): ?float
    {
        return $this->taxTotalAmount;
    }

    /**
     * Sets the total amount of the invoice sales tax (in the invoice currency)
     *
     * @param float|null $taxTotalAmount The total amount of the invoice sales tax (in the invoice currency)
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
     * @return float|null
     */
    public function getTaxTotalAmount2(): ?float
    {
        return $this->taxTotalAmount2;
    }

    /**
     * Sets the total amount of the invoice sales tax (in the tax currency)
     *
     * @param float|null $taxTotalAmount2 The total amount of the invoice sales tax (in the tax currency)
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
     * @return float|null
     */
    public function getGrossAmount(): ?float
    {
        return $this->grossAmount;
    }

    /**
     * Sets the total invoice amount including sales tax
     *
     * @param float|null $grossAmount The total invoice amount including sales tax
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
     * @return float|null
     */
    public function getDueAmount(): ?float
    {
        return $this->dueAmount;
    }

    /**
     * Sets the payment amount due
     *
     * @param float|null $dueAmount The payment amount due
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
     * @return float|null
     */
    public function getPrepaidAmount(): ?float
    {
        return $this->prepaidAmount;
    }

    /**
     * Sets the prepayment amount
     *
     * @param float|null $prepaidAmount The prepayment amount
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
     * @return float|null
     */
    public function getRoungingAmount(): ?float
    {
        return $this->roungingAmount;
    }

    /**
     * Sets the rounding amount
     *
     * @param float|null $roungingAmount The rounding amount
     * @return self
     */
    public function setRoungingAmount(?float $roungingAmount): self
    {
        $this->roungingAmount = $roungingAmount;

        return $this;
    }
}
