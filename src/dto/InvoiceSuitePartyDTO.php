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
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

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
    protected array $names = [];

    /**
     * Party IDs
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $ids = [];

    /**
     * Party Global IDs
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $globalIds = [];

    /**
     * Party Tax Registration
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $taxRegistrations = [];

    /**
     * Party Address
     *
     * @var array<InvoiceSuiteAddressDTO>
     */
    protected array $addresses = [];

    /**
     * Party Legal Organisation
     *
     * @var array<InvoiceSuiteOrganisationDTO>
     */
    protected array $legalOrganisations = [];

    /**
     * Party contacts
     *
     * @var array<InvoiceSuiteContactDTO>
     */
    protected array $contacts = [];

    /**
     * Party communication details
     *
     * @var array<InvoiceSuiteCommunicationDTO>
     */
    protected array $communications = [];

    /**
     * @return array<string>
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * @param array<string> $newNames
     * @return self
     */
    public function setNames(array $newNames): self
    {
        $this->names = array_filter($newNames, function ($name) {
            return !InvoiceSuiteStringUtils::stringIsNullOrEmpty($name);
        });

        return $this;
    }

    /**
     * @param string $newName
     * @return self
     */
    public function addName(string $newName): self
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this;
        }

        $this->names[] = $newName;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasNames(): bool
    {
        return $this->names !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachName(callable $callback): self
    {
        foreach ($this->names as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstName(callable $callback): self
    {
        if (($name = reset($this->names)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $newIds
     * @return self
     */
    public function setIds(array $newIds): self
    {
        $this->ids = $newIds;

        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $newId
     * @return self
     */
    public function addId(InvoiceSuiteIdDTO $newId): self
    {
        $this->ids[] = $newId;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasIds(): bool
    {
        return $this->ids !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachId(callable $callback): self
    {
        foreach ($this->ids as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstId(callable $callback): self
    {
        if (($name = reset($this->ids)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getGlobalIds(): array
    {
        return $this->globalIds;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $newGlobalIds
     * @return self
     */
    public function setGlobalIds(array $newGlobalIds): self
    {
        $this->globalIds = $newGlobalIds;

        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $newGlobalId
     * @return self
     */
    public function addGlobalId(InvoiceSuiteIdDTO $newGlobalId): self
    {
        $this->globalIds[] = $newGlobalId;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasGlobalIds(): bool
    {
        return $this->globalIds !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachGlobalId(callable $callback): self
    {
        foreach ($this->globalIds as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstGlobalId(callable $callback): self
    {
        if (($name = reset($this->globalIds)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getTaxRegistrations(): array
    {
        return $this->taxRegistrations;
    }

    /**
     * @param array<InvoiceSuiteIdDTO> $newTaxRegistrations
     * @return self
     */
    public function setTaxRegistrations(array $newTaxRegistrations): self
    {
        $this->taxRegistrations = $newTaxRegistrations;

        return $this;
    }

    /**
     * @param InvoiceSuiteIdDTO $newTaxRegistration
     * @return self
     */
    public function addTaxRegistration(InvoiceSuiteIdDTO $newTaxRegistration): self
    {
        $this->taxRegistrations[] = $newTaxRegistration;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasTaxRegistrations(): bool
    {
        return $this->taxRegistrations !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachTaxRegistration(callable $callback): self
    {
        foreach ($this->taxRegistrations as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstTaxRegistration(callable $callback): self
    {
        if (($name = reset($this->taxRegistrations)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteAddressDTO>
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param array<InvoiceSuiteAddressDTO> $newAddresses
     * @return self
     */
    public function setAddresses(array $newAddresses): self
    {
        $this->addresses = $newAddresses;

        return $this;
    }

    /**
     * @param InvoiceSuiteAddressDTO $newAddress
     * @return self
     */
    public function addAddress(InvoiceSuiteAddressDTO $newAddress): self
    {
        $this->addresses[] = $newAddress;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasAddresses(): bool
    {
        return $this->addresses !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachAddress(callable $callback): self
    {
        foreach ($this->addresses as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstAddress(callable $callback): self
    {
        if (($name = reset($this->addresses)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteOrganisationDTO>
     */
    public function getLogalOrganisations(): array
    {
        return $this->legalOrganisations;
    }

    /**
     * @param array<InvoiceSuiteOrganisationDTO> $newLegalOrganisations
     * @return self
     */
    public function setLegalOrganisations(array $newLegalOrganisations): self
    {
        $this->legalOrganisations = $newLegalOrganisations;

        return $this;
    }

    /**
     * @param InvoiceSuiteOrganisationDTO $newLegalOrganisation
     * @return self
     */
    public function addLegalOrganisation(InvoiceSuiteOrganisationDTO $newLegalOrganisation): self
    {
        $this->legalOrganisations[] = $newLegalOrganisation;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasLegalOrganisations(): bool
    {
        return $this->legalOrganisations !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachLegalOrganisation(callable $callback): self
    {
        foreach ($this->legalOrganisations as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstLogalOrganisation(callable $callback): self
    {
        if (($name = reset($this->legalOrganisations)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteContactDTO>
     */
    public function getContact(): array
    {
        return $this->contacts;
    }

    /**
     * @param array<InvoiceSuiteContactDTO> $newContacts
     * @return self
     */
    public function setContact(array $newContacts): self
    {
        $this->contacts = $newContacts;

        return $this;
    }

    /**
     * @param InvoiceSuiteContactDTO $newContact
     * @return self
     */
    public function addContact(InvoiceSuiteContactDTO $newContact): self
    {
        $this->contacts[] = $newContact;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasContact(): bool
    {
        return $this->contacts !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachContact(callable $callback): self
    {
        foreach ($this->contacts as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstContact(callable $callback): self
    {
        if (($name = reset($this->contacts)) !== false) {
            $callback($name);
        }

        return $this;
    }

    /**
     * @return array<InvoiceSuiteCommunicationDTO>
     */
    public function getCommunication(): array
    {
        return $this->communications;
    }

    /**
     * @param array<InvoiceSuiteCommunicationDTO> $newCommunications
     * @return self
     */
    public function setCommunication(array $newCommunications): self
    {
        $this->communications = $newCommunications;

        return $this;
    }

    /**
     * @param InvoiceSuiteCommunicationDTO $newCommunication
     * @return self
     */
    public function addCommunication(InvoiceSuiteCommunicationDTO $newCommunication): self
    {
        $this->communications[] = $newCommunication;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasCommunication(): bool
    {
        return $this->communications !== [];
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function forEachCommunication(callable $callback): self
    {
        foreach ($this->communications as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     * @return self
     */
    public function firstCommunication(callable $callback): self
    {
        if (($name = reset($this->communications)) !== false) {
            $callback($name);
        }

        return $this;
    }
}
