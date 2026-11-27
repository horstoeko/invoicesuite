<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class OrderedShipmentType
{
    use HandlesObjectFlags;

    /**
     * @var null|Shipment
     */
    #[JMS\Accessor(getter: 'getShipment', setter: 'setShipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Shipment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Shipment')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shipment;

    /**
     * @var null|array<Package>
     */
    #[JMS\Accessor(getter: 'getPackage', setter: 'setPackage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Package')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Package>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'Package', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $package;

    /**
     * @return null|Shipment
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @return Shipment
     */
    public function getShipmentWithCreate(): Shipment
    {
        $this->shipment ??= new Shipment();

        return $this->shipment;
    }

    /**
     * @param  null|Shipment $shipment
     * @return static
     */
    public function setShipment(
        ?Shipment $shipment = null
    ): static {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipment(): static
    {
        $this->shipment = null;

        return $this;
    }

    /**
     * @return null|array<Package>
     */
    public function getPackage(): ?array
    {
        return $this->package;
    }

    /**
     * @param  null|array<Package> $package
     * @return static
     */
    public function setPackage(
        ?array $package = null
    ): static {
        $this->package = $package;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPackage(): static
    {
        $this->package = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPackage(): static
    {
        $this->package = [];

        return $this;
    }

    /**
     * @return null|Package
     */
    public function firstPackage(): ?Package
    {
        $package = $this->package ?? [];
        $package = InvoiceSuiteArrayUtils::first($package);

        if (false === $package) {
            return null;
        }

        return $package;
    }

    /**
     * @return null|Package
     */
    public function lastPackage(): ?Package
    {
        $package = $this->package ?? [];
        $package = InvoiceSuiteArrayUtils::last($package);

        if (false === $package) {
            return null;
        }

        return $package;
    }

    /**
     * @param  Package $package
     * @return static
     */
    public function addToPackage(
        Package $package
    ): static {
        $this->package[] = $package;

        return $this;
    }

    /**
     * @return Package
     */
    public function addToPackageWithCreate(): Package
    {
        $this->addToPackage($package = new Package());

        return $package;
    }

    /**
     * @param  Package $package
     * @return static
     */
    public function addOnceToPackage(
        Package $package
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->package)) {
            $this->package = [];
        }

        $this->package[0] = $package;

        return $this;
    }

    /**
     * @return Package
     */
    public function addOnceToPackageWithCreate(): Package
    {
        if (!InvoiceSuiteArrayUtils::is($this->package)) {
            $this->package = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->package)) {
            $this->addOnceToPackage(new Package());
        }

        return $this->package[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Package): mixed $callback
     * @return static
     */
    public function forEachPackage(
        callable $callback
    ): static {
        foreach ($this->package ?? [] as $package) {
            $callback($package);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(Package): mixed  $callback
     * @return array<array-key, Package>
     */
    public function filterPackages(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->package ?? [], $callback);
    }
}
