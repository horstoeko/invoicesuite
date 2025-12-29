<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="ExtensionAgencyName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
 */
class ExtensionAgencyName extends ExtensionAgencyNameType
{
    use HandlesObjectFlags;
}
