<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms;

class TransportExecutionTermsType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportUserSpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportUserSpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTransportUserSpecialTerms", setter="setTransportUserSpecialTerms")
     */
    private $transportUserSpecialTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportServiceProviderSpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportServiceProviderSpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTransportServiceProviderSpecialTerms", setter="setTransportServiceProviderSpecialTerms")
     */
    private $transportServiceProviderSpecialTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("ChangeConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ChangeConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getChangeConditions", setter="setChangeConditions")
     */
    private $changeConditions;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\BonusPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\BonusPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("BonusPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBonusPaymentTerms", setter="setBonusPaymentTerms")
     */
    private $bonusPaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\CommissionPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\CommissionPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("CommissionPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCommissionPaymentTerms", setter="setCommissionPaymentTerms")
     */
    private $commissionPaymentTerms;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PenaltyPaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PenaltyPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyPaymentTerms", setter="setPenaltyPaymentTerms")
     */
    private $penaltyPaymentTerms;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission>")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalEmission")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnvironmentalEmission", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnvironmentalEmission", setter="setEnvironmentalEmission")
     */
    private $environmentalEmission;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationRequirement", setter="setNotificationRequirement")
     */
    private $notificationRequirement;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ServiceChargePaymentTerms|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ServiceChargePaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceChargePaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getServiceChargePaymentTerms", setter="setServiceChargePaymentTerms")
     */
    private $serviceChargePaymentTerms;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms>|null
     */
    public function getTransportUserSpecialTerms(): ?array
    {
        return $this->transportUserSpecialTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms>|null $transportUserSpecialTerms
     * @return self
     */
    public function setTransportUserSpecialTerms(?array $transportUserSpecialTerms = null): self
    {
        $this->transportUserSpecialTerms = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportUserSpecialTerms(): self
    {
        $this->transportUserSpecialTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportUserSpecialTerms(): self
    {
        $this->transportUserSpecialTerms = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms|null
     */
    public function firstTransportUserSpecialTerms(): ?TransportUserSpecialTerms
    {
        $transportUserSpecialTerms = $this->transportUserSpecialTerms ?? [];
        $transportUserSpecialTerms = reset($transportUserSpecialTerms);

        if ($transportUserSpecialTerms === false) {
            return null;
        }

        return $transportUserSpecialTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms|null
     */
    public function lastTransportUserSpecialTerms(): ?TransportUserSpecialTerms
    {
        $transportUserSpecialTerms = $this->transportUserSpecialTerms ?? [];
        $transportUserSpecialTerms = end($transportUserSpecialTerms);

        if ($transportUserSpecialTerms === false) {
            return null;
        }

        return $transportUserSpecialTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms $transportUserSpecialTerms
     * @return self
     */
    public function addToTransportUserSpecialTerms(TransportUserSpecialTerms $transportUserSpecialTerms): self
    {
        $this->transportUserSpecialTerms[] = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms
     */
    public function addToTransportUserSpecialTermsWithCreate(): TransportUserSpecialTerms
    {
        $this->addTotransportUserSpecialTerms($transportUserSpecialTerms = new TransportUserSpecialTerms());

        return $transportUserSpecialTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms $transportUserSpecialTerms
     * @return self
     */
    public function addOnceToTransportUserSpecialTerms(TransportUserSpecialTerms $transportUserSpecialTerms): self
    {
        if (!is_array($this->transportUserSpecialTerms)) {
            $this->transportUserSpecialTerms = [];
        }

        $this->transportUserSpecialTerms[0] = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportUserSpecialTerms
     */
    public function addOnceToTransportUserSpecialTermsWithCreate(): TransportUserSpecialTerms
    {
        if (!is_array($this->transportUserSpecialTerms)) {
            $this->transportUserSpecialTerms = [];
        }

        if ($this->transportUserSpecialTerms === []) {
            $this->addOnceTotransportUserSpecialTerms(new TransportUserSpecialTerms());
        }

        return $this->transportUserSpecialTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms>|null
     */
    public function getTransportServiceProviderSpecialTerms(): ?array
    {
        return $this->transportServiceProviderSpecialTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms>|null $transportServiceProviderSpecialTerms
     * @return self
     */
    public function setTransportServiceProviderSpecialTerms(?array $transportServiceProviderSpecialTerms = null): self
    {
        $this->transportServiceProviderSpecialTerms = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTransportServiceProviderSpecialTerms(): self
    {
        $this->transportServiceProviderSpecialTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTransportServiceProviderSpecialTerms(): self
    {
        $this->transportServiceProviderSpecialTerms = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms|null
     */
    public function firstTransportServiceProviderSpecialTerms(): ?TransportServiceProviderSpecialTerms
    {
        $transportServiceProviderSpecialTerms = $this->transportServiceProviderSpecialTerms ?? [];
        $transportServiceProviderSpecialTerms = reset($transportServiceProviderSpecialTerms);

        if ($transportServiceProviderSpecialTerms === false) {
            return null;
        }

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms|null
     */
    public function lastTransportServiceProviderSpecialTerms(): ?TransportServiceProviderSpecialTerms
    {
        $transportServiceProviderSpecialTerms = $this->transportServiceProviderSpecialTerms ?? [];
        $transportServiceProviderSpecialTerms = end($transportServiceProviderSpecialTerms);

        if ($transportServiceProviderSpecialTerms === false) {
            return null;
        }

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms
     * @return self
     */
    public function addToTransportServiceProviderSpecialTerms(
        TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms,
    ): self {
        $this->transportServiceProviderSpecialTerms[] = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms
     */
    public function addToTransportServiceProviderSpecialTermsWithCreate(): TransportServiceProviderSpecialTerms
    {
        $this->addTotransportServiceProviderSpecialTerms($transportServiceProviderSpecialTerms = new TransportServiceProviderSpecialTerms());

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms
     * @return self
     */
    public function addOnceToTransportServiceProviderSpecialTerms(
        TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms,
    ): self {
        if (!is_array($this->transportServiceProviderSpecialTerms)) {
            $this->transportServiceProviderSpecialTerms = [];
        }

        $this->transportServiceProviderSpecialTerms[0] = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TransportServiceProviderSpecialTerms
     */
    public function addOnceToTransportServiceProviderSpecialTermsWithCreate(): TransportServiceProviderSpecialTerms
    {
        if (!is_array($this->transportServiceProviderSpecialTerms)) {
            $this->transportServiceProviderSpecialTerms = [];
        }

        if ($this->transportServiceProviderSpecialTerms === []) {
            $this->addOnceTotransportServiceProviderSpecialTerms(new TransportServiceProviderSpecialTerms());
        }

        return $this->transportServiceProviderSpecialTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions>|null
     */
    public function getChangeConditions(): ?array
    {
        return $this->changeConditions;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions>|null $changeConditions
     * @return self
     */
    public function setChangeConditions(?array $changeConditions = null): self
    {
        $this->changeConditions = $changeConditions;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChangeConditions(): self
    {
        $this->changeConditions = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearChangeConditions(): self
    {
        $this->changeConditions = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions|null
     */
    public function firstChangeConditions(): ?ChangeConditions
    {
        $changeConditions = $this->changeConditions ?? [];
        $changeConditions = reset($changeConditions);

        if ($changeConditions === false) {
            return null;
        }

        return $changeConditions;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions|null
     */
    public function lastChangeConditions(): ?ChangeConditions
    {
        $changeConditions = $this->changeConditions ?? [];
        $changeConditions = end($changeConditions);

        if ($changeConditions === false) {
            return null;
        }

        return $changeConditions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions $changeConditions
     * @return self
     */
    public function addToChangeConditions(ChangeConditions $changeConditions): self
    {
        $this->changeConditions[] = $changeConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions
     */
    public function addToChangeConditionsWithCreate(): ChangeConditions
    {
        $this->addTochangeConditions($changeConditions = new ChangeConditions());

        return $changeConditions;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions $changeConditions
     * @return self
     */
    public function addOnceToChangeConditions(ChangeConditions $changeConditions): self
    {
        if (!is_array($this->changeConditions)) {
            $this->changeConditions = [];
        }

        $this->changeConditions[0] = $changeConditions;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChangeConditions
     */
    public function addOnceToChangeConditionsWithCreate(): ChangeConditions
    {
        if (!is_array($this->changeConditions)) {
            $this->changeConditions = [];
        }

        if ($this->changeConditions === []) {
            $this->addOnceTochangeConditions(new ChangeConditions());
        }

        return $this->changeConditions[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms>|null $paymentTerms
     * @return self
     */
    public function setPaymentTerms(?array $paymentTerms = null): self
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaymentTerms(): self
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearPaymentTerms(): self
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     */
    public function firstPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = reset($paymentTerms);

        if ($paymentTerms === false) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms|null
     */
    public function lastPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = end($paymentTerms);

        if ($paymentTerms === false) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms $paymentTerms
     * @return self
     */
    public function addOnceToPaymentTerms(PaymentTerms $paymentTerms): self
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ($this->paymentTerms === []) {
            $this->addOnceTopaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms>|null
     */
    public function getDeliveryTerms(): ?array
    {
        return $this->deliveryTerms;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms>|null $deliveryTerms
     * @return self
     */
    public function setDeliveryTerms(?array $deliveryTerms = null): self
    {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveryTerms(): self
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDeliveryTerms(): self
    {
        $this->deliveryTerms = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms|null
     */
    public function firstDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = reset($deliveryTerms);

        if ($deliveryTerms === false) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms|null
     */
    public function lastDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = end($deliveryTerms);

        if ($deliveryTerms === false) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function addToDeliveryTerms(DeliveryTerms $deliveryTerms): self
    {
        $this->deliveryTerms[] = $deliveryTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms
     */
    public function addToDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->addTodeliveryTerms($deliveryTerms = new DeliveryTerms());

        return $deliveryTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function addOnceToDeliveryTerms(DeliveryTerms $deliveryTerms): self
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        $this->deliveryTerms[0] = $deliveryTerms;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\DeliveryTerms
     */
    public function addOnceToDeliveryTermsWithCreate(): DeliveryTerms
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        if ($this->deliveryTerms === []) {
            $this->addOnceTodeliveryTerms(new DeliveryTerms());
        }

        return $this->deliveryTerms[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BonusPaymentTerms|null
     */
    public function getBonusPaymentTerms(): ?BonusPaymentTerms
    {
        return $this->bonusPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\BonusPaymentTerms
     */
    public function getBonusPaymentTermsWithCreate(): BonusPaymentTerms
    {
        $this->bonusPaymentTerms = is_null($this->bonusPaymentTerms) ? new BonusPaymentTerms() : $this->bonusPaymentTerms;

        return $this->bonusPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\BonusPaymentTerms|null $bonusPaymentTerms
     * @return self
     */
    public function setBonusPaymentTerms(?BonusPaymentTerms $bonusPaymentTerms = null): self
    {
        $this->bonusPaymentTerms = $bonusPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBonusPaymentTerms(): self
    {
        $this->bonusPaymentTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommissionPaymentTerms|null
     */
    public function getCommissionPaymentTerms(): ?CommissionPaymentTerms
    {
        return $this->commissionPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\CommissionPaymentTerms
     */
    public function getCommissionPaymentTermsWithCreate(): CommissionPaymentTerms
    {
        $this->commissionPaymentTerms = is_null($this->commissionPaymentTerms) ? new CommissionPaymentTerms() : $this->commissionPaymentTerms;

        return $this->commissionPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\CommissionPaymentTerms|null $commissionPaymentTerms
     * @return self
     */
    public function setCommissionPaymentTerms(?CommissionPaymentTerms $commissionPaymentTerms = null): self
    {
        $this->commissionPaymentTerms = $commissionPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCommissionPaymentTerms(): self
    {
        $this->commissionPaymentTerms = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PenaltyPaymentTerms|null
     */
    public function getPenaltyPaymentTerms(): ?PenaltyPaymentTerms
    {
        return $this->penaltyPaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PenaltyPaymentTerms
     */
    public function getPenaltyPaymentTermsWithCreate(): PenaltyPaymentTerms
    {
        $this->penaltyPaymentTerms = is_null($this->penaltyPaymentTerms) ? new PenaltyPaymentTerms() : $this->penaltyPaymentTerms;

        return $this->penaltyPaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PenaltyPaymentTerms|null $penaltyPaymentTerms
     * @return self
     */
    public function setPenaltyPaymentTerms(?PenaltyPaymentTerms $penaltyPaymentTerms = null): self
    {
        $this->penaltyPaymentTerms = $penaltyPaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPenaltyPaymentTerms(): self
    {
        $this->penaltyPaymentTerms = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission>|null
     */
    public function getEnvironmentalEmission(): ?array
    {
        return $this->environmentalEmission;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission>|null $environmentalEmission
     * @return self
     */
    public function setEnvironmentalEmission(?array $environmentalEmission = null): self
    {
        $this->environmentalEmission = $environmentalEmission;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEnvironmentalEmission(): self
    {
        $this->environmentalEmission = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEnvironmentalEmission(): self
    {
        $this->environmentalEmission = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission|null
     */
    public function firstEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = reset($environmentalEmission);

        if ($environmentalEmission === false) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission|null
     */
    public function lastEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = end($environmentalEmission);

        if ($environmentalEmission === false) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission $environmentalEmission
     * @return self
     */
    public function addToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): self
    {
        $this->environmentalEmission[] = $environmentalEmission;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission
     */
    public function addToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        $this->addToenvironmentalEmission($environmentalEmission = new EnvironmentalEmission());

        return $environmentalEmission;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission $environmentalEmission
     * @return self
     */
    public function addOnceToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): self
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        $this->environmentalEmission[0] = $environmentalEmission;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EnvironmentalEmission
     */
    public function addOnceToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        if ($this->environmentalEmission === []) {
            $this->addOnceToenvironmentalEmission(new EnvironmentalEmission());
        }

        return $this->environmentalEmission[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement>|null
     */
    public function getNotificationRequirement(): ?array
    {
        return $this->notificationRequirement;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement>|null $notificationRequirement
     * @return self
     */
    public function setNotificationRequirement(?array $notificationRequirement = null): self
    {
        $this->notificationRequirement = $notificationRequirement;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetNotificationRequirement(): self
    {
        $this->notificationRequirement = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNotificationRequirement(): self
    {
        $this->notificationRequirement = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement|null
     */
    public function firstNotificationRequirement(): ?NotificationRequirement
    {
        $notificationRequirement = $this->notificationRequirement ?? [];
        $notificationRequirement = reset($notificationRequirement);

        if ($notificationRequirement === false) {
            return null;
        }

        return $notificationRequirement;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement|null
     */
    public function lastNotificationRequirement(): ?NotificationRequirement
    {
        $notificationRequirement = $this->notificationRequirement ?? [];
        $notificationRequirement = end($notificationRequirement);

        if ($notificationRequirement === false) {
            return null;
        }

        return $notificationRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement $notificationRequirement
     * @return self
     */
    public function addToNotificationRequirement(NotificationRequirement $notificationRequirement): self
    {
        $this->notificationRequirement[] = $notificationRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement
     */
    public function addToNotificationRequirementWithCreate(): NotificationRequirement
    {
        $this->addTonotificationRequirement($notificationRequirement = new NotificationRequirement());

        return $notificationRequirement;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement $notificationRequirement
     * @return self
     */
    public function addOnceToNotificationRequirement(NotificationRequirement $notificationRequirement): self
    {
        if (!is_array($this->notificationRequirement)) {
            $this->notificationRequirement = [];
        }

        $this->notificationRequirement[0] = $notificationRequirement;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\NotificationRequirement
     */
    public function addOnceToNotificationRequirementWithCreate(): NotificationRequirement
    {
        if (!is_array($this->notificationRequirement)) {
            $this->notificationRequirement = [];
        }

        if ($this->notificationRequirement === []) {
            $this->addOnceTonotificationRequirement(new NotificationRequirement());
        }

        return $this->notificationRequirement[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ServiceChargePaymentTerms|null
     */
    public function getServiceChargePaymentTerms(): ?ServiceChargePaymentTerms
    {
        return $this->serviceChargePaymentTerms;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ServiceChargePaymentTerms
     */
    public function getServiceChargePaymentTermsWithCreate(): ServiceChargePaymentTerms
    {
        $this->serviceChargePaymentTerms = is_null($this->serviceChargePaymentTerms) ? new ServiceChargePaymentTerms() : $this->serviceChargePaymentTerms;

        return $this->serviceChargePaymentTerms;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ServiceChargePaymentTerms|null $serviceChargePaymentTerms
     * @return self
     */
    public function setServiceChargePaymentTerms(?ServiceChargePaymentTerms $serviceChargePaymentTerms = null): self
    {
        $this->serviceChargePaymentTerms = $serviceChargePaymentTerms;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetServiceChargePaymentTerms(): self
    {
        $this->serviceChargePaymentTerms = null;

        return $this;
    }
}
