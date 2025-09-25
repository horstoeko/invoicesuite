<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

/**
 * @JMS\XmlRoot(name="CatalogueItemSpecificationUpdateLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class CatalogueItemSpecificationUpdateLine extends CatalogueItemSpecificationUpdateLineType
{
    use HandlesObjectFlags;
}
