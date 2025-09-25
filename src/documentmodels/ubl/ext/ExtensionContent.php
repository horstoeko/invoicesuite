<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\ext;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="ExtensionContent", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
 */
class ExtensionContent extends ExtensionContentType
{
    use HandlesObjectFlags;
}
