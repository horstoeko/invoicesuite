<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AuctionURI;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConditionsDescription;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Description;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ElectronicDeviceDescription;
use horstoeko\invoicesuite\documents\models\peppol\cbc\JustificationDescription;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ProcessDescription;
use JMS\Serializer\Annotation as JMS;

class AuctionTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionConstraintIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionConstraintIndicator", setter="setAuctionConstraintIndicator")
     */
    private $auctionConstraintIndicator;

    /**
     * @var null|array<JustificationDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\JustificationDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("JustificationDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="JustificationDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getJustificationDescription", setter="setJustificationDescription")
     */
    private $justificationDescription;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|array<ProcessDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ProcessDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ProcessDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ProcessDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getProcessDescription", setter="setProcessDescription")
     */
    private $processDescription;

    /**
     * @var null|array<ConditionsDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ConditionsDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ConditionsDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ConditionsDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getConditionsDescription", setter="setConditionsDescription")
     */
    private $conditionsDescription;

    /**
     * @var null|array<ElectronicDeviceDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\ElectronicDeviceDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("ElectronicDeviceDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ElectronicDeviceDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getElectronicDeviceDescription", setter="setElectronicDeviceDescription")
     */
    private $electronicDeviceDescription;

    /**
     * @var null|AuctionURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AuctionURI")
     * @JMS\Expose
     * @JMS\SerializedName("AuctionURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAuctionURI", setter="setAuctionURI")
     */
    private $auctionURI;

    /**
     * @return null|bool
     */
    public function getAuctionConstraintIndicator(): ?bool
    {
        return $this->auctionConstraintIndicator;
    }

    /**
     * @param  null|bool $auctionConstraintIndicator
     * @return static
     */
    public function setAuctionConstraintIndicator(?bool $auctionConstraintIndicator = null): static
    {
        $this->auctionConstraintIndicator = $auctionConstraintIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAuctionConstraintIndicator(): static
    {
        $this->auctionConstraintIndicator = null;

        return $this;
    }

    /**
     * @return null|array<JustificationDescription>
     */
    public function getJustificationDescription(): ?array
    {
        return $this->justificationDescription;
    }

    /**
     * @param  null|array<JustificationDescription> $justificationDescription
     * @return static
     */
    public function setJustificationDescription(?array $justificationDescription = null): static
    {
        $this->justificationDescription = $justificationDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetJustificationDescription(): static
    {
        $this->justificationDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearJustificationDescription(): static
    {
        $this->justificationDescription = [];

        return $this;
    }

    /**
     * @return null|JustificationDescription
     */
    public function firstJustificationDescription(): ?JustificationDescription
    {
        $justificationDescription = $this->justificationDescription ?? [];
        $justificationDescription = reset($justificationDescription);

        if (false === $justificationDescription) {
            return null;
        }

        return $justificationDescription;
    }

    /**
     * @return null|JustificationDescription
     */
    public function lastJustificationDescription(): ?JustificationDescription
    {
        $justificationDescription = $this->justificationDescription ?? [];
        $justificationDescription = end($justificationDescription);

        if (false === $justificationDescription) {
            return null;
        }

        return $justificationDescription;
    }

    /**
     * @param  JustificationDescription $justificationDescription
     * @return static
     */
    public function addToJustificationDescription(JustificationDescription $justificationDescription): static
    {
        $this->justificationDescription[] = $justificationDescription;

        return $this;
    }

    /**
     * @return JustificationDescription
     */
    public function addToJustificationDescriptionWithCreate(): JustificationDescription
    {
        $this->addTojustificationDescription($justificationDescription = new JustificationDescription());

        return $justificationDescription;
    }

    /**
     * @param  JustificationDescription $justificationDescription
     * @return static
     */
    public function addOnceToJustificationDescription(JustificationDescription $justificationDescription): static
    {
        if (!is_array($this->justificationDescription)) {
            $this->justificationDescription = [];
        }

        $this->justificationDescription[0] = $justificationDescription;

        return $this;
    }

    /**
     * @return JustificationDescription
     */
    public function addOnceToJustificationDescriptionWithCreate(): JustificationDescription
    {
        if (!is_array($this->justificationDescription)) {
            $this->justificationDescription = [];
        }

        if ([] === $this->justificationDescription) {
            $this->addOnceTojustificationDescription(new JustificationDescription());
        }

        return $this->justificationDescription[0];
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|array<ProcessDescription>
     */
    public function getProcessDescription(): ?array
    {
        return $this->processDescription;
    }

    /**
     * @param  null|array<ProcessDescription> $processDescription
     * @return static
     */
    public function setProcessDescription(?array $processDescription = null): static
    {
        $this->processDescription = $processDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcessDescription(): static
    {
        $this->processDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearProcessDescription(): static
    {
        $this->processDescription = [];

        return $this;
    }

    /**
     * @return null|ProcessDescription
     */
    public function firstProcessDescription(): ?ProcessDescription
    {
        $processDescription = $this->processDescription ?? [];
        $processDescription = reset($processDescription);

        if (false === $processDescription) {
            return null;
        }

        return $processDescription;
    }

    /**
     * @return null|ProcessDescription
     */
    public function lastProcessDescription(): ?ProcessDescription
    {
        $processDescription = $this->processDescription ?? [];
        $processDescription = end($processDescription);

        if (false === $processDescription) {
            return null;
        }

        return $processDescription;
    }

    /**
     * @param  ProcessDescription $processDescription
     * @return static
     */
    public function addToProcessDescription(ProcessDescription $processDescription): static
    {
        $this->processDescription[] = $processDescription;

        return $this;
    }

    /**
     * @return ProcessDescription
     */
    public function addToProcessDescriptionWithCreate(): ProcessDescription
    {
        $this->addToprocessDescription($processDescription = new ProcessDescription());

        return $processDescription;
    }

    /**
     * @param  ProcessDescription $processDescription
     * @return static
     */
    public function addOnceToProcessDescription(ProcessDescription $processDescription): static
    {
        if (!is_array($this->processDescription)) {
            $this->processDescription = [];
        }

        $this->processDescription[0] = $processDescription;

        return $this;
    }

    /**
     * @return ProcessDescription
     */
    public function addOnceToProcessDescriptionWithCreate(): ProcessDescription
    {
        if (!is_array($this->processDescription)) {
            $this->processDescription = [];
        }

        if ([] === $this->processDescription) {
            $this->addOnceToprocessDescription(new ProcessDescription());
        }

        return $this->processDescription[0];
    }

    /**
     * @return null|array<ConditionsDescription>
     */
    public function getConditionsDescription(): ?array
    {
        return $this->conditionsDescription;
    }

    /**
     * @param  null|array<ConditionsDescription> $conditionsDescription
     * @return static
     */
    public function setConditionsDescription(?array $conditionsDescription = null): static
    {
        $this->conditionsDescription = $conditionsDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConditionsDescription(): static
    {
        $this->conditionsDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearConditionsDescription(): static
    {
        $this->conditionsDescription = [];

        return $this;
    }

    /**
     * @return null|ConditionsDescription
     */
    public function firstConditionsDescription(): ?ConditionsDescription
    {
        $conditionsDescription = $this->conditionsDescription ?? [];
        $conditionsDescription = reset($conditionsDescription);

        if (false === $conditionsDescription) {
            return null;
        }

        return $conditionsDescription;
    }

    /**
     * @return null|ConditionsDescription
     */
    public function lastConditionsDescription(): ?ConditionsDescription
    {
        $conditionsDescription = $this->conditionsDescription ?? [];
        $conditionsDescription = end($conditionsDescription);

        if (false === $conditionsDescription) {
            return null;
        }

        return $conditionsDescription;
    }

    /**
     * @param  ConditionsDescription $conditionsDescription
     * @return static
     */
    public function addToConditionsDescription(ConditionsDescription $conditionsDescription): static
    {
        $this->conditionsDescription[] = $conditionsDescription;

        return $this;
    }

    /**
     * @return ConditionsDescription
     */
    public function addToConditionsDescriptionWithCreate(): ConditionsDescription
    {
        $this->addToconditionsDescription($conditionsDescription = new ConditionsDescription());

        return $conditionsDescription;
    }

    /**
     * @param  ConditionsDescription $conditionsDescription
     * @return static
     */
    public function addOnceToConditionsDescription(ConditionsDescription $conditionsDescription): static
    {
        if (!is_array($this->conditionsDescription)) {
            $this->conditionsDescription = [];
        }

        $this->conditionsDescription[0] = $conditionsDescription;

        return $this;
    }

    /**
     * @return ConditionsDescription
     */
    public function addOnceToConditionsDescriptionWithCreate(): ConditionsDescription
    {
        if (!is_array($this->conditionsDescription)) {
            $this->conditionsDescription = [];
        }

        if ([] === $this->conditionsDescription) {
            $this->addOnceToconditionsDescription(new ConditionsDescription());
        }

        return $this->conditionsDescription[0];
    }

    /**
     * @return null|array<ElectronicDeviceDescription>
     */
    public function getElectronicDeviceDescription(): ?array
    {
        return $this->electronicDeviceDescription;
    }

    /**
     * @param  null|array<ElectronicDeviceDescription> $electronicDeviceDescription
     * @return static
     */
    public function setElectronicDeviceDescription(?array $electronicDeviceDescription = null): static
    {
        $this->electronicDeviceDescription = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetElectronicDeviceDescription(): static
    {
        $this->electronicDeviceDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearElectronicDeviceDescription(): static
    {
        $this->electronicDeviceDescription = [];

        return $this;
    }

    /**
     * @return null|ElectronicDeviceDescription
     */
    public function firstElectronicDeviceDescription(): ?ElectronicDeviceDescription
    {
        $electronicDeviceDescription = $this->electronicDeviceDescription ?? [];
        $electronicDeviceDescription = reset($electronicDeviceDescription);

        if (false === $electronicDeviceDescription) {
            return null;
        }

        return $electronicDeviceDescription;
    }

    /**
     * @return null|ElectronicDeviceDescription
     */
    public function lastElectronicDeviceDescription(): ?ElectronicDeviceDescription
    {
        $electronicDeviceDescription = $this->electronicDeviceDescription ?? [];
        $electronicDeviceDescription = end($electronicDeviceDescription);

        if (false === $electronicDeviceDescription) {
            return null;
        }

        return $electronicDeviceDescription;
    }

    /**
     * @param  ElectronicDeviceDescription $electronicDeviceDescription
     * @return static
     */
    public function addToElectronicDeviceDescription(ElectronicDeviceDescription $electronicDeviceDescription): static
    {
        $this->electronicDeviceDescription[] = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return ElectronicDeviceDescription
     */
    public function addToElectronicDeviceDescriptionWithCreate(): ElectronicDeviceDescription
    {
        $this->addToelectronicDeviceDescription($electronicDeviceDescription = new ElectronicDeviceDescription());

        return $electronicDeviceDescription;
    }

    /**
     * @param  ElectronicDeviceDescription $electronicDeviceDescription
     * @return static
     */
    public function addOnceToElectronicDeviceDescription(
        ElectronicDeviceDescription $electronicDeviceDescription,
    ): static {
        if (!is_array($this->electronicDeviceDescription)) {
            $this->electronicDeviceDescription = [];
        }

        $this->electronicDeviceDescription[0] = $electronicDeviceDescription;

        return $this;
    }

    /**
     * @return ElectronicDeviceDescription
     */
    public function addOnceToElectronicDeviceDescriptionWithCreate(): ElectronicDeviceDescription
    {
        if (!is_array($this->electronicDeviceDescription)) {
            $this->electronicDeviceDescription = [];
        }

        if ([] === $this->electronicDeviceDescription) {
            $this->addOnceToelectronicDeviceDescription(new ElectronicDeviceDescription());
        }

        return $this->electronicDeviceDescription[0];
    }

    /**
     * @return null|AuctionURI
     */
    public function getAuctionURI(): ?AuctionURI
    {
        return $this->auctionURI;
    }

    /**
     * @return AuctionURI
     */
    public function getAuctionURIWithCreate(): AuctionURI
    {
        $this->auctionURI = is_null($this->auctionURI) ? new AuctionURI() : $this->auctionURI;

        return $this->auctionURI;
    }

    /**
     * @param  null|AuctionURI $auctionURI
     * @return static
     */
    public function setAuctionURI(?AuctionURI $auctionURI = null): static
    {
        $this->auctionURI = $auctionURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAuctionURI(): static
    {
        $this->auctionURI = null;

        return $this;
    }
}
