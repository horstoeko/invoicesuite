<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription;

class AuctionTermsType
{
    use HandlesObjectFlags;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionConstraintIndicator", setter="setAuctionConstraintIndicator")
     */
    private $auctionConstraintIndicator;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("JustificationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="JustificationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getJustificationDescription", setter="setJustificationDescription")
     */
    private $justificationDescription;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcessDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getProcessDescription", setter="setProcessDescription")
     */
    private $processDescription;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ConditionsDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConditionsDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getConditionsDescription", setter="setConditionsDescription")
     */
    private $conditionsDescription;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ElectronicDeviceDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ElectronicDeviceDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getElectronicDeviceDescription", setter="setElectronicDeviceDescription")
     */
    private $electronicDeviceDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionURI", setter="setAuctionURI")
     */
    private $auctionURI;

    /**
     * @return bool|null
     */
    public function getAuctionConstraintIndicator(): ?bool
    {
        return $this->auctionConstraintIndicator;
    }

    /**
     * @param bool|null $auctionConstraintIndicator
     * @return self
     */
    public function setAuctionConstraintIndicator(?bool $auctionConstraintIndicator = null): self
    {
        $this->auctionConstraintIndicator = $auctionConstraintIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAuctionConstraintIndicator(): self
    {
        $this->auctionConstraintIndicator = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription>|null
     */
    public function getJustificationDescription(): ?array
    {
        return $this->justificationDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription>|null $justificationDescription
     * @return self
     */
    public function setJustificationDescription(?array $justificationDescription = null): self
    {
        $this->justificationDescription = $justificationDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetJustificationDescription(): self
    {
        $this->justificationDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearJustificationDescription(): self
    {
        $this->justificationDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription|null
     */
    public function firstJustificationDescription(): ?JustificationDescription
    {
        $justificationDescription = $this->justificationDescription ?? [];
        $justificationDescription = reset($justificationDescription);

        if ($justificationDescription === false) {
            return null;
        }

        return $justificationDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription|null
     */
    public function lastJustificationDescription(): ?JustificationDescription
    {
        $justificationDescription = $this->justificationDescription ?? [];
        $justificationDescription = end($justificationDescription);

        if ($justificationDescription === false) {
            return null;
        }

        return $justificationDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription $justificationDescription
     * @return self
     */
    public function addToJustificationDescription(JustificationDescription $justificationDescription): self
    {
        $this->justificationDescription[] = $justificationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription
     */
    public function addToJustificationDescriptionWithCreate(): JustificationDescription
    {
        $this->addTojustificationDescription($justificationDescription = new JustificationDescription());

        return $justificationDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription $justificationDescription
     * @return self
     */
    public function addOnceToJustificationDescription(JustificationDescription $justificationDescription): self
    {
        if (!is_array($this->justificationDescription)) {
            $this->justificationDescription = [];
        }

        $this->justificationDescription[0] = $justificationDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\JustificationDescription
     */
    public function addOnceToJustificationDescriptionWithCreate(): JustificationDescription
    {
        if (!is_array($this->justificationDescription)) {
            $this->justificationDescription = [];
        }

        if ($this->justificationDescription === []) {
            $this->addOnceTojustificationDescription(new JustificationDescription());
        }

        return $this->justificationDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription>|null
     */
    public function getProcessDescription(): ?array
    {
        return $this->processDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription>|null $processDescription
     * @return self
     */
    public function setProcessDescription(?array $processDescription = null): self
    {
        $this->processDescription = $processDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProcessDescription(): self
    {
        $this->processDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearProcessDescription(): self
    {
        $this->processDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription|null
     */
    public function firstProcessDescription(): ?ProcessDescription
    {
        $processDescription = $this->processDescription ?? [];
        $processDescription = reset($processDescription);

        if ($processDescription === false) {
            return null;
        }

        return $processDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription|null
     */
    public function lastProcessDescription(): ?ProcessDescription
    {
        $processDescription = $this->processDescription ?? [];
        $processDescription = end($processDescription);

        if ($processDescription === false) {
            return null;
        }

        return $processDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription $processDescription
     * @return self
     */
    public function addToProcessDescription(ProcessDescription $processDescription): self
    {
        $this->processDescription[] = $processDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription
     */
    public function addToProcessDescriptionWithCreate(): ProcessDescription
    {
        $this->addToprocessDescription($processDescription = new ProcessDescription());

        return $processDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription $processDescription
     * @return self
     */
    public function addOnceToProcessDescription(ProcessDescription $processDescription): self
    {
        if (!is_array($this->processDescription)) {
            $this->processDescription = [];
        }

        $this->processDescription[0] = $processDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProcessDescription
     */
    public function addOnceToProcessDescriptionWithCreate(): ProcessDescription
    {
        if (!is_array($this->processDescription)) {
            $this->processDescription = [];
        }

        if ($this->processDescription === []) {
            $this->addOnceToprocessDescription(new ProcessDescription());
        }

        return $this->processDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription>|null
     */
    public function getConditionsDescription(): ?array
    {
        return $this->conditionsDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription>|null $conditionsDescription
     * @return self
     */
    public function setConditionsDescription(?array $conditionsDescription = null): self
    {
        $this->conditionsDescription = $conditionsDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConditionsDescription(): self
    {
        $this->conditionsDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearConditionsDescription(): self
    {
        $this->conditionsDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription|null
     */
    public function firstConditionsDescription(): ?ConditionsDescription
    {
        $conditionsDescription = $this->conditionsDescription ?? [];
        $conditionsDescription = reset($conditionsDescription);

        if ($conditionsDescription === false) {
            return null;
        }

        return $conditionsDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription|null
     */
    public function lastConditionsDescription(): ?ConditionsDescription
    {
        $conditionsDescription = $this->conditionsDescription ?? [];
        $conditionsDescription = end($conditionsDescription);

        if ($conditionsDescription === false) {
            return null;
        }

        return $conditionsDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription $conditionsDescription
     * @return self
     */
    public function addToConditionsDescription(ConditionsDescription $conditionsDescription): self
    {
        $this->conditionsDescription[] = $conditionsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription
     */
    public function addToConditionsDescriptionWithCreate(): ConditionsDescription
    {
        $this->addToconditionsDescription($conditionsDescription = new ConditionsDescription());

        return $conditionsDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription $conditionsDescription
     * @return self
     */
    public function addOnceToConditionsDescription(ConditionsDescription $conditionsDescription): self
    {
        if (!is_array($this->conditionsDescription)) {
            $this->conditionsDescription = [];
        }

        $this->conditionsDescription[0] = $conditionsDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ConditionsDescription
     */
    public function addOnceToConditionsDescriptionWithCreate(): ConditionsDescription
    {
        if (!is_array($this->conditionsDescription)) {
            $this->conditionsDescription = [];
        }

        if ($this->conditionsDescription === []) {
            $this->addOnceToconditionsDescription(new ConditionsDescription());
        }

        return $this->conditionsDescription[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription>|null
     */
    public function getElectronicDeviceDescription(): ?array
    {
        return $this->electronicDeviceDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription>|null $electronicDeviceDescription
     * @return self
     */
    public function setElectronicDeviceDescription(?array $electronicDeviceDescription = null): self
    {
        $this->electronicDeviceDescription = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetElectronicDeviceDescription(): self
    {
        $this->electronicDeviceDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearElectronicDeviceDescription(): self
    {
        $this->electronicDeviceDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription|null
     */
    public function firstElectronicDeviceDescription(): ?ElectronicDeviceDescription
    {
        $electronicDeviceDescription = $this->electronicDeviceDescription ?? [];
        $electronicDeviceDescription = reset($electronicDeviceDescription);

        if ($electronicDeviceDescription === false) {
            return null;
        }

        return $electronicDeviceDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription|null
     */
    public function lastElectronicDeviceDescription(): ?ElectronicDeviceDescription
    {
        $electronicDeviceDescription = $this->electronicDeviceDescription ?? [];
        $electronicDeviceDescription = end($electronicDeviceDescription);

        if ($electronicDeviceDescription === false) {
            return null;
        }

        return $electronicDeviceDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription $electronicDeviceDescription
     * @return self
     */
    public function addToElectronicDeviceDescription(ElectronicDeviceDescription $electronicDeviceDescription): self
    {
        $this->electronicDeviceDescription[] = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription
     */
    public function addToElectronicDeviceDescriptionWithCreate(): ElectronicDeviceDescription
    {
        $this->addToelectronicDeviceDescription($electronicDeviceDescription = new ElectronicDeviceDescription());

        return $electronicDeviceDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription $electronicDeviceDescription
     * @return self
     */
    public function addOnceToElectronicDeviceDescription(
        ElectronicDeviceDescription $electronicDeviceDescription,
    ): self {
        if (!is_array($this->electronicDeviceDescription)) {
            $this->electronicDeviceDescription = [];
        }

        $this->electronicDeviceDescription[0] = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ElectronicDeviceDescription
     */
    public function addOnceToElectronicDeviceDescriptionWithCreate(): ElectronicDeviceDescription
    {
        if (!is_array($this->electronicDeviceDescription)) {
            $this->electronicDeviceDescription = [];
        }

        if ($this->electronicDeviceDescription === []) {
            $this->addOnceToelectronicDeviceDescription(new ElectronicDeviceDescription());
        }

        return $this->electronicDeviceDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI|null
     */
    public function getAuctionURI(): ?AuctionURI
    {
        return $this->auctionURI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI
     */
    public function getAuctionURIWithCreate(): AuctionURI
    {
        $this->auctionURI = is_null($this->auctionURI) ? new AuctionURI() : $this->auctionURI;

        return $this->auctionURI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AuctionURI|null $auctionURI
     * @return self
     */
    public function setAuctionURI(?AuctionURI $auctionURI = null): self
    {
        $this->auctionURI = $auctionURI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAuctionURI(): self
    {
        $this->auctionURI = null;

        return $this;
    }
}
