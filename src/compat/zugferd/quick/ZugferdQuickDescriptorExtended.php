<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd\quick;

use horstoeko\zugferd\ZugferdProfiles;

/**
 * Legacy-Class representing the document descriptor for outgoing documents in EXTENDED profile
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdQuickDescriptorExtended extends ZugferdQuickDescriptor
{
    /**
     * {@inheritDoc}
     */
    protected static function getProfile(): int
    {
        return ZugferdProfiles::PROFILE_EXTENDED;
    }
}
