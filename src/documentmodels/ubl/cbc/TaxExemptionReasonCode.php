<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="TaxExemptionReasonCode", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 */
class TaxExemptionReasonCode extends TaxExemptionReasonCodeType
{
    use HandlesObjectFlags;
}
