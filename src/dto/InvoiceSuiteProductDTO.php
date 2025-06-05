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
class InvoiceSuiteProductDTO
{
    /**
     * The ID of the product (product id, Order-X interoperable)
     *
     * @var string|null
     */
    protected ?string $id = null;

    /**
     * The name of the product (product name)
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * The product description of the product
     *
     * @var string|null
     */
    protected ?string $description = null;

    /**
     * The identifier assigned to the product by the seller
     *
     * @var string|null
     */
    protected ?string $sellerId = null;

    /**
     * The identifier assigned to the product by the buyer
     *
     * @var string|null
     */
    protected ?string $buyerId = null;

    /**
     * The product global id
     *
     * @var InvoiceSuiteIdDTO|null
     */
    protected ?InvoiceSuiteIdDTO $globalId = null;

    /**
     * The id assigned by the industry
     *
     * @var string|null
     */
    protected ?string $industryId = null;

    /**
     * The unique model identifier of the product
     *
     * @var string|null
     */
    protected ?string $modelId = null;

    /**
     * The batch (lot) identifier of the product
     *
     * @var string|null
     */
    protected ?string $batchId = null;

    /**
     * The brand name of the product
     *
     * @var string|null
     */
    protected ?string $brandName = null;

    /**
     * The model name of the product
     *
     * @var string|null
     */
    protected ?string $modelName = null;

    /**
     * The code indicating the country the goods came from
     *
     * @var string|null
     */
    protected ?string $originTradeCountry = null;

    /**
     * The product characteristics
     *
     * @var array<InvoiceSuiteProductCharacteristicDTO>
     */
    protected array $characteristics = [];

    /**
     * The product classification
     *
     * @var array<InvoiceSuiteProductClassificationDTO>
     */
    protected array $classifications = [];

    /**
     * Constructor
     *
     * @param string|null $id The ID of the product (product id, Order-X interoperable)
     * @param string|null $name The name of the product (product name)
     * @param string|null $description The product description of the product
     * @param string|null $sellerId The identifier assigned to the product by the seller
     * @param string|null $buyerId The identifier assigned to the product by the buyer
     * @param InvoiceSuiteIdDTO|null $globalId The product global id
     * @param string|null $industryId The id assigned by the industry
     * @param string|null $modelId The unique model identifier of the product
     * @param string|null $batchId The batch (lot) identifier of the product
     * @param string|null $brandName The brand name of the product
     * @param string|null $modelName The model name of the product
     * @param string|null $originTradeCountry The code indicating the country the goods came from
     * @param array<InvoiceSuiteProductCharacteristicDTO> $characteristics The product characteristics
     * @param array<InvoiceSuiteProductClassificationDTO> $classifications The product classification
     */
    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?string $sellerId = null,
        ?string $buyerId = null,
        ?InvoiceSuiteIdDTO $globalId = null,
        ?string $industryId = null,
        ?string $modelId = null,
        ?string $batchId = null,
        ?string $brandName = null,
        ?string $modelName = null,
        ?string $originTradeCountry = null,
        array $characteristics = [],
        array $classifications = [],
    ) {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setSellerId($sellerId);
        $this->setBuyerId($buyerId);
        $this->setGlobalId($globalId);
        $this->setIndustryId($industryId);
        $this->setModelId($modelId);
        $this->setBatchId($batchId);
        $this->setBrandName($brandName);
        $this->setModelName($modelName);
        $this->setOriginTradeCountry($originTradeCountry);
        $this->setCharacteristics($characteristics);
        $this->setClassifications($classifications);
    }

    /**
     * Returns the ID of the product (product id, Order-X interoperable)
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the ID of the product (product id, Order-X interoperable)
     *
     * @param string|null $id The ID of the product (product id, Order-X interoperable)
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the name of the product (product name)
     *
     * @param string|null $name The name of the product (product name)
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the product description of the product
     *
     * @param string|null $description The product description of the product
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
     * @return string|null
     */
    public function getSellerId(): ?string
    {
        return $this->sellerId;
    }

    /**
     * Sets the identifier assigned to the product by the seller
     *
     * @param string|null $sellerId The identifier assigned to the product by the seller
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
     * @return string|null
     */
    public function getBuyerId(): ?string
    {
        return $this->buyerId;
    }

    /**
     * Sets the identifier assigned to the product by the buyer
     *
     * @param string|null $buyerId The identifier assigned to the product by the buyer
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
     * @return InvoiceSuiteIdDTO|null
     */
    public function getGlobalId(): ?InvoiceSuiteIdDTO
    {
        return $this->globalId;
    }

    /**
     * Sets the product global id
     *
     * @param InvoiceSuiteIdDTO|null $globalId The product global id
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
     * @return string|null
     */
    public function getIndustryId(): ?string
    {
        return $this->industryId;
    }

    /**
     * Sets the id assigned by the industry
     *
     * @param string|null $industryId The id assigned by the industry
     * @return self
     */
    public function setIndustryId(?string $industryId): self
    {
        $this->industryId = $industryId;

        return $this;
    }

    /**
     * Returns the unique model identifier of the product
     *
     * @return string|null
     */
    public function getModelId(): ?string
    {
        return $this->modelId;
    }

    /**
     * Sets the unique model identifier of the product
     *
     * @param string|null $modelId The unique model identifier of the product
     * @return self
     */
    public function setModelId(?string $modelId): self
    {
        $this->modelId = $modelId;

        return $this;
    }

    /**
     * Returns the batch (lot) identifier of the product
     *
     * @return string|null
     */
    public function getBatchId(): ?string
    {
        return $this->batchId;
    }

    /**
     * Sets the batch (lot) identifier of the product
     *
     * @param string|null $batchId The batch (lot) identifier of the product
     * @return self
     */
    public function setBatchId(?string $batchId): self
    {
        $this->batchId = $batchId;

        return $this;
    }

    /**
     * Returns the brand name of the product
     *
     * @return string|null
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * Sets the brand name of the product
     *
     * @param string|null $brandName The brand name of the product
     * @return self
     */
    public function setBrandName(?string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Returns the model name of the product
     *
     * @return string|null
     */
    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    /**
     * Sets the model name of the product
     *
     * @param string|null $modelName The model name of the product
     * @return self
     */
    public function setModelName(?string $modelName): self
    {
        $this->modelName = $modelName;

        return $this;
    }

    /**
     * Returns the code indicating the country the goods came from
     *
     * @return string|null
     */
    public function getOriginTradeCountry(): ?string
    {
        return $this->originTradeCountry;
    }

    /**
     * Sets the code indicating the country the goods came from
     *
     * @param string|null $originTradeCountry The code indicating the country the goods came from
     * @return self
     */
    public function setOriginTradeCountry(?string $originTradeCountry): self
    {
        $this->originTradeCountry = $originTradeCountry;

        return $this;
    }

    /**
     * Returns the product characteristics
     *
     * @return array<InvoiceSuiteProductCharacteristicDTO>
     */
    public function getCharacteristics(): array
    {
        return $this->characteristics;
    }

    /**
     * Sets the product characteristics
     *
     * @param array<InvoiceSuiteProductCharacteristicDTO> $characteristics The product characteristics
     * @return self
     */
    public function setCharacteristics(array $characteristics): self
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * Add single The product characteristics
     *
     * @param InvoiceSuiteProductCharacteristicDTO $characteristic The product characteristics
     * @return self
     */
    public function addCharacteristic(InvoiceSuiteProductCharacteristicDTO $characteristic): self
    {
        $this->characteristics[] = $characteristic;

        return $this;
    }

    /**
     * Get first The product characteristics
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstCharacteristic(callable $callback, ?callable $callbackElse = null): self
    {
        if (($characteristic = reset($this->characteristics)) !== false) {
            $callback($characteristic);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The product characteristics
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextCharacteristic(callable $callback, ?callable $callbackElse = null): self
    {
        if (($characteristic = next($this->characteristics)) !== false) {
            $callback($characteristic);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The product characteristics
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousCharacteristic(callable $callback, ?callable $callbackElse = null): self
    {
        if (($characteristic = prev($this->characteristics)) !== false) {
            $callback($characteristic);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The product characteristics
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastCharacteristic(callable $callback, ?callable $callbackElse = null): self
    {
        if (($characteristic = end($this->characteristics)) !== false) {
            $callback($characteristic);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The product characteristics and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachCharacteristic(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->characteristics as $characteristic) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($characteristic);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns the product classification
     *
     * @return array<InvoiceSuiteProductClassificationDTO>
     */
    public function getClassifications(): array
    {
        return $this->classifications;
    }

    /**
     * Sets the product classification
     *
     * @param array<InvoiceSuiteProductClassificationDTO> $classifications The product classification
     * @return self
     */
    public function setClassifications(array $classifications): self
    {
        $this->classifications = $classifications;

        return $this;
    }

    /**
     * Add single The product classification
     *
     * @param InvoiceSuiteProductClassificationDTO $classification The product classification
     * @return self
     */
    public function addClassification(InvoiceSuiteProductClassificationDTO $classification): self
    {
        $this->classifications[] = $classification;

        return $this;
    }

    /**
     * Get first The product classification
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstClassification(callable $callback, ?callable $callbackElse = null): self
    {
        if (($classification = reset($this->classifications)) !== false) {
            $callback($classification);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The product classification
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextClassification(callable $callback, ?callable $callbackElse = null): self
    {
        if (($classification = next($this->classifications)) !== false) {
            $callback($classification);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The product classification
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousClassification(callable $callback, ?callable $callbackElse = null): self
    {
        if (($classification = prev($this->classifications)) !== false) {
            $callback($classification);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The product classification
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastClassification(callable $callback, ?callable $callbackElse = null): self
    {
        if (($classification = end($this->classifications)) !== false) {
            $callback($classification);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The product classification and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachClassification(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->classifications as $classification) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($classification);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
