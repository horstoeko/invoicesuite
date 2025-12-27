<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
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
     * @param array<string>                       $names              Party names
     * @param array<InvoiceSuiteIdDTO>            $ids                Party IDs
     * @param array<InvoiceSuiteIdDTO>            $globalIds          Party global IDs
     * @param array<InvoiceSuiteIdDTO>            $taxRegistrations   Party tax registrations
     * @param array<InvoiceSuiteAddressDTO>       $addresses          Party addresses
     * @param array<InvoiceSuiteOrganisationDTO>  $legalOrganisations Party legal organisations
     * @param array<InvoiceSuiteContactDTO>       $contacts           Party contacts
     * @param array<InvoiceSuiteCommunicationDTO> $communications     Party electronic communications
     */
    public function __construct(
        array $names = [],
        array $ids = [],
        array $globalIds = [],
        array $taxRegistrations = [],
        array $addresses = [],
        array $legalOrganisations = [],
        array $contacts = [],
        array $communications = [],
    ) {
        $this->setNames($names);
        $this->setIds($ids);
        $this->setGlobalIds($globalIds);
        $this->setTaxRegistrations($taxRegistrations);
        $this->setAddresses($addresses);
        $this->setLegalOrganisations($legalOrganisations);
        $this->setContacts($contacts);
        $this->setCommunications($communications);
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
     * @param  array<string> $names Party names
     * @return static
     */
    public function setNames(array $names): static
    {
        $this->names = $names;

        return $this;
    }

    /**
     * Add single Party names
     *
     * @param  string $name Party names
     * @return static
     */
    public function addName(?string $name): static
    {
        if (is_null($name)) {
            return $this;
        }

        $this->names[] = $name;

        return $this;
    }

    /**
     * Get first Party names
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstName(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextName(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousName(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastName(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachName(callable $callback, ?callable $callbackElse = null, ?int $limit = null): static
    {
        $count = 0;

        foreach ($this->names as $name) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($name);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteIdDTO> $ids Party IDs
     * @return static
     */
    public function setIds(array $ids): static
    {
        $this->ids = $ids;

        return $this;
    }

    /**
     * Add single Party IDs
     *
     * @param  InvoiceSuiteIdDTO $id Party IDs
     * @return static
     */
    public function addId(?InvoiceSuiteIdDTO $id): static
    {
        if (is_null($id)) {
            return $this;
        }

        $this->ids[] = $id;

        return $this;
    }

    /**
     * Get first Party IDs
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachId(callable $callback, ?callable $callbackElse = null, ?int $limit = null): static
    {
        $count = 0;

        foreach ($this->ids as $id) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($id);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteIdDTO> $globalIds Party global IDs
     * @return static
     */
    public function setGlobalIds(array $globalIds): static
    {
        $this->globalIds = $globalIds;

        return $this;
    }

    /**
     * Add single Party global IDs
     *
     * @param  InvoiceSuiteIdDTO $globalId Party global IDs
     * @return static
     */
    public function addGlobalId(?InvoiceSuiteIdDTO $globalId): static
    {
        if (is_null($globalId)) {
            return $this;
        }

        $this->globalIds[] = $globalId;

        return $this;
    }

    /**
     * Get first Party global IDs
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstGlobalId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextGlobalId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousGlobalId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastGlobalId(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachGlobalId(callable $callback, ?callable $callbackElse = null, ?int $limit = null): static
    {
        $count = 0;

        foreach ($this->globalIds as $globalId) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($globalId);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteIdDTO> $taxRegistrations Party tax registrations
     * @return static
     */
    public function setTaxRegistrations(array $taxRegistrations): static
    {
        $this->taxRegistrations = $taxRegistrations;

        return $this;
    }

    /**
     * Add single Party tax registrations
     *
     * @param  InvoiceSuiteIdDTO $taxRegistration Party tax registrations
     * @return static
     */
    public function addTaxRegistration(?InvoiceSuiteIdDTO $taxRegistration): static
    {
        if (is_null($taxRegistration)) {
            return $this;
        }

        $this->taxRegistrations[] = $taxRegistration;

        return $this;
    }

    /**
     * Get first Party tax registrations
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstTaxRegistration(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextTaxRegistration(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousTaxRegistration(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastTaxRegistration(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->taxRegistrations as $taxRegistration) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($taxRegistration);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteAddressDTO> $addresses Party addresses
     * @return static
     */
    public function setAddresses(array $addresses): static
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Add single Party addresses
     *
     * @param  InvoiceSuiteAddressDTO $address Party addresses
     * @return static
     */
    public function addAddress(?InvoiceSuiteAddressDTO $address): static
    {
        if (is_null($address)) {
            return $this;
        }

        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Get first Party addresses
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstAddress(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextAddress(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousAddress(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastAddress(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachAddress(callable $callback, ?callable $callbackElse = null, ?int $limit = null): static
    {
        $count = 0;

        foreach ($this->addresses as $address) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($address);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteOrganisationDTO> $legalOrganisations Party legal organisations
     * @return static
     */
    public function setLegalOrganisations(array $legalOrganisations): static
    {
        $this->legalOrganisations = $legalOrganisations;

        return $this;
    }

    /**
     * Add single Party legal organisations
     *
     * @param  InvoiceSuiteOrganisationDTO $legalOrganisation Party legal organisations
     * @return static
     */
    public function addLegalOrganisation(?InvoiceSuiteOrganisationDTO $legalOrganisation): static
    {
        if (is_null($legalOrganisation)) {
            return $this;
        }

        $this->legalOrganisations[] = $legalOrganisation;

        return $this;
    }

    /**
     * Get first Party legal organisations
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstLegalOrganisation(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextLegalOrganisation(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousLegalOrganisation(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastLegalOrganisation(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->legalOrganisations as $legalOrganisation) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($legalOrganisation);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteContactDTO> $contacts Party contacts
     * @return static
     */
    public function setContacts(array $contacts): static
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * Add single Party contacts
     *
     * @param  InvoiceSuiteContactDTO $contact Party contacts
     * @return static
     */
    public function addContact(?InvoiceSuiteContactDTO $contact): static
    {
        if (is_null($contact)) {
            return $this;
        }

        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Get first Party contacts
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstContact(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextContact(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousContact(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastContact(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachContact(callable $callback, ?callable $callbackElse = null, ?int $limit = null): static
    {
        $count = 0;

        foreach ($this->contacts as $contact) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($contact);
        }

        if (0 === $count && !is_null($callbackElse)) {
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
     * @param  array<InvoiceSuiteCommunicationDTO> $communications Party electronic communications
     * @return static
     */
    public function setCommunications(array $communications): static
    {
        $this->communications = $communications;

        return $this;
    }

    /**
     * Add single Party electronic communications
     *
     * @param  InvoiceSuiteCommunicationDTO $communication Party electronic communications
     * @return static
     */
    public function addCommunication(?InvoiceSuiteCommunicationDTO $communication): static
    {
        if (is_null($communication)) {
            return $this;
        }

        $this->communications[] = $communication;

        return $this;
    }

    /**
     * Get first Party electronic communications
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstCommunication(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextCommunication(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousCommunication(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastCommunication(callable $callback, ?callable $callbackElse = null): static
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
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachCommunication(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null,
    ): static {
        $count = 0;

        foreach ($this->communications as $communication) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($communication);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
