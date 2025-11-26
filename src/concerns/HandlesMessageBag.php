<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

use DateTimeInterface;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBag;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;

/**
 * Trait representing message Bag handling.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @phpstan-ignore trait.unused
 */
trait HandlesMessageBag
{
    /**
     * Internal message bag instance (lazy).
     *
     * @var null|InvoiceSuiteMessageBag
     */
    protected ?InvoiceSuiteMessageBag $messageBag = null;

    /**
     * Get the internal message bag.
     * Creates a new instance on first access.
     *
     * @return InvoiceSuiteMessageBag
     */
    public function getMessageBag(): InvoiceSuiteMessageBag
    {
        if ($this->messageBag === null) {
            $this->messageBag = new InvoiceSuiteMessageBag();
        }

        return $this->messageBag;
    }

    /**
     * Clears the internal message container
     *
     * @return InvoiceSuiteMessageBag
     */
    public function clearMessageBag(): self
    {
        $this->getMessageBag()->clear();

        return $this;
    }

    /**
     * Add an existing message bag item to internal message bag.
     *
     * @param  InvoiceSuiteMessageBagItem $newMessageBagItem the item to add
     * @return self
     */
    public function addMessageItemToMessageBag(InvoiceSuiteMessageBagItem $newMessageBagItem): self
    {
        $this->getMessageBag()->add($newMessageBagItem);

        return $this;
    }

    /**
     * Add a new message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If severity is not given, INFO is used.
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                           $newMessageContent   the message text
     * @param  null|InvoiceSuiteMessageSeverity $newMessageSeverity  the message severity (default INFO)
     * @param  null|DateTimeInterface           $newMessageTimestamp the timestamp (default now)
     * @return self
     */
    public function addMessageToMessageBag(
        string $newMessageContent,
        ?InvoiceSuiteMessageSeverity $newMessageSeverity = null,
        ?DateTimeInterface $newMessageTimestamp = null
    ): self {
        $this->getMessageBag()->addNewMessage($newMessageContent, $newMessageSeverity, $newMessageTimestamp);

        return $this;
    }

    /**
     * Check if any messages exist in the internal message bag.
     *
     * @return bool
     */
    public function hasMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasMessages();
    }

    /**
     * Check if any messages with the given severity exist in internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity
     * @return bool
     */
    public function hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): bool
    {
        return $this->getMessageBag()->hasMessagesBySeverity($filterSeverity);
    }

    /**
     * Check if any INFO messages exist in internal message bag.
     *
     * @return bool
     */
    public function hasInfoMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasInfoMessages();
    }

    /**
     * Check if any WARNING messages exist in internal message bag.
     *
     * @return bool
     */
    public function hasWarningMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasWarningMessages();
    }

    /**
     * Check if any ERROR messages exist in internal message bag.
     *
     * @return bool
     */
    public function hasErrorMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasErrorMessages();
    }

    /**
     * Count messages by severity in internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity
     * @return int
     */
    public function countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): int
    {
        return $this->getMessageBag()->countBySeverity($filterSeverity);
    }

    /**
     * Count INFO messages in internal message bag.
     *
     * @return int
     */
    public function countInfoMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countInfoMessages();
    }

    /**
     * Count WARNING messages in internal message bag.
     *
     * @return int
     */
    public function countWarningMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countWarningMessages();
    }

    /**
     * Count ERROR messages in internal message bag.
     *
     * @return int
     */
    public function countErrorMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countErrorMessages();
    }

    /**
     * Get messages by severity from internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity            $filterSeverity
     * @return array<int, InvoiceSuiteMessageBagItem>
     */
    public function getMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity $filterSeverity): array
    {
        return $this->getMessageBag()->getMessagesBySeverity($filterSeverity);
    }

    /**
     * Get INFO messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     */
    public function getInfoMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getInfoMessages();
    }

    /**
     * Get WARNING messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     */
    public function getWarningMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getWarningMessages();
    }

    /**
     * Get ERROR messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     */
    public function getErrorMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getErrorMessages();
    }
}
