<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ImportanceCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use JMS\Serializer\Annotation as JMS;

class ItemPropertyGroupType
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
     * @var null|ImportanceCode
     */
    #[JMS\Accessor(getter: 'getImportanceCode', setter: 'setImportanceCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ImportanceCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ImportanceCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $importanceCode;

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
     * @return null|ImportanceCode
     */
    public function getImportanceCode(): ?ImportanceCode
    {
        return $this->importanceCode;
    }

    /**
     * @return ImportanceCode
     */
    public function getImportanceCodeWithCreate(): ImportanceCode
    {
        $this->importanceCode ??= new ImportanceCode();

        return $this->importanceCode;
    }

    /**
     * @param  null|ImportanceCode $importanceCode
     * @return static
     */
    public function setImportanceCode(
        ?ImportanceCode $importanceCode = null
    ): static {
        $this->importanceCode = $importanceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetImportanceCode(): static
    {
        $this->importanceCode = null;

        return $this;
    }
}
