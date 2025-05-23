<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess;
use horstoeko\invoicesuite\models\ubl\cbc\ValidateTool;
use horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion;
use horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode;
use horstoeko\invoicesuite\models\ubl\cbc\ValidatorID;

class ResultOfVerificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValidatorID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValidatorID")
     * @JMS\Expose
     * @JMS\SerializedName("ValidatorID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidatorID", setter="setValidatorID")
     */
    private $validatorID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode")
     * @JMS\Expose
     * @JMS\SerializedName("ValidationResultCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidationResultCode", setter="setValidationResultCode")
     */
    private $validationResultCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ValidationDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidationDate", setter="setValidationDate")
     */
    private $validationDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ValidationTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidationTime", setter="setValidationTime")
     */
    private $validationTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess")
     * @JMS\Expose
     * @JMS\SerializedName("ValidateProcess")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidateProcess", setter="setValidateProcess")
     */
    private $validateProcess;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValidateTool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValidateTool")
     * @JMS\Expose
     * @JMS\SerializedName("ValidateTool")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidateTool", setter="setValidateTool")
     */
    private $validateTool;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion")
     * @JMS\Expose
     * @JMS\SerializedName("ValidateToolVersion")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidateToolVersion", setter="setValidateToolVersion")
     */
    private $validateToolVersion;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SignatoryParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SignatoryParty")
     * @JMS\Expose
     * @JMS\SerializedName("SignatoryParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSignatoryParty", setter="setSignatoryParty")
     */
    private $signatoryParty;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidatorID|null
     */
    public function getValidatorID(): ?ValidatorID
    {
        return $this->validatorID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidatorID
     */
    public function getValidatorIDWithCreate(): ValidatorID
    {
        $this->validatorID = is_null($this->validatorID) ? new ValidatorID() : $this->validatorID;

        return $this->validatorID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValidatorID|null $validatorID
     * @return self
     */
    public function setValidatorID(?ValidatorID $validatorID = null): self
    {
        $this->validatorID = $validatorID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode|null
     */
    public function getValidationResultCode(): ?ValidationResultCode
    {
        return $this->validationResultCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode
     */
    public function getValidationResultCodeWithCreate(): ValidationResultCode
    {
        $this->validationResultCode = is_null($this->validationResultCode) ? new ValidationResultCode() : $this->validationResultCode;

        return $this->validationResultCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValidationResultCode|null $validationResultCode
     * @return self
     */
    public function setValidationResultCode(?ValidationResultCode $validationResultCode = null): self
    {
        $this->validationResultCode = $validationResultCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getValidationDate(): ?\DateTimeInterface
    {
        return $this->validationDate;
    }

    /**
     * @param \DateTimeInterface|null $validationDate
     * @return self
     */
    public function setValidationDate(?\DateTimeInterface $validationDate = null): self
    {
        $this->validationDate = $validationDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getValidationTime(): ?\DateTimeInterface
    {
        return $this->validationTime;
    }

    /**
     * @param \DateTimeInterface|null $validationTime
     * @return self
     */
    public function setValidationTime(?\DateTimeInterface $validationTime = null): self
    {
        $this->validationTime = $validationTime;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess|null
     */
    public function getValidateProcess(): ?ValidateProcess
    {
        return $this->validateProcess;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess
     */
    public function getValidateProcessWithCreate(): ValidateProcess
    {
        $this->validateProcess = is_null($this->validateProcess) ? new ValidateProcess() : $this->validateProcess;

        return $this->validateProcess;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValidateProcess|null $validateProcess
     * @return self
     */
    public function setValidateProcess(?ValidateProcess $validateProcess = null): self
    {
        $this->validateProcess = $validateProcess;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateTool|null
     */
    public function getValidateTool(): ?ValidateTool
    {
        return $this->validateTool;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateTool
     */
    public function getValidateToolWithCreate(): ValidateTool
    {
        $this->validateTool = is_null($this->validateTool) ? new ValidateTool() : $this->validateTool;

        return $this->validateTool;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValidateTool|null $validateTool
     * @return self
     */
    public function setValidateTool(?ValidateTool $validateTool = null): self
    {
        $this->validateTool = $validateTool;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion|null
     */
    public function getValidateToolVersion(): ?ValidateToolVersion
    {
        return $this->validateToolVersion;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion
     */
    public function getValidateToolVersionWithCreate(): ValidateToolVersion
    {
        $this->validateToolVersion = is_null($this->validateToolVersion) ? new ValidateToolVersion() : $this->validateToolVersion;

        return $this->validateToolVersion;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ValidateToolVersion|null $validateToolVersion
     * @return self
     */
    public function setValidateToolVersion(?ValidateToolVersion $validateToolVersion = null): self
    {
        $this->validateToolVersion = $validateToolVersion;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SignatoryParty|null
     */
    public function getSignatoryParty(): ?SignatoryParty
    {
        return $this->signatoryParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SignatoryParty
     */
    public function getSignatoryPartyWithCreate(): SignatoryParty
    {
        $this->signatoryParty = is_null($this->signatoryParty) ? new SignatoryParty() : $this->signatoryParty;

        return $this->signatoryParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SignatoryParty|null $signatoryParty
     * @return self
     */
    public function setSignatoryParty(?SignatoryParty $signatoryParty = null): self
    {
        $this->signatoryParty = $signatoryParty;

        return $this;
    }
}
