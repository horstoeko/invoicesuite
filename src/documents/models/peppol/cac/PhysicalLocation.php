<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="PhysicalLocation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class PhysicalLocation extends LocationType
{
    use HandlesObjectFlags;
}
