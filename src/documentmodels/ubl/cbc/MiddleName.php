<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="MiddleName", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
 */
class MiddleName extends MiddleNameType
{
    use HandlesObjectFlags;
}
