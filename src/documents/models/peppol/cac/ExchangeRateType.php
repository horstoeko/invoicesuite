<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationRate;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ExchangeMarketID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MathematicOperatorCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SourceCurrencyBaseRate;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SourceCurrencyCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TargetCurrencyBaseRate;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TargetCurrencyCode;
use JMS\Serializer\Annotation as JMS;

class ExchangeRateType
{
    use HandlesObjectFlags;

    /**
     * @var null|SourceCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SourceCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var null|SourceCurrencyBaseRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SourceCurrencyBaseRate")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyBaseRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyBaseRate", setter="setSourceCurrencyBaseRate")
     */
    private $sourceCurrencyBaseRate;

    /**
     * @var null|TargetCurrencyCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TargetCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var null|TargetCurrencyBaseRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TargetCurrencyBaseRate")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyBaseRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyBaseRate", setter="setTargetCurrencyBaseRate")
     */
    private $targetCurrencyBaseRate;

    /**
     * @var null|ExchangeMarketID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ExchangeMarketID")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangeMarketID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExchangeMarketID", setter="setExchangeMarketID")
     */
    private $exchangeMarketID;

    /**
     * @var null|CalculationRate
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CalculationRate")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationRate", setter="setCalculationRate")
     */
    private $calculationRate;

    /**
     * @var null|MathematicOperatorCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MathematicOperatorCode")
     * @JMS\Expose
     * @JMS\SerializedName("MathematicOperatorCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMathematicOperatorCode", setter="setMathematicOperatorCode")
     */
    private $mathematicOperatorCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("Date")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDate", setter="setDate")
     */
    private $date;

    /**
     * @var null|ForeignExchangeContract
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ForeignExchangeContract")
     * @JMS\Expose
     * @JMS\SerializedName("ForeignExchangeContract")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForeignExchangeContract", setter="setForeignExchangeContract")
     */
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
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new SourceCurrencyCode() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param  null|SourceCurrencyCode $sourceCurrencyCode
     * @return static
     */
    public function setSourceCurrencyCode(?SourceCurrencyCode $sourceCurrencyCode = null): static
    {
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
        $this->sourceCurrencyBaseRate = is_null($this->sourceCurrencyBaseRate) ? new SourceCurrencyBaseRate() : $this->sourceCurrencyBaseRate;

        return $this->sourceCurrencyBaseRate;
    }

    /**
     * @param  null|SourceCurrencyBaseRate $sourceCurrencyBaseRate
     * @return static
     */
    public function setSourceCurrencyBaseRate(?SourceCurrencyBaseRate $sourceCurrencyBaseRate = null): static
    {
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
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new TargetCurrencyCode() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param  null|TargetCurrencyCode $targetCurrencyCode
     * @return static
     */
    public function setTargetCurrencyCode(?TargetCurrencyCode $targetCurrencyCode = null): static
    {
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
        $this->targetCurrencyBaseRate = is_null($this->targetCurrencyBaseRate) ? new TargetCurrencyBaseRate() : $this->targetCurrencyBaseRate;

        return $this->targetCurrencyBaseRate;
    }

    /**
     * @param  null|TargetCurrencyBaseRate $targetCurrencyBaseRate
     * @return static
     */
    public function setTargetCurrencyBaseRate(?TargetCurrencyBaseRate $targetCurrencyBaseRate = null): static
    {
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
        $this->exchangeMarketID = is_null($this->exchangeMarketID) ? new ExchangeMarketID() : $this->exchangeMarketID;

        return $this->exchangeMarketID;
    }

    /**
     * @param  null|ExchangeMarketID $exchangeMarketID
     * @return static
     */
    public function setExchangeMarketID(?ExchangeMarketID $exchangeMarketID = null): static
    {
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
        $this->calculationRate = is_null($this->calculationRate) ? new CalculationRate() : $this->calculationRate;

        return $this->calculationRate;
    }

    /**
     * @param  null|CalculationRate $calculationRate
     * @return static
     */
    public function setCalculationRate(?CalculationRate $calculationRate = null): static
    {
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
        $this->mathematicOperatorCode = is_null($this->mathematicOperatorCode) ? new MathematicOperatorCode() : $this->mathematicOperatorCode;

        return $this->mathematicOperatorCode;
    }

    /**
     * @param  null|MathematicOperatorCode $mathematicOperatorCode
     * @return static
     */
    public function setMathematicOperatorCode(?MathematicOperatorCode $mathematicOperatorCode = null): static
    {
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
    public function setDate(?DateTimeInterface $date = null): static
    {
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
        $this->foreignExchangeContract = is_null($this->foreignExchangeContract) ? new ForeignExchangeContract() : $this->foreignExchangeContract;

        return $this->foreignExchangeContract;
    }

    /**
     * @param  null|ForeignExchangeContract $foreignExchangeContract
     * @return static
     */
    public function setForeignExchangeContract(?ForeignExchangeContract $foreignExchangeContract = null): static
    {
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
