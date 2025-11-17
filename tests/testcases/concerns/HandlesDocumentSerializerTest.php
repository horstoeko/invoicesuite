<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\tests\TestCase;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

final class HandlesDocumentSerializerTest extends TestCase
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentSerializer;

    public function testInitialState(): void
    {
        $this->assertNull($this->documentSerializerBuilder);
        $this->assertNull($this->documentSerializer);
    }

    public function testCreateAndInitSerializerByFormatProvider(): void
    {
        $this->setCurrentDocumentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->createAndInitDocumentSerializerByFormatProvider();
        $this->assertInstanceOf(SerializerBuilder::class, $this->documentSerializerBuilder);
        $this->assertInstanceOf(SerializerInterface::class, $this->documentSerializer);
    }
}
