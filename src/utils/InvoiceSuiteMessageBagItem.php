<?php

declare(strict_types=1);

use DateTimeInterface;

/**
 * Class representing a message bag item.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
final class InvoiceSuiteMessageBagItem
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
     * Constructor.
     *
     * @param string                      $newMessageContent   the message text
     * @param InvoiceSuiteMessageSeverity $newMessageSeverity  the message severity
     * @param DateTimeInterface           $newMessageTimestamp the message timestamp
     */
    public function __construct(
        string $newMessageContent,
        InvoiceSuiteMessageSeverity $newMessageSeverity,
        DateTimeInterface $newMessageTimestamp
    ) {
        $this
            ->setMessageContent($newMessageContent)
            ->setMessageSeverity($newMessageSeverity)
            ->setMessageTimestamp($newMessageTimestamp);
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
     * @return self   returns the current instance for fluent calls
     */
    public function setMessageContent(string $newMessageContent): self
    {
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
     * @return self                        returns the current instance for fluent calls
     */
    public function setMessageSeverity(InvoiceSuiteMessageSeverity $newMessageSeverity): self
    {
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
     * @return self              returns the current instance for fluent calls
     */
    public function setMessageTimestamp(DateTimeInterface $newMessageTimestamp): self
    {
        $this->messageTimestamp = $newMessageTimestamp;

        return $this;
    }

    /**
     * Convenience: severity as string value.
     *
     * @return string The backing string (e.g. "info").
     */
    public function getSeverityValue(): string
    {
        return $this->messageSeverity->value;
    }
}
