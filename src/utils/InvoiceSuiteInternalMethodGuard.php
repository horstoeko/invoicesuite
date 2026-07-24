<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\utils;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;

/**
 * Class representing a guard for internal method calls
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteInternalMethodGuard
{
    /**
     * Ensure that an internal method is called from an allowed namespace
     *
     * @param string $internalMethod
     *
     * @throws InvoiceSuiteInternalMethodCallException
     */
    public static function ensureInternalCall(
        string $internalMethod
    ): void {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        $guardedMethod = $backtrace[1] ?? [];
        $caller = $backtrace[2] ?? [];

        if (self::getMethodName($guardedMethod) !== $internalMethod) {
            throw new InvoiceSuiteInternalMethodCallException($internalMethod);
        }

        $callerClass = $caller['class'] ?? null;

        if (!InvoiceSuiteStringUtils::is($callerClass)) {
            throw new InvoiceSuiteInternalMethodCallException($internalMethod);
        }

        if (self::matchesAnyNamespacePrefix($callerClass, self::getExcludedNamespaces())) {
            throw new InvoiceSuiteInternalMethodCallException($internalMethod);
        }

        if (false === self::matchesAnyNamespacePrefix($callerClass, self::getAllowedNamespaces())) {
            throw new InvoiceSuiteInternalMethodCallException($internalMethod);
        }
    }

    /**
     * Get the full method name from a debug backtrace frame
     *
     * @param  array<string,mixed> $backtraceFrame
     * @return string
     */
    private static function getMethodName(
        array $backtraceFrame
    ): string {
        $className = $backtraceFrame['class'] ?? null;
        $methodName = $backtraceFrame['function'] ?? null;

        if (!InvoiceSuiteStringUtils::is($className) || !InvoiceSuiteStringUtils::is($methodName)) {
            return '';
        }

        return InvoiceSuiteStringUtils::sprintf('%s::%s', $className, $methodName);
    }

    /**
     * Check if class name matches any namespace prefix
     *
     * @param  string            $className
     * @param  array<int,string> $namespacePrefixes
     * @return bool
     */
    private static function matchesAnyNamespacePrefix(
        string $className,
        array $namespacePrefixes
    ): bool {
        foreach ($namespacePrefixes as $namespacePrefix) {
            if (InvoiceSuiteStringUtils::startsWith($className, InvoiceSuiteStringUtils::trimEnd($namespacePrefix, '\\') . '\\')) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return a list of allowed namespaces
     *
     * @return array<int,string>
     */
    private static function getAllowedNamespaces(): array
    {
        return [
            'horstoeko\invoicesuite\\',
            'horstoeko\zugferd\\',
        ];
    }

    /**
     * Return a list of namespaces to exclude
     *
     * @return array<int,string>
     */
    private static function getExcludedNamespaces(): array
    {
        return [
            'horstoeko\invoicesuite\tests\\',
        ];
    }
}
