<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="TenderingTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class TenderingTerms extends TenderingTermsType
{
    use HandlesObjectFlags;
}
