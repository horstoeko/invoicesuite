<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumCopiesNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrintQualifier;
use JMS\Serializer\Annotation as JMS;

class DocumentDistributionType
{
    use HandlesObjectFlags;

    /**
     * @var null|PrintQualifier
     */
    #[JMS\Accessor(getter: 'getPrintQualifier', setter: 'setPrintQualifier')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrintQualifier')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrintQualifier')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $printQualifier;

    /**
     * @var null|MaximumCopiesNumeric
     */
    #[JMS\Accessor(getter: 'getMaximumCopiesNumeric', setter: 'setMaximumCopiesNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MaximumCopiesNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MaximumCopiesNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $maximumCopiesNumeric;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->printQualifier ??= new PrintQualifier();

        return $this->printQualifier;
    }

    /**
     * @param  null|PrintQualifier $printQualifier
     * @return static
     */
    public function setPrintQualifier(
        ?PrintQualifier $printQualifier = null
    ): static {
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
        $this->maximumCopiesNumeric ??= new MaximumCopiesNumeric();

        return $this->maximumCopiesNumeric;
    }

    /**
     * @param  null|MaximumCopiesNumeric $maximumCopiesNumeric
     * @return static
     */
    public function setMaximumCopiesNumeric(
        ?MaximumCopiesNumeric $maximumCopiesNumeric = null
    ): static {
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
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
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
