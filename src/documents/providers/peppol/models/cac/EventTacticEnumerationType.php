<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumerIncentiveTacticTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DisplayTacticTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FeatureTacticTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TradeItemPackingLabelingTypeCode;
use JMS\Serializer\Annotation as JMS;

class EventTacticEnumerationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ConsumerIncentiveTacticTypeCode
     */
    #[JMS\Accessor(getter: 'getConsumerIncentiveTacticTypeCode', setter: 'setConsumerIncentiveTacticTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ConsumerIncentiveTacticTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ConsumerIncentiveTacticTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $consumerIncentiveTacticTypeCode;

    /**
     * @var null|DisplayTacticTypeCode
     */
    #[JMS\Accessor(getter: 'getDisplayTacticTypeCode', setter: 'setDisplayTacticTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DisplayTacticTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DisplayTacticTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $displayTacticTypeCode;

    /**
     * @var null|FeatureTacticTypeCode
     */
    #[JMS\Accessor(getter: 'getFeatureTacticTypeCode', setter: 'setFeatureTacticTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FeatureTacticTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FeatureTacticTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $featureTacticTypeCode;

    /**
     * @var null|TradeItemPackingLabelingTypeCode
     */
    #[JMS\Accessor(getter: 'getTradeItemPackingLabelingTypeCode', setter: 'setTradeItemPackingLabelingTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TradeItemPackingLabelingTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TradeItemPackingLabelingTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->consumerIncentiveTacticTypeCode ??= new ConsumerIncentiveTacticTypeCode();

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
        $this->displayTacticTypeCode ??= new DisplayTacticTypeCode();

        return $this->displayTacticTypeCode;
    }

    /**
     * @param  null|DisplayTacticTypeCode $displayTacticTypeCode
     * @return static
     */
    public function setDisplayTacticTypeCode(
        ?DisplayTacticTypeCode $displayTacticTypeCode = null
    ): static {
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
        $this->featureTacticTypeCode ??= new FeatureTacticTypeCode();

        return $this->featureTacticTypeCode;
    }

    /**
     * @param  null|FeatureTacticTypeCode $featureTacticTypeCode
     * @return static
     */
    public function setFeatureTacticTypeCode(
        ?FeatureTacticTypeCode $featureTacticTypeCode = null
    ): static {
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
        $this->tradeItemPackingLabelingTypeCode ??= new TradeItemPackingLabelingTypeCode();

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
