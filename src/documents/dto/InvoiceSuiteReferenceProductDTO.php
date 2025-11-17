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
class InvoiceSuiteReferenceProductDTO
{
    /**
     * The ID of the product (product id, Order-X interoperable)
     *
     * @var null|string
     */
    protected ?string $id = null;

    /**
     * The name of the product (product name)
     *
     * @var null|string
     */
    protected ?string $name = null;

    /**
     * The product description of the product
     *
     * @var null|string
     */
    protected ?string $description = null;

    /**
     * The identifier assigned to the product by the seller
     *
     * @var null|string
     */
    protected ?string $sellerId = null;

    /**
     * The identifier assigned to the product by the buyer
     *
     * @var null|string
     */
    protected ?string $buyerId = null;

    /**
     * The product global id
     *
     * @var null|InvoiceSuiteIdDTO
     */
    protected ?InvoiceSuiteIdDTO $globalId = null;

    /**
     * The id assigned by the industry
     *
     * @var null|string
     */
    protected ?string $industryId = null;

    /**
     * The quantity of the referenced product contained product
     *
     * @var null|InvoiceSuiteQuantityDTO
     */
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
        ?InvoiceSuiteQuantityDTO $unitQuantity = null,
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
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

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
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * @return self
     */
    public function setSellerId(?string $sellerId): self
    {
        $this->sellerId = $sellerId;

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
     * @return self
     */
    public function setBuyerId(?string $buyerId): self
    {
        $this->buyerId = $buyerId;

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
     * @return self
     */
    public function setGlobalId(?InvoiceSuiteIdDTO $globalId): self
    {
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
     * @return self
     */
    public function setIndustryId(?string $industryId): self
    {
        $this->industryId = $industryId;

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
     * @return self
     */
    public function setUnitQuantity(?InvoiceSuiteQuantityDTO $unitQuantity): self
    {
        $this->unitQuantity = $unitQuantity;

        return $this;
    }
}
