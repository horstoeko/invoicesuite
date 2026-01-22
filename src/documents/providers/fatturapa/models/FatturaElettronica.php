<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("FatturaElettronica", namespace="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2")
 * @JMS\XmlNamespace(uri="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2", prefix="p")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 */
final class FatturaElettronica extends FatturaElettronicaType
{
    use HandlesObjectFlags;
}
