<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="CallDuty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class CallDuty extends DutyType
{
    use HandlesObjectFlags;
}
