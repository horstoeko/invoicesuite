<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

/**
 * Class representing an entry for the message bag.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
final class InvoiceSuiteMessageBagItem implements JsonSerializable
{
    /**
     * The message text.
     *
     * @var string
     */
    private string $messageContent;

    /**
     * Message severity.
     *
     * @var InvoiceSuiteMessageSeverity
     */
    private InvoiceSuiteMessageSeverity $messageSeverity;

    /**
     * Timestamp of the message.
     *
     * @var DateTimeInterface
     */
    private DateTimeInterface $messageTimestamp;

    /**
     * Additional information (data)
     *
     * @var array<array-key, mixed>
     */
    private array $messageAdditionalData;

    /**
     * Constructor.
     *
     * If no severity is given, INFO is used.
     * If no timestamp is given, the current datetime is used.
     *
     * @param string                           $newMessageContent        the message text
     * @param null|InvoiceSuiteMessageSeverity $newMessageSeverity       the message severity (default INFO)
     * @param null|DateTimeInterface           $newMessageTimestamp      the message timestamp (default now)
     * @param null|array<array-key, mixed>     $newMessageAdditionalData the additional data (default empty arra)
     */
    public function __construct(
        string $newMessageContent,
        ?InvoiceSuiteMessageSeverity $newMessageSeverity = null,
        ?DateTimeInterface $newMessageTimestamp = null,
        ?array $newMessageAdditionalData = null
    ) {
        $this
            ->setMessageContent($newMessageContent)
            ->setMessageSeverity($newMessageSeverity ?? InvoiceSuiteMessageSeverity::INFO)
            ->setMessageTimestamp($newMessageTimestamp ?? new DateTimeImmutable())
            ->setMessageAdditionalData($newMessageAdditionalData ?? []);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): mixed
    {
        return [
            'messageContent' => $this->messageContent,
            'messageSeverity' => $this->messageSeverity->value,
            'messageTimestap' => $this->messageTimestamp->format('c'),
            'messageAdditionalData' => $this->messageAdditionalData,
        ];
    }

    /**
     * Get the message text.
     *
     * @return string the stored message
     */
    public function getMessageContent(): string
    {
        return $this->messageContent;
    }

    /**
     * Set the message text.
     *
     * @param  string $newMessageContent the message to store
     * @return static returns the current instance for fluent calls
     */
    public function setMessageContent(
        string $newMessageContent
    ): static {
        $this->messageContent = $newMessageContent;

        return $this;
    }

    /**
     * Get the message severity.
     *
     * @return InvoiceSuiteMessageSeverity the stored severity enum
     */
    public function getMessageSeverity(): InvoiceSuiteMessageSeverity
    {
        return $this->messageSeverity;
    }

    /**
     * Set the message severity.
     *
     * @param  InvoiceSuiteMessageSeverity $newMessageSeverity the severity to store
     * @return static                      returns the current instance for fluent calls
     */
    public function setMessageSeverity(
        InvoiceSuiteMessageSeverity $newMessageSeverity
    ): static {
        $this->messageSeverity = $newMessageSeverity;

        return $this;
    }

    /**
     * Get the message timestamp.
     *
     * @return DateTimeInterface the stored timestamp
     */
    public function getMessageTimestamp(): DateTimeInterface
    {
        return $this->messageTimestamp;
    }

    /**
     * Set the message timestamp.
     *
     * @param  DateTimeInterface $newMessageTimestamp the timestamp to store
     * @return static            returns the current instance for fluent calls
     */
    public function setMessageTimestamp(
        DateTimeInterface $newMessageTimestamp
    ): static {
        $this->messageTimestamp = $newMessageTimestamp;

        return $this;
    }

    /**
     * Get additional data
     *
     * @return array<array-key, mixed>
     */
    public function getMessageAdditionalData(): array
    {
        return $this->messageAdditionalData;
    }

    /**
     * Set additional data
     *
     * @param  array<array-key, mixed> $newMessageAdditionalData Additional data related to this message
     * @return static                  returns the current instance for fluent calls
     */
    public function setMessageAdditionalData(
        array $newMessageAdditionalData
    ): static {
        $this->messageAdditionalData = $newMessageAdditionalData;

        return $this;
    }

    /**
     * Get the severity as string value.
     *
     * @return string The backing string (e.g. "info").
     */
    public function getMessageSeverityValue(): string
    {
        return $this->messageSeverity->value;
    }
}
