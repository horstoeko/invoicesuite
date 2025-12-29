<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumerIncentiveTacticTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DisplayTacticTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FeatureTacticTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TradeItemPackingLabelingTypeCode;
use JMS\Serializer\Annotation as JMS;

class EventTacticEnumerationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumerIncentiveTacticTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ConsumerIncentiveTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumerIncentiveTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumerIncentiveTacticTypeCode", setter="setConsumerIncentiveTacticTypeCode")
     */
    private $consumerIncentiveTacticTypeCode;

    /**
     * @var null|DisplayTacticTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DisplayTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("DisplayTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDisplayTacticTypeCode", setter="setDisplayTacticTypeCode")
     */
    private $displayTacticTypeCode;

    /**
     * @var null|FeatureTacticTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FeatureTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("FeatureTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFeatureTacticTypeCode", setter="setFeatureTacticTypeCode")
     */
    private $featureTacticTypeCode;

    /**
     * @var null|TradeItemPackingLabelingTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TradeItemPackingLabelingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TradeItemPackingLabelingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTradeItemPackingLabelingTypeCode", setter="setTradeItemPackingLabelingTypeCode")
     */
    private $tradeItemPackingLabelingTypeCode;

    /**
     * @return null|ConsumerIncentiveTacticTypeCode
     */
    public function getConsumerIncentiveTacticTypeCode(): ?ConsumerIncentiveTacticTypeCode
    {
        return $this->consumerIncentiveTacticTypeCode;
    }

    /**
     * @return ConsumerIncentiveTacticTypeCode
     */
    public function getConsumerIncentiveTacticTypeCodeWithCreate(): ConsumerIncentiveTacticTypeCode
    {
        $this->consumerIncentiveTacticTypeCode = is_null($this->consumerIncentiveTacticTypeCode) ? new ConsumerIncentiveTacticTypeCode() : $this->consumerIncentiveTacticTypeCode;

        return $this->consumerIncentiveTacticTypeCode;
    }

    /**
     * @param  null|ConsumerIncentiveTacticTypeCode $consumerIncentiveTacticTypeCode
     * @return static
     */
    public function setConsumerIncentiveTacticTypeCode(
        ?ConsumerIncentiveTacticTypeCode $consumerIncentiveTacticTypeCode = null,
    ): static {
        $this->consumerIncentiveTacticTypeCode = $consumerIncentiveTacticTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetConsumerIncentiveTacticTypeCode(): static
    {
        $this->consumerIncentiveTacticTypeCode = null;

        return $this;
    }

    /**
     * @return null|DisplayTacticTypeCode
     */
    public function getDisplayTacticTypeCode(): ?DisplayTacticTypeCode
    {
        return $this->displayTacticTypeCode;
    }

    /**
     * @return DisplayTacticTypeCode
     */
    public function getDisplayTacticTypeCodeWithCreate(): DisplayTacticTypeCode
    {
        $this->displayTacticTypeCode = is_null($this->displayTacticTypeCode) ? new DisplayTacticTypeCode() : $this->displayTacticTypeCode;

        return $this->displayTacticTypeCode;
    }

    /**
     * @param  null|DisplayTacticTypeCode $displayTacticTypeCode
     * @return static
     */
    public function setDisplayTacticTypeCode(?DisplayTacticTypeCode $displayTacticTypeCode = null): static
    {
        $this->displayTacticTypeCode = $displayTacticTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDisplayTacticTypeCode(): static
    {
        $this->displayTacticTypeCode = null;

        return $this;
    }

    /**
     * @return null|FeatureTacticTypeCode
     */
    public function getFeatureTacticTypeCode(): ?FeatureTacticTypeCode
    {
        return $this->featureTacticTypeCode;
    }

    /**
     * @return FeatureTacticTypeCode
     */
    public function getFeatureTacticTypeCodeWithCreate(): FeatureTacticTypeCode
    {
        $this->featureTacticTypeCode = is_null($this->featureTacticTypeCode) ? new FeatureTacticTypeCode() : $this->featureTacticTypeCode;

        return $this->featureTacticTypeCode;
    }

    /**
     * @param  null|FeatureTacticTypeCode $featureTacticTypeCode
     * @return static
     */
    public function setFeatureTacticTypeCode(?FeatureTacticTypeCode $featureTacticTypeCode = null): static
    {
        $this->featureTacticTypeCode = $featureTacticTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFeatureTacticTypeCode(): static
    {
        $this->featureTacticTypeCode = null;

        return $this;
    }

    /**
     * @return null|TradeItemPackingLabelingTypeCode
     */
    public function getTradeItemPackingLabelingTypeCode(): ?TradeItemPackingLabelingTypeCode
    {
        return $this->tradeItemPackingLabelingTypeCode;
    }

    /**
     * @return TradeItemPackingLabelingTypeCode
     */
    public function getTradeItemPackingLabelingTypeCodeWithCreate(): TradeItemPackingLabelingTypeCode
    {
        $this->tradeItemPackingLabelingTypeCode = is_null($this->tradeItemPackingLabelingTypeCode) ? new TradeItemPackingLabelingTypeCode() : $this->tradeItemPackingLabelingTypeCode;

        return $this->tradeItemPackingLabelingTypeCode;
    }

    /**
     * @param  null|TradeItemPackingLabelingTypeCode $tradeItemPackingLabelingTypeCode
     * @return static
     */
    public function setTradeItemPackingLabelingTypeCode(
        ?TradeItemPackingLabelingTypeCode $tradeItemPackingLabelingTypeCode = null,
    ): static {
        $this->tradeItemPackingLabelingTypeCode = $tradeItemPackingLabelingTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTradeItemPackingLabelingTypeCode(): static
    {
        $this->tradeItemPackingLabelingTypeCode = null;

        return $this;
    }
}
