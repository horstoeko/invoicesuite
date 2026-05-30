<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationRate;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExchangeMarketID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MathematicOperatorCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceCurrencyBaseRate;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceCurrencyCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetCurrencyBaseRate;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetCurrencyCode;
use JMS\Serializer\Annotation as JMS;

class ExchangeRateType
{
    use HandlesObjectFlags;

    /**
     * @var null|SourceCurrencyCode
     */
    #[JMS\Accessor(getter: 'getSourceCurrencyCode', setter: 'setSourceCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SourceCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceCurrencyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sourceCurrencyCode;

    /**
     * @var null|SourceCurrencyBaseRate
     */
    #[JMS\Accessor(getter: 'getSourceCurrencyBaseRate', setter: 'setSourceCurrencyBaseRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SourceCurrencyBaseRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceCurrencyBaseRate')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sourceCurrencyBaseRate;

    /**
     * @var null|TargetCurrencyCode
     */
    #[JMS\Accessor(getter: 'getTargetCurrencyCode', setter: 'setTargetCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TargetCurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetCurrencyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $targetCurrencyCode;

    /**
     * @var null|TargetCurrencyBaseRate
     */
    #[JMS\Accessor(getter: 'getTargetCurrencyBaseRate', setter: 'setTargetCurrencyBaseRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TargetCurrencyBaseRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TargetCurrencyBaseRate')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $targetCurrencyBaseRate;

    /**
     * @var null|ExchangeMarketID
     */
    #[JMS\Accessor(getter: 'getExchangeMarketID', setter: 'setExchangeMarketID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExchangeMarketID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExchangeMarketID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $exchangeMarketID;

    /**
     * @var null|CalculationRate
     */
    #[JMS\Accessor(getter: 'getCalculationRate', setter: 'setCalculationRate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CalculationRate')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CalculationRate')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $calculationRate;

    /**
     * @var null|MathematicOperatorCode
     */
    #[JMS\Accessor(getter: 'getMathematicOperatorCode', setter: 'setMathematicOperatorCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MathematicOperatorCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MathematicOperatorCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $mathematicOperatorCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getDate', setter: 'setDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Date')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $date;

    /**
     * @var null|ForeignExchangeContract
     */
    #[JMS\Accessor(getter: 'getForeignExchangeContract', setter: 'setForeignExchangeContract')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForeignExchangeContract')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ForeignExchangeContract')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $foreignExchangeContract;

    /**
     * @return null|SourceCurrencyCode
     */
    public function getSourceCurrencyCode(): ?SourceCurrencyCode
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return SourceCurrencyCode
     */
    public function getSourceCurrencyCodeWithCreate(): SourceCurrencyCode
    {
        $this->sourceCurrencyCode ??= new SourceCurrencyCode();

        return $this->sourceCurrencyCode;
    }

    /**
     * @param  null|SourceCurrencyCode $sourceCurrencyCode
     * @return static
     */
    public function setSourceCurrencyCode(
        ?SourceCurrencyCode $sourceCurrencyCode = null
    ): static {
        $this->sourceCurrencyCode = $sourceCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceCurrencyCode(): static
    {
        $this->sourceCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|SourceCurrencyBaseRate
     */
    public function getSourceCurrencyBaseRate(): ?SourceCurrencyBaseRate
    {
        return $this->sourceCurrencyBaseRate;
    }

    /**
     * @return SourceCurrencyBaseRate
     */
    public function getSourceCurrencyBaseRateWithCreate(): SourceCurrencyBaseRate
    {
        $this->sourceCurrencyBaseRate ??= new SourceCurrencyBaseRate();

        return $this->sourceCurrencyBaseRate;
    }

    /**
     * @param  null|SourceCurrencyBaseRate $sourceCurrencyBaseRate
     * @return static
     */
    public function setSourceCurrencyBaseRate(
        ?SourceCurrencyBaseRate $sourceCurrencyBaseRate = null
    ): static {
        $this->sourceCurrencyBaseRate = $sourceCurrencyBaseRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceCurrencyBaseRate(): static
    {
        $this->sourceCurrencyBaseRate = null;

        return $this;
    }

    /**
     * @return null|TargetCurrencyCode
     */
    public function getTargetCurrencyCode(): ?TargetCurrencyCode
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return TargetCurrencyCode
     */
    public function getTargetCurrencyCodeWithCreate(): TargetCurrencyCode
    {
        $this->targetCurrencyCode ??= new TargetCurrencyCode();

        return $this->targetCurrencyCode;
    }

    /**
     * @param  null|TargetCurrencyCode $targetCurrencyCode
     * @return static
     */
    public function setTargetCurrencyCode(
        ?TargetCurrencyCode $targetCurrencyCode = null
    ): static {
        $this->targetCurrencyCode = $targetCurrencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTargetCurrencyCode(): static
    {
        $this->targetCurrencyCode = null;

        return $this;
    }

    /**
     * @return null|TargetCurrencyBaseRate
     */
    public function getTargetCurrencyBaseRate(): ?TargetCurrencyBaseRate
    {
        return $this->targetCurrencyBaseRate;
    }

    /**
     * @return TargetCurrencyBaseRate
     */
    public function getTargetCurrencyBaseRateWithCreate(): TargetCurrencyBaseRate
    {
        $this->targetCurrencyBaseRate ??= new TargetCurrencyBaseRate();

        return $this->targetCurrencyBaseRate;
    }

    /**
     * @param  null|TargetCurrencyBaseRate $targetCurrencyBaseRate
     * @return static
     */
    public function setTargetCurrencyBaseRate(
        ?TargetCurrencyBaseRate $targetCurrencyBaseRate = null
    ): static {
        $this->targetCurrencyBaseRate = $targetCurrencyBaseRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTargetCurrencyBaseRate(): static
    {
        $this->targetCurrencyBaseRate = null;

        return $this;
    }

    /**
     * @return null|ExchangeMarketID
     */
    public function getExchangeMarketID(): ?ExchangeMarketID
    {
        return $this->exchangeMarketID;
    }

    /**
     * @return ExchangeMarketID
     */
    public function getExchangeMarketIDWithCreate(): ExchangeMarketID
    {
        $this->exchangeMarketID ??= new ExchangeMarketID();

        return $this->exchangeMarketID;
    }

    /**
     * @param  null|ExchangeMarketID $exchangeMarketID
     * @return static
     */
    public function setExchangeMarketID(
        ?ExchangeMarketID $exchangeMarketID = null
    ): static {
        $this->exchangeMarketID = $exchangeMarketID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExchangeMarketID(): static
    {
        $this->exchangeMarketID = null;

        return $this;
    }

    /**
     * @return null|CalculationRate
     */
    public function getCalculationRate(): ?CalculationRate
    {
        return $this->calculationRate;
    }

    /**
     * @return CalculationRate
     */
    public function getCalculationRateWithCreate(): CalculationRate
    {
        $this->calculationRate ??= new CalculationRate();

        return $this->calculationRate;
    }

    /**
     * @param  null|CalculationRate $calculationRate
     * @return static
     */
    public function setCalculationRate(
        ?CalculationRate $calculationRate = null
    ): static {
        $this->calculationRate = $calculationRate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCalculationRate(): static
    {
        $this->calculationRate = null;

        return $this;
    }

    /**
     * @return null|MathematicOperatorCode
     */
    public function getMathematicOperatorCode(): ?MathematicOperatorCode
    {
        return $this->mathematicOperatorCode;
    }

    /**
     * @return MathematicOperatorCode
     */
    public function getMathematicOperatorCodeWithCreate(): MathematicOperatorCode
    {
        $this->mathematicOperatorCode ??= new MathematicOperatorCode();

        return $this->mathematicOperatorCode;
    }

    /**
     * @param  null|MathematicOperatorCode $mathematicOperatorCode
     * @return static
     */
    public function setMathematicOperatorCode(
        ?MathematicOperatorCode $mathematicOperatorCode = null
    ): static {
        $this->mathematicOperatorCode = $mathematicOperatorCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMathematicOperatorCode(): static
    {
        $this->mathematicOperatorCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param  null|DateTimeInterface $date
     * @return static
     */
    public function setDate(
        ?DateTimeInterface $date = null
    ): static {
        $this->date = $date;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDate(): static
    {
        $this->date = null;

        return $this;
    }

    /**
     * @return null|ForeignExchangeContract
     */
    public function getForeignExchangeContract(): ?ForeignExchangeContract
    {
        return $this->foreignExchangeContract;
    }

    /**
     * @return ForeignExchangeContract
     */
    public function getForeignExchangeContractWithCreate(): ForeignExchangeContract
    {
        $this->foreignExchangeContract ??= new ForeignExchangeContract();

        return $this->foreignExchangeContract;
    }

    /**
     * @param  null|ForeignExchangeContract $foreignExchangeContract
     * @return static
     */
    public function setForeignExchangeContract(
        ?ForeignExchangeContract $foreignExchangeContract = null
    ): static {
        $this->foreignExchangeContract = $foreignExchangeContract;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForeignExchangeContract(): static
    {
        $this->foreignExchangeContract = null;

        return $this;
    }
}
