<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuitePartyDTO implements JsonSerializable
{
    /**
     * Party names
     *
     * @var array<string>
     */
    protected array $names = [];

    /**
     * Party descriptions
     *
     * @var array<string>
     */
    protected array $descriptions = [];

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
     * @param array<string>                       $descriptions       Party descriptions
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
        array $descriptions = [],
        array $ids = [],
        array $globalIds = [],
        array $taxRegistrations = [],
        array $addresses = [],
        array $legalOrganisations = [],
        array $contacts = [],
        array $communications = []
    ) {
        $this->setNames($names);
        $this->setDescriptions($descriptions);
        $this->setIds($ids);
        $this->setGlobalIds($globalIds);
        $this->setTaxRegistrations($taxRegistrations);
        $this->setAddresses($addresses);
        $this->setLegalOrganisations($legalOrganisations);
        $this->setContacts($contacts);
        $this->setCommunications($communications);
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
    public function setNames(
        array $names
    ): static {
        foreach ($names as $namesItem) {
            $this->addName($namesItem);
        }

        return $this;
    }

    /**
     * Add single Party names
     *
     * @param  string $name Party names
     * @return static
     */
    public function addName(
        ?string $name
    ): static {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($name)) {
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
    public function firstName(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($name = InvoiceSuiteArrayUtils::first($this->names)) !== false) {
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
    public function nextName(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($name = InvoiceSuiteArrayUtils::next($this->names)) !== false) {
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
    public function previousName(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($name = InvoiceSuiteArrayUtils::previous($this->names)) !== false) {
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
    public function lastName(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($name = InvoiceSuiteArrayUtils::last($this->names)) !== false) {
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
    public function forEachName(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
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
     * Loop over Party names and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstName(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstName($callback, $callbackElse);
        }

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
     * Filter Party names
     *
     * @param  callable      $callback Callback to execute filtering for each item
     * @return array<string>
     */
    public function filterName(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->names, $callback);
    }

    /**
     * Get first Party names from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstName(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredName = $this->filterName($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredName)) {
            $name = InvoiceSuiteArrayUtils::first($filteredName);
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party names from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastName(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredName = $this->filterName($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredName)) {
            $name = InvoiceSuiteArrayUtils::last($filteredName);
            $callback($name);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Returns party descriptions
     *
     * @return array<string>
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * Sets party descriptions
     *
     * @param  array<string> $descriptions Party descriptions
     * @return static
     */
    public function setDescriptions(
        array $descriptions
    ): static {
        foreach ($descriptions as $descriptionsItem) {
            $this->addDescription($descriptionsItem);
        }

        return $this;
    }

    /**
     * Add single Party descriptions
     *
     * @param  string $description Party descriptions
     * @return static
     */
    public function addDescription(
        ?string $description
    ): static {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($description)) {
            return $this;
        }

        $this->descriptions[] = $description;

        return $this;
    }

    /**
     * Get first Party descriptions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function firstDescription(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($description = InvoiceSuiteArrayUtils::first($this->descriptions)) !== false) {
            $callback($description);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get next Party descriptions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function nextDescription(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($description = InvoiceSuiteArrayUtils::next($this->descriptions)) !== false) {
            $callback($description);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get previous Party descriptions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function previousDescription(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($description = InvoiceSuiteArrayUtils::previous($this->descriptions)) !== false) {
            $callback($description);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party descriptions
     *
     * @param  callable      $callback     Callback to execute if an item was found
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @return static
     */
    public function lastDescription(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($description = InvoiceSuiteArrayUtils::last($this->descriptions)) !== false) {
            $callback($description);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party descriptions and execute callback
     *
     * @param  callable      $callback     Callback to execute for each item
     * @param  null|callable $callbackElse Callback to execute if no item was found
     * @param  null|int      $limit        Maximum number of loops
     * @return static
     */
    public function forEachDescription(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        $count = 0;

        foreach ($this->descriptions as $description) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($description);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Loop over Party descriptions and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstDescription(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstDescription($callback, $callbackElse);
        }

        $count = 0;

        foreach ($this->descriptions as $description) {
            if (null !== $limit && $count >= $limit) {
                break;
            }

            ++$count;

            $callback($description);
        }

        if (0 === $count && !is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Filter Party descriptions
     *
     * @param  callable      $callback Callback to execute filtering for each item
     * @return array<string>
     */
    public function filterDescription(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->descriptions, $callback);
    }

    /**
     * Get first Party descriptions from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstDescription(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDescription = $this->filterDescription($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDescription)) {
            $description = InvoiceSuiteArrayUtils::first($filteredDescription);
            $callback($description);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party descriptions from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastDescription(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredDescription = $this->filterDescription($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredDescription)) {
            $description = InvoiceSuiteArrayUtils::last($filteredDescription);
            $callback($description);
        } elseif (!is_null($callbackElse)) {
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
    public function setIds(
        array $ids
    ): static {
        foreach ($ids as $idsItem) {
            $this->addId($idsItem);
        }

        return $this;
    }

    /**
     * Add single Party IDs
     *
     * @param  InvoiceSuiteIdDTO $id Party IDs
     * @return static
     */
    public function addId(
        ?InvoiceSuiteIdDTO $id
    ): static {
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
    public function firstId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($id = InvoiceSuiteArrayUtils::first($this->ids)) !== false) {
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
    public function nextId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($id = InvoiceSuiteArrayUtils::next($this->ids)) !== false) {
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
    public function previousId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($id = InvoiceSuiteArrayUtils::previous($this->ids)) !== false) {
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
    public function lastId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($id = InvoiceSuiteArrayUtils::last($this->ids)) !== false) {
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
    public function forEachId(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
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
     * Loop over Party IDs and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstId(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstId($callback, $callbackElse);
        }

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
     * Filter Party IDs
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterId(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->ids, $callback);
    }

    /**
     * Get first Party IDs from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstId(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredId = $this->filterId($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredId)) {
            $id = InvoiceSuiteArrayUtils::first($filteredId);
            $callback($id);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party IDs from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastId(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredId = $this->filterId($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredId)) {
            $id = InvoiceSuiteArrayUtils::last($filteredId);
            $callback($id);
        } elseif (!is_null($callbackElse)) {
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
    public function setGlobalIds(
        array $globalIds
    ): static {
        foreach ($globalIds as $globalIdsItem) {
            $this->addGlobalId($globalIdsItem);
        }

        return $this;
    }

    /**
     * Add single Party global IDs
     *
     * @param  InvoiceSuiteIdDTO $globalId Party global IDs
     * @return static
     */
    public function addGlobalId(
        ?InvoiceSuiteIdDTO $globalId
    ): static {
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
    public function firstGlobalId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($globalId = InvoiceSuiteArrayUtils::first($this->globalIds)) !== false) {
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
    public function nextGlobalId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($globalId = InvoiceSuiteArrayUtils::next($this->globalIds)) !== false) {
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
    public function previousGlobalId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($globalId = InvoiceSuiteArrayUtils::previous($this->globalIds)) !== false) {
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
    public function lastGlobalId(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($globalId = InvoiceSuiteArrayUtils::last($this->globalIds)) !== false) {
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
    public function forEachGlobalId(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
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
     * Loop over Party global IDs and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstGlobalId(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstGlobalId($callback, $callbackElse);
        }

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
     * Filter Party global IDs
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterGlobalId(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->globalIds, $callback);
    }

    /**
     * Get first Party global IDs from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstGlobalId(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredGlobalId = $this->filterGlobalId($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredGlobalId)) {
            $globalId = InvoiceSuiteArrayUtils::first($filteredGlobalId);
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party global IDs from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastGlobalId(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredGlobalId = $this->filterGlobalId($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredGlobalId)) {
            $globalId = InvoiceSuiteArrayUtils::last($filteredGlobalId);
            $callback($globalId);
        } elseif (!is_null($callbackElse)) {
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
    public function setTaxRegistrations(
        array $taxRegistrations
    ): static {
        foreach ($taxRegistrations as $taxRegistrationsItem) {
            $this->addTaxRegistration($taxRegistrationsItem);
        }

        return $this;
    }

    /**
     * Add single Party tax registrations
     *
     * @param  InvoiceSuiteIdDTO $taxRegistration Party tax registrations
     * @return static
     */
    public function addTaxRegistration(
        ?InvoiceSuiteIdDTO $taxRegistration
    ): static {
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
    public function firstTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($taxRegistration = InvoiceSuiteArrayUtils::first($this->taxRegistrations)) !== false) {
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
    public function nextTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($taxRegistration = InvoiceSuiteArrayUtils::next($this->taxRegistrations)) !== false) {
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
    public function previousTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($taxRegistration = InvoiceSuiteArrayUtils::previous($this->taxRegistrations)) !== false) {
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
    public function lastTaxRegistration(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($taxRegistration = InvoiceSuiteArrayUtils::last($this->taxRegistrations)) !== false) {
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
        ?int $limit = null
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
     * Loop over Party tax registrations and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstTaxRegistration(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstTaxRegistration($callback, $callbackElse);
        }

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
     * Filter Party tax registrations
     *
     * @param  callable                 $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteIdDTO>
     */
    public function filterTaxRegistration(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->taxRegistrations, $callback);
    }

    /**
     * Get first Party tax registrations from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstTaxRegistration(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredTaxRegistration = $this->filterTaxRegistration($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredTaxRegistration)) {
            $taxRegistration = InvoiceSuiteArrayUtils::first($filteredTaxRegistration);
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party tax registrations from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastTaxRegistration(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredTaxRegistration = $this->filterTaxRegistration($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredTaxRegistration)) {
            $taxRegistration = InvoiceSuiteArrayUtils::last($filteredTaxRegistration);
            $callback($taxRegistration);
        } elseif (!is_null($callbackElse)) {
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
    public function setAddresses(
        array $addresses
    ): static {
        foreach ($addresses as $addressesItem) {
            $this->addAddress($addressesItem);
        }

        return $this;
    }

    /**
     * Add single Party addresses
     *
     * @param  InvoiceSuiteAddressDTO $address Party addresses
     * @return static
     */
    public function addAddress(
        ?InvoiceSuiteAddressDTO $address
    ): static {
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
    public function firstAddress(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($address = InvoiceSuiteArrayUtils::first($this->addresses)) !== false) {
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
    public function nextAddress(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($address = InvoiceSuiteArrayUtils::next($this->addresses)) !== false) {
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
    public function previousAddress(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($address = InvoiceSuiteArrayUtils::previous($this->addresses)) !== false) {
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
    public function lastAddress(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($address = InvoiceSuiteArrayUtils::last($this->addresses)) !== false) {
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
    public function forEachAddress(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
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
     * Loop over Party addresses and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstAddress(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstAddress($callback, $callbackElse);
        }

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
     * Filter Party addresses
     *
     * @param  callable                      $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteAddressDTO>
     */
    public function filterAddress(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->addresses, $callback);
    }

    /**
     * Get first Party addresses from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstAddress(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAddress = $this->filterAddress($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAddress)) {
            $address = InvoiceSuiteArrayUtils::first($filteredAddress);
            $callback($address);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party addresses from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastAddress(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredAddress = $this->filterAddress($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredAddress)) {
            $address = InvoiceSuiteArrayUtils::last($filteredAddress);
            $callback($address);
        } elseif (!is_null($callbackElse)) {
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
    public function setLegalOrganisations(
        array $legalOrganisations
    ): static {
        foreach ($legalOrganisations as $legalOrganisationsItem) {
            $this->addLegalOrganisation($legalOrganisationsItem);
        }

        return $this;
    }

    /**
     * Add single Party legal organisations
     *
     * @param  InvoiceSuiteOrganisationDTO $legalOrganisation Party legal organisations
     * @return static
     */
    public function addLegalOrganisation(
        ?InvoiceSuiteOrganisationDTO $legalOrganisation
    ): static {
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
    public function firstLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($legalOrganisation = InvoiceSuiteArrayUtils::first($this->legalOrganisations)) !== false) {
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
    public function nextLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($legalOrganisation = InvoiceSuiteArrayUtils::next($this->legalOrganisations)) !== false) {
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
    public function previousLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($legalOrganisation = InvoiceSuiteArrayUtils::previous($this->legalOrganisations)) !== false) {
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
    public function lastLegalOrganisation(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($legalOrganisation = InvoiceSuiteArrayUtils::last($this->legalOrganisations)) !== false) {
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
        ?int $limit = null
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
     * Loop over Party legal organisations and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstLegalOrganisation(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstLegalOrganisation($callback, $callbackElse);
        }

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
     * Filter Party legal organisations
     *
     * @param  callable                           $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteOrganisationDTO>
     */
    public function filterLegalOrganisation(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->legalOrganisations, $callback);
    }

    /**
     * Get first Party legal organisations from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstLegalOrganisation(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredLegalOrganisation = $this->filterLegalOrganisation($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredLegalOrganisation)) {
            $legalOrganisation = InvoiceSuiteArrayUtils::first($filteredLegalOrganisation);
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party legal organisations from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastLegalOrganisation(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredLegalOrganisation = $this->filterLegalOrganisation($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredLegalOrganisation)) {
            $legalOrganisation = InvoiceSuiteArrayUtils::last($filteredLegalOrganisation);
            $callback($legalOrganisation);
        } elseif (!is_null($callbackElse)) {
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
    public function setContacts(
        array $contacts
    ): static {
        foreach ($contacts as $contactsItem) {
            $this->addContact($contactsItem);
        }

        return $this;
    }

    /**
     * Add single Party contacts
     *
     * @param  InvoiceSuiteContactDTO $contact Party contacts
     * @return static
     */
    public function addContact(
        ?InvoiceSuiteContactDTO $contact
    ): static {
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
    public function firstContact(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contact = InvoiceSuiteArrayUtils::first($this->contacts)) !== false) {
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
    public function nextContact(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contact = InvoiceSuiteArrayUtils::next($this->contacts)) !== false) {
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
    public function previousContact(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contact = InvoiceSuiteArrayUtils::previous($this->contacts)) !== false) {
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
    public function lastContact(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($contact = InvoiceSuiteArrayUtils::last($this->contacts)) !== false) {
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
    public function forEachContact(
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
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
     * Loop over Party contacts and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstContact(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstContact($callback, $callbackElse);
        }

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
     * Filter Party contacts
     *
     * @param  callable                      $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteContactDTO>
     */
    public function filterContact(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->contacts, $callback);
    }

    /**
     * Get first Party contacts from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstContact(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredContact = $this->filterContact($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredContact)) {
            $contact = InvoiceSuiteArrayUtils::first($filteredContact);
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party contacts from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastContact(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredContact = $this->filterContact($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredContact)) {
            $contact = InvoiceSuiteArrayUtils::last($filteredContact);
            $callback($contact);
        } elseif (!is_null($callbackElse)) {
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
    public function setCommunications(
        array $communications
    ): static {
        foreach ($communications as $communicationsItem) {
            $this->addCommunication($communicationsItem);
        }

        return $this;
    }

    /**
     * Add single Party electronic communications
     *
     * @param  InvoiceSuiteCommunicationDTO $communication Party electronic communications
     * @return static
     */
    public function addCommunication(
        ?InvoiceSuiteCommunicationDTO $communication
    ): static {
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
    public function firstCommunication(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($communication = InvoiceSuiteArrayUtils::first($this->communications)) !== false) {
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
    public function nextCommunication(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($communication = InvoiceSuiteArrayUtils::next($this->communications)) !== false) {
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
    public function previousCommunication(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($communication = InvoiceSuiteArrayUtils::previous($this->communications)) !== false) {
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
    public function lastCommunication(
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        if (($communication = InvoiceSuiteArrayUtils::last($this->communications)) !== false) {
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
        ?int $limit = null
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

    /**
     * Loop over Party electronic communications and execute callback
     *
     * @param  bool          $foreachCondition If this is true all items will be retrieved, otherwise the first item is retrieved
     * @param  callable      $callback         Callback to execute for each item
     * @param  null|callable $callbackElse     Callback to execute if no item was found
     * @param  null|int      $limit            Maximum number of loops
     * @return static
     */
    public function forEachOrFirstCommunication(
        bool $foreachCondition,
        callable $callback,
        ?callable $callbackElse = null,
        ?int $limit = null
    ): static {
        if (!$foreachCondition) {
            return $this->firstCommunication($callback, $callbackElse);
        }

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

    /**
     * Filter Party electronic communications
     *
     * @param  callable                            $callback Callback to execute filtering for each item
     * @return array<InvoiceSuiteCommunicationDTO>
     */
    public function filterCommunication(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->communications, $callback);
    }

    /**
     * Get first Party electronic communications from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterFirstCommunication(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredCommunication = $this->filterCommunication($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredCommunication)) {
            $communication = InvoiceSuiteArrayUtils::first($filteredCommunication);
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }

    /**
     * Get last Party electronic communications from filtered result
     *
     * @param  callable      $filterCallback Callback for filtering
     * @param  callable      $callback       Callback to execute if an item was found
     * @param  null|callable $callbackElse   Callback to execute if no item was found
     * @return static
     */
    public function filterLastCommunication(
        callable $filterCallback,
        callable $callback,
        ?callable $callbackElse = null
    ): static {
        $filteredCommunication = $this->filterCommunication($filterCallback);

        if (!InvoiceSuiteArrayUtils::empty($filteredCommunication)) {
            $communication = InvoiceSuiteArrayUtils::last($filteredCommunication);
            $callback($communication);
        } elseif (!is_null($callbackElse)) {
            $callbackElse();
        }

        return $this;
    }
}
