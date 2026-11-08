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
class InvoiceSuiteTaxDTO implements JsonSerializable
{
    /**
     * The coded description of the tax category
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getCategory', setter: 'setCategory')]
    #[JMS\SerializedName('category')]
    #[JMS\Type('string')]
    protected ?string $category = null;

    /**
     * The coded description of the tax type
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getType', setter: 'setType')]
    #[JMS\SerializedName('type')]
    #[JMS\Type('string')]
    protected ?string $type = null;

    /**
     * The tax base amount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getBasisAmount', setter: 'setBasisAmount')]
    #[JMS\SerializedName('basisAmount')]
    #[JMS\Type('float')]
    protected ?float $basisAmount = null;

    /**
     * The tax total amount
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\SerializedName('amount')]
    #[JMS\Type('float')]
    protected ?float $amount = null;

    /**
     * The tax Rate (Percentage)
     *
     * @var null|float
     */
    #[JMS\Accessor(getter: 'getPercent', setter: 'setPercent')]
    #[JMS\SerializedName('percent')]
    #[JMS\Type('float')]
    protected ?float $percent = null;

    /**
     * The reason for tax exemption (free text)
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getExemptionReason', setter: 'setExemptionReason')]
    #[JMS\SerializedName('exemptionReason')]
    #[JMS\Type('string')]
    protected ?string $exemptionReason = null;

    /**
     * The reason for tax exemption (Code)
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getExemptionReasonCode', setter: 'setExemptionReasonCode')]
    #[JMS\SerializedName('exemptionReasonCode')]
    #[JMS\Type('string')]
    protected ?string $exemptionReasonCode = null;

    /**
     * The date on which tax is due
     *
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getDueDate', setter: 'setDueDate')]
    #[JMS\SerializedName('dueDate')]
    #[JMS\Type('DateTimeInterface<\'Y-m-d\TH:i:s.uP\'>')]
    protected ?DateTimeInterface $dueDate = null;

    /**
     * The code for the date on which tax is due
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDueCode', setter: 'setDueCode')]
    #[JMS\SerializedName('dueCode')]
    #[JMS\Type('string')]
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
        ?string $dueCode = null
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
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
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
     * @return static
     */
    public function setCategory(
        ?string $category
    ): static {
        $this->category = InvoiceSuiteStringUtils::asNullWhenEmpty($category);

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
     * @return static
     */
    public function setType(
        ?string $type
    ): static {
        $this->type = InvoiceSuiteStringUtils::asNullWhenEmpty($type);

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
     * @return static
     */
    public function setBasisAmount(
        ?float $basisAmount
    ): static {
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
     * @return static
     */
    public function setAmount(
        ?float $amount
    ): static {
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
     * @return static
     */
    public function setPercent(
        ?float $percent
    ): static {
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
     * @return static
     */
    public function setExemptionReason(
        ?string $exemptionReason
    ): static {
        $this->exemptionReason = InvoiceSuiteStringUtils::asNullWhenEmpty($exemptionReason);

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
     * @return static
     */
    public function setExemptionReasonCode(
        ?string $exemptionReasonCode
    ): static {
        $this->exemptionReasonCode = InvoiceSuiteStringUtils::asNullWhenEmpty($exemptionReasonCode);

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
     * @return static
     */
    public function setDueDate(
        ?DateTimeInterface $dueDate
    ): static {
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
     * @return static
     */
    public function setDueCode(
        ?string $dueCode
    ): static {
        $this->dueCode = InvoiceSuiteStringUtils::asNullWhenEmpty($dueCode);

        return $this;
    }
}
