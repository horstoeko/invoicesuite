<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
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
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2')]
    #[JMS\XmlList(entry: 'UBLExtension', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2')]
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
        $uBLExtension = InvoiceSuiteArrayUtils::first($uBLExtension);

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
        $uBLExtension = InvoiceSuiteArrayUtils::last($uBLExtension);

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
        if (!InvoiceSuiteArrayUtils::is($this->uBLExtension)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->uBLExtension)) {
            $this->uBLExtension = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->uBLExtension)) {
            $this->addOnceToUBLExtension(new UBLExtension());
        }

        return $this->uBLExtension[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(UBLExtension): mixed $callback
     * @return static
     */
    public function forEachUBLExtension(
        callable $callback
    ): static {
        foreach ($this->uBLExtension ?? [] as $uBLExtension) {
            $callback($uBLExtension);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(UBLExtension): mixed  $callback
     * @return array<array-key, UBLExtension>
     */
    public function filterUBLExtensions(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->uBLExtension ?? [], $callback);
    }
}
