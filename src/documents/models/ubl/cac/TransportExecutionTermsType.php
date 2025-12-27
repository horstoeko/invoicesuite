<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ChangeConditions;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TransportServiceProviderSpecialTerms;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TransportUserSpecialTerms;
use JMS\Serializer\Annotation as JMS;

class TransportExecutionTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<TransportUserSpecialTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\TransportUserSpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportUserSpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportUserSpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTransportUserSpecialTerms", setter="setTransportUserSpecialTerms")
     */
    private $transportUserSpecialTerms;

    /**
     * @var null|array<TransportServiceProviderSpecialTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\TransportServiceProviderSpecialTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("TransportServiceProviderSpecialTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TransportServiceProviderSpecialTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getTransportServiceProviderSpecialTerms", setter="setTransportServiceProviderSpecialTerms")
     */
    private $transportServiceProviderSpecialTerms;

    /**
     * @var null|array<ChangeConditions>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\ChangeConditions>")
     * @JMS\Expose
     * @JMS\SerializedName("ChangeConditions")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="ChangeConditions", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getChangeConditions", setter="setChangeConditions")
     */
    private $changeConditions;

    /**
     * @var null|array<PaymentTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\PaymentTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("PaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="PaymentTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getPaymentTerms", setter="setPaymentTerms")
     */
    private $paymentTerms;

    /**
     * @var null|array<DeliveryTerms>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DeliveryTerms>")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DeliveryTerms", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDeliveryTerms", setter="setDeliveryTerms")
     */
    private $deliveryTerms;

    /**
     * @var null|BonusPaymentTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\BonusPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("BonusPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBonusPaymentTerms", setter="setBonusPaymentTerms")
     */
    private $bonusPaymentTerms;

    /**
     * @var null|CommissionPaymentTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\CommissionPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("CommissionPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCommissionPaymentTerms", setter="setCommissionPaymentTerms")
     */
    private $commissionPaymentTerms;

    /**
     * @var null|PenaltyPaymentTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PenaltyPaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("PenaltyPaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPenaltyPaymentTerms", setter="setPenaltyPaymentTerms")
     */
    private $penaltyPaymentTerms;

    /**
     * @var null|array<EnvironmentalEmission>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\EnvironmentalEmission>")
     * @JMS\Expose
     * @JMS\SerializedName("EnvironmentalEmission")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EnvironmentalEmission", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEnvironmentalEmission", setter="setEnvironmentalEmission")
     */
    private $environmentalEmission;

    /**
     * @var null|array<NotificationRequirement>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\NotificationRequirement>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationRequirement")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationRequirement", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationRequirement", setter="setNotificationRequirement")
     */
    private $notificationRequirement;

    /**
     * @var null|ServiceChargePaymentTerms
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ServiceChargePaymentTerms")
     * @JMS\Expose
     * @JMS\SerializedName("ServiceChargePaymentTerms")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getServiceChargePaymentTerms", setter="setServiceChargePaymentTerms")
     */
    private $serviceChargePaymentTerms;

    /**
     * @return null|array<TransportUserSpecialTerms>
     */
    public function getTransportUserSpecialTerms(): ?array
    {
        return $this->transportUserSpecialTerms;
    }

    /**
     * @param  null|array<TransportUserSpecialTerms> $transportUserSpecialTerms
     * @return static
     */
    public function setTransportUserSpecialTerms(?array $transportUserSpecialTerms = null): static
    {
        $this->transportUserSpecialTerms = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportUserSpecialTerms(): static
    {
        $this->transportUserSpecialTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportUserSpecialTerms(): static
    {
        $this->transportUserSpecialTerms = [];

        return $this;
    }

    /**
     * @return null|TransportUserSpecialTerms
     */
    public function firstTransportUserSpecialTerms(): ?TransportUserSpecialTerms
    {
        $transportUserSpecialTerms = $this->transportUserSpecialTerms ?? [];
        $transportUserSpecialTerms = reset($transportUserSpecialTerms);

        if (false === $transportUserSpecialTerms) {
            return null;
        }

        return $transportUserSpecialTerms;
    }

    /**
     * @return null|TransportUserSpecialTerms
     */
    public function lastTransportUserSpecialTerms(): ?TransportUserSpecialTerms
    {
        $transportUserSpecialTerms = $this->transportUserSpecialTerms ?? [];
        $transportUserSpecialTerms = end($transportUserSpecialTerms);

        if (false === $transportUserSpecialTerms) {
            return null;
        }

        return $transportUserSpecialTerms;
    }

    /**
     * @param  TransportUserSpecialTerms $transportUserSpecialTerms
     * @return static
     */
    public function addToTransportUserSpecialTerms(TransportUserSpecialTerms $transportUserSpecialTerms): static
    {
        $this->transportUserSpecialTerms[] = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return TransportUserSpecialTerms
     */
    public function addToTransportUserSpecialTermsWithCreate(): TransportUserSpecialTerms
    {
        $this->addTotransportUserSpecialTerms($transportUserSpecialTerms = new TransportUserSpecialTerms());

        return $transportUserSpecialTerms;
    }

    /**
     * @param  TransportUserSpecialTerms $transportUserSpecialTerms
     * @return static
     */
    public function addOnceToTransportUserSpecialTerms(TransportUserSpecialTerms $transportUserSpecialTerms): static
    {
        if (!is_array($this->transportUserSpecialTerms)) {
            $this->transportUserSpecialTerms = [];
        }

        $this->transportUserSpecialTerms[0] = $transportUserSpecialTerms;

        return $this;
    }

    /**
     * @return TransportUserSpecialTerms
     */
    public function addOnceToTransportUserSpecialTermsWithCreate(): TransportUserSpecialTerms
    {
        if (!is_array($this->transportUserSpecialTerms)) {
            $this->transportUserSpecialTerms = [];
        }

        if ([] === $this->transportUserSpecialTerms) {
            $this->addOnceTotransportUserSpecialTerms(new TransportUserSpecialTerms());
        }

        return $this->transportUserSpecialTerms[0];
    }

    /**
     * @return null|array<TransportServiceProviderSpecialTerms>
     */
    public function getTransportServiceProviderSpecialTerms(): ?array
    {
        return $this->transportServiceProviderSpecialTerms;
    }

    /**
     * @param  null|array<TransportServiceProviderSpecialTerms> $transportServiceProviderSpecialTerms
     * @return static
     */
    public function setTransportServiceProviderSpecialTerms(?array $transportServiceProviderSpecialTerms = null): static
    {
        $this->transportServiceProviderSpecialTerms = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportServiceProviderSpecialTerms(): static
    {
        $this->transportServiceProviderSpecialTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportServiceProviderSpecialTerms(): static
    {
        $this->transportServiceProviderSpecialTerms = [];

        return $this;
    }

    /**
     * @return null|TransportServiceProviderSpecialTerms
     */
    public function firstTransportServiceProviderSpecialTerms(): ?TransportServiceProviderSpecialTerms
    {
        $transportServiceProviderSpecialTerms = $this->transportServiceProviderSpecialTerms ?? [];
        $transportServiceProviderSpecialTerms = reset($transportServiceProviderSpecialTerms);

        if (false === $transportServiceProviderSpecialTerms) {
            return null;
        }

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @return null|TransportServiceProviderSpecialTerms
     */
    public function lastTransportServiceProviderSpecialTerms(): ?TransportServiceProviderSpecialTerms
    {
        $transportServiceProviderSpecialTerms = $this->transportServiceProviderSpecialTerms ?? [];
        $transportServiceProviderSpecialTerms = end($transportServiceProviderSpecialTerms);

        if (false === $transportServiceProviderSpecialTerms) {
            return null;
        }

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @param  TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms
     * @return static
     */
    public function addToTransportServiceProviderSpecialTerms(
        TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms,
    ): static {
        $this->transportServiceProviderSpecialTerms[] = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return TransportServiceProviderSpecialTerms
     */
    public function addToTransportServiceProviderSpecialTermsWithCreate(): TransportServiceProviderSpecialTerms
    {
        $this->addTotransportServiceProviderSpecialTerms($transportServiceProviderSpecialTerms = new TransportServiceProviderSpecialTerms());

        return $transportServiceProviderSpecialTerms;
    }

    /**
     * @param  TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms
     * @return static
     */
    public function addOnceToTransportServiceProviderSpecialTerms(
        TransportServiceProviderSpecialTerms $transportServiceProviderSpecialTerms,
    ): static {
        if (!is_array($this->transportServiceProviderSpecialTerms)) {
            $this->transportServiceProviderSpecialTerms = [];
        }

        $this->transportServiceProviderSpecialTerms[0] = $transportServiceProviderSpecialTerms;

        return $this;
    }

    /**
     * @return TransportServiceProviderSpecialTerms
     */
    public function addOnceToTransportServiceProviderSpecialTermsWithCreate(): TransportServiceProviderSpecialTerms
    {
        if (!is_array($this->transportServiceProviderSpecialTerms)) {
            $this->transportServiceProviderSpecialTerms = [];
        }

        if ([] === $this->transportServiceProviderSpecialTerms) {
            $this->addOnceTotransportServiceProviderSpecialTerms(new TransportServiceProviderSpecialTerms());
        }

        return $this->transportServiceProviderSpecialTerms[0];
    }

    /**
     * @return null|array<ChangeConditions>
     */
    public function getChangeConditions(): ?array
    {
        return $this->changeConditions;
    }

    /**
     * @param  null|array<ChangeConditions> $changeConditions
     * @return static
     */
    public function setChangeConditions(?array $changeConditions = null): static
    {
        $this->changeConditions = $changeConditions;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChangeConditions(): static
    {
        $this->changeConditions = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearChangeConditions(): static
    {
        $this->changeConditions = [];

        return $this;
    }

    /**
     * @return null|ChangeConditions
     */
    public function firstChangeConditions(): ?ChangeConditions
    {
        $changeConditions = $this->changeConditions ?? [];
        $changeConditions = reset($changeConditions);

        if (false === $changeConditions) {
            return null;
        }

        return $changeConditions;
    }

    /**
     * @return null|ChangeConditions
     */
    public function lastChangeConditions(): ?ChangeConditions
    {
        $changeConditions = $this->changeConditions ?? [];
        $changeConditions = end($changeConditions);

        if (false === $changeConditions) {
            return null;
        }

        return $changeConditions;
    }

    /**
     * @param  ChangeConditions $changeConditions
     * @return static
     */
    public function addToChangeConditions(ChangeConditions $changeConditions): static
    {
        $this->changeConditions[] = $changeConditions;

        return $this;
    }

    /**
     * @return ChangeConditions
     */
    public function addToChangeConditionsWithCreate(): ChangeConditions
    {
        $this->addTochangeConditions($changeConditions = new ChangeConditions());

        return $changeConditions;
    }

    /**
     * @param  ChangeConditions $changeConditions
     * @return static
     */
    public function addOnceToChangeConditions(ChangeConditions $changeConditions): static
    {
        if (!is_array($this->changeConditions)) {
            $this->changeConditions = [];
        }

        $this->changeConditions[0] = $changeConditions;

        return $this;
    }

    /**
     * @return ChangeConditions
     */
    public function addOnceToChangeConditionsWithCreate(): ChangeConditions
    {
        if (!is_array($this->changeConditions)) {
            $this->changeConditions = [];
        }

        if ([] === $this->changeConditions) {
            $this->addOnceTochangeConditions(new ChangeConditions());
        }

        return $this->changeConditions[0];
    }

    /**
     * @return null|array<PaymentTerms>
     */
    public function getPaymentTerms(): ?array
    {
        return $this->paymentTerms;
    }

    /**
     * @param  null|array<PaymentTerms> $paymentTerms
     * @return static
     */
    public function setPaymentTerms(?array $paymentTerms = null): static
    {
        $this->paymentTerms = $paymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentTerms(): static
    {
        $this->paymentTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentTerms(): static
    {
        $this->paymentTerms = [];

        return $this;
    }

    /**
     * @return null|PaymentTerms
     */
    public function firstPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = reset($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @return null|PaymentTerms
     */
    public function lastPaymentTerms(): ?PaymentTerms
    {
        $paymentTerms = $this->paymentTerms ?? [];
        $paymentTerms = end($paymentTerms);

        if (false === $paymentTerms) {
            return null;
        }

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addToPaymentTerms(PaymentTerms $paymentTerms): static
    {
        $this->paymentTerms[] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addToPaymentTermsWithCreate(): PaymentTerms
    {
        $this->addTopaymentTerms($paymentTerms = new PaymentTerms());

        return $paymentTerms;
    }

    /**
     * @param  PaymentTerms $paymentTerms
     * @return static
     */
    public function addOnceToPaymentTerms(PaymentTerms $paymentTerms): static
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        $this->paymentTerms[0] = $paymentTerms;

        return $this;
    }

    /**
     * @return PaymentTerms
     */
    public function addOnceToPaymentTermsWithCreate(): PaymentTerms
    {
        if (!is_array($this->paymentTerms)) {
            $this->paymentTerms = [];
        }

        if ([] === $this->paymentTerms) {
            $this->addOnceTopaymentTerms(new PaymentTerms());
        }

        return $this->paymentTerms[0];
    }

    /**
     * @return null|array<DeliveryTerms>
     */
    public function getDeliveryTerms(): ?array
    {
        return $this->deliveryTerms;
    }

    /**
     * @param  null|array<DeliveryTerms> $deliveryTerms
     * @return static
     */
    public function setDeliveryTerms(?array $deliveryTerms = null): static
    {
        $this->deliveryTerms = $deliveryTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryTerms(): static
    {
        $this->deliveryTerms = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDeliveryTerms(): static
    {
        $this->deliveryTerms = [];

        return $this;
    }

    /**
     * @return null|DeliveryTerms
     */
    public function firstDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = reset($deliveryTerms);

        if (false === $deliveryTerms) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @return null|DeliveryTerms
     */
    public function lastDeliveryTerms(): ?DeliveryTerms
    {
        $deliveryTerms = $this->deliveryTerms ?? [];
        $deliveryTerms = end($deliveryTerms);

        if (false === $deliveryTerms) {
            return null;
        }

        return $deliveryTerms;
    }

    /**
     * @param  DeliveryTerms $deliveryTerms
     * @return static
     */
    public function addToDeliveryTerms(DeliveryTerms $deliveryTerms): static
    {
        $this->deliveryTerms[] = $deliveryTerms;

        return $this;
    }

    /**
     * @return DeliveryTerms
     */
    public function addToDeliveryTermsWithCreate(): DeliveryTerms
    {
        $this->addTodeliveryTerms($deliveryTerms = new DeliveryTerms());

        return $deliveryTerms;
    }

    /**
     * @param  DeliveryTerms $deliveryTerms
     * @return static
     */
    public function addOnceToDeliveryTerms(DeliveryTerms $deliveryTerms): static
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        $this->deliveryTerms[0] = $deliveryTerms;

        return $this;
    }

    /**
     * @return DeliveryTerms
     */
    public function addOnceToDeliveryTermsWithCreate(): DeliveryTerms
    {
        if (!is_array($this->deliveryTerms)) {
            $this->deliveryTerms = [];
        }

        if ([] === $this->deliveryTerms) {
            $this->addOnceTodeliveryTerms(new DeliveryTerms());
        }

        return $this->deliveryTerms[0];
    }

    /**
     * @return null|BonusPaymentTerms
     */
    public function getBonusPaymentTerms(): ?BonusPaymentTerms
    {
        return $this->bonusPaymentTerms;
    }

    /**
     * @return BonusPaymentTerms
     */
    public function getBonusPaymentTermsWithCreate(): BonusPaymentTerms
    {
        $this->bonusPaymentTerms = is_null($this->bonusPaymentTerms) ? new BonusPaymentTerms() : $this->bonusPaymentTerms;

        return $this->bonusPaymentTerms;
    }

    /**
     * @param  null|BonusPaymentTerms $bonusPaymentTerms
     * @return static
     */
    public function setBonusPaymentTerms(?BonusPaymentTerms $bonusPaymentTerms = null): static
    {
        $this->bonusPaymentTerms = $bonusPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBonusPaymentTerms(): static
    {
        $this->bonusPaymentTerms = null;

        return $this;
    }

    /**
     * @return null|CommissionPaymentTerms
     */
    public function getCommissionPaymentTerms(): ?CommissionPaymentTerms
    {
        return $this->commissionPaymentTerms;
    }

    /**
     * @return CommissionPaymentTerms
     */
    public function getCommissionPaymentTermsWithCreate(): CommissionPaymentTerms
    {
        $this->commissionPaymentTerms = is_null($this->commissionPaymentTerms) ? new CommissionPaymentTerms() : $this->commissionPaymentTerms;

        return $this->commissionPaymentTerms;
    }

    /**
     * @param  null|CommissionPaymentTerms $commissionPaymentTerms
     * @return static
     */
    public function setCommissionPaymentTerms(?CommissionPaymentTerms $commissionPaymentTerms = null): static
    {
        $this->commissionPaymentTerms = $commissionPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCommissionPaymentTerms(): static
    {
        $this->commissionPaymentTerms = null;

        return $this;
    }

    /**
     * @return null|PenaltyPaymentTerms
     */
    public function getPenaltyPaymentTerms(): ?PenaltyPaymentTerms
    {
        return $this->penaltyPaymentTerms;
    }

    /**
     * @return PenaltyPaymentTerms
     */
    public function getPenaltyPaymentTermsWithCreate(): PenaltyPaymentTerms
    {
        $this->penaltyPaymentTerms = is_null($this->penaltyPaymentTerms) ? new PenaltyPaymentTerms() : $this->penaltyPaymentTerms;

        return $this->penaltyPaymentTerms;
    }

    /**
     * @param  null|PenaltyPaymentTerms $penaltyPaymentTerms
     * @return static
     */
    public function setPenaltyPaymentTerms(?PenaltyPaymentTerms $penaltyPaymentTerms = null): static
    {
        $this->penaltyPaymentTerms = $penaltyPaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPenaltyPaymentTerms(): static
    {
        $this->penaltyPaymentTerms = null;

        return $this;
    }

    /**
     * @return null|array<EnvironmentalEmission>
     */
    public function getEnvironmentalEmission(): ?array
    {
        return $this->environmentalEmission;
    }

    /**
     * @param  null|array<EnvironmentalEmission> $environmentalEmission
     * @return static
     */
    public function setEnvironmentalEmission(?array $environmentalEmission = null): static
    {
        $this->environmentalEmission = $environmentalEmission;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnvironmentalEmission(): static
    {
        $this->environmentalEmission = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEnvironmentalEmission(): static
    {
        $this->environmentalEmission = [];

        return $this;
    }

    /**
     * @return null|EnvironmentalEmission
     */
    public function firstEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = reset($environmentalEmission);

        if (false === $environmentalEmission) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @return null|EnvironmentalEmission
     */
    public function lastEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = end($environmentalEmission);

        if (false === $environmentalEmission) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @param  EnvironmentalEmission $environmentalEmission
     * @return static
     */
    public function addToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): static
    {
        $this->environmentalEmission[] = $environmentalEmission;

        return $this;
    }

    /**
     * @return EnvironmentalEmission
     */
    public function addToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        $this->addToenvironmentalEmission($environmentalEmission = new EnvironmentalEmission());

        return $environmentalEmission;
    }

    /**
     * @param  EnvironmentalEmission $environmentalEmission
     * @return static
     */
    public function addOnceToEnvironmentalEmission(EnvironmentalEmission $environmentalEmission): static
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        $this->environmentalEmission[0] = $environmentalEmission;

        return $this;
    }

    /**
     * @return EnvironmentalEmission
     */
    public function addOnceToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        if ([] === $this->environmentalEmission) {
            $this->addOnceToenvironmentalEmission(new EnvironmentalEmission());
        }

        return $this->environmentalEmission[0];
    }

    /**
     * @return null|array<NotificationRequirement>
     */
    public function getNotificationRequirement(): ?array
    {
        return $this->notificationRequirement;
    }

    /**
     * @param  null|array<NotificationRequirement> $notificationRequirement
     * @return static
     */
    public function setNotificationRequirement(?array $notificationRequirement = null): static
    {
        $this->notificationRequirement = $notificationRequirement;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotificationRequirement(): static
    {
        $this->notificationRequirement = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNotificationRequirement(): static
    {
        $this->notificationRequirement = [];

        return $this;
    }

    /**
     * @return null|NotificationRequirement
     */
    public function firstNotificationRequirement(): ?NotificationRequirement
    {
        $notificationRequirement = $this->notificationRequirement ?? [];
        $notificationRequirement = reset($notificationRequirement);

        if (false === $notificationRequirement) {
            return null;
        }

        return $notificationRequirement;
    }

    /**
     * @return null|NotificationRequirement
     */
    public function lastNotificationRequirement(): ?NotificationRequirement
    {
        $notificationRequirement = $this->notificationRequirement ?? [];
        $notificationRequirement = end($notificationRequirement);

        if (false === $notificationRequirement) {
            return null;
        }

        return $notificationRequirement;
    }

    /**
     * @param  NotificationRequirement $notificationRequirement
     * @return static
     */
    public function addToNotificationRequirement(NotificationRequirement $notificationRequirement): static
    {
        $this->notificationRequirement[] = $notificationRequirement;

        return $this;
    }

    /**
     * @return NotificationRequirement
     */
    public function addToNotificationRequirementWithCreate(): NotificationRequirement
    {
        $this->addTonotificationRequirement($notificationRequirement = new NotificationRequirement());

        return $notificationRequirement;
    }

    /**
     * @param  NotificationRequirement $notificationRequirement
     * @return static
     */
    public function addOnceToNotificationRequirement(NotificationRequirement $notificationRequirement): static
    {
        if (!is_array($this->notificationRequirement)) {
            $this->notificationRequirement = [];
        }

        $this->notificationRequirement[0] = $notificationRequirement;

        return $this;
    }

    /**
     * @return NotificationRequirement
     */
    public function addOnceToNotificationRequirementWithCreate(): NotificationRequirement
    {
        if (!is_array($this->notificationRequirement)) {
            $this->notificationRequirement = [];
        }

        if ([] === $this->notificationRequirement) {
            $this->addOnceTonotificationRequirement(new NotificationRequirement());
        }

        return $this->notificationRequirement[0];
    }

    /**
     * @return null|ServiceChargePaymentTerms
     */
    public function getServiceChargePaymentTerms(): ?ServiceChargePaymentTerms
    {
        return $this->serviceChargePaymentTerms;
    }

    /**
     * @return ServiceChargePaymentTerms
     */
    public function getServiceChargePaymentTermsWithCreate(): ServiceChargePaymentTerms
    {
        $this->serviceChargePaymentTerms = is_null($this->serviceChargePaymentTerms) ? new ServiceChargePaymentTerms() : $this->serviceChargePaymentTerms;

        return $this->serviceChargePaymentTerms;
    }

    /**
     * @param  null|ServiceChargePaymentTerms $serviceChargePaymentTerms
     * @return static
     */
    public function setServiceChargePaymentTerms(?ServiceChargePaymentTerms $serviceChargePaymentTerms = null): static
    {
        $this->serviceChargePaymentTerms = $serviceChargePaymentTerms;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetServiceChargePaymentTerms(): static
    {
        $this->serviceChargePaymentTerms = null;

        return $this;
    }
}
