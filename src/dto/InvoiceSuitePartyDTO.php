<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\dto;

use horstoeko\invoicesuite\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteCommunicationDTO;

/**
 * Class representing a DTO for a party (e.g. seller or customer)
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePartyDTO
{
    /**
     * Party name
     *
     * @var array<string>
     */
    protected array $name = [];

    /**
     * Party IDs
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $id = [];

    /**
     * Party Global IDs
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $globalId = [];

    /**
     * Party Tax Registration
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $taxRegistration = [];

    /**
     * Party Address
     *
     * @var array<InvoiceSuiteAddressDTO>
     */
    protected array $address = [];

    /**
     * Party Legal Organisation
     *
     * @var array<InvoiceSuiteOrganisationDTO>
     */
    protected array $organisation = [];

    /**
     * Party contacts
     *
     * @var array<InvoiceSuiteContactDTO>
     */
    protected array $contact = [];

    /**
     * Party communication details
     *
     * @var array<InvoiceSuiteCommunicationDTO>
     */
    protected array $communication = [];

    /**
     * @return array<string>
     */
    public function getName(): array
    {
        return $this->name;
    }

    /**
     * @param array<string> $name
     * @return self
     */
    public function setName(array $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function addName(string $name): self
    {
        $this->name[] = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasName(): bool
    {
        return $this->name !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachName(callable $callback): self
    {
        foreach ($this->name as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getId(): array
    {
        return $this->id;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $id
     * @return self
     */
    public function setId(array $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $id
     * @return self
     */
    public function addId(InvoiceSuiteIdDTO $id): self
    {
        $this->id[] = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return $this->id !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachId(callable $callback): self
    {
        foreach ($this->id as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getGlobalId(): array
    {
        return $this->globalId;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $globalId
     * @return self
     */
    public function setGlobalId(array $globalId): self
    {
        $this->globalId = $globalId;
        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $globalId
     * @return self
     */
    public function addGlobalId(InvoiceSuiteIdDTO $globalId): self
    {
        $this->globalId[] = $globalId;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasGlobalId(): bool
    {
        return $this->globalId !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachGlobalId(callable $callback): self
    {
        foreach ($this->globalId as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getTaxRegistration(): array
    {
        return $this->taxRegistration;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $taxRegistration
     * @return self
     */
    public function setTaxRegistration(array $taxRegistration): self
    {
        $this->taxRegistration = $taxRegistration;
        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $taxRegistration
     * @return self
     */
    public function addTaxRegistration(InvoiceSuiteIdDTO $taxRegistration): self
    {
        $this->taxRegistration[] = $taxRegistration;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasTaxRegistration(): bool
    {
        return $this->taxRegistration !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachTaxRegistration(callable $callback): self
    {
        foreach ($this->taxRegistration as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteAddressDTO>
     */
    public function getAddress(): array
    {
        return $this->address;
    }

    /**
     * @param array<InvoiceSuiteAddressDTO> $address
     * @return self
     */
    public function setAddress(array $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param InvoiceSuiteAddressDTO $address
     * @return self
     */
    public function addAddress(InvoiceSuiteAddressDTO $address): self
    {
        $this->address[] = $address;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasAddress(): bool
    {
        return $this->address !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachAddress(callable $callback): self
    {
        foreach ($this->address as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteOrganisationDTO>
     */
    public function getOrganisation(): array
    {
        return $this->organisation;
    }

    /**
     * @param array<InvoiceSuiteOrganisationDTO> $organisation
     * @return self
     */
    public function setOrganisation(array $organisation): self
    {
        $this->organisation = $organisation;
        return $this;
    }

    /**
     * @param InvoiceSuiteOrganisationDTO $organisation
     * @return self
     */
    public function addOrganisation(InvoiceSuiteOrganisationDTO $organisation): self
    {
        $this->organisation[] = $organisation;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasOrganisation(): bool
    {
        return $this->organisation !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachOrganisation(callable $callback): self
    {
        foreach ($this->organisation as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteContactDTO>
     */
    public function getContact(): array
    {
        return $this->contact;
    }

    /**
     * @param array<InvoiceSuiteContactDTO> $contact
     * @return self
     */
    public function setContact(array $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @param InvoiceSuiteContactDTO $contact
     * @return self
     */
    public function addContact(InvoiceSuiteContactDTO $contact): self
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasContact(): bool
    {
        return $this->contact !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachContact(callable $callback): self
    {
        foreach ($this->contact as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteCommunicationDTO>
     */
    public function getCommunication(): array
    {
        return $this->communication;
    }

    /**
     * @param array<InvoiceSuiteCommunicationDTO> $communication
     * @return self
     */
    public function setCommunication(array $communication): self
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @param InvoiceSuiteCommunicationDTO $communication
     * @return self
     */
    public function addCommunication(InvoiceSuiteCommunicationDTO $communication): self
    {
        $this->communication[] = $communication;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasCommunication(): bool
    {
        return $this->communication !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachCommunication(callable $callback): self
    {
        foreach ($this->communication as $item) {
            $callback($item);
        }

        return $this;
    }
}
