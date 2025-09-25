<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="ShippingPriorityLevelCode", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 */
class ShippingPriorityLevelCode extends ShippingPriorityLevelCodeType
{
    use HandlesObjectFlags;
}
