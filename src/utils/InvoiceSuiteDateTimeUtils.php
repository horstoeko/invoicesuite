<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use DateTime;
use DateTimeInterface;
use ValueError;

/**
 * class representing date/time utilities
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDateTimeUtils
{
    /**
     * Returns true if the given value is null otherwise false
     *
     * @param  null|DateTimeInterface $value
     * @return bool
     */
    public static function datetimeIsNullOrEmpty(?DateTimeInterface $value = null): bool
    {
        return is_null($value);
    }

    /**
     * Check if all elements are null or empty
     * Tests if any datetime in $values is not null and has a value != ""
     *
     * @param  array<null|DateTimeInterface> $values
     * @return bool
     */
    public static function allIsNullOrEmpty(array $values): bool
    {
        foreach ($values as $value) {
            if (!static::datetimeIsNullOrEmpty($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns true if at least on element in values is null or empty
     *
     * @param  array<null|DateTimeInterface> $values
     * @return bool
     */
    public static function oneIsNullOrEmpty(array $values): bool
    {
        foreach ($values as $value) {
            if (static::dateTimeIsNullOrEmpty($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns null if the given date/time is empty
     *
     * @param  null|DateTimeInterface $str
     * @return null|DateTimeInterface
     */
    public static function asNullWhenEmpty(?DateTimeInterface $str): ?DateTimeInterface
    {
        return static::datetimeIsNullOrEmpty($str) ? null : $str;
    }

    /**
     * Converts a ZF/FX date string to a DateTime instance
     *
     * @param  null|string            $dateTimeString
     * @param  null|string            $format
     * @throws ValueError
     * @return null|DateTimeInterface
     */
    public static function convertZfFxDateStringToDateTime(?string $dateTimeString, ?string $format): ?DateTimeInterface
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$dateTimeString, $format])) {
            return null;
        }

        $dateTimeString = trim((string) $dateTimeString);

        if ($format == '102') {
            return DateTime::createFromFormat('Ymd', $dateTimeString);
        }

        if ($format == '101') {
            return DateTime::createFromFormat('ymd', $dateTimeString);
        }

        if ($format == '201') {
            return DateTime::createFromFormat('ymdHi', $dateTimeString);
        }

        if ($format == '202') {
            return DateTime::createFromFormat('ymdHis', $dateTimeString);
        }

        if ($format == '203') {
            return DateTime::createFromFormat('YmdHi', $dateTimeString);
        }

        if ($format == '204') {
            return DateTime::createFromFormat('YmdHis', $dateTimeString);
        }

        if ($format == '610') {
            return DateTime::createFromFormat('!Ym', $dateTimeString)->modify('first day of')->modify('midnight');
        }

        return null;
    }
}
