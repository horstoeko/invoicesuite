<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteCommunicationDTO extends InvoiceSuiteIdDTO
{
    /**
     * Constructor
     *
     * @param null|string $id     ID
     * @param null|string $idType Type of the ID
     */
    public function __construct(
        ?string $id = null,
        ?string $idType = null
    ) {
        parent::__construct($id, $idType);
    }
}
