<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\ext;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="ExtensionVersionID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
 */
class ExtensionVersionID extends ExtensionVersionIDType
{
    use HandlesObjectFlags;
}
