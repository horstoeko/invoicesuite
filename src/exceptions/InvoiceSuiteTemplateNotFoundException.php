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
 * Class representing an exception for a visualizer template that cannot be found
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteTemplateNotFoundException extends InvoiceSuiteBaseException
{
    /**
     * Constructor
     *
     * @param string         $template
     * @param null|Throwable $throwable
     */
    public function __construct(
        string $template,
        ?Throwable $throwable = null
    ) {
        parent::__construct(InvoiceSuiteStringUtils::sprintf('The template %s was not found', $template), InvoiceSuiteExceptionCodes::TEMPLATE_NOT_FOUND, $throwable);
    }
}
