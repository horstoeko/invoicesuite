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
class InvoiceSuiteAddressDTO implements JsonSerializable
{
    /**
     * Address line 1
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getAddressLine1', setter: 'setAddressLine1')]
    #[JMS\SerializedName('addressLine1')]
    #[JMS\Type('string')]
    protected ?string $addressLine1 = null;

    /**
     * Address line 2
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getAddressLine2', setter: 'setAddressLine2')]
    #[JMS\SerializedName('addressLine2')]
    #[JMS\Type('string')]
    protected ?string $addressLine2 = null;

    /**
     * Address line 3
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getAddressLine3', setter: 'setAddressLine3')]
    #[JMS\SerializedName('addressLine3')]
    #[JMS\Type('string')]
    protected ?string $addressLine3 = null;

    /**
     * Post Code / ZIP Code
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPostcode', setter: 'setPostcode')]
    #[JMS\SerializedName('postcode')]
    #[JMS\Type('string')]
    protected ?string $postcode = null;

    /**
     * City
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getCity', setter: 'setCity')]
    #[JMS\SerializedName('city')]
    #[JMS\Type('string')]
    protected ?string $city = null;

    /**
     * Country
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getCountry', setter: 'setCountry')]
    #[JMS\SerializedName('country')]
    #[JMS\Type('string')]
    protected ?string $country = null;

    /**
     * Subdivision
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getSubDivision', setter: 'setSubDivision')]
    #[JMS\SerializedName('subDivision')]
    #[JMS\Type('string')]
    protected ?string $subDivision = null;

    /**
     * Constructor
     *
     * @param null|string $addressLine1 Address line 1
     * @param null|string $addressLine2 Address line 2
     * @param null|string $addressLine3 Address line 3
     * @param null|string $postcode     Post Code / ZIP Code
     * @param null|string $city         City
     * @param null|string $country      Country
     * @param null|string $subDivision  Subdivision
     */
    public function __construct(
        ?string $addressLine1 = null,
        ?string $addressLine2 = null,
        ?string $addressLine3 = null,
        ?string $postcode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ) {
        $this->setAddressLine1($addressLine1);
        $this->setAddressLine2($addressLine2);
        $this->setAddressLine3($addressLine3);
        $this->setPostcode($postcode);
        $this->setCity($city);
        $this->setCountry($country);
        $this->setSubDivision($subDivision);
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
     * Returns address line 1
     *
     * @return null|string
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * Sets address line 1
     *
     * @param  null|string $addressLine1 Address line 1
     * @return static
     */
    public function setAddressLine1(
        ?string $addressLine1
    ): static {
        $this->addressLine1 = InvoiceSuiteStringUtils::asNullWhenEmpty($addressLine1);

        return $this;
    }

    /**
     * Returns address line 2
     *
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * Sets address line 2
     *
     * @param  null|string $addressLine2 Address line 2
     * @return static
     */
    public function setAddressLine2(
        ?string $addressLine2
    ): static {
        $this->addressLine2 = InvoiceSuiteStringUtils::asNullWhenEmpty($addressLine2);

        return $this;
    }

    /**
     * Returns address line 3
     *
     * @return null|string
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * Sets address line 3
     *
     * @param  null|string $addressLine3 Address line 3
     * @return static
     */
    public function setAddressLine3(
        ?string $addressLine3
    ): static {
        $this->addressLine3 = InvoiceSuiteStringUtils::asNullWhenEmpty($addressLine3);

        return $this;
    }

    /**
     * Returns post Code / ZIP Code
     *
     * @return null|string
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * Sets post Code / ZIP Code
     *
     * @param  null|string $postcode Post Code / ZIP Code
     * @return static
     */
    public function setPostcode(
        ?string $postcode
    ): static {
        $this->postcode = InvoiceSuiteStringUtils::asNullWhenEmpty($postcode);

        return $this;
    }

    /**
     * Returns city
     *
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Sets city
     *
     * @param  null|string $city City
     * @return static
     */
    public function setCity(
        ?string $city
    ): static {
        $this->city = InvoiceSuiteStringUtils::asNullWhenEmpty($city);

        return $this;
    }

    /**
     * Returns country
     *
     * @return null|string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Sets country
     *
     * @param  null|string $country Country
     * @return static
     */
    public function setCountry(
        ?string $country
    ): static {
        $this->country = InvoiceSuiteStringUtils::asNullWhenEmpty($country);

        return $this;
    }

    /**
     * Returns subdivision
     *
     * @return null|string
     */
    public function getSubDivision(): ?string
    {
        return $this->subDivision;
    }

    /**
     * Sets subdivision
     *
     * @param  null|string $subDivision Subdivision
     * @return static
     */
    public function setSubDivision(
        ?string $subDivision
    ): static {
        $this->subDivision = InvoiceSuiteStringUtils::asNullWhenEmpty($subDivision);

        return $this;
    }
}
