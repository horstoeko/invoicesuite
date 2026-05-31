<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class UBLExtensionsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<UBLExtension>
     */
    #[JMS\Accessor(getter: 'getUBLExtension', setter: 'setUBLExtension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UBLExtension')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\ext\UBLExtension>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'UBLExtension', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2')]
    private $uBLExtension;

    /**
     * @return null|array<UBLExtension>
     */
    public function getUBLExtension(): ?array
    {
        return $this->uBLExtension;
    }

    /**
     * @param  null|array<UBLExtension> $uBLExtension
     * @return static
     */
    public function setUBLExtension(
        ?array $uBLExtension = null
    ): static {
        $this->uBLExtension = $uBLExtension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUBLExtension(): static
    {
        $this->uBLExtension = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUBLExtension(): static
    {
        $this->uBLExtension = [];

        return $this;
    }

    /**
     * @return null|UBLExtension
     */
    public function firstUBLExtension(): ?UBLExtension
    {
        $uBLExtension = $this->uBLExtension ?? [];
        $uBLExtension = reset($uBLExtension);

        if (false === $uBLExtension) {
            return null;
        }

        return $uBLExtension;
    }

    /**
     * @return null|UBLExtension
     */
    public function lastUBLExtension(): ?UBLExtension
    {
        $uBLExtension = $this->uBLExtension ?? [];
        $uBLExtension = end($uBLExtension);

        if (false === $uBLExtension) {
            return null;
        }

        return $uBLExtension;
    }

    /**
     * @param  UBLExtension $uBLExtension
     * @return static
     */
    public function addToUBLExtension(
        UBLExtension $uBLExtension
    ): static {
        $this->uBLExtension[] = $uBLExtension;

        return $this;
    }

    /**
     * @return UBLExtension
     */
    public function addToUBLExtensionWithCreate(): UBLExtension
    {
        $this->addToUBLExtension($uBLExtension = new UBLExtension());

        return $uBLExtension;
    }

    /**
     * @param  UBLExtension $uBLExtension
     * @return static
     */
    public function addOnceToUBLExtension(
        UBLExtension $uBLExtension
    ): static {
        if (!is_array($this->uBLExtension)) {
            $this->uBLExtension = [];
        }

        $this->uBLExtension[0] = $uBLExtension;

        return $this;
    }

    /**
     * @return UBLExtension
     */
    public function addOnceToUBLExtensionWithCreate(): UBLExtension
    {
        if (!is_array($this->uBLExtension)) {
            $this->uBLExtension = [];
        }

        if ([] === $this->uBLExtension) {
            $this->addOnceToUBLExtension(new UBLExtension());
        }

        return $this->uBLExtension[0];
    }
}
