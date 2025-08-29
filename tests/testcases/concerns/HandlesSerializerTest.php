<?php

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\concerns\HandlesSerializer;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;

class HandlesSerializerTest extends TestCase
{
    use HandlesCurrentFormatProvider;
    use HandlesSerializer;

    public function testInitialState(): void
    {
        $this->assertNull($this->serializerBuilder);
        $this->assertNull($this->serializer);
    }

    public function testCreateAndInitSerializerByFormatProvider(): void
    {
        $this->setCurrentFormatProvider(new InvoiceSuiteZfFxExtendedProvider());
        $this->createAndInitSerializerByFormatProvider();
        $this->assertInstanceOf(SerializerBuilder::class, $this->serializerBuilder);
        $this->assertInstanceOf(SerializerInterface::class, $this->serializer);
    }
}
