<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\abstracts;

use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\concerns\HandlesMessageBag;
use horstoeko\invoicesuite\concerns\HandlesMethodTracing;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing methods for a reader
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentFormatReader extends InvoiceSuiteAbstractDocumentBaseReader
{
    use HandlesDocumentRootObject;
    use HandlesDocumentSerializer;
    use HandlesMessageBag;
    use HandlesMethodTracing;

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $newProvider
     */
    public function __construct(
        InvoiceSuiteAbstractDocumentFormatProvider $newProvider
    ) {
        $this->setCurrentDocumentFormatProvider($newProvider);
        $this->createAndInitDocumentSerializerByFormatProvider();
    }

    /**
     * Deserialize from content
     *
     * @param  string $fromContent
     * @return static
     *
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public function deserializeFromContent(
        string $fromContent
    ): static {
        $this->setDocumentRootObject(
            $this->documentSerializer->deserialize(
                $fromContent,
                $this->getCurrentDocumentFormatProvider()->getRootClassName(),
                $this->getCurrentDocumentFormatProvider()->getContentType()->value,
                DeserializationContext::create()->setGroups($this->getCurrentDocumentFormatProvider()->getSerializerGroups())
            )
        );

        return $this;
    }
}
