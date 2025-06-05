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
class InvoiceSuiteProductClassificationDTO
{
    /**
     * The classification identifier
     *
     * @var string|null
     */
    protected ?string $code = null;

    /**
     * The name with which an article can be classified according to type or quality
     *
     * @var string|null
     */
    protected ?string $name = null;

    /**
     * The identifier for the identification scheme of the item classification
     *
     * @var string|null
     */
    protected ?string $listId = null;

    /**
     * The version of the identification scheme
     *
     * @var string|null
     */
    protected ?string $listVersionId = null;

    /**
     * Constructor
     *
     * @param string|null $code The classification identifier
     * @param string|null $name The name with which an article can be classified according to type or quality
     * @param string|null $listId The identifier for the identification scheme of the item classification
     * @param string|null $listVersionId The version of the identification scheme
     */
    public function __construct(
        ?string $code = null,
        ?string $name = null,
        ?string $listId = null,
        ?string $listVersionId = null,
    ) {
        $this->setCode($code);
        $this->setName($name);
        $this->setListId($listId);
        $this->setListVersionId($listVersionId);
    }

    /**
     * Returns the classification identifier
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Sets the classification identifier
     *
     * @param string|null $code The classification identifier
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Returns the name with which an article can be classified according to type or quality
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the name with which an article can be classified according to type or quality
     *
     * @param string|null $name The name with which an article can be classified according to type or quality
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the identifier for the identification scheme of the item classification
     *
     * @return string|null
     */
    public function getListId(): ?string
    {
        return $this->listId;
    }

    /**
     * Sets the identifier for the identification scheme of the item classification
     *
     * @param string|null $listId The identifier for the identification scheme of the item classification
     * @return self
     */
    public function setListId(?string $listId): self
    {
        $this->listId = $listId;

        return $this;
    }

    /**
     * Returns the version of the identification scheme
     *
     * @return string|null
     */
    public function getListVersionId(): ?string
    {
        return $this->listVersionId;
    }

    /**
     * Sets the version of the identification scheme
     *
     * @param string|null $listVersionId The version of the identification scheme
     * @return self
     */
    public function setListVersionId(?string $listVersionId): self
    {
        $this->listVersionId = $listVersionId;

        return $this;
    }
}
