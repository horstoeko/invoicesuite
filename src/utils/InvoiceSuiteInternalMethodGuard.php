<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;

/**
 * Class for guarding methods marked as internal against external calls.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteInternalMethodGuard
{
    private const DEFAULT_ALLOWED_NAMESPACE_PREFIX = 'horstoeko\invoicesuite\\';

    private const GUARDED_METHOD_STACK_POSITION = 1;

    private const DEFAULT_CALLER_STACK_POSITION = 2;

    /**
     * Ensure that the guarded method was called from an allowed internal class.
     *
     * @param  string      $guardedMethod
     * @param  string      $allowedNamespacePrefix
     * @param  null|string $allowedSourceDirectory
     * @param  int         $callerStackPosition
     * @return void
     *
     * @throws InvoiceSuiteInternalMethodCallException
     */
    public static function ensureInternalCall(
        string $guardedMethod,
        string $allowedNamespacePrefix = self::DEFAULT_ALLOWED_NAMESPACE_PREFIX,
        ?string $allowedSourceDirectory = null,
        int $callerStackPosition = self::DEFAULT_CALLER_STACK_POSITION
    ): void {
        $callStackLimit = max(self::DEFAULT_CALLER_STACK_POSITION, $callerStackPosition) + 1;
        $callStack = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $callStackLimit);
        $guardedMethodStackItem = $callStack[self::GUARDED_METHOD_STACK_POSITION] ?? null;
        $callerStackItem = $callStack[$callerStackPosition] ?? null;

        if (!self::isGuardedMethodStackItem($guardedMethodStackItem, $guardedMethod)) {
            self::throwNotInternalCall($guardedMethod);
        }

        if (!is_array($callerStackItem)) {
            self::throwNotInternalCall($guardedMethod);
        }

        $callerClass = $callerStackItem['class'] ?? null;
        $guardedMethodCallSiteFile = $guardedMethodStackItem['file'] ?? null;
        $allowedNamespacePrefix = rtrim($allowedNamespacePrefix, '\\') . '\\';

        if (!is_string($callerClass) || !InvoiceSuiteStringUtils::startsWith($callerClass, $allowedNamespacePrefix)) {
            self::throwNotInternalCall($guardedMethod);
        }

        if (!is_string($guardedMethodCallSiteFile)) {
            self::throwNotInternalCall($guardedMethod);
        }

        $allowedSourceDirectory ??= dirname(__DIR__);
        $realAllowedSourceDirectory = realpath($allowedSourceDirectory);
        $realGuardedMethodCallSiteFile = realpath($guardedMethodCallSiteFile);

        if (!is_string($realAllowedSourceDirectory) || !is_string($realGuardedMethodCallSiteFile)) {
            self::throwNotInternalCall($guardedMethod);
        }

        $normalizedAllowedSourceDirectory = str_replace('\\', '/', $realAllowedSourceDirectory);
        $normalizedGuardedMethodCallSiteFile = str_replace('\\', '/', $realGuardedMethodCallSiteFile);

        if (!InvoiceSuiteStringUtils::endsWith($normalizedAllowedSourceDirectory, '/')) {
            $normalizedAllowedSourceDirectory .= '/';
        }

        if (!InvoiceSuiteStringUtils::startsWith($normalizedGuardedMethodCallSiteFile, $normalizedAllowedSourceDirectory)) {
            self::throwNotInternalCall($guardedMethod);
        }
    }

    /**
     * Check whether the guard was called directly from the guarded method.
     *
     * @param  mixed  $callStackItem
     * @param  string $guardedMethod
     * @return bool
     */
    private static function isGuardedMethodStackItem(mixed $callStackItem, string $guardedMethod): bool
    {
        if (!is_array($callStackItem)) {
            return false;
        }

        $className = $callStackItem['class'] ?? null;
        $methodName = $callStackItem['function'] ?? null;

        if (!is_string($className) || !is_string($methodName)) {
            return false;
        }

        return sprintf('%s::%s', $className, $methodName) === $guardedMethod;
    }

    /**
     * Throw the exception for an invalid internal call.
     *
     * @param  string $guardedMethod
     * @return never
     *
     * @throws InvoiceSuiteInternalMethodCallException
     */
    private static function throwNotInternalCall(string $guardedMethod): never
    {
        throw new InvoiceSuiteInternalMethodCallException(sprintf('%s is marked as @internal and may only be called by internal classes.', $guardedMethod));
    }
}
