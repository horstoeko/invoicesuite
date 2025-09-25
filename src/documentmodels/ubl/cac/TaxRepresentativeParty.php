<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="TaxRepresentativeParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class TaxRepresentativeParty extends PartyType
{
    use HandlesObjectFlags;
}
