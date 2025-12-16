<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

use ArrayAccess;
use ArrayIterator;
use Countable;
use DateTimeInterface;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use IteratorAggregate;
use LogicException;
use Traversable;

/**
 * Class representing a collection (message bag) of InvoiceSuiteMessageBagItem.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @implements ArrayAccess<int, InvoiceSuiteMessageBagItem>
 * @implements IteratorAggregate<int, InvoiceSuiteMessageBagItem>
 */
class InvoiceSuiteMessageBag implements ArrayAccess, IteratorAggregate, Countable
{
    /**
     * Stored message items.
     *
     * @var array<int, InvoiceSuiteMessageBagItem>
     */
    private array $messageBagItems = [];

    /**
     * Constructor.
     * Keys from input are ignored and normalized to consecutive int keys (0..n-1).
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $newMessageBagItems initial message items
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function __construct(array $newMessageBagItems = [])
    {
        $this->addMessages($newMessageBagItems);
    }

    /**
     * Clears the internal message container
     *
     * @return static
     */
    public function clear(): static
    {
        $this->messageBagItems = [];

        return $this;
    }

    /**
     * Add multiple message items to the bag (append).
     * Internally uses add() to keep behaviour in one place.
     *
     * @param  array<int, InvoiceSuiteMessageBagItem> $newMessageBagItems The message items to add
     * @throws InvoiceSuiteInvalidArgumentException
     * @return static
     */
    public function addMessages(array $newMessageBagItems): static
    {
        foreach ($newMessageBagItems as $messageBagItem) {
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
     * Add a message to the bag.
     *
     * @param  InvoiceSuiteMessageBagItem $newMessageBagItem the message to add
     * @return static
     */
    public function add(InvoiceSuiteMessageBagItem $newMessageBagItem): static
    {
        $this->messageBagItems[] = $newMessageBagItem;

        return $this;
    }

    /**
     * Create and add a message.
     *
     * If severity is not given, INFO is used.
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                           $newMessageContent   the message text
     * @param  null|InvoiceSuiteMessageSeverity $newMessageSeverity  the message severity (default INFO)
     * @param  null|DateTimeInterface           $newMessageTimestamp the message timestamp (default now)
     * @return static
     */
    public function addNewMessage(
        string $newMessageContent,
        ?InvoiceSuiteMessageSeverity $newMessageSeverity = null,
        ?DateTimeInterface $newMessageTimestamp = null
    ): static {
        return $this->add(
            new InvoiceSuiteMessageBagItem($newMessageContent, $newMessageSeverity, $newMessageTimestamp)
        );
    }

    /**
     * Check if the bag contains any messages.
     *
     * @return bool true if at least one message exists, otherwise false
     */
    public function hasMessages(): bool
    {
        return $this->messageBagItems !== [];
    }

    /**
     * Check if the bag contains any messages of the given severity.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity the severity to check
     * @return bool                        true if at least one message of this severity exists, otherwise false
     */
    public function hasMessagesBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): bool
    {
        return $this->filterMessagesBySeverity($filterSeverity) !== [];
    }

    /**
     * Check if the bag contains any INFO messages.
     *
     * @return bool true if at least one INFO message exists, otherwise false
     */
    public function hasInfoMessages(): bool
    {
        return $this->hasMessagesBySeverity(InvoiceSuiteMessageSeverity::INFO);
    }

    /**
     * Check if the bag contains any WARNING messages.
     *
     * @return bool true if at least one WARNING message exists, otherwise false
     */
    public function hasWarningMessages(): bool
    {
        return $this->hasMessagesBySeverity(InvoiceSuiteMessageSeverity::WARNING);
    }

    /**
     * Check if the bag contains any ERROR messages.
     *
     * @return bool true if at least one ERROR message exists, otherwise false
     */
    public function hasErrorMessages(): bool
    {
        return $this->hasMessagesBySeverity(InvoiceSuiteMessageSeverity::ERROR);
    }

    /**
     * Count messages by severity.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity the severity to count
     * @return int                         number of messages with the given severity
     */
    public function countBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): int
    {
        return count($this->filterMessagesBySeverity($filterSeverity));
    }

    /**
     * Count INFO messages.
     *
     * @return int number of INFO messages
     */
    public function countInfoMessages(): int
    {
        return $this->countBySeverity(InvoiceSuiteMessageSeverity::INFO);
    }

    /**
     * Count WARNING messages.
     *
     * @return int number of WARNING messages
     */
    public function countWarningMessages(): int
    {
        return $this->countBySeverity(InvoiceSuiteMessageSeverity::WARNING);
    }

    /**
     * Count ERROR messages.
     *
     * @return int number of ERROR messages
     */
    public function countErrorMessages(): int
    {
        return $this->countBySeverity(InvoiceSuiteMessageSeverity::ERROR);
    }

    /**
     * Get messages by severity.
     *
     * @param  InvoiceSuiteMessageSeverity            $filterSeverity the severity to filter by
     * @return array<int, InvoiceSuiteMessageBagItem> list of messages with the given severity
     */
    public function getMessagesBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): array
    {
        return $this->filterMessagesBySeverity($filterSeverity);
    }

    /**
     * Get INFO messages.
     *
     * @return array<int, InvoiceSuiteMessageBagItem> list of INFO messages
     */
    public function getInfoMessages(): array
    {
        return $this->getMessagesBySeverity(InvoiceSuiteMessageSeverity::INFO);
    }

    /**
     * Get WARNING messages.
     *
     * @return array<int, InvoiceSuiteMessageBagItem> list of WARNING messages
     */
    public function getWarningMessages(): array
    {
        return $this->getMessagesBySeverity(InvoiceSuiteMessageSeverity::WARNING);
    }

    /**
     * Get ERROR messages.
     *
     * @return array<int, InvoiceSuiteMessageBagItem> list of ERROR messages
     */
    public function getErrorMessages(): array
    {
        return $this->getMessagesBySeverity(InvoiceSuiteMessageSeverity::ERROR);
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
     * @param  mixed                                $offset the index to check
     * @throws InvoiceSuiteInvalidArgumentException
     * @return bool                                 true if the index exists, otherwise false
     */
    public function offsetExists(mixed $offset): bool
    {
        if (!is_int($offset)) {
            throw new InvoiceSuiteInvalidArgumentException('Offset must be an int.');
        }

        return isset($this->messageBagItems[$offset]);
    }

    /**
     * Get message at offset.
     *
     * @param  mixed                                $offset the index to read
     * @throws InvoiceSuiteInvalidArgumentException
     * @return null|InvoiceSuiteMessageBagItem      the stored message or null if not found
     */
    public function offsetGet(mixed $offset): ?InvoiceSuiteMessageBagItem
    {
        if (!is_int($offset)) {
            throw new InvoiceSuiteInvalidArgumentException('Offset must be an int.');
        }

        return $this->messageBagItems[$offset] ?? null;
    }

    /**
     * Set a message at offset. Disallow external modification
     *
     * @param  mixed          $offset The index to write (ignored)
     * @param  mixed          $value  The value to set (ignored)
     * @throws LogicException
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Messages are read-only via array access.');
    }

    /**
     * Unset a message at offset. Disallow external modification
     *
     * @param  mixed          $offset The index to remove (ignored)
     * @throws LogicException
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Messages are read-only via array access.');
    }

    /**
     * Filter internal items by severity.
     * Returned array is reindexed to consecutive int keys (0..n-1).
     *
     * @param  InvoiceSuiteMessageSeverity            $severity the severity to filter by
     * @return array<int, InvoiceSuiteMessageBagItem> filtered message items
     */
    private function filterMessagesBySeverity(InvoiceSuiteMessageSeverity $severity): array
    {
        return array_values(
            array_filter(
                $this->messageBagItems,
                static function (InvoiceSuiteMessageBagItem $messageBagItem) use ($severity): bool {
                    return $messageBagItem->getMessageSeverity() === $severity;
                }
            )
        );
    }
}
