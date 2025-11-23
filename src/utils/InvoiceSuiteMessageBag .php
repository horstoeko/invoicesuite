<?php

declare(strict_types=1);

use ArrayAccess;
use ArrayIterator;
use Countable;
use DateTimeInterface;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use IteratorAggregate;
use Traversable;

/**
 * Class representing a collection (message bag) of messages.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @implements ArrayAccess<int, InvoiceSuiteMessageBagItem>
 * @implements IteratorAggregate<int, InvoiceSuiteMessageBagItem>
 */
final class InvoiceSuiteMessageBag implements ArrayAccess, IteratorAggregate, Countable
{
    /**
     * Stored message items.
     *
     * @var array<int, InvoiceSuiteMessageBagItem>
     */
    private array $messageBagItems = [];

    /**
     * Constructor. Keys from input are ignored and normalized to consecutive int keys (0..n-1).
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $messageBagItems initial message items
     * @throws InvoiceSuiteInvalidArgumentException   if any item is not an InvoiceSuiteMessageBagItem
     */
    public function __construct(array $messageBagItems = [])
    {
        $this->addMessages($messageBagItems);
    }

    /**
     * Add multiple message items to the bag (append).
     * Internally uses add() to keep behaviour in one place.
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $messageBagItems the message items to add
     * @throws InvoiceSuiteInvalidArgumentException   if any item is not an InvoiceSuiteMessageBagItem
     * @return self
     */
    public function addMessages(array $messageBagItems): self
    {
        foreach ($messageBagItems as $messageBagItem) {
            if (!$messageBagItem instanceof InvoiceSuiteMessageBagItem) {
                throw new InvoiceSuiteInvalidArgumentException(
                    'InvoiceSuiteMessageBag only accepts instances of InvoiceSuiteMessageBagItem.'
                );
            }

            $this->add($messageBagItem);
        }

        return $this;
    }

    /**
     * Add a message item to the bag (append).
     *
     * @param  InvoiceSuiteMessageBagItem $messageBagItem the message item to add
     * @return self
     */
    public function add(InvoiceSuiteMessageBagItem $messageBagItem): self
    {
        $this->messageBagItems[] = $messageBagItem;

        return $this;
    }

    /**
     * Convenience: create and add a message item in one call.
     *
     * If severity is not given, INFO is used.
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                           $newMessageContent   the message text
     * @param  null|InvoiceSuiteMessageSeverity $newMessageSeverity  the message severity (default INFO)
     * @param  null|DateTimeInterface           $newMessageTimestamp the message timestamp (default now)
     * @return self
     */
    public function addNewMessage(
        string $newMessageContent,
        ?InvoiceSuiteMessageSeverity $newMessageSeverity = null,
        ?DateTimeInterface $newMessageTimestamp = null
    ): self {
        return $this->add(new InvoiceSuiteMessageBagItem($newMessageContent, $newMessageSeverity, $newMessageTimestamp));
    }

    /**
     * Count message items.
     *
     * @return int number of stored message items
     */
    public function count(): int
    {
        return count($this->messageBagItems);
    }

    /**
     * Get iterator for foreach.
     *
     * @return Traversable<int, InvoiceSuiteMessageBagItem>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->messageBagItems);
    }

    /**
     * Whether a message index exists.
     *
     * @param  mixed $offset the index to check
     * @return bool  true if the index exists, otherwise false
     */
    public function offsetExists(mixed $offset): bool
    {
        return is_int($offset) && isset($this->messageBagItems[$offset]);
    }

    /**
     * Get message item at offset.
     *
     * @param  mixed                                $offset the index to read
     * @throws InvoiceSuiteInvalidArgumentException if offset is not an int
     * @return null|InvoiceSuiteMessageBagItem      the stored item or null if not found
     */
    public function offsetGet(mixed $offset): ?InvoiceSuiteMessageBagItem
    {
        if (!is_int($offset)) {
            throw new InvoiceSuiteInvalidArgumentException('Offset must be an int.');
        }

        return $this->messageBagItems[$offset] ?? null;
    }

    /**
     * Set message item at offset.
     * If offset is null, the item will be appended.
     * After setting a numeric offset, keys are normalized to 0..n-1 to avoid gaps.
     * Note: setting a high offset (e.g. 10) will append and reindex the bag.
     *
     * @param  mixed                                $offset the index to write (int) or null to append
     * @param  mixed                                $value  the value to set
     * @throws InvoiceSuiteInvalidArgumentException
     *                                              - if value is not an InvoiceSuiteMessageBagItem.
     *                                              - if offset is neither int nor null
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$value instanceof InvoiceSuiteMessageBagItem) {
            throw new InvoiceSuiteInvalidArgumentException(
                'InvoiceSuiteMessageBag only accepts instances of InvoiceSuiteMessageBagItem.'
            );
        }

        if ($offset === null) {
            $this->messageBagItems[] = $value;

            return;
        }

        if (!is_int($offset)) {
            throw new InvoiceSuiteInvalidArgumentException('Offset must be an int or null.');
        }

        $this->messageBagItems[$offset] = $value;

        $this->normalizeMessageBagItems();
    }

    /**
     * Unset message item at offset.
     * Reindexes items afterwards to keep consecutive int keys (0..n-1).
     *
     * @param  mixed $offset the index to remove
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        if (!is_int($offset)) {
            return;
        }

        unset($this->messageBagItems[$offset]);

        $this->normalizeMessageBagItems();
    }

    /**
     * Normalize internal message items array to consecutive int keys (0..n-1).
     *
     * @return void
     */
    private function normalizeMessageBagItems(): void
    {
        $this->messageBagItems = array_values($this->messageBagItems);
    }
}
