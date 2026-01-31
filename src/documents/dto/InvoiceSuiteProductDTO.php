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

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteProductDTO
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
     * The unique model identifier of the product
     *
     * @var null|string
     */
    protected ?string $modelId = null;

    /**
     * The batch (lot) identifier of the product
     *
     * @var null|string
     */
    protected ?string $batchId = null;

    /**
     * The brand name of the product
     *
     * @var null|string
     */
    protected ?string $brandName = null;

    /**
     * The model name of the product
     *
     * @var null|string
     */
    protected ?string $modelName = null;

    /**
     * The code indicating the country the goods came from
     *
     * @var null|string
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
     * The reference product
     *
     * @var array<InvoiceSuiteReferenceProductDTO>
     */
    protected array $referenceProducts = [];

    /**
     * Constructor
     *
     * @param null|string                                 $id                 The ID of the product (product id, Order-X interoperable)
     * @param null|string                                 $name               The name of the product (product name)
     * @param null|string                                 $description        The product description of the product
     * @param null|string                                 $sellerId           The identifier assigned to the product by the seller
     * @param null|string                                 $buyerId            The identifier assigned to the product by the buyer
     * @param null|InvoiceSuiteIdDTO                      $globalId           The product global id
     * @param null|string                                 $industryId         The id assigned by the industry
     * @param null|string                                 $modelId            The unique model identifier of the product
     * @param null|string                                 $batchId            The batch (lot) identifier of the product
     * @param null|string                                 $brandName          The brand name of the product
     * @param null|string                                 $modelName          The model name of the product
     * @param null|string                                 $originTradeCountry The code indicating the country the goods came from
     * @param array<InvoiceSuiteProductCharacteristicDTO> $characteristics    The product characteristics
     * @param array<InvoiceSuiteProductClassificationDTO> $classifications    The product classification
     * @param array<InvoiceSuiteReferenceProductDTO>      $referenceProducts  The reference product
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
        array $referenceProducts = [],
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
        $this->setReferenceProducts($referenceProducts);
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
     * Returns the unique model identifier of the product
     *
     * @return null|string
     */
    public function getModelId(): ?string
    {
        return $this->modelId;
    }

    /**
     * Sets the unique model identifier of the product
     *
     * @param  null|string $modelId The unique model identifier of the product
     * @return static
     */
    public function setModelId(
        ?string $modelId
    ): static {
        $this->modelId = InvoiceSuiteStringUtils::asNullWhenEmpty($modelId);

        return $this;
    }

    /**
     * Returns the batch (lot) identifier of the product
     *
     * @return null|string
     */
    public function getBatchId(): ?string
    {
        return $this->batchId;
    }

    /**
     * Sets the batch (lot) identifier of the product
     *
     * @param  null|string $batchId The batch (lot) identifier of the product
     * @return static
     */
    public function setBatchId(
        ?string $batchId
    ): static {
        $this->batchId = InvoiceSuiteStringUtils::asNullWhenEmpty($batchId);

        return $this;
    }

    /**
     * Returns the brand name of the product
     *
     * @return null|string
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * Sets the brand name of the product
     *
     * @param  null|string $brandName The brand name of the product
     * @return static
     */
    public function setBrandName(
        ?string $brandName
    ): static {
        $this->brandName = InvoiceSuiteStringUtils::asNullWhenEmpty($brandName);

        return $this;
    }

    /**
     * Returns the model name of the product
     *
     * @return null|string
     */
    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    /**
     * Sets the model name of the product
     *
     * @param  null|string $modelName The model name of the product
     * @return static
     */
    public function setModelName(
        ?string $modelName
    ): static {
        $this->modelName = InvoiceSuiteStringUtils::asNullWhenEmpty($modelName);

        return $this;
    }

    /**
     * Returns the code indicating the country the goods came from
     *
     * @return null|string
     */
    public function getOriginTradeCountry(): ?string
    {
        return $this->originTradeCountry;
    }

    /**
     * Sets the code indicating the country the goods came from
     *
     * @param  null|string $originTradeCountry The code indicating the country the goods came from
     * @return static
     */
    public function setOriginTradeCountry(
        ?string $originTradeCountry
    ): static {
        $this->originTradeCountry = InvoiceSuiteStringUtils::asNullWhenEmpty($originTradeCountry);

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
     * @param  array<InvoiceSuiteProductCharacteristicDTO> $characteristics The product characteristics
     * @return static
     */
    public function setCharacteristics(
        array $characteristics
    ): static {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * Add single The product characteristics
     *
     * @param  InvoiceSuiteProductCharacteristicDTO $characteristic The product characteristics
     * @return static
     */
    public function addCharacteristic(
        ?InvoiceSuiteProductCharacteristicDTO $characteristic
    ): static {
        if (is_null($characteristic)) {
            return $this;
        }

        $this->characteristics[] = $characteristic;

        return $this;
    }

    /**
     * Get first The product characteristics
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstCharacteristic(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextCharacteristic(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousCharacteristic(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastCharacteristic(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachCharacteristic(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->characteristics as $characteristic) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($characteristic);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The product characteristics and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstCharacteristic(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        if (!$foreachCondition) {
            return $this->firstCharacteristic($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->characteristics as $characteristic) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($characteristic);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The product characteristics
     *
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteProductCharacteristicDTO>,
     */
    public function filterCharacteristic(
        callable $callback
    ): array {
        return array_filter($this->characteristics, $callback);
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
     * @param  array<InvoiceSuiteProductClassificationDTO> $classifications The product classification
     * @return static
     */
    public function setClassifications(
        array $classifications
    ): static {
        $this->classifications = $classifications;

        return $this;
    }

    /**
     * Add single The product classification
     *
     * @param  InvoiceSuiteProductClassificationDTO $classification The product classification
     * @return static
     */
    public function addClassification(
        ?InvoiceSuiteProductClassificationDTO $classification
    ): static {
        if (is_null($classification)) {
            return $this;
        }

        $this->classifications[] = $classification;

        return $this;
    }

    /**
     * Get first The product classification
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstClassification(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextClassification(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousClassification(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastClassification(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachClassification(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->classifications as $classification) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($classification);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The product classification and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstClassification(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        if (!$foreachCondition) {
            return $this->firstClassification($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->classifications as $classification) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($classification);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The product classification
     *
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteProductClassificationDTO>,
     */
    public function filterClassification(
        callable $callback
    ): array {
        return array_filter($this->classifications, $callback);
    }

    /**
     * Returns the reference product
     *
     * @return array<InvoiceSuiteReferenceProductDTO>
     */
    public function getReferenceProducts(): array
    {
        return $this->referenceProducts;
    }

    /**
     * Sets the reference product
     *
     * @param  array<InvoiceSuiteReferenceProductDTO> $referenceProducts The reference product
     * @return static
     */
    public function setReferenceProducts(
        array $referenceProducts
    ): static {
        $this->referenceProducts = $referenceProducts;

        return $this;
    }

    /**
     * Add single The reference product
     *
     * @param  InvoiceSuiteReferenceProductDTO $referenceProduct The reference product
     * @return static
     */
    public function addReferenceProduct(
        ?InvoiceSuiteReferenceProductDTO $referenceProduct
    ): static {
        if (is_null($referenceProduct)) {
            return $this;
        }

        $this->referenceProducts[] = $referenceProduct;

        return $this;
    }

    /**
     * Get first The reference product
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstReferenceProduct(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($referenceProduct = reset($this->referenceProducts)) !== false) {
            $callback($referenceProduct);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next The reference product
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextReferenceProduct(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($referenceProduct = next($this->referenceProducts)) !== false) {
            $callback($referenceProduct);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous The reference product
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousReferenceProduct(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($referenceProduct = prev($this->referenceProducts)) !== false) {
            $callback($referenceProduct);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last The reference product
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastReferenceProduct(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($referenceProduct = end($this->referenceProducts)) !== false) {
            $callback($referenceProduct);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The reference product and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachReferenceProduct(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->referenceProducts as $referenceProduct) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($referenceProduct);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over The reference product and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstReferenceProduct(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        if (!$foreachCondition) {
            return $this->firstReferenceProduct($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->referenceProducts as $referenceProduct) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($referenceProduct);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter The reference product
     *
     * @param callable \$callback Callback to execute for each item
     * @return arra<InvoiceSuiteReferenceProductDTO>,
     */
    public function filterReferenceProduct(
        callable $callback): array
    {
        return array_filter($this->referenceProducts, $callback);
    }
}
