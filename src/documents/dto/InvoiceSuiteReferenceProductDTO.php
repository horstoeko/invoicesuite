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
class InvoiceSuiteReferenceProductDTO implements JsonSerializable
{
    /**
     * The ID of the product (product id, Order-X interoperable)
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getId', setter: 'setId')]
    #[JMS\SerializedName('id')]
    #[JMS\Type('string')]
    protected ?string $id = null;

    /**
     * The name of the product (product name)
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\SerializedName('name')]
    #[JMS\Type('string')]
    protected ?string $name = null;

    /**
     * The product description of the product
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\SerializedName('description')]
    #[JMS\Type('string')]
    protected ?string $description = null;

    /**
     * The identifier assigned to the product by the seller
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getSellerId', setter: 'setSellerId')]
    #[JMS\SerializedName('sellerId')]
    #[JMS\Type('string')]
    protected ?string $sellerId = null;

    /**
     * The identifier assigned to the product by the buyer
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getBuyerId', setter: 'setBuyerId')]
    #[JMS\SerializedName('buyerId')]
    #[JMS\Type('string')]
    protected ?string $buyerId = null;

    /**
     * The product global id
     *
     * @var null|InvoiceSuiteIdDTO
     */
    #[JMS\Accessor(getter: 'getGlobalId', setter: 'setGlobalId')]
    #[JMS\SerializedName('globalId')]
    #[JMS\Type('horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO')]
    protected ?InvoiceSuiteIdDTO $globalId = null;

    /**
     * The id assigned by the industry
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getIndustryId', setter: 'setIndustryId')]
    #[JMS\SerializedName('industryId')]
    #[JMS\Type('string')]
    protected ?string $industryId = null;

    /**
     * The quantity of the referenced product contained product
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
    #[JMS\Accessor(getter: 'getUnitQuantity', setter: 'setUnitQuantity')]
    #[JMS\SerializedName('unitQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO')]
    protected ?InvoiceSuiteQuantityDTO $unitQuantity = null;

    /**
     * Constructor
     *
     * @param null|string                  $id           The ID of the product (product id, Order-X interoperable)
     * @param null|string                  $name         The name of the product (product name)
     * @param null|string                  $description  The product description of the product
     * @param null|string                  $sellerId     The identifier assigned to the product by the seller
     * @param null|string                  $buyerId      The identifier assigned to the product by the buyer
     * @param null|InvoiceSuiteIdDTO       $globalId     The product global id
     * @param null|string                  $industryId   The id assigned by the industry
     * @param null|InvoiceSuiteQuantityDTO $unitQuantity The quantity of the referenced product contained product
     */
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?string $sellerId = null,
        ?string $buyerId = null,
        ?InvoiceSuiteIdDTO $globalId = null,
        ?string $industryId = null,
        ?InvoiceSuiteQuantityDTO $unitQuantity = null
    ) {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setSellerId($sellerId);
        $this->setBuyerId($buyerId);
        $this->setGlobalId($globalId);
        $this->setIndustryId($industryId);
        $this->setUnitQuantity($unitQuantity);
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
     * Returns the ID of the product (product id, Order-X interoperable)
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the ID of the product (product id, Order-X interoperable)
     *
     * @param  null|string $id The ID of the product (product id, Order-X interoperable)
     * @return static
     */
    public function setId(
        ?string $id
    ): static {
        $this->id = InvoiceSuiteStringUtils::asNullWhenEmpty($id);

        return $this;
    }

    /**
     * Returns the name of the product (product name)
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the name of the product (product name)
     *
     * @param  null|string $name The name of the product (product name)
     * @return static
     */
    public function setName(
        ?string $name
    ): static {
        $this->name = InvoiceSuiteStringUtils::asNullWhenEmpty($name);

        return $this;
    }

    /**
     * Returns the product description of the product
     *
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the product description of the product
     *
     * @param  null|string $description The product description of the product
     * @return static
     */
    public function setDescription(
        ?string $description
    ): static {
        $this->description = InvoiceSuiteStringUtils::asNullWhenEmpty($description);

        return $this;
    }

    /**
     * Returns the identifier assigned to the product by the seller
     *
     * @return null|string
     */
    public function getSellerId(): ?string
    {
        return $this->sellerId;
    }

    /**
     * Sets the identifier assigned to the product by the seller
     *
     * @param  null|string $sellerId The identifier assigned to the product by the seller
     * @return static
     */
    public function setSellerId(
        ?string $sellerId
    ): static {
        $this->sellerId = InvoiceSuiteStringUtils::asNullWhenEmpty($sellerId);

        return $this;
    }

    /**
     * Returns the identifier assigned to the product by the buyer
     *
     * @return null|string
     */
    public function getBuyerId(): ?string
    {
        return $this->buyerId;
    }

    /**
     * Sets the identifier assigned to the product by the buyer
     *
     * @param  null|string $buyerId The identifier assigned to the product by the buyer
     * @return static
     */
    public function setBuyerId(
        ?string $buyerId
    ): static {
        $this->buyerId = InvoiceSuiteStringUtils::asNullWhenEmpty($buyerId);

        return $this;
    }

    /**
     * Returns the product global id
     *
     * @return null|InvoiceSuiteIdDTO
     */
    public function getGlobalId(): ?InvoiceSuiteIdDTO
    {
        return $this->globalId;
    }

    /**
     * Sets the product global id
     *
     * @param  null|InvoiceSuiteIdDTO $globalId The product global id
     * @return static
     */
    public function setGlobalId(
        ?InvoiceSuiteIdDTO $globalId
    ): static {
        $this->globalId = $globalId;

        return $this;
    }

    /**
     * Returns the id assigned by the industry
     *
     * @return null|string
     */
    public function getIndustryId(): ?string
    {
        return $this->industryId;
    }

    /**
     * Sets the id assigned by the industry
     *
     * @param  null|string $industryId The id assigned by the industry
     * @return static
     */
    public function setIndustryId(
        ?string $industryId
    ): static {
        $this->industryId = InvoiceSuiteStringUtils::asNullWhenEmpty($industryId);

        return $this;
    }

    /**
     * Returns the quantity of the referenced product contained product
     *
     * @return null|InvoiceSuiteQuantityDTO
     */
    public function getUnitQuantity(): ?InvoiceSuiteQuantityDTO
    {
        return $this->unitQuantity;
    }

    /**
     * Sets the quantity of the referenced product contained product
     *
     * @param  null|InvoiceSuiteQuantityDTO $unitQuantity The quantity of the referenced product contained product
     * @return static
     */
    public function setUnitQuantity(
        ?InvoiceSuiteQuantityDTO $unitQuantity
    ): static {
        $this->unitQuantity = $unitQuantity;

        return $this;
    }
}
