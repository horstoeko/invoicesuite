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
class InvoiceSuiteDateRangeDTO implements JsonSerializable
{
    /**
     * Start of the period
     *
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getStartDate', setter: 'setStartDate')]
    #[JMS\SerializedName('startDate')]
    #[JMS\Type('DateTimeInterface<\'Y-m-d\TH:i:s.uP\'>')]
    protected ?DateTimeInterface $startDate = null;

    /**
     * End of the period
     *
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getEndDate', setter: 'setEndDate')]
    #[JMS\SerializedName('endDate')]
    #[JMS\Type('DateTimeInterface<\'Y-m-d\TH:i:s.uP\'>')]
    protected ?DateTimeInterface $endDate = null;

    /**
     * Further information of the period
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\SerializedName('description')]
    #[JMS\Type('string')]
    protected ?string $description = null;

    /**
     * Constructor
     *
     * @param null|DateTimeInterface $startDate   Start of the period
     * @param null|DateTimeInterface $endDate     End of the period
     * @param null|string            $description Further information of the period
     */
    public function __construct(
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        ?string $description = null
    ) {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setDescription($description);
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
     * Returns start of the period
     *
     * @return null|DateTimeInterface
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * Sets start of the period
     *
     * @param  null|DateTimeInterface $startDate Start of the period
     * @return static
     */
    public function setStartDate(
        ?DateTimeInterface $startDate
    ): static {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Returns end of the period
     *
     * @return null|DateTimeInterface
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * Sets end of the period
     *
     * @param  null|DateTimeInterface $endDate End of the period
     * @return static
     */
    public function setEndDate(
        ?DateTimeInterface $endDate
    ): static {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Returns further information of the period
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets further information of the period
     *
     * @param  null|string $description Further information of the period
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

        return $this;
    }
}
