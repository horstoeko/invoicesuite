<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric;
use horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier;

class DocumentDistributionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier")
     * @JMS\Expose
     * @JMS\SerializedName("PrintQualifier")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrintQualifier", setter="setPrintQualifier")
     */
    private $printQualifier;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric")
     * @JMS\Expose
     * @JMS\SerializedName("MaximumCopiesNumeric")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMaximumCopiesNumeric", setter="setMaximumCopiesNumeric")
     */
    private $maximumCopiesNumeric;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Party|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier|null
     */
    public function getPrintQualifier(): ?PrintQualifier
    {
        return $this->printQualifier;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier
     */
    public function getPrintQualifierWithCreate(): PrintQualifier
    {
        $this->printQualifier = is_null($this->printQualifier) ? new PrintQualifier() : $this->printQualifier;

        return $this->printQualifier;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PrintQualifier|null $printQualifier
     * @return self
     */
    public function setPrintQualifier(?PrintQualifier $printQualifier = null): self
    {
        $this->printQualifier = $printQualifier;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrintQualifier(): self
    {
        $this->printQualifier = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric|null
     */
    public function getMaximumCopiesNumeric(): ?MaximumCopiesNumeric
    {
        return $this->maximumCopiesNumeric;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric
     */
    public function getMaximumCopiesNumericWithCreate(): MaximumCopiesNumeric
    {
        $this->maximumCopiesNumeric = is_null($this->maximumCopiesNumeric) ? new MaximumCopiesNumeric() : $this->maximumCopiesNumeric;

        return $this->maximumCopiesNumeric;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MaximumCopiesNumeric|null $maximumCopiesNumeric
     * @return self
     */
    public function setMaximumCopiesNumeric(?MaximumCopiesNumeric $maximumCopiesNumeric = null): self
    {
        $this->maximumCopiesNumeric = $maximumCopiesNumeric;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMaximumCopiesNumeric(): self
    {
        $this->maximumCopiesNumeric = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party|null
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Party|null $party
     * @return self
     */
    public function setParty(?Party $party = null): self
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetParty(): self
    {
        $this->party = null;

        return $this;
    }
}
