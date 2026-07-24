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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
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
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getMessageBag(): InvoiceSuiteMessageBag
    {
        if (null === $this->messageBag) {
            $this->messageBag = new InvoiceSuiteMessageBag();
        }

        return $this->messageBag;
    }

    /**
     * Clears the internal message container
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function clearMessageBag(): static
    {
        $this->getMessageBag()->clear();

        return $this;
    }

    /**
     * Copy messages from one messagebag to the current one
     *
     * @param  InvoiceSuiteMessageBag $fromMessageBag
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function copyFromMessageBag(
        InvoiceSuiteMessageBag $fromMessageBag
    ): static {
        $this->getMessageBag()->copyFromMessageBag($fromMessageBag);

        return $this;
    }

    /**
     * Add an existing message bag item to internal message bag.
     *
     * @param  InvoiceSuiteMessageBagItem $newMessageBagItem the item to add
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addMessageItemToMessageBag(
        InvoiceSuiteMessageBagItem $newMessageBagItem
    ): static {
        $this->getMessageBag()->add($newMessageBagItem);

        return $this;
    }

    /**
     * Add a new message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If severity is not given, INFO is used.
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                           $newMessageContent        the message text
     * @param  null|InvoiceSuiteMessageSeverity $newMessageSeverity       the message severity (default INFO)
     * @param  null|DateTimeInterface           $newMessageTimestamp      the timestamp (default now)
     * @param  null|array<array-key, mixed>     $newMessageAdditionalData the additional data (default empty array)
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addMessageToMessageBag(
        string $newMessageContent,
        ?InvoiceSuiteMessageSeverity $newMessageSeverity = null,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ): static {
        $this->getMessageBag()->addNewMessage(
            $newMessageContent,
            $newMessageSeverity,
            $newMessageTimestamp,
            $newMessageAdditionalData
        );

        return $this;
    }

    /**
     * Add a new INFO message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                       $newMessageContent
     * @param  null|DateTimeInterface       $newMessageTimestamp
     * @param  null|array<array-key, mixed> $newMessageAdditionalData the additional data (default empty array)
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addInfoMessageToMessageBag(
        string $newMessageContent,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ): static {
        $this->getMessageBag()->addNewMessage(
            $newMessageContent,
            InvoiceSuiteMessageSeverity::INFO,
            $newMessageTimestamp,
            $newMessageAdditionalData
        );

        return $this;
    }

    /**
     * Add a new WARNING message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                       $newMessageContent
     * @param  null|DateTimeInterface       $newMessageTimestamp
     * @param  null|array<array-key, mixed> $newMessageAdditionalData the additional data (default empty array)
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addWarningMessageToMessageBag(
        string $newMessageContent,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ): static {
        $this->getMessageBag()->addNewMessage(
            $newMessageContent,
            InvoiceSuiteMessageSeverity::WARNING,
            $newMessageTimestamp,
            $newMessageAdditionalData
        );

        return $this;
    }

    /**
     * Add a new ERROR message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                       $newMessageContent
     * @param  null|DateTimeInterface       $newMessageTimestamp
     * @param  null|array<array-key, mixed> $newMessageAdditionalData the additional data (default empty array)
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addErrorMessageToMessageBag(
        string $newMessageContent,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ): static {
        $this->getMessageBag()->addNewMessage(
            $newMessageContent,
            InvoiceSuiteMessageSeverity::ERROR,
            $newMessageTimestamp,
            $newMessageAdditionalData
        );

        return $this;
    }

    /**
     * Add a new INTERNALERROR message (creates a new InvoiceSuiteMessageBagItem) to internal message bag.
     *
     * If timestamp is not given, the current datetime is used.
     *
     * @param  string                       $newMessageContent
     * @param  null|DateTimeInterface       $newMessageTimestamp
     * @param  null|array<array-key, mixed> $newMessageAdditionalData the additional data (default empty array)
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function addInternalErrorMessageToMessageBag(
        string $newMessageContent,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ): static {
        $this->getMessageBag()->addNewMessage(
            $newMessageContent,
            InvoiceSuiteMessageSeverity::INTERNALERROR,
            $newMessageTimestamp,
            $newMessageAdditionalData
        );

        return $this;
    }

    /**
     * Check if any messages exist in the internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
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
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): bool {
        return $this->getMessageBag()->hasMessagesBySeverity($filterSeverity);
    }

    /**
     * Check if any INFO messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasInfoMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasInfoMessages();
    }

    /**
     * Check if any WARNING messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasWarningMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasWarningMessages();
    }

    /**
     * Check if any ERROR messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasErrorMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasErrorMessages();
    }

    /**
     * Check if any INTERNALERROR messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasInternalErrorMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasInternalErrorMessages();
    }

    /**
     * Check if any ERROR or INTERNALERROR messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasErrorOrInternalErrorMessagesInMessageBag(): bool
    {
        return $this->getMessageBag()->hasErrorOrInternalErrorMessages();
    }

    /**
     * Count messages by severity in internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): int {
        return $this->getMessageBag()->countBySeverity($filterSeverity);
    }

    /**
     * Count INFO messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countInfoMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countInfoMessages();
    }

    /**
     * Count WARNING messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countWarningMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countWarningMessages();
    }

    /**
     * Count ERROR messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countErrorMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countErrorMessages();
    }

    /**
     * Count INTERNALERROR messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countInternalErrorMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countInternalErrorMessages();
    }

    /**
     * Count ERROR and INTERNALERROR messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countErrorOrInternalErrorMessagesInMessageBag(): int
    {
        return $this->getMessageBag()->countErrorOrInternalErrorMessages();
    }

    /**
     * Get messages by severity from internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity            $filterSeverity
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): array {
        return $this->getMessageBag()->getMessagesBySeverity($filterSeverity);
    }

    /**
     * Get INFO messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getInfoMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getInfoMessages();
    }

    /**
     * Get WARNING messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getWarningMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getWarningMessages();
    }

    /**
     * Get ERROR messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getErrorMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getErrorMessages();
    }

    /**
     * Get INTERNALERROR messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getInternalErrorMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getInternalErrorMessages();
    }

    /**
     * Get ERROR and INTERNALERROR messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getErrorOrInternalErrorMessagesInMessageBag(): array
    {
        return $this->getMessageBag()->getErrorOrInternalErrorMessages();
    }
}
