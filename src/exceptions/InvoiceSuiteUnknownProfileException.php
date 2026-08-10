<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\exceptions;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use Throwable;

/**
 * Class representing an exception for an unknown compatibility profile
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteUnknownProfileException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param int            $profileId
     * @param null|Throwable $throwable
     */
    public function __construct(
        int $profileId,
        ?Throwable $throwable = null
    ) {
        parent::__construct(InvoiceSuiteStringUtils::sprintf('The profile with id %s is unknown', $profileId), InvoiceSuiteExceptionCodes::UNKNOWN_PROFILE, $throwable);
    }
}
