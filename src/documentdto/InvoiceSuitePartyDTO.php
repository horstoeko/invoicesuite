<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documentdto;

/**
 * Class representing a DTO for...
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
     * Party names
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
     * Party global IDs
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $globalIds = [];

    /**
     * Party tax registrations
     *
     * @var array<InvoiceSuiteIdDTO>
     */
    protected array $taxRegistrations = [];

    /**
     * Party addresses
     *
     * @var array<InvoiceSuiteAddressDTO>
     */
    protected array $addresses = [];

    /**
     * Party legal organisations
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
     * Party electronic communications
     *
     * @var array<InvoiceSuiteCommunicationDTO>
     */
    protected array $communications = [];

    /**
     * Constructor
     *
     * @param array<string> $name Party names
     * @param array<InvoiceSuiteIdDTO> $id Party IDs
     * @param array<InvoiceSuiteIdDTO> $globalId Party global IDs
     * @param array<InvoiceSuiteIdDTO> $taxRegistration Party tax registrations
     * @param array<InvoiceSuiteAddressDTO> $address Party addresses
     * @param array<InvoiceSuiteOrganisationDTO> $legalOrganisation Party legal organisations
     * @param array<InvoiceSuiteContactDTO> $contact Party contacts
     * @param array<InvoiceSuiteCommunicationDTO> $communication Party electronic communications
     */
    public function __construct(
        array $name = [],
        array $id = [],
        array $globalId = [],
        array $taxRegistration = [],
        array $address = [],
        array $legalOrganisation = [],
        array $contact = [],
        array $communication = [],
    ) {
        $this->setNames($name);
        $this->setIds($id);
        $this->setGlobalIds($globalId);
        $this->setTaxRegistrations($taxRegistration);
        $this->setAddresses($address);
        $this->setLegalOrganisations($legalOrganisation);
        $this->setContacts($contact);
        $this->setCommunications($communication);
    }

    /**
     * Returns party names
     *
     * @return array<string>
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * Sets party names
     *
     * @param array<string> $name Party names
     * @return self
     */
    public function setNames(array $name): self
    {
        $this->names = $name;

        return $this;
    }

    /**
     * Add single Party names
     *
     * @param string $name Party names
     * @return self
     */
    public function addName(string $name): self
    {
        $this->names[] = $name;

        return $this;
    }

    /**
     * Get first Party names
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstName(callable $callback, ?callable $callbackElse = null): self
    {
        if (($name = reset($this->names)) !== false) {
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party names
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextName(callable $callback, ?callable $callbackElse = null): self
    {
        if (($name = next($this->names)) !== false) {
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party names
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousName(callable $callback, ?callable $callbackElse = null): self
    {
        if (($name = prev($this->names)) !== false) {
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party names
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastName(callable $callback, ?callable $callbackElse = null): self
    {
        if (($name = end($this->names)) !== false) {
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party names and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachName(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->names as $name) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($name);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party IDs
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * Sets party IDs
     *
     * @param array<InvoiceSuiteIdDTO> $id Party IDs
     * @return self
     */
    public function setIds(array $id): self
    {
        $this->ids = $id;

        return $this;
    }

    /**
     * Add single Party IDs
     *
     * @param InvoiceSuiteIdDTO $id Party IDs
     * @return self
     */
    public function addId(InvoiceSuiteIdDTO $id): self
    {
        $this->ids[] = $id;

        return $this;
    }

    /**
     * Get first Party IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($id = reset($this->ids)) !== false) {
            $callback($id);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($id = next($this->ids)) !== false) {
            $callback($id);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($id = prev($this->ids)) !== false) {
            $callback($id);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($id = end($this->ids)) !== false) {
            $callback($id);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party IDs and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachId(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->ids as $id) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($id);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party global IDs
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getGlobalIds(): array
    {
        return $this->globalIds;
    }

    /**
     * Sets party global IDs
     *
     * @param array<InvoiceSuiteIdDTO> $globalId Party global IDs
     * @return self
     */
    public function setGlobalIds(array $globalId): self
    {
        $this->globalIds = $globalId;

        return $this;
    }

    /**
     * Add single Party global IDs
     *
     * @param InvoiceSuiteIdDTO $globalId Party global IDs
     * @return self
     */
    public function addGlobalId(InvoiceSuiteIdDTO $globalId): self
    {
        $this->globalIds[] = $globalId;

        return $this;
    }

    /**
     * Get first Party global IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstGlobalId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($globalId = reset($this->globalIds)) !== false) {
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party global IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextGlobalId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($globalId = next($this->globalIds)) !== false) {
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party global IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousGlobalId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($globalId = prev($this->globalIds)) !== false) {
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party global IDs
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastGlobalId(callable $callback, ?callable $callbackElse = null): self
    {
        if (($globalId = end($this->globalIds)) !== false) {
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party global IDs and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachGlobalId(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->globalIds as $globalId) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($globalId);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party tax registrations
     *
     * @return array<InvoiceSuiteIdDTO>
     */
    public function getTaxRegistrations(): array
    {
        return $this->taxRegistrations;
    }

    /**
     * Sets party tax registrations
     *
     * @param array<InvoiceSuiteIdDTO> $taxRegistration Party tax registrations
     * @return self
     */
    public function setTaxRegistrations(array $taxRegistration): self
    {
        $this->taxRegistrations = $taxRegistration;

        return $this;
    }

    /**
     * Add single Party tax registrations
     *
     * @param InvoiceSuiteIdDTO $taxRegistration Party tax registrations
     * @return self
     */
    public function addTaxRegistration(InvoiceSuiteIdDTO $taxRegistration): self
    {
        $this->taxRegistrations[] = $taxRegistration;

        return $this;
    }

    /**
     * Get first Party tax registrations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstTaxRegistration(callable $callback, ?callable $callbackElse = null): self
    {
        if (($taxRegistration = reset($this->taxRegistrations)) !== false) {
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party tax registrations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextTaxRegistration(callable $callback, ?callable $callbackElse = null): self
    {
        if (($taxRegistration = next($this->taxRegistrations)) !== false) {
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party tax registrations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousTaxRegistration(callable $callback, ?callable $callbackElse = null): self
    {
        if (($taxRegistration = prev($this->taxRegistrations)) !== false) {
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party tax registrations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastTaxRegistration(callable $callback, ?callable $callbackElse = null): self
    {
        if (($taxRegistration = end($this->taxRegistrations)) !== false) {
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party tax registrations and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->taxRegistrations as $taxRegistration) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($taxRegistration);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party addresses
     *
     * @return array<InvoiceSuiteAddressDTO>
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * Sets party addresses
     *
     * @param array<InvoiceSuiteAddressDTO> $address Party addresses
     * @return self
     */
    public function setAddresses(array $address): self
    {
        $this->addresses = $address;

        return $this;
    }

    /**
     * Add single Party addresses
     *
     * @param InvoiceSuiteAddressDTO $address Party addresses
     * @return self
     */
    public function addAddress(InvoiceSuiteAddressDTO $address): self
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Get first Party addresses
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstAddress(callable $callback, ?callable $callbackElse = null): self
    {
        if (($address = reset($this->addresses)) !== false) {
            $callback($address);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party addresses
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextAddress(callable $callback, ?callable $callbackElse = null): self
    {
        if (($address = next($this->addresses)) !== false) {
            $callback($address);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party addresses
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousAddress(callable $callback, ?callable $callbackElse = null): self
    {
        if (($address = prev($this->addresses)) !== false) {
            $callback($address);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party addresses
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastAddress(callable $callback, ?callable $callbackElse = null): self
    {
        if (($address = end($this->addresses)) !== false) {
            $callback($address);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party addresses and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachAddress(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->addresses as $address) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($address);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party legal organisations
     *
     * @return array<InvoiceSuiteOrganisationDTO>
     */
    public function getLegalOrganisations(): array
    {
        return $this->legalOrganisations;
    }

    /**
     * Sets party legal organisations
     *
     * @param array<InvoiceSuiteOrganisationDTO> $legalOrganisation Party legal organisations
     * @return self
     */
    public function setLegalOrganisations(array $legalOrganisation): self
    {
        $this->legalOrganisations = $legalOrganisation;

        return $this;
    }

    /**
     * Add single Party legal organisations
     *
     * @param InvoiceSuiteOrganisationDTO $legalOrganisation Party legal organisations
     * @return self
     */
    public function addLegalOrganisation(InvoiceSuiteOrganisationDTO $legalOrganisation): self
    {
        $this->legalOrganisations[] = $legalOrganisation;

        return $this;
    }

    /**
     * Get first Party legal organisations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstLegalOrganisation(callable $callback, ?callable $callbackElse = null): self
    {
        if (($legalOrganisation = reset($this->legalOrganisations)) !== false) {
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party legal organisations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextLegalOrganisation(callable $callback, ?callable $callbackElse = null): self
    {
        if (($legalOrganisation = next($this->legalOrganisations)) !== false) {
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party legal organisations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousLegalOrganisation(callable $callback, ?callable $callbackElse = null): self
    {
        if (($legalOrganisation = prev($this->legalOrganisations)) !== false) {
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party legal organisations
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastLegalOrganisation(callable $callback, ?callable $callbackElse = null): self
    {
        if (($legalOrganisation = end($this->legalOrganisations)) !== false) {
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party legal organisations and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): self {
        $count = 0;

        foreach ($this->legalOrganisations as $legalOrganisation) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($legalOrganisation);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party contacts
     *
     * @return array<InvoiceSuiteContactDTO>
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * Sets party contacts
     *
     * @param array<InvoiceSuiteContactDTO> $contact Party contacts
     * @return self
     */
    public function setContacts(array $contact): self
    {
        $this->contacts = $contact;

        return $this;
    }

    /**
     * Add single Party contacts
     *
     * @param InvoiceSuiteContactDTO $contact Party contacts
     * @return self
     */
    public function addContact(InvoiceSuiteContactDTO $contact): self
    {
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Get first Party contacts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstContact(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contact = reset($this->contacts)) !== false) {
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party contacts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextContact(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contact = next($this->contacts)) !== false) {
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party contacts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousContact(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contact = prev($this->contacts)) !== false) {
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party contacts
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastContact(callable $callback, ?callable $callbackElse = null): self
    {
        if (($contact = end($this->contacts)) !== false) {
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party contacts and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachContact(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->contacts as $contact) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($contact);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party electronic communications
     *
     * @return array<InvoiceSuiteCommunicationDTO>
     */
    public function getCommunications(): array
    {
        return $this->communications;
    }

    /**
     * Sets party electronic communications
     *
     * @param array<InvoiceSuiteCommunicationDTO> $communication Party electronic communications
     * @return self
     */
    public function setCommunications(array $communication): self
    {
        $this->communications = $communication;

        return $this;
    }

    /**
     * Add single Party electronic communications
     *
     * @param InvoiceSuiteCommunicationDTO $communication Party electronic communications
     * @return self
     */
    public function addCommunication(InvoiceSuiteCommunicationDTO $communication): self
    {
        $this->communications[] = $communication;

        return $this;
    }

    /**
     * Get first Party electronic communications
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function firstCommunication(callable $callback, ?callable $callbackElse = null): self
    {
        if (($communication = reset($this->communications)) !== false) {
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party electronic communications
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function nextCommunication(callable $callback, ?callable $callbackElse = null): self
    {
        if (($communication = next($this->communications)) !== false) {
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party electronic communications
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function previousCommunication(callable $callback, ?callable $callbackElse = null): self
    {
        if (($communication = prev($this->communications)) !== false) {
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party electronic communications
     *
     * @param callable $callback Callback to execute if an item was found
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @return self
     */
    public function lastCommunication(callable $callback, ?callable $callbackElse = null): self
    {
        if (($communication = end($this->communications)) !== false) {
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party electronic communications and execute callback
     *
     * @param callable $callback Callback to execute for each item
     * @param callable|null $callbackElse Callback to execute if no item was found
     * @param int|null $limit Maximum number of loops
     * @return self
     */
    public function forEachCommunication(callable $callback, ?callable $callbackElse = null, ?int $limit = null): self
    {
        $count = 0;

        foreach ($this->communications as $communication) {
            if ($limit !== null && $count >= $limit) {
                break;
            }

            $count++;

            $callback($communication);
        }

        if ($count === 0 && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
