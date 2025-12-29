<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use ArrayAccess;
use Countable;
use DateTime;
use horstoeko\invoicesuite\concerns\HandlesMessageBag;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBag;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use IteratorAggregate;

final class HandlesMessageBagTest extends TestCase
{
    use HandlesMessageBag;

    public function testClearMessageBagFirstCall(): void
    {
        $this->assertNull($this->messageBag);
        $this->assertSame($this, $this->clearMessageBag());
        $this->assertInstanceOf(InvoiceSuiteMessageBag::class, $this->messageBag);
        $this->assertInstanceOf(ArrayAccess::class, $this->messageBag);
        $this->assertInstanceOf(IteratorAggregate::class, $this->messageBag);
        $this->assertInstanceOf(Countable::class, $this->messageBag);
        $this->assertCount(0, $this->messageBag);
    }

    public function testState(): void
    {
        // addMessageItemToMessageBag

        $mesaageBagItem = new InvoiceSuiteMessageBagItem(
            'Message 1',
            InvoiceSuiteMessageSeverity::INFO,
            DateTime::createFromFormat('Ymd', '19700101')
        );

        $this->addMessageItemToMessageBag($mesaageBagItem);

        $this->assertCount(1, $this->messageBag);
        $this->assertArrayHasKey(0, $this->messageBag);
        $this->assertArrayNotHasKey(1, $this->messageBag);

        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[0]);
        $this->assertSame($mesaageBagItem, $this->messageBag[0]);
        $this->assertSame('Message 1', $this->messageBag[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[0]->getMessageSeverity());
        $this->assertSame('19700101', $this->messageBag[0]->getMessageTimestamp()->format('Ymd'));

        // addMessageToMessageBag

        $this->addMessageToMessageBag(
            'Message 2',
            InvoiceSuiteMessageSeverity::INFO,
            DateTime::createFromFormat('Ymd', '19700102')
        );

        $this->assertCount(2, $this->messageBag);
        $this->assertArrayHasKey(0, $this->messageBag);
        $this->assertArrayHasKey(1, $this->messageBag);
        $this->assertArrayNotHasKey(2, $this->messageBag);

        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[0]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[1]);
        $this->assertSame('Message 1', $this->messageBag[0]->getMessageContent());
        $this->assertSame('Message 2', $this->messageBag[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[1]->getMessageSeverity());
        $this->assertSame('19700101', $this->messageBag[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $this->messageBag[1]->getMessageTimestamp()->format('Ymd'));

        // addInfoMessageToMessageBag

        $this->addInfoMessageToMessageBag(
            'Message 3',
            DateTime::createFromFormat('Ymd', '19700103')
        );

        $this->assertCount(3, $this->messageBag);
        $this->assertArrayHasKey(0, $this->messageBag);
        $this->assertArrayHasKey(1, $this->messageBag);
        $this->assertArrayHasKey(2, $this->messageBag);
        $this->assertArrayNotHasKey(3, $this->messageBag);

        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[0]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[1]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[2]);
        $this->assertSame('Message 1', $this->messageBag[0]->getMessageContent());
        $this->assertSame('Message 2', $this->messageBag[1]->getMessageContent());
        $this->assertSame('Message 3', $this->messageBag[2]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[1]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[2]->getMessageSeverity());
        $this->assertSame('19700101', $this->messageBag[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $this->messageBag[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700103', $this->messageBag[2]->getMessageTimestamp()->format('Ymd'));

        // addWarningMessageToMessageBag

        $this->addWarningMessageToMessageBag(
            'Message 4',
            DateTime::createFromFormat('Ymd', '19700104')
        );

        $this->assertCount(4, $this->messageBag);
        $this->assertArrayHasKey(0, $this->messageBag);
        $this->assertArrayHasKey(1, $this->messageBag);
        $this->assertArrayHasKey(2, $this->messageBag);
        $this->assertArrayHasKey(3, $this->messageBag);
        $this->assertArrayNotHasKey(4, $this->messageBag);

        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[0]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[1]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[2]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[3]);
        $this->assertSame('Message 1', $this->messageBag[0]->getMessageContent());
        $this->assertSame('Message 2', $this->messageBag[1]->getMessageContent());
        $this->assertSame('Message 3', $this->messageBag[2]->getMessageContent());
        $this->assertSame('Message 4', $this->messageBag[3]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[1]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[2]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $this->messageBag[3]->getMessageSeverity());
        $this->assertSame('19700101', $this->messageBag[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $this->messageBag[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700103', $this->messageBag[2]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700104', $this->messageBag[3]->getMessageTimestamp()->format('Ymd'));

        // addErrorMessageToMessageBag

        $this->addErrorMessageToMessageBag(
            'Message 5',
            DateTime::createFromFormat('Ymd', '19700105')
        );

        $this->assertCount(5, $this->messageBag);
        $this->assertArrayHasKey(0, $this->messageBag);
        $this->assertArrayHasKey(1, $this->messageBag);
        $this->assertArrayHasKey(2, $this->messageBag);
        $this->assertArrayHasKey(3, $this->messageBag);
        $this->assertArrayHasKey(4, $this->messageBag);
        $this->assertArrayNotHasKey(5, $this->messageBag);

        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[0]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[1]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[2]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[3]);
        $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $this->messageBag[4]);
        $this->assertSame('Message 1', $this->messageBag[0]->getMessageContent());
        $this->assertSame('Message 2', $this->messageBag[1]->getMessageContent());
        $this->assertSame('Message 3', $this->messageBag[2]->getMessageContent());
        $this->assertSame('Message 4', $this->messageBag[3]->getMessageContent());
        $this->assertSame('Message 5', $this->messageBag[4]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[1]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $this->messageBag[2]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $this->messageBag[3]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $this->messageBag[4]->getMessageSeverity());
        $this->assertSame('19700101', $this->messageBag[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $this->messageBag[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700103', $this->messageBag[2]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700104', $this->messageBag[3]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700105', $this->messageBag[4]->getMessageTimestamp()->format('Ymd'));

        // hasMessagesInMessageBag

        $this->assertTrue($this->hasMessagesInMessageBag());

        // hasMessagesInMessageBagBySeverity

        $this->assertTrue($this->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertTrue($this->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertTrue($this->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        // hasInfoMessagesInMessageBag

        $this->assertTrue($this->hasInfoMessagesInMessageBag());

        // hasWarningMessagesInMessageBag

        $this->assertTrue($this->hasWarningMessagesInMessageBag());

        // hasErrorMessagesInMessageBag

        $this->assertTrue($this->hasErrorMessagesInMessageBag());

        // countMessagesInMessageBagBySeverity

        $this->assertSame(3, $this->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(1, $this->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(1, $this->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        // countInfoMessagesInMessageBag

        $this->assertSame(3, $this->countInfoMessagesInMessageBag());

        // countWarningMessagesInMessageBag

        $this->assertSame(1, $this->countWarningMessagesInMessageBag());

        // countErrorMessagesInMessageBag

        $this->assertSame(1, $this->countErrorMessagesInMessageBag());

        // getMessagesInMessageBagBySeverity

        $infoMessages = $this->getMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO);

        $this->assertCount(3, $infoMessages);
        $this->assertArrayHasKey(0, $infoMessages);
        $this->assertArrayHasKey(1, $infoMessages);
        $this->assertArrayHasKey(2, $infoMessages);
        $this->assertArrayNotHasKey(3, $infoMessages);
        $this->assertSame('Message 1', $infoMessages[0]->getMessageContent());
        $this->assertSame('Message 2', $infoMessages[1]->getMessageContent());
        $this->assertSame('Message 3', $infoMessages[2]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[1]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[2]->getMessageSeverity());
        $this->assertSame('19700101', $infoMessages[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $infoMessages[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700103', $infoMessages[2]->getMessageTimestamp()->format('Ymd'));

        $warningMessages = $this->getMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING);

        $this->assertCount(1, $warningMessages);
        $this->assertArrayHasKey(0, $warningMessages);
        $this->assertArrayNotHasKey(1, $warningMessages);
        $this->assertSame('Message 4', $warningMessages[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $warningMessages[0]->getMessageSeverity());
        $this->assertSame('19700104', $warningMessages[0]->getMessageTimestamp()->format('Ymd'));

        $errorMessages = $this->getMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR);

        $this->assertCount(1, $errorMessages);
        $this->assertArrayHasKey(0, $errorMessages);
        $this->assertArrayNotHasKey(1, $errorMessages);
        $this->assertSame('Message 5', $errorMessages[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $errorMessages[0]->getMessageSeverity());
        $this->assertSame('19700105', $errorMessages[0]->getMessageTimestamp()->format('Ymd'));

        // getInfoMessagesInMessageBag

        $infoMessages = $this->getInfoMessagesInMessageBag();

        $this->assertCount(3, $infoMessages);
        $this->assertArrayHasKey(0, $infoMessages);
        $this->assertArrayHasKey(1, $infoMessages);
        $this->assertArrayHasKey(2, $infoMessages);
        $this->assertArrayNotHasKey(3, $infoMessages);
        $this->assertSame('Message 1', $infoMessages[0]->getMessageContent());
        $this->assertSame('Message 2', $infoMessages[1]->getMessageContent());
        $this->assertSame('Message 3', $infoMessages[2]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[0]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[1]->getMessageSeverity());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $infoMessages[2]->getMessageSeverity());
        $this->assertSame('19700101', $infoMessages[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700102', $infoMessages[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame('19700103', $infoMessages[2]->getMessageTimestamp()->format('Ymd'));

        // getWarningMessagesInMessageBag

        $warningMessages = $this->getWarningMessagesInMessageBag();

        $this->assertCount(1, $warningMessages);
        $this->assertArrayHasKey(0, $warningMessages);
        $this->assertArrayNotHasKey(1, $warningMessages);
        $this->assertSame('Message 4', $warningMessages[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $warningMessages[0]->getMessageSeverity());
        $this->assertSame('19700104', $warningMessages[0]->getMessageTimestamp()->format('Ymd'));

        // getErrorMessagesInMessageBag

        $errorMessages = $this->getErrorMessagesInMessageBag();

        $this->assertCount(1, $errorMessages);
        $this->assertArrayHasKey(0, $errorMessages);
        $this->assertArrayNotHasKey(1, $errorMessages);
        $this->assertSame('Message 5', $errorMessages[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $errorMessages[0]->getMessageSeverity());
        $this->assertSame('19700105', $errorMessages[0]->getMessageTimestamp()->format('Ymd'));

        // clearMessageBag

        $this->clearMessageBag();

        $this->assertCount(0, $this->messageBag);
        $this->assertFalse($this->hasMessagesInMessageBag());
        $this->assertFalse($this->hasInfoMessagesInMessageBag());
        $this->assertFalse($this->hasWarningMessagesInMessageBag());
        $this->assertFalse($this->hasErrorMessagesInMessageBag());
        $this->assertSame(0, $this->countInfoMessagesInMessageBag());
        $this->assertSame(0, $this->countWarningMessagesInMessageBag());
        $this->assertSame(0, $this->countErrorMessagesInMessageBag());
    }
}
