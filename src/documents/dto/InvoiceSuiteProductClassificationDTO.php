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
class InvoiceSuiteProductClassificationDTO
{
    /**
     * The classification identifier
     *
     * @var null|string
     */
    protected ?string $code = null;

    /**
     * The name with which an article can be classified according to type or quality
     *
     * @var null|string
     */
    protected ?string $name = null;

    /**
     * The identifier for the identification scheme of the item classification
     *
     * @var null|string
     */
    protected ?string $listId = null;

    /**
     * The version of the identification scheme
     *
     * @var null|string
     */
    protected ?string $listVersionId = null;

    /**
     * Constructor
     *
     * @param null|string $code          The classification identifier
     * @param null|string $name          The name with which an article can be classified according to type or quality
     * @param null|string $listId        The identifier for the identification scheme of the item classification
     * @param null|string $listVersionId The version of the identification scheme
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
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Sets the classification identifier
     *
     * @param  null|string $code The classification identifier
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets the name with which an article can be classified according to type or quality
     *
     * @param  null|string $name The name with which an article can be classified according to type or quality
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
     * @return null|string
     */
    public function getListId(): ?string
    {
        return $this->listId;
    }

    /**
     * Sets the identifier for the identification scheme of the item classification
     *
     * @param  null|string $listId The identifier for the identification scheme of the item classification
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
     * @return null|string
     */
    public function getListVersionId(): ?string
    {
        return $this->listVersionId;
    }

    /**
     * Sets the version of the identification scheme
     *
     * @param  null|string $listVersionId The version of the identification scheme
     * @return self
     */
    public function setListVersionId(?string $listVersionId): self
    {
        $this->listVersionId = $listVersionId;

        return $this;
    }
}
