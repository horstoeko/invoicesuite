<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ComparisonDataSourceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\DataSourceCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastPurposeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ForecastTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\TimeDeltaDaysQuantity;
use JMS\Serializer\Annotation as JMS;

class ForecastExceptionCriterionLineType
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
     * @var null|ComparisonDataSourceCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ComparisonDataSourceCode")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonDataSourceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonDataSourceCode", setter="setComparisonDataSourceCode")
     */
    private $comparisonDataSourceCode;

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
     * @var null|TimeDeltaDaysQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\TimeDeltaDaysQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TimeDeltaDaysQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimeDeltaDaysQuantity", setter="setTimeDeltaDaysQuantity")
     */
    private $timeDeltaDaysQuantity;

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
     * @return null|ComparisonDataSourceCode
     */
    public function getComparisonDataSourceCode(): ?ComparisonDataSourceCode
    {
        return $this->comparisonDataSourceCode;
    }

    /**
     * @return ComparisonDataSourceCode
     */
    public function getComparisonDataSourceCodeWithCreate(): ComparisonDataSourceCode
    {
        $this->comparisonDataSourceCode = is_null($this->comparisonDataSourceCode) ? new ComparisonDataSourceCode() : $this->comparisonDataSourceCode;

        return $this->comparisonDataSourceCode;
    }

    /**
     * @param  null|ComparisonDataSourceCode $comparisonDataSourceCode
     * @return static
     */
    public function setComparisonDataSourceCode(?ComparisonDataSourceCode $comparisonDataSourceCode = null): static
    {
        $this->comparisonDataSourceCode = $comparisonDataSourceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComparisonDataSourceCode(): static
    {
        $this->comparisonDataSourceCode = null;

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
     * @return null|TimeDeltaDaysQuantity
     */
    public function getTimeDeltaDaysQuantity(): ?TimeDeltaDaysQuantity
    {
        return $this->timeDeltaDaysQuantity;
    }

    /**
     * @return TimeDeltaDaysQuantity
     */
    public function getTimeDeltaDaysQuantityWithCreate(): TimeDeltaDaysQuantity
    {
        $this->timeDeltaDaysQuantity = is_null($this->timeDeltaDaysQuantity) ? new TimeDeltaDaysQuantity() : $this->timeDeltaDaysQuantity;

        return $this->timeDeltaDaysQuantity;
    }

    /**
     * @param  null|TimeDeltaDaysQuantity $timeDeltaDaysQuantity
     * @return static
     */
    public function setTimeDeltaDaysQuantity(?TimeDeltaDaysQuantity $timeDeltaDaysQuantity = null): static
    {
        $this->timeDeltaDaysQuantity = $timeDeltaDaysQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTimeDeltaDaysQuantity(): static
    {
        $this->timeDeltaDaysQuantity = null;

        return $this;
    }
}
