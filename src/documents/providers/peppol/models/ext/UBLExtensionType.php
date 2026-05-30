<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class UBLExtensionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|ExtensionAgencyID
     */
    #[JMS\Accessor(getter: 'getExtensionAgencyID', setter: 'setExtensionAgencyID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionAgencyID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionAgencyID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionAgencyID;

    /**
     * @var null|ExtensionAgencyName
     */
    #[JMS\Accessor(getter: 'getExtensionAgencyName', setter: 'setExtensionAgencyName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionAgencyName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionAgencyName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionAgencyName;

    /**
     * @var null|ExtensionVersionID
     */
    #[JMS\Accessor(getter: 'getExtensionVersionID', setter: 'setExtensionVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionVersionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionVersionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionVersionID;

    /**
     * @var null|ExtensionAgencyURI
     */
    #[JMS\Accessor(getter: 'getExtensionAgencyURI', setter: 'setExtensionAgencyURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionAgencyURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionAgencyURI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionAgencyURI;

    /**
     * @var null|ExtensionURI
     */
    #[JMS\Accessor(getter: 'getExtensionURI', setter: 'setExtensionURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionURI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionURI;

    /**
     * @var null|ExtensionReasonCode
     */
    #[JMS\Accessor(getter: 'getExtensionReasonCode', setter: 'setExtensionReasonCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionReasonCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionReasonCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionReasonCode;

    /**
     * @var null|ExtensionReason
     */
    #[JMS\Accessor(getter: 'getExtensionReason', setter: 'setExtensionReason')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionReason')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionReason')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    private $extensionReason;

    /**
     * @var null|ExtensionContent
     */
    #[JMS\Accessor(getter: 'getExtensionContent', setter: 'setExtensionContent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExtensionContent')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\ext\ExtensionContent')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
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
        $this->extensionAgencyID ??= new ExtensionAgencyID();

        return $this->extensionAgencyID;
    }

    /**
     * @param  null|ExtensionAgencyID $extensionAgencyID
     * @return static
     */
    public function setExtensionAgencyID(
        ?ExtensionAgencyID $extensionAgencyID = null
    ): static {
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
        $this->extensionAgencyName ??= new ExtensionAgencyName();

        return $this->extensionAgencyName;
    }

    /**
     * @param  null|ExtensionAgencyName $extensionAgencyName
     * @return static
     */
    public function setExtensionAgencyName(
        ?ExtensionAgencyName $extensionAgencyName = null
    ): static {
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
        $this->extensionVersionID ??= new ExtensionVersionID();

        return $this->extensionVersionID;
    }

    /**
     * @param  null|ExtensionVersionID $extensionVersionID
     * @return static
     */
    public function setExtensionVersionID(
        ?ExtensionVersionID $extensionVersionID = null
    ): static {
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
        $this->extensionAgencyURI ??= new ExtensionAgencyURI();

        return $this->extensionAgencyURI;
    }

    /**
     * @param  null|ExtensionAgencyURI $extensionAgencyURI
     * @return static
     */
    public function setExtensionAgencyURI(
        ?ExtensionAgencyURI $extensionAgencyURI = null
    ): static {
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
        $this->extensionURI ??= new ExtensionURI();

        return $this->extensionURI;
    }

    /**
     * @param  null|ExtensionURI $extensionURI
     * @return static
     */
    public function setExtensionURI(
        ?ExtensionURI $extensionURI = null
    ): static {
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
        $this->extensionReasonCode ??= new ExtensionReasonCode();

        return $this->extensionReasonCode;
    }

    /**
     * @param  null|ExtensionReasonCode $extensionReasonCode
     * @return static
     */
    public function setExtensionReasonCode(
        ?ExtensionReasonCode $extensionReasonCode = null
    ): static {
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
        $this->extensionReason ??= new ExtensionReason();

        return $this->extensionReason;
    }

    /**
     * @param  null|ExtensionReason $extensionReason
     * @return static
     */
    public function setExtensionReason(
        ?ExtensionReason $extensionReason = null
    ): static {
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
        $this->extensionContent ??= new ExtensionContent();

        return $this->extensionContent;
    }

    /**
     * @param  null|ExtensionContent $extensionContent
     * @return static
     */
    public function setExtensionContent(
        ?ExtensionContent $extensionContent = null
    ): static {
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
