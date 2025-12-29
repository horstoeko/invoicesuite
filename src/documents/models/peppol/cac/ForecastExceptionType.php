<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ComparisonDataCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DataSourceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastPurposeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastTypeCode;
use JMS\Serializer\Annotation as JMS;

class ForecastExceptionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ForecastPurposeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastPurposeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastPurposeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastPurposeCode", setter="setForecastPurposeCode")
     */
    private $forecastPurposeCode;

    /**
     * @var null|ForecastTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ForecastTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getForecastTypeCode", setter="setForecastTypeCode")
     */
    private $forecastTypeCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var null|DataSourceCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\DataSourceCode")
     * @JMS\Expose
     * @JMS\SerializedName("DataSourceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDataSourceCode", setter="setDataSourceCode")
     */
    private $dataSourceCode;

    /**
     * @var null|ComparisonDataCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ComparisonDataCode")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonDataCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonDataCode", setter="setComparisonDataCode")
     */
    private $comparisonDataCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonForecastIssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonForecastIssueTime", setter="setComparisonForecastIssueTime")
     */
    private $comparisonForecastIssueTime;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonForecastIssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonForecastIssueDate", setter="setComparisonForecastIssueDate")
     */
    private $comparisonForecastIssueDate;

    /**
     * @return null|ForecastPurposeCode
     */
    public function getForecastPurposeCode(): ?ForecastPurposeCode
    {
        return $this->forecastPurposeCode;
    }

    /**
     * @return ForecastPurposeCode
     */
    public function getForecastPurposeCodeWithCreate(): ForecastPurposeCode
    {
        $this->forecastPurposeCode = is_null($this->forecastPurposeCode) ? new ForecastPurposeCode() : $this->forecastPurposeCode;

        return $this->forecastPurposeCode;
    }

    /**
     * @param  null|ForecastPurposeCode $forecastPurposeCode
     * @return static
     */
    public function setForecastPurposeCode(?ForecastPurposeCode $forecastPurposeCode = null): static
    {
        $this->forecastPurposeCode = $forecastPurposeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastPurposeCode(): static
    {
        $this->forecastPurposeCode = null;

        return $this;
    }

    /**
     * @return null|ForecastTypeCode
     */
    public function getForecastTypeCode(): ?ForecastTypeCode
    {
        return $this->forecastTypeCode;
    }

    /**
     * @return ForecastTypeCode
     */
    public function getForecastTypeCodeWithCreate(): ForecastTypeCode
    {
        $this->forecastTypeCode = is_null($this->forecastTypeCode) ? new ForecastTypeCode() : $this->forecastTypeCode;

        return $this->forecastTypeCode;
    }

    /**
     * @param  null|ForecastTypeCode $forecastTypeCode
     * @return static
     */
    public function setForecastTypeCode(?ForecastTypeCode $forecastTypeCode = null): static
    {
        $this->forecastTypeCode = $forecastTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastTypeCode(): static
    {
        $this->forecastTypeCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(?DateTimeInterface $issueTime = null): static
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return null|DataSourceCode
     */
    public function getDataSourceCode(): ?DataSourceCode
    {
        return $this->dataSourceCode;
    }

    /**
     * @return DataSourceCode
     */
    public function getDataSourceCodeWithCreate(): DataSourceCode
    {
        $this->dataSourceCode = is_null($this->dataSourceCode) ? new DataSourceCode() : $this->dataSourceCode;

        return $this->dataSourceCode;
    }

    /**
     * @param  null|DataSourceCode $dataSourceCode
     * @return static
     */
    public function setDataSourceCode(?DataSourceCode $dataSourceCode = null): static
    {
        $this->dataSourceCode = $dataSourceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDataSourceCode(): static
    {
        $this->dataSourceCode = null;

        return $this;
    }

    /**
     * @return null|ComparisonDataCode
     */
    public function getComparisonDataCode(): ?ComparisonDataCode
    {
        return $this->comparisonDataCode;
    }

    /**
     * @return ComparisonDataCode
     */
    public function getComparisonDataCodeWithCreate(): ComparisonDataCode
    {
        $this->comparisonDataCode = is_null($this->comparisonDataCode) ? new ComparisonDataCode() : $this->comparisonDataCode;

        return $this->comparisonDataCode;
    }

    /**
     * @param  null|ComparisonDataCode $comparisonDataCode
     * @return static
     */
    public function setComparisonDataCode(?ComparisonDataCode $comparisonDataCode = null): static
    {
        $this->comparisonDataCode = $comparisonDataCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComparisonDataCode(): static
    {
        $this->comparisonDataCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getComparisonForecastIssueTime(): ?DateTimeInterface
    {
        return $this->comparisonForecastIssueTime;
    }

    /**
     * @param  null|DateTimeInterface $comparisonForecastIssueTime
     * @return static
     */
    public function setComparisonForecastIssueTime(?DateTimeInterface $comparisonForecastIssueTime = null): static
    {
        $this->comparisonForecastIssueTime = $comparisonForecastIssueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComparisonForecastIssueTime(): static
    {
        $this->comparisonForecastIssueTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getComparisonForecastIssueDate(): ?DateTimeInterface
    {
        return $this->comparisonForecastIssueDate;
    }

    /**
     * @param  null|DateTimeInterface $comparisonForecastIssueDate
     * @return static
     */
    public function setComparisonForecastIssueDate(?DateTimeInterface $comparisonForecastIssueDate = null): static
    {
        $this->comparisonForecastIssueDate = $comparisonForecastIssueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComparisonForecastIssueDate(): static
    {
        $this->comparisonForecastIssueDate = null;

        return $this;
    }
}
