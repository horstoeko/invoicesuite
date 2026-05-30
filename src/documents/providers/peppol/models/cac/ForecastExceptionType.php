<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ComparisonDataCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DataSourceCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastPurposeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode;
use JMS\Serializer\Annotation as JMS;

class ForecastExceptionType
{
    use HandlesObjectFlags;

    /**
     * @var null|ForecastPurposeCode
     */
    #[JMS\Accessor(getter: 'getForecastPurposeCode', setter: 'setForecastPurposeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastPurposeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastPurposeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $forecastPurposeCode;

    /**
     * @var null|ForecastTypeCode
     */
    #[JMS\Accessor(getter: 'getForecastTypeCode', setter: 'setForecastTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ForecastTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $forecastTypeCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueDate', setter: 'setIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueTime', setter: 'setIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueTime;

    /**
     * @var null|DataSourceCode
     */
    #[JMS\Accessor(getter: 'getDataSourceCode', setter: 'setDataSourceCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DataSourceCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DataSourceCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $dataSourceCode;

    /**
     * @var null|ComparisonDataCode
     */
    #[JMS\Accessor(getter: 'getComparisonDataCode', setter: 'setComparisonDataCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComparisonDataCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ComparisonDataCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $comparisonDataCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getComparisonForecastIssueTime', setter: 'setComparisonForecastIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComparisonForecastIssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $comparisonForecastIssueTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getComparisonForecastIssueDate', setter: 'setComparisonForecastIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComparisonForecastIssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->forecastPurposeCode ??= new ForecastPurposeCode();

        return $this->forecastPurposeCode;
    }

    /**
     * @param  null|ForecastPurposeCode $forecastPurposeCode
     * @return static
     */
    public function setForecastPurposeCode(
        ?ForecastPurposeCode $forecastPurposeCode = null
    ): static {
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
        $this->forecastTypeCode ??= new ForecastTypeCode();

        return $this->forecastTypeCode;
    }

    /**
     * @param  null|ForecastTypeCode $forecastTypeCode
     * @return static
     */
    public function setForecastTypeCode(
        ?ForecastTypeCode $forecastTypeCode = null
    ): static {
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
    public function setIssueDate(
        ?DateTimeInterface $issueDate = null
    ): static {
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
    public function setIssueTime(
        ?DateTimeInterface $issueTime = null
    ): static {
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
        $this->dataSourceCode ??= new DataSourceCode();

        return $this->dataSourceCode;
    }

    /**
     * @param  null|DataSourceCode $dataSourceCode
     * @return static
     */
    public function setDataSourceCode(
        ?DataSourceCode $dataSourceCode = null
    ): static {
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
        $this->comparisonDataCode ??= new ComparisonDataCode();

        return $this->comparisonDataCode;
    }

    /**
     * @param  null|ComparisonDataCode $comparisonDataCode
     * @return static
     */
    public function setComparisonDataCode(
        ?ComparisonDataCode $comparisonDataCode = null
    ): static {
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
    public function setComparisonForecastIssueTime(
        ?DateTimeInterface $comparisonForecastIssueTime = null
    ): static {
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
    public function setComparisonForecastIssueDate(
        ?DateTimeInterface $comparisonForecastIssueDate = null
    ): static {
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
