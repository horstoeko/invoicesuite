<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\CalculationRate;
use horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID;
use horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode;
use horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate;
use horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode;
use horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate;
use horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode;

class ExchangeRateType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyCode", setter="setSourceCurrencyCode")
     */
    private $sourceCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate")
     * @JMS\Expose
     * @JMS\SerializedName("SourceCurrencyBaseRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSourceCurrencyBaseRate", setter="setSourceCurrencyBaseRate")
     */
    private $sourceCurrencyBaseRate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyCode", setter="setTargetCurrencyCode")
     */
    private $targetCurrencyCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate")
     * @JMS\Expose
     * @JMS\SerializedName("TargetCurrencyBaseRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTargetCurrencyBaseRate", setter="setTargetCurrencyBaseRate")
     */
    private $targetCurrencyBaseRate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID")
     * @JMS\Expose
     * @JMS\SerializedName("ExchangeMarketID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExchangeMarketID", setter="setExchangeMarketID")
     */
    private $exchangeMarketID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CalculationRate|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CalculationRate")
     * @JMS\Expose
     * @JMS\SerializedName("CalculationRate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCalculationRate", setter="setCalculationRate")
     */
    private $calculationRate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode")
     * @JMS\Expose
     * @JMS\SerializedName("MathematicOperatorCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMathematicOperatorCode", setter="setMathematicOperatorCode")
     */
    private $mathematicOperatorCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("Date")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDate", setter="setDate")
     */
    private $date;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ForeignExchangeContract|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ForeignExchangeContract")
     * @JMS\Expose
     * @JMS\SerializedName("ForeignExchangeContract")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForeignExchangeContract", setter="setForeignExchangeContract")
     */
    private $foreignExchangeContract;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode|null
     */
    public function getSourceCurrencyCode(): ?SourceCurrencyCode
    {
        return $this->sourceCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode
     */
    public function getSourceCurrencyCodeWithCreate(): SourceCurrencyCode
    {
        $this->sourceCurrencyCode = is_null($this->sourceCurrencyCode) ? new SourceCurrencyCode() : $this->sourceCurrencyCode;

        return $this->sourceCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyCode|null $sourceCurrencyCode
     * @return self
     */
    public function setSourceCurrencyCode(?SourceCurrencyCode $sourceCurrencyCode = null): self
    {
        $this->sourceCurrencyCode = $sourceCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate|null
     */
    public function getSourceCurrencyBaseRate(): ?SourceCurrencyBaseRate
    {
        return $this->sourceCurrencyBaseRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate
     */
    public function getSourceCurrencyBaseRateWithCreate(): SourceCurrencyBaseRate
    {
        $this->sourceCurrencyBaseRate = is_null($this->sourceCurrencyBaseRate) ? new SourceCurrencyBaseRate() : $this->sourceCurrencyBaseRate;

        return $this->sourceCurrencyBaseRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SourceCurrencyBaseRate|null $sourceCurrencyBaseRate
     * @return self
     */
    public function setSourceCurrencyBaseRate(?SourceCurrencyBaseRate $sourceCurrencyBaseRate = null): self
    {
        $this->sourceCurrencyBaseRate = $sourceCurrencyBaseRate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode|null
     */
    public function getTargetCurrencyCode(): ?TargetCurrencyCode
    {
        return $this->targetCurrencyCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode
     */
    public function getTargetCurrencyCodeWithCreate(): TargetCurrencyCode
    {
        $this->targetCurrencyCode = is_null($this->targetCurrencyCode) ? new TargetCurrencyCode() : $this->targetCurrencyCode;

        return $this->targetCurrencyCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyCode|null $targetCurrencyCode
     * @return self
     */
    public function setTargetCurrencyCode(?TargetCurrencyCode $targetCurrencyCode = null): self
    {
        $this->targetCurrencyCode = $targetCurrencyCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate|null
     */
    public function getTargetCurrencyBaseRate(): ?TargetCurrencyBaseRate
    {
        return $this->targetCurrencyBaseRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate
     */
    public function getTargetCurrencyBaseRateWithCreate(): TargetCurrencyBaseRate
    {
        $this->targetCurrencyBaseRate = is_null($this->targetCurrencyBaseRate) ? new TargetCurrencyBaseRate() : $this->targetCurrencyBaseRate;

        return $this->targetCurrencyBaseRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TargetCurrencyBaseRate|null $targetCurrencyBaseRate
     * @return self
     */
    public function setTargetCurrencyBaseRate(?TargetCurrencyBaseRate $targetCurrencyBaseRate = null): self
    {
        $this->targetCurrencyBaseRate = $targetCurrencyBaseRate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID|null
     */
    public function getExchangeMarketID(): ?ExchangeMarketID
    {
        return $this->exchangeMarketID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID
     */
    public function getExchangeMarketIDWithCreate(): ExchangeMarketID
    {
        $this->exchangeMarketID = is_null($this->exchangeMarketID) ? new ExchangeMarketID() : $this->exchangeMarketID;

        return $this->exchangeMarketID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ExchangeMarketID|null $exchangeMarketID
     * @return self
     */
    public function setExchangeMarketID(?ExchangeMarketID $exchangeMarketID = null): self
    {
        $this->exchangeMarketID = $exchangeMarketID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationRate|null
     */
    public function getCalculationRate(): ?CalculationRate
    {
        return $this->calculationRate;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CalculationRate
     */
    public function getCalculationRateWithCreate(): CalculationRate
    {
        $this->calculationRate = is_null($this->calculationRate) ? new CalculationRate() : $this->calculationRate;

        return $this->calculationRate;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CalculationRate|null $calculationRate
     * @return self
     */
    public function setCalculationRate(?CalculationRate $calculationRate = null): self
    {
        $this->calculationRate = $calculationRate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode|null
     */
    public function getMathematicOperatorCode(): ?MathematicOperatorCode
    {
        return $this->mathematicOperatorCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode
     */
    public function getMathematicOperatorCodeWithCreate(): MathematicOperatorCode
    {
        $this->mathematicOperatorCode = is_null($this->mathematicOperatorCode) ? new MathematicOperatorCode() : $this->mathematicOperatorCode;

        return $this->mathematicOperatorCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\MathematicOperatorCode|null $mathematicOperatorCode
     * @return self
     */
    public function setMathematicOperatorCode(?MathematicOperatorCode $mathematicOperatorCode = null): self
    {
        $this->mathematicOperatorCode = $mathematicOperatorCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface|null $date
     * @return self
     */
    public function setDate(?\DateTimeInterface $date = null): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ForeignExchangeContract|null
     */
    public function getForeignExchangeContract(): ?ForeignExchangeContract
    {
        return $this->foreignExchangeContract;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ForeignExchangeContract
     */
    public function getForeignExchangeContractWithCreate(): ForeignExchangeContract
    {
        $this->foreignExchangeContract = is_null($this->foreignExchangeContract) ? new ForeignExchangeContract() : $this->foreignExchangeContract;

        return $this->foreignExchangeContract;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ForeignExchangeContract|null $foreignExchangeContract
     * @return self
     */
    public function setForeignExchangeContract(?ForeignExchangeContract $foreignExchangeContract = null): self
    {
        $this->foreignExchangeContract = $foreignExchangeContract;

        return $this;
    }
}
