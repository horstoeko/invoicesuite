<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\concerns;

use Exception;
use horstoeko\invoicesuite\concerns\HandlesSafeInvoking;
use horstoeko\invoicesuite\tests\TestCase;

final class HandlesSafeInvokingTest extends TestCase
{
    public function testSafeInvokeTryCallReturnsSelfWhenInstanceIsNull(): void
    {
        $harness = $this->createHarness();

        $returnedHarness = $harness->tryCall(null, 'setValue', 'x');

        $this->assertSame($harness, $returnedHarness);
    }

    public function testSafeInvokeTryCallReturnsSelfWhenMethodIsEmpty(): void
    {
        $harness = $this->createHarness();

        $receiver = new class {
            public bool $wasCalled = false;
            public mixed $receivedValue = null;

            public function setValue($value): void
            {
                $this->wasCalled = true;
                $this->receivedValue = $value;
            }
        };

        $returnedHarness = $harness->tryCall($receiver, '', 'x');

        $this->assertSame($harness, $returnedHarness);
        $this->assertFalse($receiver->wasCalled);
    }

    public function testSafeInvokeTryCallCallsMethodWhenItExists(): void
    {
        $harness = $this->createHarness();

        $receiver = new class {
            public bool $wasCalled = false;
            public mixed $receivedValue = null;

            public function setValue($value): void
            {
                $this->wasCalled = true;
                $this->receivedValue = $value;
            }
        };

        $returnedHarness = $harness->tryCall($receiver, 'setValue', 'hello');

        $this->assertSame($harness, $returnedHarness);
        $this->assertTrue($receiver->wasCalled);
        $this->assertSame('hello', $receiver->receivedValue);
    }

    public function testSafeInvokeTryCallDoesNothingWhenMethodDoesNotExist(): void
    {
        $harness = $this->createHarness();

        $receiver = new class {
            public bool $wasCalled = false;
            public mixed $receivedValue = null;

            public function setValue($value): void
            {
                $this->wasCalled = true;
                $this->receivedValue = $value;
            }
        };

        $returnedHarness = $harness->tryCall($receiver, 'doesNotExist', 'hello');

        $this->assertSame($harness, $returnedHarness);
        $this->assertFalse($receiver->wasCalled);
        $this->assertNull($receiver->receivedValue);
    }

    public function testSafeInvokeTryCallAndReturnReturnsNullWhenInstanceIsNull(): void
    {
        $harness = $this->createHarness();

        $result = $harness->tryCallAndReturn(null, 'provide');

        $this->assertNull($result);
    }

    public function testSafeInvokeTryCallAndReturnReturnsNullWhenMethodIsEmpty(): void
    {
        $harness = $this->createHarness();

        $provider = new class {
            public function provide(): string
            {
                return 'expected';
            }
        };

        $result = $harness->tryCallAndReturn($provider, '');

        $this->assertNull($result);
    }

    public function testSafeInvokeTryCallAndReturnReturnsValueWhenMethodExists(): void
    {
        $harness = $this->createHarness();

        $provider = new class {
            public function provide(): string
            {
                return 'expected';
            }
        };

        $result = $harness->tryCallAndReturn($provider, 'provide');

        $this->assertSame('expected', $result);
    }

    public function testSafeInvokeTryCallAndReturnReturnsNullWhenMethodDoesNotExist(): void
    {
        $harness = $this->createHarness();

        $provider = new class {
            public function provide(): string
            {
                return 'expected';
            }
        };

        $result = $harness->tryCallAndReturn($provider, 'doesNotExist');

        $this->assertNull($result);
    }

    public function testSafeInvokeTryCallByPathCallsChainedMethodsAndSetsValue(): void
    {
        $harness = $this->createHarness();

        $childReceiver = new class {
            public bool $wasSetCalled = false;
            public mixed $value = null;

            public function setFoo($value): void
            {
                $this->wasSetCalled = true;
                $this->value = $value;
            }
        };

        $rootReceiver = new class($childReceiver) {
            public function __construct(private readonly object $child) {}

            public function getChild(): object
            {
                return $this->child;
            }
        };

        $harness->tryCallByPath($rootReceiver, 'getChild.setFoo', 123);

        $this->assertTrue($childReceiver->wasSetCalled);
        $this->assertSame(123, $childReceiver->value);
    }

    public function testSafeInvokeTryCallByPathDoesNothingWhenIntermediateMethodDoesNotExist(): void
    {
        $harness = $this->createHarness();

        $childReceiver = new class {
            public bool $wasSetCalled = false;
            public mixed $value = null;

            public function setFoo($value): void
            {
                $this->wasSetCalled = true;
                $this->value = $value;
            }
        };

        $rootReceiver = new class($childReceiver) {
            public function __construct(private readonly object $child) {}

            public function getChild(): object
            {
                return $this->child;
            }
        };

        $harness->tryCallByPath($rootReceiver, 'doesNotExist.setFoo', 123);

        $this->assertFalse($childReceiver->wasSetCalled);
        $this->assertNull($childReceiver->value);
    }

    public function testSafeInvokeTryCallByPathDoesNothingWhenIntermediateReturnsNull(): void
    {
        $harness = $this->createHarness();

        $childReceiver = new class {
            public bool $wasSetCalled = false;
            public mixed $value = null;

            public function setFoo($value): void
            {
                $this->wasSetCalled = true;
                $this->value = $value;
            }
        };

        $rootReceiver = new class {
            public function getChild(): ?object
            {
                return null;
            }
        };

        $harness->tryCallByPath($rootReceiver, 'getChild.setFoo', 123);

        $this->assertFalse($childReceiver->wasSetCalled);
        $this->assertNull($childReceiver->value);
    }

    public function testSafeInvokeMethodExistsReturnsFalseForNull(): void
    {
        $harness = $this->createHarness();

        $this->assertFalse($harness->methodExists(null, 'any'));
    }

    public function testSafeInvokeMethodExistsReturnsFalseForNonObjectAndNonString(): void
    {
        $harness = $this->createHarness();

        $this->assertFalse($harness->methodExists(123, 'any'));
        $this->assertFalse($harness->methodExists([], 'any'));
        $this->assertFalse($harness->methodExists(true, 'any'));
    }

    public function testSafeInvokeMethodExistsWorksForObjects(): void
    {
        $harness = $this->createHarness();

        $receiver = new class {
            public function setValue($value): void {}
        };

        $this->assertTrue($harness->methodExists($receiver, 'setValue'));
        $this->assertFalse($harness->methodExists($receiver, 'doesNotExist'));
    }

    public function testSafeInvokeMethodExistsWorksForClassStrings(): void
    {
        $harness = $this->createHarness();

        $className = Exception::class;

        $this->assertTrue($harness->methodExists($className, 'getMessage'));
        $this->assertFalse($harness->methodExists($className, 'doesNotExist'));
    }

    private function createHarness(): object
    {
        return new class {
            use HandlesSafeInvoking;

            public function tryCall($instance, string $method, $value): static
            {
                return $this->safeInvokeTryCall($instance, $method, $value);
            }

            public function tryCallAndReturn($instance, string $method)
            {
                return $this->safeInvokeTryCallAndReturn($instance, $method);
            }

            public function tryCallByPath($instance, string $methods, $value): void
            {
                $this->safeInvokeTryCallByPath($instance, $methods, $value);
            }

            public function methodExists($instance, $method): bool
            {
                return $this->safeInvokeMethodExists($instance, $method);
            }
        };
    }
}
