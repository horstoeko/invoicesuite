<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\utils;

use DateTime;
use DateTimeImmutable;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteExceptionCodes;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBag;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use LogicException;
use stdClass;

final class InvoiceSuiteMessageBagTest extends TestCase
{
    public function testInvoiceSuiteMessageBagCreate(): void
    {
        $messageBag = new InvoiceSuiteMessageBag();

        $property = $this->getPrivatePropertyFromObject($messageBag, 'messageBagItems');
        $propertyValue = $property->getValue($messageBag);

        $this->assertIsArray($propertyValue);
        $this->assertCount(0, $propertyValue);
    }

    public function testInvoiceSuiteMessageBagCreateWithArgs(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $property = $this->getPrivatePropertyFromObject($messageBag, 'messageBagItems');
        $propertyValue = $property->getValue($messageBag);

        $this->assertIsArray($propertyValue);
        $this->assertCount(3, $propertyValue);
        $this->assertArrayHasKey(0, $propertyValue);
        $this->assertArrayHasKey(1, $propertyValue);
        $this->assertArrayHasKey(2, $propertyValue);
    }

    public function testInvoiceSuiteMessageBagCreateWithInvalidArgs(): void
    {
        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('InvoiceSuiteMessageBag only accepts instances of InvoiceSuiteMessageBagItem.');
        $this->expectExceptionCode(InvoiceSuiteExceptionCodes::INVALID_ARGUMENT);

        // @phpstan-ignore argument.type
        new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new stdClass(),
        ]);
    }

    public function testInvoiceSuiteMessageBagGetters(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());

        $this->assertSame('message-1', $messageBag->getInfoMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[0]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-2', $messageBag->getWarningMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[0]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700101', $messageBag->getWarningMessages()[0]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-3', $messageBag->getErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700102', $messageBag->getErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
    }

    public function testInvoiceSuiteMessageBagAdders(): void
    {
        $messageBag = new InvoiceSuiteMessageBag();

        $this->assertFalse($messageBag->hasMessages());
        $this->assertFalse($messageBag->hasInfoMessages());
        $this->assertFalse($messageBag->hasWarningMessages());
        $this->assertFalse($messageBag->hasErrorMessages());

        $messageBag->addNewMessage('message-1');
        $messageBag->addNewMessage('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700104'));
        $messageBag->addNewMessage('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700105'));

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());

        $this->assertSame('message-1', $messageBag->getInfoMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[0]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-2', $messageBag->getWarningMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[0]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700104', $messageBag->getWarningMessages()[0]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-3', $messageBag->getErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700105', $messageBag->getErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));

        $messageBag->addNewMessage('message-1a');
        $messageBag->addNewMessage('message-2a', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700110'));
        $messageBag->addNewMessage('message-3a', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700111'));

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertSame(2, $messageBag->countInfoMessages());
        $this->assertSame(2, $messageBag->countWarningMessages());
        $this->assertSame(2, $messageBag->countErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getErrorMessages());

        $this->assertSame('message-1a', $messageBag->getInfoMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[1]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[1]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[1]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-2a', $messageBag->getWarningMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[1]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700110', $messageBag->getWarningMessages()[1]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-3a', $messageBag->getErrorMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[1]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700111', $messageBag->getErrorMessages()[1]->getMessageTimestamp()->format('Ymd'));
    }

    public function testInvoiceSuiteMessageBagArrayAccess(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->assertCount(3, $messageBag);
        $this->assertArrayHasKey(0, $messageBag);
        $this->assertArrayHasKey(1, $messageBag);
        $this->assertArrayHasKey(2, $messageBag);
        $this->assertArrayNotHasKey(3, $messageBag);
        $this->assertArrayHasKey(0, $messageBag);
        $this->assertArrayHasKey(1, $messageBag);
        $this->assertArrayHasKey(2, $messageBag);
        $this->assertArrayNotHasKey(3, $messageBag);

        $this->assertSame('message-1', $messageBag[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag[0]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-2', $messageBag[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag[1]->getMessageSeverity());
        $this->assertSame('warning', $messageBag[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag[1]->getMessageTimestamp());
        $this->assertSame('19700101', $messageBag[1]->getMessageTimestamp()->format('Ymd'));

        $this->assertSame('message-3', $messageBag[2]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag[2]->getMessageSeverity());
        $this->assertSame('error', $messageBag[2]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag[2]->getMessageTimestamp());
        $this->assertSame('19700102', $messageBag[2]->getMessageTimestamp()->format('Ymd'));

        foreach ($messageBag as $messageBagItem) {
            $this->assertInstanceOf(InvoiceSuiteMessageBagItem::class, $messageBagItem);
        }
    }

    public function testInvoiceSuiteMessageBagArrayAccessInvalid1(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Offset must be an int.');

        $this->assertArrayHasKey('key', $messageBag);
    }

    public function testInvoiceSuiteMessageBagArrayAccessInvalid2(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Offset must be an int.');

        $this->assertNotInstanceOf(InvoiceSuiteMessageBagItem::class, $messageBag['key']);
    }

    public function testInvoiceSuiteMessageBagArrayAccessInvalid3(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Messages are read-only via array access.');

        $messageBag[4] = new InvoiceSuiteMessageBagItem('message-1');
    }

    public function testInvoiceSuiteMessageBagArrayAccessInvalid4(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Messages are read-only via array access.');

        unset($messageBag[0]);
    }

    public function testInvoiceSuiteMessageSeverityEnum(): void
    {
        $cases = InvoiceSuiteMessageSeverity::cases();

        // @phpstan-ignore method.alreadyNarrowedType
        $this->assertIsArray($cases);
        $this->assertCount(3, $cases);

        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $cases[0]);
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $cases[1]);
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $cases[2]);

        $this->assertSame('info', InvoiceSuiteMessageSeverity::INFO->value);
        $this->assertSame('warning', InvoiceSuiteMessageSeverity::WARNING->value);
        $this->assertSame('error', InvoiceSuiteMessageSeverity::ERROR->value);

        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, InvoiceSuiteMessageSeverity::from('info'));
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, InvoiceSuiteMessageSeverity::from('warning'));
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, InvoiceSuiteMessageSeverity::from('error'));

        $this->assertNull(InvoiceSuiteMessageSeverity::tryFrom('invalid-severity'));

        $values = array_map(static fn (InvoiceSuiteMessageSeverity $severity): string => $severity->value, $cases);

        $this->assertSame($values, array_values(array_unique($values)));

        foreach ($cases as $case) {
            $this->assertInstanceOf(InvoiceSuiteMessageSeverity::class, $case);
            $this->assertIsString($case->value);
        }
    }

    public function testInvoiceSuiteMessageBagClear(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102')),
        ]);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());

        $messageBag->clear();

        $this->assertFalse($messageBag->hasMessages());
        $this->assertFalse($messageBag->hasInfoMessages());
        $this->assertFalse($messageBag->hasWarningMessages());
        $this->assertFalse($messageBag->hasErrorMessages());
        $this->assertSame(0, $messageBag->countInfoMessages());
        $this->assertSame(0, $messageBag->countWarningMessages());
        $this->assertSame(0, $messageBag->countErrorMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());
    }
}
