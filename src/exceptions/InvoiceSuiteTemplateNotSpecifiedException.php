<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\exceptions;

use Throwable;

/**
 * Class representing an exception for a missing visualizer template
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteTemplateNotSpecifiedException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param null|Throwable $throwable
     */
    public function __construct(
        ?Throwable $throwable = null
    ) {
        parent::__construct('No template was specified', InvoiceSuiteExceptionCodes::TEMPLATE_NOT_SPECIFIED, $throwable);
    }
}
