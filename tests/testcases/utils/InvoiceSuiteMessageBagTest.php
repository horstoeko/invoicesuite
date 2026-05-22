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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
            new InvoiceSuiteMessageBagItem('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700103'), ['key' => 'internal-value']),
        ]);

        $property = $this->getPrivatePropertyFromObject($messageBag, 'messageBagItems');
        $propertyValue = $property->getValue($messageBag);

        $this->assertIsArray($propertyValue);
        $this->assertCount(4, $propertyValue);
        $this->assertArrayHasKey(0, $propertyValue);
        $this->assertArrayHasKey(1, $propertyValue);
        $this->assertArrayHasKey(2, $propertyValue);
        $this->assertArrayHasKey(3, $propertyValue);
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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
            new InvoiceSuiteMessageBagItem('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700103'), ['key' => 'internal-value']),
        ]);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertTrue($messageBag->hasInternalErrorMessages());
        $this->assertTrue($messageBag->hasErrorOrInternalErrorMessages());

        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertSame(1, $messageBag->countInternalErrorMessages());
        $this->assertSame(2, $messageBag->countErrorOrInternalErrorMessages());

        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInternalErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInternalErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getErrorOrInternalErrorMessages());

        $this->assertSame('message-1', $messageBag->getInfoMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getInfoMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-2', $messageBag->getWarningMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[0]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700101', $messageBag->getWarningMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getWarningMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-3', $messageBag->getErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700102', $messageBag->getErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag->getErrorMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-4', $messageBag->getInternalErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag->getInternalErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag->getInternalErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getInternalErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700103', $messageBag->getInternalErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag->getInternalErrorMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-3', $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700102', $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag->getErrorOrInternalErrorMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-4', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700103', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageAdditionalData());
    }

    public function testInvoiceSuiteMessageBagAdders(): void
    {
        $messageBag = new InvoiceSuiteMessageBag();

        $this->assertFalse($messageBag->hasMessages());
        $this->assertFalse($messageBag->hasInfoMessages());
        $this->assertFalse($messageBag->hasWarningMessages());
        $this->assertFalse($messageBag->hasErrorMessages());
        $this->assertFalse($messageBag->hasInternalErrorMessages());
        $this->assertFalse($messageBag->hasErrorOrInternalErrorMessages());

        $messageBag->addNewMessage('message-1');
        $messageBag->addNewMessage('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700104'));
        $messageBag->addNewMessage('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700105'), ['key' => 'value']);
        $messageBag->addNewMessage('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700106'), ['key' => 'internal-value']);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertTrue($messageBag->hasInternalErrorMessages());
        $this->assertTrue($messageBag->hasErrorOrInternalErrorMessages());

        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertSame(1, $messageBag->countInternalErrorMessages());
        $this->assertSame(2, $messageBag->countErrorOrInternalErrorMessages());

        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInternalErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInternalErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getErrorOrInternalErrorMessages());

        $this->assertSame('message-1', $messageBag->getInfoMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getInfoMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-2', $messageBag->getWarningMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[0]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700104', $messageBag->getWarningMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getWarningMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-3', $messageBag->getErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700105', $messageBag->getErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag->getErrorMessages()[0]->getMessageAdditionalData());

        $this->assertSame('message-4', $messageBag->getInternalErrorMessages()[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag->getInternalErrorMessages()[0]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag->getInternalErrorMessages()[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getInternalErrorMessages()[0]->getMessageTimestamp());
        $this->assertSame('19700106', $messageBag->getInternalErrorMessages()[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag->getInternalErrorMessages()[0]->getMessageAdditionalData());

        $messageBag->addNewMessage('message-1a');
        $messageBag->addNewMessage('message-2a', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700110'));
        $messageBag->addNewMessage('message-3a', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700111'), ['key' => 'value']);
        $messageBag->addNewMessage('message-4a', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700112'), ['key' => 'internal-value']);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertTrue($messageBag->hasInternalErrorMessages());
        $this->assertTrue($messageBag->hasErrorOrInternalErrorMessages());

        $this->assertSame(2, $messageBag->countInfoMessages());
        $this->assertSame(2, $messageBag->countWarningMessages());
        $this->assertSame(2, $messageBag->countErrorMessages());
        $this->assertSame(2, $messageBag->countInternalErrorMessages());
        $this->assertSame(4, $messageBag->countErrorOrInternalErrorMessages());

        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInternalErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getInternalErrorMessages());
        $this->assertArrayNotHasKey(2, $messageBag->getInternalErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayHasKey(1, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayHasKey(2, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayHasKey(3, $messageBag->getErrorOrInternalErrorMessages());
        $this->assertArrayNotHasKey(4, $messageBag->getErrorOrInternalErrorMessages());

        $this->assertSame('message-1a', $messageBag->getInfoMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag->getInfoMessages()[1]->getMessageSeverity());
        $this->assertSame('info', $messageBag->getInfoMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag->getInfoMessages()[1]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag->getInfoMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getInfoMessages()[1]->getMessageAdditionalData());

        $this->assertSame('message-2a', $messageBag->getWarningMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag->getWarningMessages()[1]->getMessageSeverity());
        $this->assertSame('warning', $messageBag->getWarningMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getWarningMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700110', $messageBag->getWarningMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag->getWarningMessages()[1]->getMessageAdditionalData());

        $this->assertSame('message-3a', $messageBag->getErrorMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorMessages()[1]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700111', $messageBag->getErrorMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag->getErrorMessages()[1]->getMessageAdditionalData());

        $this->assertSame('message-4a', $messageBag->getInternalErrorMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag->getInternalErrorMessages()[1]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag->getInternalErrorMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getInternalErrorMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700112', $messageBag->getInternalErrorMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag->getInternalErrorMessages()[1]->getMessageAdditionalData());

        $this->assertSame('message-3a', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageSeverity());
        $this->assertSame('error', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageTimestamp());
        $this->assertSame('19700111', $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag->getErrorOrInternalErrorMessages()[1]->getMessageAdditionalData());

        $this->assertSame('message-4a', $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageTimestamp());
        $this->assertSame('19700112', $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag->getErrorOrInternalErrorMessages()[3]->getMessageAdditionalData());
    }

    public function testInvoiceSuiteMessageBagArrayAccess(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
            new InvoiceSuiteMessageBagItem('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700103'), ['key' => 'internal-value']),
        ]);

        $this->assertCount(4, $messageBag);
        $this->assertArrayHasKey(0, $messageBag);
        $this->assertArrayHasKey(1, $messageBag);
        $this->assertArrayHasKey(2, $messageBag);
        $this->assertArrayHasKey(3, $messageBag);
        $this->assertArrayNotHasKey(4, $messageBag);
        $this->assertArrayHasKey(0, $messageBag);
        $this->assertArrayHasKey(1, $messageBag);
        $this->assertArrayHasKey(2, $messageBag);
        $this->assertArrayHasKey(3, $messageBag);
        $this->assertArrayNotHasKey(4, $messageBag);

        $this->assertSame('message-1', $messageBag[0]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $messageBag[0]->getMessageSeverity());
        $this->assertSame('info', $messageBag[0]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTimeImmutable::class, $messageBag[0]->getMessageTimestamp());
        $this->assertSame((new DateTime())->format('Ymd'), $messageBag[0]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag[0]->getMessageAdditionalData());

        $this->assertSame('message-2', $messageBag[1]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $messageBag[1]->getMessageSeverity());
        $this->assertSame('warning', $messageBag[1]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag[1]->getMessageTimestamp());
        $this->assertSame('19700101', $messageBag[1]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame([], $messageBag[1]->getMessageAdditionalData());

        $this->assertSame('message-3', $messageBag[2]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $messageBag[2]->getMessageSeverity());
        $this->assertSame('error', $messageBag[2]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag[2]->getMessageTimestamp());
        $this->assertSame('19700102', $messageBag[2]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'value'], $messageBag[2]->getMessageAdditionalData());

        $this->assertSame('message-4', $messageBag[3]->getMessageContent());
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $messageBag[3]->getMessageSeverity());
        $this->assertSame('internalerror', $messageBag[3]->getMessageSeverityValue());
        $this->assertInstanceOf(DateTime::class, $messageBag[3]->getMessageTimestamp());
        $this->assertSame('19700103', $messageBag[3]->getMessageTimestamp()->format('Ymd'));
        $this->assertSame(['key' => 'internal-value'], $messageBag[3]->getMessageAdditionalData());

        $this->assertContainsOnlyInstancesOf(InvoiceSuiteMessageBagItem::class, $messageBag);
    }

    public function testInvoiceSuiteMessageBagArrayAccessInvalid1(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1'),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('Ynd', '19700101')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
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
        $this->assertCount(4, $cases);

        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, $cases[0]);
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, $cases[1]);
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, $cases[2]);
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, $cases[3]);

        $this->assertSame('info', InvoiceSuiteMessageSeverity::INFO->value);
        $this->assertSame('warning', InvoiceSuiteMessageSeverity::WARNING->value);
        $this->assertSame('error', InvoiceSuiteMessageSeverity::ERROR->value);
        $this->assertSame('internalerror', InvoiceSuiteMessageSeverity::INTERNALERROR->value);

        $this->assertSame(InvoiceSuiteMessageSeverity::INFO, InvoiceSuiteMessageSeverity::from('info'));
        $this->assertSame(InvoiceSuiteMessageSeverity::WARNING, InvoiceSuiteMessageSeverity::from('warning'));
        $this->assertSame(InvoiceSuiteMessageSeverity::ERROR, InvoiceSuiteMessageSeverity::from('error'));
        $this->assertSame(InvoiceSuiteMessageSeverity::INTERNALERROR, InvoiceSuiteMessageSeverity::from('internalerror'));

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
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('Ynd', '19700102'), ['key' => 'value']),
            new InvoiceSuiteMessageBagItem('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('Ynd', '19700103'), ['key' => 'internal-value']),
        ]);

        $this->assertTrue($messageBag->hasMessages());
        $this->assertTrue($messageBag->hasInfoMessages());
        $this->assertTrue($messageBag->hasWarningMessages());
        $this->assertTrue($messageBag->hasErrorMessages());
        $this->assertTrue($messageBag->hasInternalErrorMessages());
        $this->assertTrue($messageBag->hasErrorOrInternalErrorMessages());

        $this->assertSame(1, $messageBag->countInfoMessages());
        $this->assertSame(1, $messageBag->countWarningMessages());
        $this->assertSame(1, $messageBag->countErrorMessages());
        $this->assertSame(1, $messageBag->countInternalErrorMessages());
        $this->assertSame(2, $messageBag->countErrorOrInternalErrorMessages());

        $this->assertArrayHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayHasKey(0, $messageBag->getInternalErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInternalErrorMessages());

        $messageBag->clear();

        $this->assertFalse($messageBag->hasMessages());
        $this->assertFalse($messageBag->hasInfoMessages());
        $this->assertFalse($messageBag->hasWarningMessages());
        $this->assertFalse($messageBag->hasErrorMessages());
        $this->assertFalse($messageBag->hasInternalErrorMessages());
        $this->assertFalse($messageBag->hasErrorOrInternalErrorMessages());

        $this->assertSame(0, $messageBag->countInfoMessages());
        $this->assertSame(0, $messageBag->countWarningMessages());
        $this->assertSame(0, $messageBag->countErrorMessages());
        $this->assertSame(0, $messageBag->countInternalErrorMessages());
        $this->assertSame(0, $messageBag->countErrorOrInternalErrorMessages());
        $this->assertSame(0, $messageBag->countErrorOrInternalErrorMessages());

        $this->assertArrayNotHasKey(0, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInfoMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getWarningMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getErrorMessages());
        $this->assertArrayNotHasKey(0, $messageBag->getInternalErrorMessages());
        $this->assertArrayNotHasKey(1, $messageBag->getInternalErrorMessages());
    }

    public function testJsonSerialize(): void
    {
        $messageBag = new InvoiceSuiteMessageBag([
            new InvoiceSuiteMessageBagItem('message-1', newMessageTimestamp: DateTime::createFromFormat('YndHis', '19700101223344')),
            new InvoiceSuiteMessageBagItem('message-2', InvoiceSuiteMessageSeverity::WARNING, DateTime::createFromFormat('YndHis', '19700102223344')),
            new InvoiceSuiteMessageBagItem('message-3', InvoiceSuiteMessageSeverity::ERROR, DateTime::createFromFormat('YndHis', '19700103223344'), ['key' => 'value']),
            new InvoiceSuiteMessageBagItem('message-4', InvoiceSuiteMessageSeverity::INTERNALERROR, DateTime::createFromFormat('YndHis', '19700104223344'), ['key' => 'internal-value']),
        ]);

        $jsonEncoded = json_encode($messageBag, JSON_PRETTY_PRINT);

        $jsonEncodedExpected = <<<'JSON_WRAP'
        [
            {
                "messageContent": "message-1",
                "messageSeverity": "info",
                "messageTimestap": "1970-01-01T22:33:44+00:00",
                "messageAdditionalData": []
            },
            {
                "messageContent": "message-2",
                "messageSeverity": "warning",
                "messageTimestap": "1970-01-02T22:33:44+00:00",
                "messageAdditionalData": []
            },
            {
                "messageContent": "message-3",
                "messageSeverity": "error",
                "messageTimestap": "1970-01-03T22:33:44+00:00",
                "messageAdditionalData": {
                    "key": "value"
                }
            },
            {
                "messageContent": "message-4",
                "messageSeverity": "internalerror",
                "messageTimestap": "1970-01-04T22:33:44+00:00",
                "messageAdditionalData": {
                    "key": "internal-value"
                }
            }
        ]
        JSON_WRAP;

        $this->assertSame($jsonEncodedExpected, $jsonEncoded);
    }
}
