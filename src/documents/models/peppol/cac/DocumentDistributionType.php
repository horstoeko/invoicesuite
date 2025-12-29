<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumCopiesNumeric;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PrintQualifier;
use JMS\Serializer\Annotation as JMS;

class DocumentDistributionType
{
    use HandlesObjectFlags;

    /**
     * @var null|PrintQualifier
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PrintQualifier")
     * @JMS\Expose
     * @JMS\SerializedName("PrintQualifier")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrintQualifier", setter="setPrintQualifier")
     */
    private $printQualifier;

    /**
     * @var null|MaximumCopiesNumeric
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MaximumCopiesNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumCopiesNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumCopiesNumeric", setter="setMaximumCopiesNumeric")
     */
    private $maximumCopiesNumeric;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @return null|PrintQualifier
     */
    public function getPrintQualifier(): ?PrintQualifier
    {
        return $this->printQualifier;
    }

    /**
     * @return PrintQualifier
     */
    public function getPrintQualifierWithCreate(): PrintQualifier
    {
        $this->printQualifier = is_null($this->printQualifier) ? new PrintQualifier() : $this->printQualifier;

        return $this->printQualifier;
    }

    /**
     * @param  null|PrintQualifier $printQualifier
     * @return static
     */
    public function setPrintQualifier(?PrintQualifier $printQualifier = null): static
    {
        $this->printQualifier = $printQualifier;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrintQualifier(): static
    {
        $this->printQualifier = null;

        return $this;
    }

    /**
     * @return null|MaximumCopiesNumeric
     */
    public function getMaximumCopiesNumeric(): ?MaximumCopiesNumeric
    {
        return $this->maximumCopiesNumeric;
    }

    /**
     * @return MaximumCopiesNumeric
     */
    public function getMaximumCopiesNumericWithCreate(): MaximumCopiesNumeric
    {
        $this->maximumCopiesNumeric = is_null($this->maximumCopiesNumeric) ? new MaximumCopiesNumeric() : $this->maximumCopiesNumeric;

        return $this->maximumCopiesNumeric;
    }

    /**
     * @param  null|MaximumCopiesNumeric $maximumCopiesNumeric
     * @return static
     */
    public function setMaximumCopiesNumeric(?MaximumCopiesNumeric $maximumCopiesNumeric = null): static
    {
        $this->maximumCopiesNumeric = $maximumCopiesNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMaximumCopiesNumeric(): static
    {
        $this->maximumCopiesNumeric = null;

        return $this;
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }
}
