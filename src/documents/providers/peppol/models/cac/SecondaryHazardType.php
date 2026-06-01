<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmergencyProceduresCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Extension;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlacardEndorsement;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlacardNotation;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class SecondaryHazardType
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
     * @var null|PlacardNotation
     */
    #[JMS\Accessor(getter: 'getPlacardNotation', setter: 'setPlacardNotation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlacardNotation')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlacardNotation')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $placardNotation;

    /**
     * @var null|PlacardEndorsement
     */
    #[JMS\Accessor(getter: 'getPlacardEndorsement', setter: 'setPlacardEndorsement')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlacardEndorsement')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PlacardEndorsement')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $placardEndorsement;

    /**
     * @var null|EmergencyProceduresCode
     */
    #[JMS\Accessor(getter: 'getEmergencyProceduresCode', setter: 'setEmergencyProceduresCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EmergencyProceduresCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EmergencyProceduresCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $emergencyProceduresCode;

    /**
     * @var null|array<Extension>
     */
    #[JMS\Accessor(getter: 'getExtension', setter: 'setExtension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Extension')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Extension>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Extension', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $extension;

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
     * @return null|PlacardNotation
     */
    public function getPlacardNotation(): ?PlacardNotation
    {
        return $this->placardNotation;
    }

    /**
     * @return PlacardNotation
     */
    public function getPlacardNotationWithCreate(): PlacardNotation
    {
        $this->placardNotation ??= new PlacardNotation();

        return $this->placardNotation;
    }

    /**
     * @param  null|PlacardNotation $placardNotation
     * @return static
     */
    public function setPlacardNotation(
        ?PlacardNotation $placardNotation = null
    ): static {
        $this->placardNotation = $placardNotation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlacardNotation(): static
    {
        $this->placardNotation = null;

        return $this;
    }

    /**
     * @return null|PlacardEndorsement
     */
    public function getPlacardEndorsement(): ?PlacardEndorsement
    {
        return $this->placardEndorsement;
    }

    /**
     * @return PlacardEndorsement
     */
    public function getPlacardEndorsementWithCreate(): PlacardEndorsement
    {
        $this->placardEndorsement ??= new PlacardEndorsement();

        return $this->placardEndorsement;
    }

    /**
     * @param  null|PlacardEndorsement $placardEndorsement
     * @return static
     */
    public function setPlacardEndorsement(
        ?PlacardEndorsement $placardEndorsement = null
    ): static {
        $this->placardEndorsement = $placardEndorsement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlacardEndorsement(): static
    {
        $this->placardEndorsement = null;

        return $this;
    }

    /**
     * @return null|EmergencyProceduresCode
     */
    public function getEmergencyProceduresCode(): ?EmergencyProceduresCode
    {
        return $this->emergencyProceduresCode;
    }

    /**
     * @return EmergencyProceduresCode
     */
    public function getEmergencyProceduresCodeWithCreate(): EmergencyProceduresCode
    {
        $this->emergencyProceduresCode ??= new EmergencyProceduresCode();

        return $this->emergencyProceduresCode;
    }

    /**
     * @param  null|EmergencyProceduresCode $emergencyProceduresCode
     * @return static
     */
    public function setEmergencyProceduresCode(
        ?EmergencyProceduresCode $emergencyProceduresCode = null
    ): static {
        $this->emergencyProceduresCode = $emergencyProceduresCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEmergencyProceduresCode(): static
    {
        $this->emergencyProceduresCode = null;

        return $this;
    }

    /**
     * @return null|array<Extension>
     */
    public function getExtension(): ?array
    {
        return $this->extension;
    }

    /**
     * @param  null|array<Extension> $extension
     * @return static
     */
    public function setExtension(
        ?array $extension = null
    ): static {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExtension(): static
    {
        $this->extension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearExtension(): static
    {
        $this->extension = [];

        return $this;
    }

    /**
     * @return null|Extension
     */
    public function firstExtension(): ?Extension
    {
        $extension = $this->extension ?? [];
        $extension = reset($extension);

        if (false === $extension) {
            return null;
        }

        return $extension;
    }

    /**
     * @return null|Extension
     */
    public function lastExtension(): ?Extension
    {
        $extension = $this->extension ?? [];
        $extension = end($extension);

        if (false === $extension) {
            return null;
        }

        return $extension;
    }

    /**
     * @param  Extension $extension
     * @return static
     */
    public function addToExtension(
        Extension $extension
    ): static {
        $this->extension[] = $extension;

        return $this;
    }

    /**
     * @return Extension
     */
    public function addToExtensionWithCreate(): Extension
    {
        $this->addToExtension($extension = new Extension());

        return $extension;
    }

    /**
     * @param  Extension $extension
     * @return static
     */
    public function addOnceToExtension(
        Extension $extension
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->extension)) {
            $this->extension = [];
        }

        $this->extension[0] = $extension;

        return $this;
    }

    /**
     * @return Extension
     */
    public function addOnceToExtensionWithCreate(): Extension
    {
        if (!InvoiceSuiteArrayUtils::is($this->extension)) {
            $this->extension = [];
        }

        if ([] === $this->extension) {
            $this->addOnceToExtension(new Extension());
        }

        return $this->extension[0];
    }
}
