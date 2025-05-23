<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode;
use horstoeko\invoicesuite\models\ubl\cbc\DataSourceCode;
use horstoeko\invoicesuite\models\ubl\cbc\ForecastPurposeCode;
use horstoeko\invoicesuite\models\ubl\cbc\ForecastTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity;

class ForecastExceptionCriterionLineType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode")
     * @JMS\Expose
     * @JMS\SerializedName("ComparisonDataSourceCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getComparisonDataSourceCode", setter="setComparisonDataSourceCode")
     */
    private $comparisonDataSourceCode;

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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("TimeDeltaDaysQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTimeDeltaDaysQuantity", setter="setTimeDeltaDaysQuantity")
     */
    private $timeDeltaDaysQuantity;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode|null
     */
    public function getComparisonDataSourceCode(): ?ComparisonDataSourceCode
    {
        return $this->comparisonDataSourceCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode
     */
    public function getComparisonDataSourceCodeWithCreate(): ComparisonDataSourceCode
    {
        $this->comparisonDataSourceCode = is_null($this->comparisonDataSourceCode) ? new ComparisonDataSourceCode() : $this->comparisonDataSourceCode;

        return $this->comparisonDataSourceCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ComparisonDataSourceCode|null $comparisonDataSourceCode
     * @return self
     */
    public function setComparisonDataSourceCode(?ComparisonDataSourceCode $comparisonDataSourceCode = null): self
    {
        $this->comparisonDataSourceCode = $comparisonDataSourceCode;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity|null
     */
    public function getTimeDeltaDaysQuantity(): ?TimeDeltaDaysQuantity
    {
        return $this->timeDeltaDaysQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity
     */
    public function getTimeDeltaDaysQuantityWithCreate(): TimeDeltaDaysQuantity
    {
        $this->timeDeltaDaysQuantity = is_null($this->timeDeltaDaysQuantity) ? new TimeDeltaDaysQuantity() : $this->timeDeltaDaysQuantity;

        return $this->timeDeltaDaysQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TimeDeltaDaysQuantity|null $timeDeltaDaysQuantity
     * @return self
     */
    public function setTimeDeltaDaysQuantity(?TimeDeltaDaysQuantity $timeDeltaDaysQuantity = null): self
    {
        $this->timeDeltaDaysQuantity = $timeDeltaDaysQuantity;

        return $this;
    }
}
