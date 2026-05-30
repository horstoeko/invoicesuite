<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlRoot(name: 'RetailerCustomerParty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
class RetailerCustomerParty extends CustomerPartyType
{
    use HandlesObjectFlags;
}
