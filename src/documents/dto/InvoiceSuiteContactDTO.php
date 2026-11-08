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
class InvoiceSuiteContactDTO implements JsonSerializable
{
    /**
     * Contact name
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPersonName', setter: 'setPersonName')]
    #[JMS\SerializedName('personName')]
    #[JMS\Type('string')]
    protected ?string $personName = null;

    /**
     * Contact department name
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDepartmentName', setter: 'setDepartmentName')]
    #[JMS\SerializedName('departmentName')]
    #[JMS\Type('string')]
    protected ?string $departmentName = null;

    /**
     * Contact phone number
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPhoneNumber', setter: 'setPhoneNumber')]
    #[JMS\SerializedName('phoneNumber')]
    #[JMS\Type('string')]
    protected ?string $phoneNumber = null;

    /**
     * Contact fax number
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getFaxNumber', setter: 'setFaxNumber')]
    #[JMS\SerializedName('faxNumber')]
    #[JMS\Type('string')]
    protected ?string $faxNumber = null;

    /**
     * Contact e-mail address
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getEmailAddress', setter: 'setEmailAddress')]
    #[JMS\SerializedName('emailAddress')]
    #[JMS\Type('string')]
    protected ?string $emailAddress = null;

    /**
     * Constructor
     *
     * @param null|string $personName     Contact name
     * @param null|string $departmentName Contact department name
     * @param null|string $phoneNumber    Contact phone number
     * @param null|string $faxNumber      Contact fax number
     * @param null|string $emailAddress   Contact e-mail address
     */
    public function __construct(
        ?string $personName = null,
        ?string $departmentName = null,
        ?string $phoneNumber = null,
        ?string $faxNumber = null,
        ?string $emailAddress = null
    ) {
        $this->setPersonName($personName);
        $this->setDepartmentName($departmentName);
        $this->setPhoneNumber($phoneNumber);
        $this->setFaxNumber($faxNumber);
        $this->setEmailAddress($emailAddress);
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
     * Returns contact name
     *
     * @return null|string
     */
    public function getPersonName(): ?string
    {
        return $this->personName;
    }

    /**
     * Sets contact name
     *
     * @param  null|string $personName Contact name
     * @return static
     */
    public function setPersonName(
        ?string $personName
    ): static {
        $this->personName = InvoiceSuiteStringUtils::asNullWhenEmpty($personName);

        return $this;
    }

    /**
     * Returns contact department name
     *
     * @return null|string
     */
    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    /**
     * Sets contact department name
     *
     * @param  null|string $departmentName Contact department name
     * @return static
     */
    public function setDepartmentName(
        ?string $departmentName
    ): static {
        $this->departmentName = InvoiceSuiteStringUtils::asNullWhenEmpty($departmentName);

        return $this;
    }

    /**
     * Returns contact phone number
     *
     * @return null|string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets contact phone number
     *
     * @param  null|string $phoneNumber Contact phone number
     * @return static
     */
    public function setPhoneNumber(
        ?string $phoneNumber
    ): static {
        $this->phoneNumber = InvoiceSuiteStringUtils::asNullWhenEmpty($phoneNumber);

        return $this;
    }

    /**
     * Returns contact fax number
     *
     * @return null|string
     */
    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    /**
     * Sets contact fax number
     *
     * @param  null|string $faxNumber Contact fax number
     * @return static
     */
    public function setFaxNumber(
        ?string $faxNumber
    ): static {
        $this->faxNumber = InvoiceSuiteStringUtils::asNullWhenEmpty($faxNumber);

        return $this;
    }

    /**
     * Returns contact e-mail address
     *
     * @return null|string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets contact e-mail address
     *
     * @param  null|string $emailAddress Contact e-mail address
     * @return static
     */
    public function setEmailAddress(
        ?string $emailAddress
    ): static {
        $this->emailAddress = InvoiceSuiteStringUtils::asNullWhenEmpty($emailAddress);

        return $this;
    }
}
