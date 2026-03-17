<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use horstoeko\invoicesuite\concerns\HandlesKeyValuePairs;
use horstoeko\invoicesuite\tests\TestCase;

final class HandlesKeyValuePairsTest extends TestCase
{
    use HandlesKeyValuePairs;

    public function testState(): void
    {
        // Initial state

        $this->assertEmpty($this->keyValuePairContainer);

        // Has

        $this->assertFalse($this->hasKeyValuePair('key-1'));
        $this->assertFalse($this->hasKeyValuePair('key-2'));
        $this->assertFalse($this->hasKeyValuePair('key-3'));
        $this->assertFalse($this->hasKeyValuePair('key-1a'));
        $this->assertFalse($this->hasKeyValuePair('key-2a'));

        // Add

        $this->addKeyValuePair('key-1', 'somestringvalue');
        $this->addKeyValuePair('key-2', 999);
        $this->addKeyValuePair('key-3', 999.99);

        $this->assertTrue($this->hasKeyValuePair('key-1'));
        $this->assertTrue($this->hasKeyValuePair('key-2'));
        $this->assertTrue($this->hasKeyValuePair('key-3'));
        $this->assertFalse($this->hasKeyValuePair('key-1a'));
        $this->assertFalse($this->hasKeyValuePair('key-2a'));

        // Get

        $this->assertSame('somestringvalue', $this->getKeyValuePair('key-1', 'somedefaultvalue'));
        $this->assertSame(999, $this->getKeyValuePair('key-2', 0));
        $this->assertEqualsWithDelta(999.99, $this->getKeyValuePair('key-3', 0), PHP_FLOAT_EPSILON);
        $this->assertSame('somedefaultvalue', $this->getKeyValuePair('key-1a', 'somedefaultvalue'));
        $this->assertSame(0, $this->getKeyValuePair('key-2a', 0));

        // Add (Overwrite)

        $this->addKeyValuePair('key-3', 1999.99);
        $this->assertEqualsWithDelta(999.99, $this->getKeyValuePair('key-3', 0), PHP_FLOAT_EPSILON);
        $this->addKeyValuePair('key-3', 1999.99, true);
        $this->assertEqualsWithDelta(1999.99, $this->getKeyValuePair('key-3', 0), PHP_FLOAT_EPSILON);

        // Remove

        $this->assertTrue($this->hasKeyValuePair('key-1'));
        $this->assertTrue($this->hasKeyValuePair('key-2'));
        $this->assertTrue($this->hasKeyValuePair('key-3'));
        $this->removeKeyValuePair('key-1');
        $this->assertFalse($this->hasKeyValuePair('key-1'));
        $this->assertTrue($this->hasKeyValuePair('key-2'));
        $this->assertTrue($this->hasKeyValuePair('key-3'));
        $this->removeKeyValuePair('key-4');
    }
}
