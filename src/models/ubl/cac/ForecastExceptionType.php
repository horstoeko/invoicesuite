<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode;
use horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode;
use horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode;
use horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode;

class ForecastExceptionType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastPurposeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastPurposeCode", setter="setForecastPurposeCode")
     */
    private $forecastPurposeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastTypeCode", setter="setForecastTypeCode")
     */
    private $forecastTypeCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode")
     * @JMS\Expose
     * @JMS\SerializedName("DataSourceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDataSourceCode", setter="setDataSourceCode")
     */
    private $dataSourceCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonDataCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonDataCode", setter="setComparisonDataCode")
     */
    private $comparisonDataCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonForecastIssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonForecastIssueTime", setter="setComparisonForecastIssueTime")
     */
    private $comparisonForecastIssueTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonForecastIssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonForecastIssueDate", setter="setComparisonForecastIssueDate")
     */
    private $comparisonForecastIssueDate;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode|null
     */
    public function getForecastPurposeCode(): ?ForecastPurposeCode
    {
        return $this->forecastPurposeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode
     */
    public function getForecastPurposeCodeWithCreate(): ForecastPurposeCode
    {
        $this->forecastPurposeCode = is_null($this->forecastPurposeCode) ? new ForecastPurposeCode() : $this->forecastPurposeCode;

        return $this->forecastPurposeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode|null $forecastPurposeCode
     * @return self
     */
    public function setForecastPurposeCode(?ForecastPurposeCode $forecastPurposeCode = null): self
    {
        $this->forecastPurposeCode = $forecastPurposeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null
     */
    public function getForecastTypeCode(): ?ForecastTypeCode
    {
        return $this->forecastTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode
     */
    public function getForecastTypeCodeWithCreate(): ForecastTypeCode
    {
        $this->forecastTypeCode = is_null($this->forecastTypeCode) ? new ForecastTypeCode() : $this->forecastTypeCode;

        return $this->forecastTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode|null $forecastTypeCode
     * @return self
     */
    public function setForecastTypeCode(?ForecastTypeCode $forecastTypeCode = null): self
    {
        $this->forecastTypeCode = $forecastTypeCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTimeInterface $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueTime(): ?\DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param \DateTimeInterface|null $issueTime
     * @return self
     */
    public function setIssueTime(?\DateTimeInterface $issueTime = null): self
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode|null
     */
    public function getDataSourceCode(): ?DataSourceCode
    {
        return $this->dataSourceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode
     */
    public function getDataSourceCodeWithCreate(): DataSourceCode
    {
        $this->dataSourceCode = is_null($this->dataSourceCode) ? new DataSourceCode() : $this->dataSourceCode;

        return $this->dataSourceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode|null $dataSourceCode
     * @return self
     */
    public function setDataSourceCode(?DataSourceCode $dataSourceCode = null): self
    {
        $this->dataSourceCode = $dataSourceCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode|null
     */
    public function getComparisonDataCode(): ?ComparisonDataCode
    {
        return $this->comparisonDataCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode
     */
    public function getComparisonDataCodeWithCreate(): ComparisonDataCode
    {
        $this->comparisonDataCode = is_null($this->comparisonDataCode) ? new ComparisonDataCode() : $this->comparisonDataCode;

        return $this->comparisonDataCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataCode|null $comparisonDataCode
     * @return self
     */
    public function setComparisonDataCode(?ComparisonDataCode $comparisonDataCode = null): self
    {
        $this->comparisonDataCode = $comparisonDataCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getComparisonForecastIssueTime(): ?\DateTimeInterface
    {
        return $this->comparisonForecastIssueTime;
    }

    /**
     * @param \DateTimeInterface|null $comparisonForecastIssueTime
     * @return self
     */
    public function setComparisonForecastIssueTime(?\DateTimeInterface $comparisonForecastIssueTime = null): self
    {
        $this->comparisonForecastIssueTime = $comparisonForecastIssueTime;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getComparisonForecastIssueDate(): ?\DateTimeInterface
    {
        return $this->comparisonForecastIssueDate;
    }

    /**
     * @param \DateTimeInterface|null $comparisonForecastIssueDate
     * @return self
     */
    public function setComparisonForecastIssueDate(?\DateTimeInterface $comparisonForecastIssueDate = null): self
    {
        $this->comparisonForecastIssueDate = $comparisonForecastIssueDate;

        return $this;
    }
}
