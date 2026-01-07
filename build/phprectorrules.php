<?php

declare(strict_types=1);

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Identifier;
use PhpParser\Node\Expr\Array_;
use Rector\Rector\AbstractRector;
use PhpParser\Node\Expr\StaticCall;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\If_;
use PhpParser\NodeFinder;
use Rector\PhpParser\Printer\BetterStandardPrinter;


final class OneIsNullOrEmptySingleElementToStringIsNullOrEmptyRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Turns InvoiceSuiteStringUtils::oneIsNullOrEmpty([$x]) into InvoiceSuiteStringUtils::stringIsNullOrEmpty($x)',
            [
                new CodeSample(
                    <<<'CODE'
InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentDescription]);
CODE,
                    <<<'CODE'
InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentDescription);
CODE
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (!$node instanceof StaticCall) {
            return null;
        }

        if (!$node->class instanceof Node\Name) {
            return null;
        }

        $allowedClassNames = [
            'InvoiceSuiteStringUtils',
            'horstoeko\\invoicesuite\\utils\\InvoiceSuiteStringUtils',
        ];

        $classOk = false;

        foreach ($allowedClassNames as $className) {
            if ($this->isName($node->class, $className)) {
                $classOk = true;
                break;
            }
        }

        if (!$classOk) {
            return null;
        }

        if (!$this->isName($node->name, 'oneIsNullOrEmpty')) {
            return null;
        }

        if (count($node->args) !== 1) {
            return null;
        }

        $firstArgValue = $node->args[0]->value;

        if (!$firstArgValue instanceof Array_) {
            return null;
        }

        if (count($firstArgValue->items) !== 1) {
            return null;
        }

        $item = $firstArgValue->items[0];

        if ($item === null) {
            return null;
        }

        if ($item->key !== null) {
            return null;
        }

        $node->name = new Identifier('stringIsNullOrEmpty');
        $node->args = [new Arg($item->value)];

        return $node;
    }
}

final class OneIsNullOrEmptyIfTraceToStringIsNullOrEmptyRector extends AbstractRector
{
    public function __construct(
        private BetterStandardPrinter $betterStandardPrinter,
    ) {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'In if-conditions: InvoiceSuiteStringUtils::oneIsNullOrEmpty([$x]) -> stringIsNullOrEmpty($x) and update traceMethodEarlyExit args accordingly.',
            [
                new CodeSample(
                    <<<'CODE'
if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentNo])) {
    return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentNo])');
}
CODE
                    ,
                    <<<'CODE'
if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)) {
    return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)');
}
CODE
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [If_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (!$node instanceof If_) {
            return null;
        }

        $changed = $this->refactorCondition($node);

        if (!$changed && !$this->conditionContainsStringIsNullOrEmpty($node)) {
            return null;
        }

        $condAsString = $this->betterStandardPrinter->print($node->cond);
        $condAsString = $this->normalizeInvoiceSuiteStringUtilsClassName($condAsString);

        $this->updateTraceMethodEarlyExit($node, $condAsString);

        return $node;
    }

    private function refactorCondition(If_ $if): bool
    {
        $nodeFinder = new NodeFinder();

        $staticCalls = $nodeFinder->findInstanceOf($if->cond, StaticCall::class);

        $changed = false;

        foreach ($staticCalls as $staticCall) {
            if (!$this->isInvoiceSuiteStringUtilsClass($staticCall)) {
                continue;
            }

            if (!$this->isName($staticCall->name, 'oneIsNullOrEmpty')) {
                continue;
            }

            if (\count($staticCall->args) !== 1) {
                continue;
            }

            $argValue = $staticCall->args[0]->value;

            if (!$argValue instanceof Array_) {
                continue;
            }

            if (\count($argValue->items) !== 1) {
                continue;
            }

            $item = $argValue->items[0];

            if ($item === null || $item->key !== null) {
                continue;
            }

            $staticCall->name = new Identifier('stringIsNullOrEmpty');
            $staticCall->args = [new Arg($item->value)];

            $changed = true;
        }

        return $changed;
    }

    private function updateTraceMethodEarlyExit(If_ $if, string $condAsString): void
    {
        $nodeFinder = new NodeFinder();

        $methodCalls = $nodeFinder->findInstanceOf($if->stmts, MethodCall::class);

        foreach ($methodCalls as $methodCall) {
            if (!$this->isName($methodCall->name, 'traceMethodEarlyExit')) {
                continue;
            }

            if (\count($methodCall->args) < 3) {
                continue;
            }

            $second = $methodCall->args[1]->value;

            if ($second instanceof String_ && $second->value === 'oneIsNullOrEmpty') {
                $methodCall->args[1]->value = new String_('stringIsNullOrEmpty');
            }

            $third = $methodCall->args[2]->value;

            if ($third instanceof String_) {
                $methodCall->args[2]->value = new String_($condAsString);
            }
        }
    }

    private function conditionContainsStringIsNullOrEmpty(If_ $if): bool
    {
        $nodeFinder = new NodeFinder();

        $staticCalls = $nodeFinder->findInstanceOf($if->cond, StaticCall::class);

        foreach ($staticCalls as $staticCall) {
            if (!$this->isInvoiceSuiteStringUtilsClass($staticCall)) {
                continue;
            }

            if ($this->isName($staticCall->name, 'stringIsNullOrEmpty')) {
                return true;
            }
        }

        return false;
    }

    private function isInvoiceSuiteStringUtilsClass(StaticCall $staticCall): bool
    {
        if (!$staticCall->class instanceof Name) {
            return false;
        }

        return $this->isName($staticCall->class, 'InvoiceSuiteStringUtils')
            || $this->isName($staticCall->class, 'horstoeko\\invoicesuite\\utils\\InvoiceSuiteStringUtils');
    }

    private function normalizeInvoiceSuiteStringUtilsClassName(string $code): string
    {
        $patterns = [
            '~\\\\horstoeko\\\\invoicesuite\\\\utils\\\\InvoiceSuiteStringUtils~',
            '~horstoeko\\\\invoicesuite\\\\utils\\\\InvoiceSuiteStringUtils~',
        ];

        return preg_replace($patterns, 'InvoiceSuiteStringUtils', $code) ?? $code;
    }
}

final class AllIsNullOrEmptyIfTraceToStringIsNullOrEmptyRector extends AbstractRector
{
    public function __construct(
        private BetterStandardPrinter $betterStandardPrinter,
    ) {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'In if-conditions: InvoiceSuiteStringUtils::allIsNullOrEmpty([$x]) -> stringIsNullOrEmpty($x) and update traceMethodEarlyExit args accordingly.',
            [
                new CodeSample(
                    <<<'CODE'
if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentNo])) {
    return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newDocumentNo])');
}
CODE
                    ,
                    <<<'CODE'
if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)) {
    return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)');
}
CODE
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [If_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if (!$node instanceof If_) {
            return null;
        }

        $changed = $this->refactorCondition($node);

        if (!$changed && !$this->conditionContainsStringIsNullOrEmpty($node)) {
            return null;
        }

        $condAsString = $this->betterStandardPrinter->print($node->cond);
        $condAsString = $this->normalizeInvoiceSuiteStringUtilsClassName($condAsString);

        $this->updateTraceMethodEarlyExit($node, $condAsString);

        return $node;
    }

    private function refactorCondition(If_ $if): bool
    {
        $nodeFinder = new NodeFinder();

        $staticCalls = $nodeFinder->findInstanceOf($if->cond, StaticCall::class);

        $changed = false;

        foreach ($staticCalls as $staticCall) {
            if (!$this->isInvoiceSuiteStringUtilsClass($staticCall)) {
                continue;
            }

            if (!$this->isName($staticCall->name, 'allIsNullOrEmpty')) {
                continue;
            }

            if (\count($staticCall->args) !== 1) {
                continue;
            }

            $argValue = $staticCall->args[0]->value;

            if (!$argValue instanceof Array_) {
                continue;
            }

            if (\count($argValue->items) !== 1) {
                continue;
            }

            $item = $argValue->items[0];

            if ($item === null || $item->key !== null) {
                continue;
            }

            $staticCall->name = new Identifier('stringIsNullOrEmpty');
            $staticCall->args = [new Arg($item->value)];

            $changed = true;
        }

        return $changed;
    }

    private function updateTraceMethodEarlyExit(If_ $if, string $condAsString): void
    {
        $nodeFinder = new NodeFinder();

        $methodCalls = $nodeFinder->findInstanceOf($if->stmts, MethodCall::class);

        foreach ($methodCalls as $methodCall) {
            if (!$this->isName($methodCall->name, 'traceMethodEarlyExit')) {
                continue;
            }

            if (\count($methodCall->args) < 3) {
                continue;
            }

            $second = $methodCall->args[1]->value;

            if ($second instanceof String_ && $second->value === 'allIsNullOrEmpty') {
                $methodCall->args[1]->value = new String_('stringIsNullOrEmpty');
            }

            $third = $methodCall->args[2]->value;

            if ($third instanceof String_) {
                $methodCall->args[2]->value = new String_($condAsString);
            }
        }
    }

    private function conditionContainsStringIsNullOrEmpty(If_ $if): bool
    {
        $nodeFinder = new NodeFinder();

        $staticCalls = $nodeFinder->findInstanceOf($if->cond, StaticCall::class);

        foreach ($staticCalls as $staticCall) {
            if (!$this->isInvoiceSuiteStringUtilsClass($staticCall)) {
                continue;
            }

            if ($this->isName($staticCall->name, 'stringIsNullOrEmpty')) {
                return true;
            }
        }

        return false;
    }

    private function isInvoiceSuiteStringUtilsClass(StaticCall $staticCall): bool
    {
        if (!$staticCall->class instanceof Name) {
            return false;
        }

        return $this->isName($staticCall->class, 'InvoiceSuiteStringUtils')
            || $this->isName($staticCall->class, 'horstoeko\\invoicesuite\\utils\\InvoiceSuiteStringUtils');
    }

    private function normalizeInvoiceSuiteStringUtilsClassName(string $code): string
    {
        $patterns = [
            '~\\\\horstoeko\\\\invoicesuite\\\\utils\\\\InvoiceSuiteStringUtils~',
            '~horstoeko\\\\invoicesuite\\\\utils\\\\InvoiceSuiteStringUtils~',
        ];

        return preg_replace($patterns, 'InvoiceSuiteStringUtils', $code) ?? $code;
    }
}
