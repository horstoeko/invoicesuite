<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class UBLExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|Name
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var null|ExtensionAgencyID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionAgencyID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyID", setter="setExtensionAgencyID")
     */
    private $extensionAgencyID;

    /**
     * @var null|ExtensionAgencyName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionAgencyName")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyName", setter="setExtensionAgencyName")
     */
    private $extensionAgencyName;

    /**
     * @var null|ExtensionVersionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionVersionID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionVersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionVersionID", setter="setExtensionVersionID")
     */
    private $extensionVersionID;

    /**
     * @var null|ExtensionAgencyURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionAgencyURI")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyURI", setter="setExtensionAgencyURI")
     */
    private $extensionAgencyURI;

    /**
     * @var null|ExtensionURI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionURI")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionURI", setter="setExtensionURI")
     */
    private $extensionURI;

    /**
     * @var null|ExtensionReasonCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionReasonCode", setter="setExtensionReasonCode")
     */
    private $extensionReasonCode;

    /**
     * @var null|ExtensionReason
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionReason")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionReason", setter="setExtensionReason")
     */
    private $extensionReason;

    /**
     * @var null|ExtensionContent
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\ext\ExtensionContent")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionContent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionContent", setter="setExtensionContent")
     */
    private $extensionContent;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(?Name $name = null): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|ExtensionAgencyID
     */
    public function getExtensionAgencyID(): ?ExtensionAgencyID
    {
        return $this->extensionAgencyID;
    }

    /**
     * @return ExtensionAgencyID
     */
    public function getExtensionAgencyIDWithCreate(): ExtensionAgencyID
    {
        $this->extensionAgencyID = is_null($this->extensionAgencyID) ? new ExtensionAgencyID() : $this->extensionAgencyID;

        return $this->extensionAgencyID;
    }

    /**
     * @param  null|ExtensionAgencyID $extensionAgencyID
     * @return static
     */
    public function setExtensionAgencyID(?ExtensionAgencyID $extensionAgencyID = null): static
    {
        $this->extensionAgencyID = $extensionAgencyID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionAgencyID(): static
    {
        $this->extensionAgencyID = null;

        return $this;
    }

    /**
     * @return null|ExtensionAgencyName
     */
    public function getExtensionAgencyName(): ?ExtensionAgencyName
    {
        return $this->extensionAgencyName;
    }

    /**
     * @return ExtensionAgencyName
     */
    public function getExtensionAgencyNameWithCreate(): ExtensionAgencyName
    {
        $this->extensionAgencyName = is_null($this->extensionAgencyName) ? new ExtensionAgencyName() : $this->extensionAgencyName;

        return $this->extensionAgencyName;
    }

    /**
     * @param  null|ExtensionAgencyName $extensionAgencyName
     * @return static
     */
    public function setExtensionAgencyName(?ExtensionAgencyName $extensionAgencyName = null): static
    {
        $this->extensionAgencyName = $extensionAgencyName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionAgencyName(): static
    {
        $this->extensionAgencyName = null;

        return $this;
    }

    /**
     * @return null|ExtensionVersionID
     */
    public function getExtensionVersionID(): ?ExtensionVersionID
    {
        return $this->extensionVersionID;
    }

    /**
     * @return ExtensionVersionID
     */
    public function getExtensionVersionIDWithCreate(): ExtensionVersionID
    {
        $this->extensionVersionID = is_null($this->extensionVersionID) ? new ExtensionVersionID() : $this->extensionVersionID;

        return $this->extensionVersionID;
    }

    /**
     * @param  null|ExtensionVersionID $extensionVersionID
     * @return static
     */
    public function setExtensionVersionID(?ExtensionVersionID $extensionVersionID = null): static
    {
        $this->extensionVersionID = $extensionVersionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionVersionID(): static
    {
        $this->extensionVersionID = null;

        return $this;
    }

    /**
     * @return null|ExtensionAgencyURI
     */
    public function getExtensionAgencyURI(): ?ExtensionAgencyURI
    {
        return $this->extensionAgencyURI;
    }

    /**
     * @return ExtensionAgencyURI
     */
    public function getExtensionAgencyURIWithCreate(): ExtensionAgencyURI
    {
        $this->extensionAgencyURI = is_null($this->extensionAgencyURI) ? new ExtensionAgencyURI() : $this->extensionAgencyURI;

        return $this->extensionAgencyURI;
    }

    /**
     * @param  null|ExtensionAgencyURI $extensionAgencyURI
     * @return static
     */
    public function setExtensionAgencyURI(?ExtensionAgencyURI $extensionAgencyURI = null): static
    {
        $this->extensionAgencyURI = $extensionAgencyURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionAgencyURI(): static
    {
        $this->extensionAgencyURI = null;

        return $this;
    }

    /**
     * @return null|ExtensionURI
     */
    public function getExtensionURI(): ?ExtensionURI
    {
        return $this->extensionURI;
    }

    /**
     * @return ExtensionURI
     */
    public function getExtensionURIWithCreate(): ExtensionURI
    {
        $this->extensionURI = is_null($this->extensionURI) ? new ExtensionURI() : $this->extensionURI;

        return $this->extensionURI;
    }

    /**
     * @param  null|ExtensionURI $extensionURI
     * @return static
     */
    public function setExtensionURI(?ExtensionURI $extensionURI = null): static
    {
        $this->extensionURI = $extensionURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionURI(): static
    {
        $this->extensionURI = null;

        return $this;
    }

    /**
     * @return null|ExtensionReasonCode
     */
    public function getExtensionReasonCode(): ?ExtensionReasonCode
    {
        return $this->extensionReasonCode;
    }

    /**
     * @return ExtensionReasonCode
     */
    public function getExtensionReasonCodeWithCreate(): ExtensionReasonCode
    {
        $this->extensionReasonCode = is_null($this->extensionReasonCode) ? new ExtensionReasonCode() : $this->extensionReasonCode;

        return $this->extensionReasonCode;
    }

    /**
     * @param  null|ExtensionReasonCode $extensionReasonCode
     * @return static
     */
    public function setExtensionReasonCode(?ExtensionReasonCode $extensionReasonCode = null): static
    {
        $this->extensionReasonCode = $extensionReasonCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionReasonCode(): static
    {
        $this->extensionReasonCode = null;

        return $this;
    }

    /**
     * @return null|ExtensionReason
     */
    public function getExtensionReason(): ?ExtensionReason
    {
        return $this->extensionReason;
    }

    /**
     * @return ExtensionReason
     */
    public function getExtensionReasonWithCreate(): ExtensionReason
    {
        $this->extensionReason = is_null($this->extensionReason) ? new ExtensionReason() : $this->extensionReason;

        return $this->extensionReason;
    }

    /**
     * @param  null|ExtensionReason $extensionReason
     * @return static
     */
    public function setExtensionReason(?ExtensionReason $extensionReason = null): static
    {
        $this->extensionReason = $extensionReason;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionReason(): static
    {
        $this->extensionReason = null;

        return $this;
    }

    /**
     * @return null|ExtensionContent
     */
    public function getExtensionContent(): ?ExtensionContent
    {
        return $this->extensionContent;
    }

    /**
     * @return ExtensionContent
     */
    public function getExtensionContentWithCreate(): ExtensionContent
    {
        $this->extensionContent = is_null($this->extensionContent) ? new ExtensionContent() : $this->extensionContent;

        return $this->extensionContent;
    }

    /**
     * @param  null|ExtensionContent $extensionContent
     * @return static
     */
    public function setExtensionContent(?ExtensionContent $extensionContent = null): static
    {
        $this->extensionContent = $extensionContent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtensionContent(): static
    {
        $this->extensionContent = null;

        return $this;
    }
}
