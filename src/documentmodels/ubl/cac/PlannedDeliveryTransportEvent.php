<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="PlannedDeliveryTransportEvent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class PlannedDeliveryTransportEvent extends TransportEventType
{
    use HandlesObjectFlags;
}
