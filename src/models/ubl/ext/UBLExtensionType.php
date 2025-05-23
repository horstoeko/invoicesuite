<?php

namespace horstoeko\invoicesuite\models\ubl\ext;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\Name;

class UBLExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\Name")
     * @JMS\Expose
     * @JMS\SerializedName("Name")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyID", setter="setExtensionAgencyID")
     */
    private $extensionAgencyID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyName")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyName", setter="setExtensionAgencyName")
     */
    private $extensionAgencyName;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionVersionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionVersionID")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionVersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionVersionID", setter="setExtensionVersionID")
     */
    private $extensionVersionID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyURI")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionAgencyURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionAgencyURI", setter="setExtensionAgencyURI")
     */
    private $extensionAgencyURI;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionURI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionURI")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionURI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionURI", setter="setExtensionURI")
     */
    private $extensionURI;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionReasonCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionReasonCode")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionReasonCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionReasonCode", setter="setExtensionReasonCode")
     */
    private $extensionReasonCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionReason|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionReason")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionReason")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionReason", setter="setExtensionReason")
     */
    private $extensionReason;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\ext\ExtensionContent|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\ext\ExtensionContent")
     * @JMS\Expose
     * @JMS\SerializedName("ExtensionContent")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExtensionContent", setter="setExtensionContent")
     */
    private $extensionContent;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name|null
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name = is_null($this->name) ? new Name() : $this->name;

        return $this->name;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Name|null $name
     * @return self
     */
    public function setName(?Name $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyID|null
     */
    public function getExtensionAgencyID(): ?ExtensionAgencyID
    {
        return $this->extensionAgencyID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyID
     */
    public function getExtensionAgencyIDWithCreate(): ExtensionAgencyID
    {
        $this->extensionAgencyID = is_null($this->extensionAgencyID) ? new ExtensionAgencyID() : $this->extensionAgencyID;

        return $this->extensionAgencyID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyID|null $extensionAgencyID
     * @return self
     */
    public function setExtensionAgencyID(?ExtensionAgencyID $extensionAgencyID = null): self
    {
        $this->extensionAgencyID = $extensionAgencyID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyName|null
     */
    public function getExtensionAgencyName(): ?ExtensionAgencyName
    {
        return $this->extensionAgencyName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyName
     */
    public function getExtensionAgencyNameWithCreate(): ExtensionAgencyName
    {
        $this->extensionAgencyName = is_null($this->extensionAgencyName) ? new ExtensionAgencyName() : $this->extensionAgencyName;

        return $this->extensionAgencyName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyName|null $extensionAgencyName
     * @return self
     */
    public function setExtensionAgencyName(?ExtensionAgencyName $extensionAgencyName = null): self
    {
        $this->extensionAgencyName = $extensionAgencyName;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionVersionID|null
     */
    public function getExtensionVersionID(): ?ExtensionVersionID
    {
        return $this->extensionVersionID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionVersionID
     */
    public function getExtensionVersionIDWithCreate(): ExtensionVersionID
    {
        $this->extensionVersionID = is_null($this->extensionVersionID) ? new ExtensionVersionID() : $this->extensionVersionID;

        return $this->extensionVersionID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionVersionID|null $extensionVersionID
     * @return self
     */
    public function setExtensionVersionID(?ExtensionVersionID $extensionVersionID = null): self
    {
        $this->extensionVersionID = $extensionVersionID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyURI|null
     */
    public function getExtensionAgencyURI(): ?ExtensionAgencyURI
    {
        return $this->extensionAgencyURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyURI
     */
    public function getExtensionAgencyURIWithCreate(): ExtensionAgencyURI
    {
        $this->extensionAgencyURI = is_null($this->extensionAgencyURI) ? new ExtensionAgencyURI() : $this->extensionAgencyURI;

        return $this->extensionAgencyURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionAgencyURI|null $extensionAgencyURI
     * @return self
     */
    public function setExtensionAgencyURI(?ExtensionAgencyURI $extensionAgencyURI = null): self
    {
        $this->extensionAgencyURI = $extensionAgencyURI;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionURI|null
     */
    public function getExtensionURI(): ?ExtensionURI
    {
        return $this->extensionURI;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionURI
     */
    public function getExtensionURIWithCreate(): ExtensionURI
    {
        $this->extensionURI = is_null($this->extensionURI) ? new ExtensionURI() : $this->extensionURI;

        return $this->extensionURI;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionURI|null $extensionURI
     * @return self
     */
    public function setExtensionURI(?ExtensionURI $extensionURI = null): self
    {
        $this->extensionURI = $extensionURI;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionReasonCode|null
     */
    public function getExtensionReasonCode(): ?ExtensionReasonCode
    {
        return $this->extensionReasonCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionReasonCode
     */
    public function getExtensionReasonCodeWithCreate(): ExtensionReasonCode
    {
        $this->extensionReasonCode = is_null($this->extensionReasonCode) ? new ExtensionReasonCode() : $this->extensionReasonCode;

        return $this->extensionReasonCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionReasonCode|null $extensionReasonCode
     * @return self
     */
    public function setExtensionReasonCode(?ExtensionReasonCode $extensionReasonCode = null): self
    {
        $this->extensionReasonCode = $extensionReasonCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionReason|null
     */
    public function getExtensionReason(): ?ExtensionReason
    {
        return $this->extensionReason;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionReason
     */
    public function getExtensionReasonWithCreate(): ExtensionReason
    {
        $this->extensionReason = is_null($this->extensionReason) ? new ExtensionReason() : $this->extensionReason;

        return $this->extensionReason;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionReason|null $extensionReason
     * @return self
     */
    public function setExtensionReason(?ExtensionReason $extensionReason = null): self
    {
        $this->extensionReason = $extensionReason;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionContent|null
     */
    public function getExtensionContent(): ?ExtensionContent
    {
        return $this->extensionContent;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\ExtensionContent
     */
    public function getExtensionContentWithCreate(): ExtensionContent
    {
        $this->extensionContent = is_null($this->extensionContent) ? new ExtensionContent() : $this->extensionContent;

        return $this->extensionContent;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\ExtensionContent|null $extensionContent
     * @return self
     */
    public function setExtensionContent(?ExtensionContent $extensionContent = null): self
    {
        $this->extensionContent = $extensionContent;

        return $this;
    }
}
