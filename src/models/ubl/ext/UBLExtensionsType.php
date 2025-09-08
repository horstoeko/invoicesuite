<?php

namespace horstoeko\invoicesuite\models\ubl\ext;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class UBLExtensionsType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\ext\UBLExtension>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\ext\UBLExtension>")
     * @JMS\Expose
     * @JMS\SerializedName("UBLExtension")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="UBLExtension", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2")
     * @JMS\Accessor(getter="getUBLExtension", setter="setUBLExtension")
     */
    private $uBLExtension;

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\ext\UBLExtension>|null
     */
    public function getUBLExtension(): ?array
    {
        return $this->uBLExtension;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\ext\UBLExtension>|null $uBLExtension
     * @return self
     */
    public function setUBLExtension(?array $uBLExtension = null): self
    {
        $this->uBLExtension = $uBLExtension;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUBLExtension(): self
    {
        $this->uBLExtension = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearUBLExtension(): self
    {
        $this->uBLExtension = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\UBLExtension $uBLExtension
     * @return self
     */
    public function addToUBLExtension(UBLExtension $uBLExtension): self
    {
        $this->uBLExtension[] = $uBLExtension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\UBLExtension
     */
    public function addToUBLExtensionWithCreate(): UBLExtension
    {
        $this->addTouBLExtension($uBLExtension = new UBLExtension());

        return $uBLExtension;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\ext\UBLExtension $uBLExtension
     * @return self
     */
    public function addOnceToUBLExtension(UBLExtension $uBLExtension): self
    {
        if (!is_array($this->uBLExtension)) {
            $this->uBLExtension = [];
        }

        $this->uBLExtension[0] = $uBLExtension;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\ext\UBLExtension
     */
    public function addOnceToUBLExtensionWithCreate(): UBLExtension
    {
        if (!is_array($this->uBLExtension)) {
            $this->uBLExtension = [];
        }

        if ($this->uBLExtension === []) {
            $this->addOnceTouBLExtension(new UBLExtension());
        }

        return $this->uBLExtension[0];
    }
}
