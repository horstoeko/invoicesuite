<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="ConsignorAssignedID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 */
class ConsignorAssignedID extends ConsignorAssignedIDType
{
    use HandlesObjectFlags;
}
