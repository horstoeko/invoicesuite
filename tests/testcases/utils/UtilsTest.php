<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\utils;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

final class UtilsTest extends TestCase
{
    // region InvoiceSuiteArrayUtils

    public function testInvoiceSuiteArrayUtilsEnsureGivenString(): void
    {
        $variable = "X";

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsNotArray($variable);

        $variable = InvoiceSuiteArrayUtils::ensure($variable);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($variable);
        $this->assertCount(1, $variable);
    }

    public function testInvoiceSuiteArrayUtilsEnsureGivenArray(): void
    {
        $variable = ["X", "y", "z"];

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($variable);

        $variable = InvoiceSuiteArrayUtils::ensure($variable);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($variable);
        $this->assertCount(3, $variable);
    }

    public function testInvoiceSuiteArrayUtilsInArrayNoCase(): void
    {
        $variable = ["a", "b"];

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($variable);

        $this->assertTrue(InvoiceSuiteArrayUtils::inArrayNoCase($variable, "a"));
        $this->assertTrue(InvoiceSuiteArrayUtils::inArrayNoCase($variable, "A"));
        $this->assertFalse(InvoiceSuiteArrayUtils::inArrayNoCase($variable, "c"));
        $this->assertFalse(InvoiceSuiteArrayUtils::inArrayNoCase($variable, "C"));
    }

    // endregion

    // region InvoiceSuiteDateTimeUtils

    public function testInvoiceSuiteDateTimeUtilsIsNullOrEmpty(): void
    {
        $dateTimeValue = null;

        $this->assertTrue(InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($dateTimeValue));

        $dateTimeValue = DateTime::createFromFormat('dmY', '01011970');

        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertFalse(InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($dateTimeValue));
    }

    public function testInvoiceSuiteDateTimeUtilsAllIsNullOrEmpty(): void
    {
        $dateTimeValues = [null, null];

        $this->assertTrue(InvoiceSuiteDateTimeUtils::allIsNullOrEmpty($dateTimeValues));

        $dateTimeValues = [null, DateTime::createFromFormat('dmY', '01011970')];

        $this->assertFalse(InvoiceSuiteDateTimeUtils::allIsNullOrEmpty($dateTimeValues));
    }

    public function testInvoiceSuiteDateTimeUtilsOneIsNullOrEmpty(): void
    {
        $dateTimeValues = [null, null];

        $this->assertTrue(InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty($dateTimeValues));

        $dateTimeValues = [null, DateTime::createFromFormat('dmY', '01011970')];

        $this->assertTrue(InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty($dateTimeValues));

        $dateTimeValues = [DateTime::createFromFormat('dmY', '01011970'), DateTime::createFromFormat('dmY', '01011970')];

        $this->assertFalse(InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty($dateTimeValues));
    }

    public function testInvoiceSuiteDateTimeUtilsAsNullWhenEmpty(): void
    {
        $dateTimeValue = null;

        $this->assertNotInstanceOf(\DateTimeInterface::class, InvoiceSuiteDateTimeUtils::asNullWhenEmpty($dateTimeValue));

        $dateTimeValue = DateTime::createFromFormat('dmY', '01011970');

        $this->assertInstanceOf(DateTimeInterface::class, InvoiceSuiteDateTimeUtils::asNullWhenEmpty($dateTimeValue));
        $this->assertNotNull(InvoiceSuiteDateTimeUtils::asNullWhenEmpty($dateTimeValue));
    }

    public function testInvoiceSuiteDateTimeUtilsConvertZfFxDateStringToDateTime(): void
    {
        $dateTimeString = "";
        $dateTimeFormat = "";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertNotInstanceOf(\DateTimeInterface::class, $dateTimeValue);

        $dateTimeString = "";
        $dateTimeFormat = "";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertNotInstanceOf(\DateTimeInterface::class, $dateTimeValue);

        $dateTimeString = "200202";
        $dateTimeFormat = "101";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("02", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));

        $dateTimeString = "19700101";
        $dateTimeFormat = "102";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("01", $dateTimeValue->format("d"));
        $this->assertSame("01", $dateTimeValue->format("m"));
        $this->assertSame("1970", $dateTimeValue->format("Y"));

        $dateTimeString = "2002021031";
        $dateTimeFormat = "201";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("02", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));

        $dateTimeString = "200202103145";
        $dateTimeFormat = "202";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("02", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));
        $this->assertSame("10", $dateTimeValue->format("h"));
        $this->assertSame("31", $dateTimeValue->format("i"));
        $this->assertSame("45", $dateTimeValue->format("s"));

        $dateTimeString = "202002021031";
        $dateTimeFormat = "203";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("02", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));
        $this->assertSame("10", $dateTimeValue->format("h"));
        $this->assertSame("31", $dateTimeValue->format("i"));
        $this->assertSame("00", $dateTimeValue->format("s"));

        $dateTimeString = "20200202103145";
        $dateTimeFormat = "204";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("02", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));
        $this->assertSame("10", $dateTimeValue->format("h"));
        $this->assertSame("31", $dateTimeValue->format("i"));
        $this->assertSame("45", $dateTimeValue->format("s"));

        $dateTimeString = "202002";
        $dateTimeFormat = "610";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertInstanceOf(\DateTimeInterface::class, $dateTimeValue);
        $this->assertInstanceOf(DateTimeInterface::class, $dateTimeValue);
        $this->assertSame("01", $dateTimeValue->format("d"));
        $this->assertSame("02", $dateTimeValue->format("m"));
        $this->assertSame("2020", $dateTimeValue->format("Y"));
        $this->assertSame("12", $dateTimeValue->format("h"));
        $this->assertSame("00", $dateTimeValue->format("i"));
        $this->assertSame("00", $dateTimeValue->format("s"));

        $dateTimeString = "19700101";
        $dateTimeFormat = "999";
        $dateTimeValue = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime($dateTimeString, $dateTimeFormat);

        $this->assertNotInstanceOf(\DateTimeInterface::class, $dateTimeValue);
    }

    // endregion

    // region InvoiceSuiteFloatUtils

    public function testInvoiceSuiteFloatUtilsIsNullOrEmpty(): void
    {
        $floatValue = null;

        $this->assertTrue(InvoiceSuiteFloatUtils::floatIsNullOrEmpty($floatValue));

        $floatValue = 1.0;

        $this->assertFalse(InvoiceSuiteFloatUtils::floatIsNullOrEmpty($floatValue));
    }

    public function testInvoiceSuiteFloatUtilsAllIsNullOrEmpty(): void
    {
        $floatValues = [null, null];

        $this->assertTrue(InvoiceSuiteFloatUtils::allIsNullOrEmpty($floatValues));

        $floatValues = [null, 1.0];

        $this->assertFalse(InvoiceSuiteFloatUtils::allIsNullOrEmpty($floatValues));
    }

    public function testInvoiceSuiteFloatUtilsOneIsNullOrEmpty(): void
    {
        $floatValues = [null, null];

        $this->assertTrue(InvoiceSuiteFloatUtils::oneIsNullOrEmpty($floatValues));

        $floatValues = [null, 1.0];

        $this->assertTrue(InvoiceSuiteFloatUtils::oneIsNullOrEmpty($floatValues));

        $floatValues = [1.0, 2.0];

        $this->assertFalse(InvoiceSuiteFloatUtils::oneIsNullOrEmpty($floatValues));
    }

    public function testInvoiceSuiteFloatUtilsAsNullWhenEmpty(): void
    {
        $floatValue = null;

        $this->assertNull(InvoiceSuiteFloatUtils::asNullWhenEmpty($floatValue));

        $floatValue = 1.0;

        $this->assertNotNull(InvoiceSuiteFloatUtils::asNullWhenEmpty($floatValue));
    }

    // endregion

    // region InvoiceSuiteStringUtils

    public function testInvoiceSuiteStringUtilsIsNullOrEmpty(): void
    {
        $stringValue = null;

        $this->assertTrue(InvoiceSuiteStringUtils::stringIsNullOrEmpty($stringValue));

        $stringValue = "A";

        $this->assertFalse(InvoiceSuiteStringUtils::stringIsNullOrEmpty($stringValue));
    }

    public function testInvoiceSuiteStringUtilsAllIsNullOrEmpty(): void
    {
        $stringValues = [null, null];

        $this->assertTrue(InvoiceSuiteStringUtils::allIsNullOrEmpty($stringValues));

        $stringValues = [null, "A"];

        $this->assertFalse(InvoiceSuiteStringUtils::allIsNullOrEmpty($stringValues));
    }

    public function testInvoiceSuiteStringUtilsOneIsNullOrEmpty(): void
    {
        $stringValues = [null, null];

        $this->assertTrue(InvoiceSuiteStringUtils::oneIsNullOrEmpty($stringValues));

        $stringValues = [null, "A"];

        $this->assertTrue(InvoiceSuiteStringUtils::oneIsNullOrEmpty($stringValues));

        $stringValues = ["A", "B"];

        $this->assertFalse(InvoiceSuiteStringUtils::oneIsNullOrEmpty($stringValues));
    }

    public function testInvoiceSuiteStringUtilsAsNullWhenEmpty(): void
    {
        $stringValue = null;

        $this->assertNull(InvoiceSuiteStringUtils::asNullWhenEmpty($stringValue));

        $stringValue = "A";

        $this->assertNotNull(InvoiceSuiteStringUtils::asNullWhenEmpty($stringValue));
    }

    public function testInvoiceSuiteStringUtilsCreateGuid(): void
    {
        $guid_regex = "/^(?:\\{{0,1}(?:[0-9a-fA-F]){8}-(?:[0-9a-fA-F]){4}-(?:[0-9a-fA-F]){4}-(?:[0-9a-fA-F]){4}-(?:[0-9a-fA-F]){12}\\}{0,1})$/";

        $this->assertMatchesRegularExpression($guid_regex, InvoiceSuiteStringUtils::createGuid());
        $this->assertMatchesRegularExpression($guid_regex, InvoiceSuiteStringUtils::createGuid(false));
    }

    // endregion

    // region InvoiceSuitePointerUtils

    public function testInvoiceSuitePointerUtilsFirst(): void
    {
        InvoiceSuitePointerUtils::first('ptr1');
        InvoiceSuitePointerUtils::first('ptr2');

        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr3'));
    }

    public function testInvoiceSuitePointerUtilsNext(): void
    {
        InvoiceSuitePointerUtils::next('ptr1');
        InvoiceSuitePointerUtils::next('ptr2');
        InvoiceSuitePointerUtils::next('ptr3');

        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr3'));

        InvoiceSuitePointerUtils::next('ptr1');
        InvoiceSuitePointerUtils::next('ptr2');
        InvoiceSuitePointerUtils::next('ptr3');

        $this->assertSame(2, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(2, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(2, InvoiceSuitePointerUtils::getValue('ptr3'));
    }

    public function testInvoiceSuitePointerUtilsPrev(): void
    {
        InvoiceSuitePointerUtils::prev('ptr1');
        InvoiceSuitePointerUtils::prev('ptr2');
        InvoiceSuitePointerUtils::prev('ptr3');

        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr3'));
    }

    public function testInvoiceSuitePointerUtilsReset(): void
    {
        InvoiceSuitePointerUtils::reset();

        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr3'));
    }

    public function testInvoiceSuitePointerUtilsResetSingle(): void
    {
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr3'));

        InvoiceSuitePointerUtils::next('ptr1');
        InvoiceSuitePointerUtils::next('ptr2');
        InvoiceSuitePointerUtils::next('ptr3');

        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr3'));

        InvoiceSuitePointerUtils::resetSingle('ptr1');

        $this->assertSame(0, InvoiceSuitePointerUtils::getValue('ptr1'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr2'));
        $this->assertSame(1, InvoiceSuitePointerUtils::getValue('ptr3'));
    }

    public function testInvoiceSuitePointerUtilsHas(): void
    {
        InvoiceSuitePointerUtils::reset();

        $this->assertTrue(InvoiceSuitePointerUtils::has([1, 2, 3], 'ptr1'));

        InvoiceSuitePointerUtils::next('ptr1');

        $this->assertTrue(InvoiceSuitePointerUtils::has([1, 2, 3], 'ptr1'));

        InvoiceSuitePointerUtils::next('ptr1');

        $this->assertTrue(InvoiceSuitePointerUtils::has([1, 2, 3], 'ptr1'));

        InvoiceSuitePointerUtils::next('ptr1');

        $this->assertFalse(InvoiceSuitePointerUtils::has([1, 2, 3], 'ptr1'));
    }

    public function testInvoiceSuitePointerUtilsHasFirst(): void
    {
        InvoiceSuitePointerUtils::reset();

        $this->assertTrue(InvoiceSuitePointerUtils::hasFirst([1, 2, 3], 'ptr1'));
        $this->assertFalse(InvoiceSuitePointerUtils::hasFirst([], 'ptr1'));
    }

    public function testInvoiceSuitePointerUtilsHasNext(): void
    {
        InvoiceSuitePointerUtils::reset();

        $this->assertTrue(InvoiceSuitePointerUtils::hasNext([1, 2, 3], 'ptr1'));
        $this->assertFalse(InvoiceSuitePointerUtils::hasNext([], 'ptr1'));

        $this->assertTrue(InvoiceSuitePointerUtils::hasNext([1, 2, 3], 'ptr1'));
        $this->assertFalse(InvoiceSuitePointerUtils::hasNext([], 'ptr1'));

        $this->assertFalse(InvoiceSuitePointerUtils::hasNext([1, 2, 3], 'ptr1'));
        $this->assertFalse(InvoiceSuitePointerUtils::hasNext([], 'ptr1'));
    }

    // endregion

    // region InvoiceSuiteContentTypeResolver

    public function testInvoiceSuiteContentTypeResolverResolveContentType(): void
    {
        $this->assertNull(InvoiceSuiteContentTypeResolver::resolveContentType(''));

        $this->assertNotNull(InvoiceSuiteContentTypeResolver::resolveContentType('{"a":1,"b":"x"}'));
        $this->assertSame(InvoiceSuiteContentTypeResolver::JSON, InvoiceSuiteContentTypeResolver::resolveContentType('{"a":1,"b":"x"}'));

        $this->assertNotNull(InvoiceSuiteContentTypeResolver::resolveContentType('<xml><dummy></dummy></xml>'));
        $this->assertSame(InvoiceSuiteContentTypeResolver::XML, InvoiceSuiteContentTypeResolver::resolveContentType('<xml><dummy></dummy></xml>'));

        $this->assertNull(InvoiceSuiteContentTypeResolver::resolveContentType('{"a":1,"b":"x"'));

        $this->assertNull(InvoiceSuiteContentTypeResolver::resolveContentType('<xml><dummy></dummy>'));
    }

    // endregion

    // region InvoiceSuiteAttachment

    public function testInvoiceSuiteAttachmentFromFile(): void
    {
        $attachment = InvoiceSuiteAttachment::fromFile(__DIR__ . '/../../assets/01_InvoiceSuiteAttachment_1.txt');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertTrue($attachment->isFileAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('This is a test', $attachment->getRawContent());
        $this->assertSame('VGhpcyBpcyBhIHRlc3Q=', $attachment->getContent());
        $this->assertSame('text/plain', $attachment->getContentMimeType());
        $this->assertSame('01_InvoiceSuiteAttachment_1.txt', $attachment->getFilename());

        $attachment = InvoiceSuiteAttachment::fromFile(__DIR__ . '/../../assets/01_InvoiceSuiteAttachment_2.txt');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertTrue($attachment->isFileAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('{"a":"b","c":2}', $attachment->getRawContent());
        $this->assertSame('eyJhIjoiYiIsImMiOjJ9', $attachment->getContent());
        $this->assertSame('application/json', $attachment->getContentMimeType());
        $this->assertSame('01_InvoiceSuiteAttachment_2.json', $attachment->getFilename());

        $this->expectException(InvoiceSuiteFileNotFoundException::class);

        InvoiceSuiteAttachment::fromFile(__DIR__ . '/../../assets/01_InvoiceSuiteAttachment_3.txt');
    }

    public function testInvoiceSuiteAttachmentFromBinaryString(): void
    {
        $attachment = InvoiceSuiteAttachment::fromBinaryString('This is a test', 'test.txt');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertTrue($attachment->isBinaryStringAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('This is a test', $attachment->getRawContent());
        $this->assertSame('VGhpcyBpcyBhIHRlc3Q=', $attachment->getContent());
        $this->assertSame('text/plain', $attachment->getContentMimeType());
        $this->assertSame('test.txt', $attachment->getFilename());

        $attachment = InvoiceSuiteAttachment::fromBinaryString('{"a":"b","c":2}', 'test.txt');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertTrue($attachment->isBinaryStringAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('{"a":"b","c":2}', $attachment->getRawContent());
        $this->assertSame('eyJhIjoiYiIsImMiOjJ9', $attachment->getContent());
        $this->assertSame('application/json', $attachment->getContentMimeType());
        $this->assertSame('test.json', $attachment->getFilename());
    }

    public function testInvoiceSuiteAttachmentFromBase64String(): void
    {
        $attachment = InvoiceSuiteAttachment::fromBase64String('VGhpcyBpcyBhIHRlc3Q=', 'test.txt');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertTrue($attachment->isBase64StringAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('This is a test', $attachment->getRawContent());
        $this->assertSame('VGhpcyBpcyBhIHRlc3Q=', $attachment->getContent());
        $this->assertSame('text/plain', $attachment->getContentMimeType());
        $this->assertSame('test.txt', $attachment->getFilename());

        $attachment = InvoiceSuiteAttachment::fromBase64String('eyJhIjoiYiIsImMiOjJ9', 'test.txt');

        $this->assertTrue($attachment->isBase64StringAttachment());
        $this->assertTrue($attachment->isBinaryAttachment());
        $this->assertSame('{"a":"b","c":2}', $attachment->getRawContent());
        $this->assertSame('eyJhIjoiYiIsImMiOjJ9', $attachment->getContent());
        $this->assertSame('application/json', $attachment->getContentMimeType());
        $this->assertSame('test.json', $attachment->getFilename());

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Not a BASE64 string');

        InvoiceSuiteAttachment::fromBase64String('{"a":"b","c":2}', 'test.txt');
    }

    public function testInvoiceSuiteAttachmentFromUrl(): void
    {
        $attachment = InvoiceSuiteAttachment::fromUrl('http://some.url');

        $this->assertInstanceOf(InvoiceSuiteAttachment::class, $attachment);
        $this->assertFalse($attachment->isBase64StringAttachment());
        $this->assertTrue($attachment->isUrlAttachment());
        $this->assertFalse($attachment->isBinaryAttachment());
        $this->assertSame('http://some.url', $attachment->getRawContent());
        $this->assertSame('http://some.url', $attachment->getContent());
        $this->assertFalse($attachment->getContentMimeType());
        $this->assertFalse($attachment->getFilename());

        $this->expectException(InvoiceSuiteInvalidArgumentException::class);
        $this->expectExceptionMessage('Not a valid URL: Dummy');

        InvoiceSuiteAttachment::fromUrl('Dummy');
    }

    // endregion

    // region InvoiceSuiteClassFinder

    public function testInvoiceSuiteClassFinderFactory(): void
    {
        $cacheFilename = md5((string) preg_replace("/[^a-zA-Z0-9]/", "", sprintf("invoicesuite-cf-%s", InvoiceSuiteAbstractDocumentFormatProvider::class))) . ".cache";
        $cacheFullFilename = __DIR__ . '/../../../src/cache/' . $cacheFilename;
        @unlink($cacheFullFilename);

        // One

        $classFinder = InvoiceSuiteClassFinder::factory();

        $this->assertInstanceOf(InvoiceSuiteClassFinder::class, $classFinder);

        $classNames = $this->getPrivatePropertyFromObject($classFinder, 'classNames');

        $this->assertIsArray($classNames->getValue($classFinder));
        $this->assertNotEmpty($classNames->getValue($classFinder));

        // Two

        $classFinder = InvoiceSuiteClassFinder::factory();

        $this->assertInstanceOf(InvoiceSuiteClassFinder::class, $classFinder);

        $classNames = $this->getPrivatePropertyFromObject($classFinder, 'classNames');

        $this->assertIsArray($classNames->getValue($classFinder));
        $this->assertNotEmpty($classNames->getValue($classFinder), 'Classnames should have been filled by Init ()');

        $classNames = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class, true);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($classNames);
        $this->assertCount(7, $classNames);

        // Three

        $classFinder->clear();

        $classNames = $this->getPrivatePropertyFromObject($classFinder, 'classNames');

        $this->assertIsArray($classNames->getValue($classFinder));
        $this->assertEmpty($classNames->getValue($classFinder));

        $classNames = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class, true);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($classNames);
        $this->assertEmpty($classNames);
        $this->assertFileDoesNotExist($cacheFullFilename);

        $classFinder->init();

        $classNames = $this->getPrivatePropertyFromObject($classFinder, 'classNames');

        $this->assertIsArray($classNames->getValue($classFinder));
        $this->assertNotEmpty($classNames->getValue($classFinder));

        $classNames = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class, true);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($classNames);
        $this->assertCount(7, $classNames);
        $this->assertFileDoesNotExist($cacheFullFilename);

        $classNames = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class, false);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($classNames);
        $this->assertCount(7, $classNames);
        $this->assertFileExists($cacheFullFilename);

        $classNames = $classFinder->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentFormatProvider::class, false);

        /**
         * @phpstan-ignore method.alreadyNarrowedType
         */
        $this->assertIsArray($classNames);
        $this->assertCount(7, $classNames);
        $this->assertFileExists($cacheFullFilename);

        $this->assertFileExists(InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "..", "src", "cache"), "fb2c9c3d46a7d2650a8813477106ebca.cache"));
        InvoiceSuiteClassFinder::clearCache();
        $this->assertFileDoesNotExist(InvoiceSuitePathUtils::combinePathWithFile(InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "..", "src", "cache"), "fb2c9c3d46a7d2650a8813477106ebca.cache"));
    }

    // endregion

    // region InvoiceSuiteFileUtils

    public function testInvoiceSuiteFileUtils(): void
    {
        $this->assertTrue(InvoiceSuiteFileUtils::fileExists(__FILE__, true));
        $this->assertFalse(InvoiceSuiteFileUtils::fileExists(__FILE__ . ".xxx", true));

        $this->assertSame("SSBhbSBhIHRlc3RmaWxl", substr(InvoiceSuiteFileUtils::fileToBase64(__DIR__ . "/../../assets/99_FileUtilsTest_tobase64.txt"), 0, 20));
        $this->assertEquals(false, InvoiceSuiteFileUtils::fileToBase64(__FILE__ . ".xxx"));

        $sourceFilename = __DIR__ . "/../../assets/99_FileUtilsTest_tobase64.txt";
        $destinationFilename = __DIR__ . "/../../assets/encbase64.txt";
        $this->assertTrue(InvoiceSuiteFileUtils::fileToBase64File($sourceFilename, $destinationFilename));
        $this->assertTrue(InvoiceSuiteFileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertSame("SSBhbSBhIHRlc3RmaWxl", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);

        $sourceFilename = __DIR__ . "/../../assets/tobase64_2.txt";
        $destinationFilename = __DIR__ . "/../../assets/encbase64_2.txt";
        $this->assertFalse(InvoiceSuiteFileUtils::fileToBase64File($sourceFilename, $destinationFilename));
        $this->assertFalse(InvoiceSuiteFileUtils::fileExists($destinationFilename));

        $sourceData = "SSBhbSBhIHRlc3RmaWxlLiBEb24ndCBtb2RpZnkgbWUuLi4=";
        $destinationFilename = __DIR__ . "/../../assets/decbase64.txt";
        $this->assertTrue(InvoiceSuiteFileUtils::base64ToFile($sourceData, $destinationFilename));
        $this->assertTrue(InvoiceSuiteFileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertSame("I am a testfile. Don", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);

        $sourceFilename = __DIR__ . "/../../assets/99_FileUtilsTest_base64.txt";
        $destinationFilename = __DIR__ . "/../../assets/decbase64.txt";
        $this->assertTrue(InvoiceSuiteFileUtils::base64FileToFile($sourceFilename, $destinationFilename));
        $this->assertTrue(InvoiceSuiteFileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertSame("I am a testfile. Don", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);

        $this->assertSame("file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file", "txt"));
        $this->assertSame("file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file.", "txt"));
        $this->assertSame("file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file.", ".txt"));
        $this->assertSame("file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file..", "txt"));
        $this->assertSame("file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file..", "..txt"));
        $this->assertSame("file.x.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file.x", "txt"));
        $this->assertSame("file.x.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("file.x", ".txt"));
        $this->assertSame("/home/john/file.txt", InvoiceSuiteFileUtils::combineFilenameWithFileextension("/home/john/file", "txt"));

        $this->assertSame("/home/john", InvoiceSuiteFileUtils::getFileDirectory("/home/john/file.txt"));
        $this->assertSame("/home/john", InvoiceSuiteFileUtils::getFileDirectory("/home/john/file.x.txt"));

        $this->assertSame("file.txt", InvoiceSuiteFileUtils::getFilenameWithExtension("/home/john/file.txt"));
        $this->assertSame("file.x.txt", InvoiceSuiteFileUtils::getFilenameWithExtension("/home/john/file.x.txt"));

        $this->assertSame("file", InvoiceSuiteFileUtils::getFilenameWithoutExtension("/home/john/file.txt"));
        $this->assertSame("file.x", InvoiceSuiteFileUtils::getFilenameWithoutExtension("/home/john/file.x.txt"));

        $this->assertSame(".txt", InvoiceSuiteFileUtils::getFileExtension("file.txt", true));
        $this->assertSame(".txt", InvoiceSuiteFileUtils::getFileExtension("file.x.txt", true));
        $this->assertSame(".txt", InvoiceSuiteFileUtils::getFileExtension("/home/john/file.x.txt", true));
        $this->assertSame("txt", InvoiceSuiteFileUtils::getFileExtension("file.txt"));
        $this->assertSame("txt", InvoiceSuiteFileUtils::getFileExtension("file.x.txt"));
        $this->assertSame("txt", InvoiceSuiteFileUtils::getFileExtension("/home/john/file.x.txt"));

        $ds = DIRECTORY_SEPARATOR;

        $this->assertSame(sprintf('.%sfile.new', $ds), InvoiceSuiteFileUtils::changeFileExtension("file.txt", "new"));
        $this->assertSame(sprintf('.%sfile.new', $ds), InvoiceSuiteFileUtils::changeFileExtension("file.txt", ".new"));
        $this->assertSame(sprintf('%shome%sjohn%sfile.new', $ds, $ds, $ds), InvoiceSuiteFileUtils::changeFileExtension(sprintf('%shome%sjohn%sfile.txt', $ds, $ds, $ds), "new"));
        $this->assertSame(sprintf('%shome%sjohn%sfile.new', $ds, $ds, $ds), InvoiceSuiteFileUtils::changeFileExtension(sprintf('%shome%sjohn%sfile.txt', $ds, $ds, $ds), ".new"));

        $this->assertSame(35, InvoiceSuiteFileUtils::getFileSize(__DIR__ . "/../../assets/99_FileUtilsTest_tobase64.txt"));
        $this->assertSame(0, InvoiceSuiteFileUtils::getFileSize(__DIR__ . "/../../assets/filenotexists.txt"));

        $this->assertSame(35, InvoiceSuiteFileUtils::getFileSizeFromBase64String("SSBhbSBhIHRlc3RmaWxlLiBEb24ndCBtb2RpZnkgbWUuLi4="));
        $this->assertSame(0, InvoiceSuiteFileUtils::getFileSizeFromBase64String(""));
    }

    // endregion

    // region InvoiceSuitePathUtils

    public function testInvoiceSuitePathUtils(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->assertSame(sprintf('%shome%suser%stest.txt', $ds, $ds, $ds), InvoiceSuitePathUtils::combinePathWithFile(sprintf('%shome%suser', $ds, $ds), "test.txt"));
        $this->assertSame(sprintf('%shome%suser%stest.txt', $ds, $ds, $ds), InvoiceSuitePathUtils::combinePathWithFile(sprintf('%shome%suser%s', $ds, $ds, $ds), "test.txt"));
        $this->assertSame(sprintf('%shome%suser%stest.txt', $ds, $ds, $ds), InvoiceSuitePathUtils::combinePathWithFile(sprintf('%shome%suser', $ds, $ds), $ds . 'test.txt'));

        $this->assertSame(sprintf('%shome%suser', $ds, $ds), InvoiceSuitePathUtils::combinePathWithPath($ds . 'home', "user"));
        $this->assertSame(sprintf('%shome%suser', $ds, $ds), InvoiceSuitePathUtils::combinePathWithPath($ds . 'home', $ds . 'user'));
        $this->assertSame(sprintf('%shome%suser', $ds, $ds), InvoiceSuitePathUtils::combinePathWithPath(sprintf('%shome%s%s', $ds, $ds, $ds), $ds . 'user'));
        $this->assertSame(sprintf('%shome%suser', $ds, $ds), InvoiceSuitePathUtils::combinePathWithPath(sprintf('%shome%s%s', $ds, $ds, $ds), "user"));

        $this->assertSame(sprintf('home%suser%sjohn', $ds, $ds), InvoiceSuitePathUtils::combineAllPaths("home", "user", "john"));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths($ds . 'home', "user", "john"));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths($ds . 'home', $ds . 'user', "john"));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths($ds . 'home', $ds . 'user', $ds . 'john'));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths(sprintf('%shome%s%s', $ds, $ds, $ds), "user", "john"));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths(sprintf('%shome%s%s', $ds, $ds, $ds), sprintf('%suser%s%s', $ds, $ds, $ds), "john"));
        $this->assertSame(sprintf('%shome%suser%sjohn', $ds, $ds, $ds), InvoiceSuitePathUtils::combineAllPaths(sprintf('%shome%s%s', $ds, $ds, $ds), sprintf('%suser%s%s', $ds, $ds, $ds), $ds . 'john'));

        $this->assertNotSame("", InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->assertSame(3, substr_count(InvoiceSuitePathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith(DIRECTORY_SEPARATOR, InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith(DIRECTORY_SEPARATOR, InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->expectException(\Exception::class);
        InvoiceSuitePathUtils::getHashedDirectory(0);

        $baseDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, "test");
        $createdDirectory = InvoiceSuitePathUtils::createHashedDirectory($baseDirectory, 3);

        $this->assertIsString($createdDirectory);
        $this->assertNotSame("", InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->assertSame(3, substr_count(InvoiceSuitePathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith($ds, InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith($ds, InvoiceSuitePathUtils::getHashedDirectory(3));
        $this->assertDirectoryExists($createdDirectory);
        $this->assertFileExists($createdDirectory);

        InvoiceSuitePathUtils::recursiveRemoveDirectory($baseDirectory);

        $this->assertDirectoryDoesNotExist($createdDirectory);
        $this->assertFileDoesNotExist($createdDirectory);
    }

    // endregion
}
