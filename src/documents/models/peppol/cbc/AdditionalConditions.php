<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="AdditionalConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 */
class AdditionalConditions extends AdditionalConditionsType
{
    use HandlesObjectFlags;
}
