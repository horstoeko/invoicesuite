<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\concerns;

use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

/**
 * Trait representing method tracing handling. This requires the HandlesMessageBag trait.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @requires HandlesMessageBag
 */
trait HandlesMethodTracing
{
    /**
     * General trace method
     *
     * @param  string $newMethod Name of the method which was called
     * @param  string $newEvent  Event, contains enter or early_exit or exit
     * @param  string $newReason Reason for early exit
     * @param  string $newGuard  Guard which leads to early exit
     * @return static
     */
    protected function traceMethodCall(
        string $newMethod,
        string $newEvent,
        string $newReason = '',
        string $newGuard = ''
    ): static {
        /**
         * @var array<string,string>
         */
        $dataCommon = [];

        /**
         * @var array<string,string>
         */
        $dataEarlyExit = [];

        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataCommon, 'event', $newEvent);
        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataCommon, 'method', $newMethod);
        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataCommon, 'reason', $newReason);
        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataCommon, 'guard', $newGuard);
        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataCommon, 'istrace', 'yes');

        // @phpstan-ignore missingType.checkedException
        $this->addInfoMessageToMessageBag(
            newMessageContent: sprintf('%s %s', InvoiceSuiteStringUtils::upper($newEvent), $newMethod),
            newMessageAdditionalData: $dataCommon
        );

        if (0 === strcasecmp($newEvent, 'early_exit')) {
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'event', 'exit');
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'method', $newMethod);
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'reason', $newReason);
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'guard', $newGuard);
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'istrace', 'yes');
            InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($dataEarlyExit, 'early_exit', 'yes');

            // @phpstan-ignore missingType.checkedException
            $this->addWarningMessageToMessageBag(
                newMessageContent: sprintf('EXIT %s', $newMethod),
                newMessageAdditionalData: $dataEarlyExit
            );
        }

        return $this;
    }

    /**
     * Trace entering a method
     *
     * @param  string $newMethod Name of the method which was called
     * @return static
     */
    protected function traceMethodEnter(
        string $newMethod
    ): static {
        return $this->traceMethodCall($newMethod, 'enter');
    }

    /**
     * Trace leaving a method
     *
     * @param  string $newMethod Name of the method which was called
     * @return static
     */
    protected function traceMethodExit(
        string $newMethod
    ): static {
        return $this->traceMethodCall($newMethod, 'exit');
    }

    /**
     * Trace leaving a method by "early exit"
     *
     * @param  string $newMethod Name of the method which was called
     * @param  string $newReason Reason for early exit
     * @param  string $newGuard  Guard which leads to early exit
     * @return static
     */
    protected function traceMethodEarlyExit(
        string $newMethod,
        string $newReason,
        string $newGuard
    ): static {
        return $this->traceMethodCall($newMethod, 'early_exit', $newReason, $newGuard);
    }
}
