<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AltitudeMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CoordinateSystemCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeDegreesMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeDirectionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeMinutesMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeDegreesMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeDirectionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeMinutesMeasure;
use JMS\Serializer\Annotation as JMS;

class LocationCoordinateType
{
    use HandlesObjectFlags;

    /**
     * @var null|CoordinateSystemCode
     */
    #[JMS\Accessor(getter: 'getCoordinateSystemCode', setter: 'setCoordinateSystemCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CoordinateSystemCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CoordinateSystemCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $coordinateSystemCode;

    /**
     * @var null|LatitudeDegreesMeasure
     */
    #[JMS\Accessor(getter: 'getLatitudeDegreesMeasure', setter: 'setLatitudeDegreesMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatitudeDegreesMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeDegreesMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latitudeDegreesMeasure;

    /**
     * @var null|LatitudeMinutesMeasure
     */
    #[JMS\Accessor(getter: 'getLatitudeMinutesMeasure', setter: 'setLatitudeMinutesMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatitudeMinutesMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeMinutesMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latitudeMinutesMeasure;

    /**
     * @var null|LatitudeDirectionCode
     */
    #[JMS\Accessor(getter: 'getLatitudeDirectionCode', setter: 'setLatitudeDirectionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatitudeDirectionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatitudeDirectionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latitudeDirectionCode;

    /**
     * @var null|LongitudeDegreesMeasure
     */
    #[JMS\Accessor(getter: 'getLongitudeDegreesMeasure', setter: 'setLongitudeDegreesMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LongitudeDegreesMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeDegreesMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $longitudeDegreesMeasure;

    /**
     * @var null|LongitudeMinutesMeasure
     */
    #[JMS\Accessor(getter: 'getLongitudeMinutesMeasure', setter: 'setLongitudeMinutesMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LongitudeMinutesMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeMinutesMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $longitudeMinutesMeasure;

    /**
     * @var null|LongitudeDirectionCode
     */
    #[JMS\Accessor(getter: 'getLongitudeDirectionCode', setter: 'setLongitudeDirectionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LongitudeDirectionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LongitudeDirectionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $longitudeDirectionCode;

    /**
     * @var null|AltitudeMeasure
     */
    #[JMS\Accessor(getter: 'getAltitudeMeasure', setter: 'setAltitudeMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AltitudeMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AltitudeMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $altitudeMeasure;

    /**
     * @return null|CoordinateSystemCode
     */
    public function getCoordinateSystemCode(): ?CoordinateSystemCode
    {
        return $this->coordinateSystemCode;
    }

    /**
     * @return CoordinateSystemCode
     */
    public function getCoordinateSystemCodeWithCreate(): CoordinateSystemCode
    {
        $this->coordinateSystemCode ??= new CoordinateSystemCode();

        return $this->coordinateSystemCode;
    }

    /**
     * @param  null|CoordinateSystemCode $coordinateSystemCode
     * @return static
     */
    public function setCoordinateSystemCode(
        ?CoordinateSystemCode $coordinateSystemCode = null
    ): static {
        $this->coordinateSystemCode = $coordinateSystemCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCoordinateSystemCode(): static
    {
        $this->coordinateSystemCode = null;

        return $this;
    }

    /**
     * @return null|LatitudeDegreesMeasure
     */
    public function getLatitudeDegreesMeasure(): ?LatitudeDegreesMeasure
    {
        return $this->latitudeDegreesMeasure;
    }

    /**
     * @return LatitudeDegreesMeasure
     */
    public function getLatitudeDegreesMeasureWithCreate(): LatitudeDegreesMeasure
    {
        $this->latitudeDegreesMeasure ??= new LatitudeDegreesMeasure();

        return $this->latitudeDegreesMeasure;
    }

    /**
     * @param  null|LatitudeDegreesMeasure $latitudeDegreesMeasure
     * @return static
     */
    public function setLatitudeDegreesMeasure(
        ?LatitudeDegreesMeasure $latitudeDegreesMeasure = null
    ): static {
        $this->latitudeDegreesMeasure = $latitudeDegreesMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatitudeDegreesMeasure(): static
    {
        $this->latitudeDegreesMeasure = null;

        return $this;
    }

    /**
     * @return null|LatitudeMinutesMeasure
     */
    public function getLatitudeMinutesMeasure(): ?LatitudeMinutesMeasure
    {
        return $this->latitudeMinutesMeasure;
    }

    /**
     * @return LatitudeMinutesMeasure
     */
    public function getLatitudeMinutesMeasureWithCreate(): LatitudeMinutesMeasure
    {
        $this->latitudeMinutesMeasure ??= new LatitudeMinutesMeasure();

        return $this->latitudeMinutesMeasure;
    }

    /**
     * @param  null|LatitudeMinutesMeasure $latitudeMinutesMeasure
     * @return static
     */
    public function setLatitudeMinutesMeasure(
        ?LatitudeMinutesMeasure $latitudeMinutesMeasure = null
    ): static {
        $this->latitudeMinutesMeasure = $latitudeMinutesMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatitudeMinutesMeasure(): static
    {
        $this->latitudeMinutesMeasure = null;

        return $this;
    }

    /**
     * @return null|LatitudeDirectionCode
     */
    public function getLatitudeDirectionCode(): ?LatitudeDirectionCode
    {
        return $this->latitudeDirectionCode;
    }

    /**
     * @return LatitudeDirectionCode
     */
    public function getLatitudeDirectionCodeWithCreate(): LatitudeDirectionCode
    {
        $this->latitudeDirectionCode ??= new LatitudeDirectionCode();

        return $this->latitudeDirectionCode;
    }

    /**
     * @param  null|LatitudeDirectionCode $latitudeDirectionCode
     * @return static
     */
    public function setLatitudeDirectionCode(
        ?LatitudeDirectionCode $latitudeDirectionCode = null
    ): static {
        $this->latitudeDirectionCode = $latitudeDirectionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatitudeDirectionCode(): static
    {
        $this->latitudeDirectionCode = null;

        return $this;
    }

    /**
     * @return null|LongitudeDegreesMeasure
     */
    public function getLongitudeDegreesMeasure(): ?LongitudeDegreesMeasure
    {
        return $this->longitudeDegreesMeasure;
    }

    /**
     * @return LongitudeDegreesMeasure
     */
    public function getLongitudeDegreesMeasureWithCreate(): LongitudeDegreesMeasure
    {
        $this->longitudeDegreesMeasure ??= new LongitudeDegreesMeasure();

        return $this->longitudeDegreesMeasure;
    }

    /**
     * @param  null|LongitudeDegreesMeasure $longitudeDegreesMeasure
     * @return static
     */
    public function setLongitudeDegreesMeasure(
        ?LongitudeDegreesMeasure $longitudeDegreesMeasure = null
    ): static {
        $this->longitudeDegreesMeasure = $longitudeDegreesMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLongitudeDegreesMeasure(): static
    {
        $this->longitudeDegreesMeasure = null;

        return $this;
    }

    /**
     * @return null|LongitudeMinutesMeasure
     */
    public function getLongitudeMinutesMeasure(): ?LongitudeMinutesMeasure
    {
        return $this->longitudeMinutesMeasure;
    }

    /**
     * @return LongitudeMinutesMeasure
     */
    public function getLongitudeMinutesMeasureWithCreate(): LongitudeMinutesMeasure
    {
        $this->longitudeMinutesMeasure ??= new LongitudeMinutesMeasure();

        return $this->longitudeMinutesMeasure;
    }

    /**
     * @param  null|LongitudeMinutesMeasure $longitudeMinutesMeasure
     * @return static
     */
    public function setLongitudeMinutesMeasure(
        ?LongitudeMinutesMeasure $longitudeMinutesMeasure = null
    ): static {
        $this->longitudeMinutesMeasure = $longitudeMinutesMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLongitudeMinutesMeasure(): static
    {
        $this->longitudeMinutesMeasure = null;

        return $this;
    }

    /**
     * @return null|LongitudeDirectionCode
     */
    public function getLongitudeDirectionCode(): ?LongitudeDirectionCode
    {
        return $this->longitudeDirectionCode;
    }

    /**
     * @return LongitudeDirectionCode
     */
    public function getLongitudeDirectionCodeWithCreate(): LongitudeDirectionCode
    {
        $this->longitudeDirectionCode ??= new LongitudeDirectionCode();

        return $this->longitudeDirectionCode;
    }

    /**
     * @param  null|LongitudeDirectionCode $longitudeDirectionCode
     * @return static
     */
    public function setLongitudeDirectionCode(
        ?LongitudeDirectionCode $longitudeDirectionCode = null
    ): static {
        $this->longitudeDirectionCode = $longitudeDirectionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLongitudeDirectionCode(): static
    {
        $this->longitudeDirectionCode = null;

        return $this;
    }

    /**
     * @return null|AltitudeMeasure
     */
    public function getAltitudeMeasure(): ?AltitudeMeasure
    {
        return $this->altitudeMeasure;
    }

    /**
     * @return AltitudeMeasure
     */
    public function getAltitudeMeasureWithCreate(): AltitudeMeasure
    {
        $this->altitudeMeasure ??= new AltitudeMeasure();

        return $this->altitudeMeasure;
    }

    /**
     * @param  null|AltitudeMeasure $altitudeMeasure
     * @return static
     */
    public function setAltitudeMeasure(
        ?AltitudeMeasure $altitudeMeasure = null
    ): static {
        $this->altitudeMeasure = $altitudeMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAltitudeMeasure(): static
    {
        $this->altitudeMeasure = null;

        return $this;
    }
}
