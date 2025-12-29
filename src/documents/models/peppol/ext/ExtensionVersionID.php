<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="ExtensionVersionID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
 */
class ExtensionVersionID extends ExtensionVersionIDType
{
    use HandlesObjectFlags;
}
