<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\peppol30invoice;

use DateTime;
use DateTimeZone;
use DOMElement;
use DOMText;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

class InvoiceSuitePeppol30InvoiceSerializerHandler implements SubscribingHandlerInterface
{
    /**
     * @var DateTimeZone
     */
    protected $defaultTimezone;

    /**
     * Constructor
     *
     * @param string $defaultTimezone
     */
    public function __construct(string $defaultTimezone = 'UTC')
    {
        $this->defaultTimezone = new DateTimeZone($defaultTimezone);
    }

    /**
     * Get subscribing methods
     *
     * @return array<int, array{direction: int, format: string, type: string, method: string}>
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\Amount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\BaseAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\PriceAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\LineExtensionAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\TaxExclusiveAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\TaxInclusiveAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\AllowanceTotalAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\ChargeTotalAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\PrepaidAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\PayableRoundingAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\PayableAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\TaxAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\TaxableAmount',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\InvoicedQuantity',
                'method' => 'serializeQuantityType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\ValueQuantity',
                'method' => 'serializeQuantityType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\BaseQuantity',
                'method' => 'serializeQuantityType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\MultiplierFactorNumeric',
                'method' => 'serializePercentType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\ubl\cbc\Percent',
                'method' => 'serializePercentType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date',
                'method' => 'deserializeJsonDate',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date',
                'method' => 'serializeJsonDate',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime',
                'method' => 'deserializeJsonDateTime',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime',
                'method' => 'serializeJsonDateTime',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time',
                'method' => 'deserializeJsonTime',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time',
                'method' => 'serializeJsonTime',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\Jms\Base64Encoded',
                'method' => 'deserializeBase64EncodedFromJson',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\Jms\Base64Encoded',
                'method' => 'serializeBase64EncodedToJson',
            ],
        ];
    }

    /**
     * Serialize Anount type
     * The amounts will be serialized (by default) with a precission of 2 digits
     *
     * @param XmlSerializationVisitor $visitor
     * @param mixed                   $data
     */
    public function serializeAmountType(XmlSerializationVisitor $visitor, $data): DOMText
    {
        $node = $visitor->getDocument()->createTextNode(
            number_format(
                $data->getValue(),
                InvoiceSuiteSettings::getSpecialDecimalPlacesMap($visitor->getCurrentNode()->getNodePath(), InvoiceSuiteSettings::getAmountDecimals()),
                InvoiceSuiteSettings::getDecimalSeparator(),
                InvoiceSuiteSettings::getThousandsSeparator()
            )
        );

        if ($data->getCurrencyID() != null) {
            $attr = $visitor->getDocument()->createAttribute('currencyID');
            $attr->value = $data->getCurrencyID();
            $visitor->getCurrentNode()->appendChild($attr);
        }

        return $node;
    }

    /**
     * Serialize quantity type
     * The quantity will be serialized (by default) with a precission of 2 digits
     *
     * @param XmlSerializationVisitor $visitor
     * @param mixed                   $data
     */
    public function serializeQuantityType(XmlSerializationVisitor $visitor, $data): DOMText
    {
        $node = $visitor->getDocument()->createTextNode(
            number_format(
                $data->getValue(),
                InvoiceSuiteSettings::getSpecialDecimalPlacesMap($visitor->getCurrentNode()->getNodePath(), InvoiceSuiteSettings::getQuantityDecimals()),
                InvoiceSuiteSettings::getDecimalSeparator(),
                InvoiceSuiteSettings::getThousandsSeparator()
            )
        );

        if ($data->getUnitCode() != null) {
            $attr = $visitor->getDocument()->createAttribute('unitCode');
            $attr->value = $data->getUnitCode();
            $visitor->getCurrentNode()->appendChild($attr);
        }

        return $node;
    }

    /**
     * Serialize a percantage value
     * The value will be serialized (by default) with a precission of 2 digits
     *
     * @param XmlSerializationVisitor $visitor
     * @param mixed                   $data
     */
    public function serializePercentType(XmlSerializationVisitor $visitor, $data): DOMText
    {
        return $visitor->getDocument()->createTextNode(
            number_format(
                $data->getValue(),
                InvoiceSuiteSettings::getSpecialDecimalPlacesMap($visitor->getCurrentNode()->getNodePath(), InvoiceSuiteSettings::getPercentDecimals()),
                InvoiceSuiteSettings::getDecimalSeparator(),
                InvoiceSuiteSettings::getThousandsSeparator()
            )
        );
    }

    /**
     * Serialize a meassure value
     * The value will be serialized (by default) with a precission of 2 digits
     *
     * @param XmlSerializationVisitor $visitor
     * @param mixed                   $data
     */
    public function serializeMeasureType(XmlSerializationVisitor $visitor, $data): DOMText
    {
        $node = $visitor->getDocument()->createTextNode(
            number_format(
                $data->getValue(),
                InvoiceSuiteSettings::getSpecialDecimalPlacesMap($visitor->getCurrentNode()->getNodePath(), InvoiceSuiteSettings::getMeasureDecimals()),
                InvoiceSuiteSettings::getDecimalSeparator(),
                InvoiceSuiteSettings::getThousandsSeparator()
            )
        );

        if ($data->getUnitCode() != null) {
            $attr = $visitor->getDocument()->createAttribute('unitCode');
            $attr->value = $data->getUnitCode();
            $visitor->getCurrentNode()->appendChild($attr);
        }

        return $node;
    }

    /**
     * Serialize a inditcator
     * False and true values will be serialized correctly (false won't be serialized
     * in the default implementation)
     *
     * @param XmlSerializationVisitor $visitor
     * @param mixed                   $data
     */
    public function serializeIndicatorType(XmlSerializationVisitor $visitor, $data): DOMElement
    {
        return $visitor->getDocument()->createElement('udt:Indicator', $data->getIndicator() == false ? 'false' : 'true');
    }

    /**
     * Deserialize JSON date
     *
     * @param  JsonDeserializationVisitor $visitor
     * @param  null|string                $data
     * @return null|DateTime
     */
    public function deserializeJsonDate(JsonDeserializationVisitor $visitor, $data): ?DateTime
    {
        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($data) ? null : new DateTime((string) $data, $this->defaultTimezone);
    }

    /**
     * Serialze JSON date
     *
     * @param  JsonSerializationVisitor $visitor
     * @param  DateTime                 $date
     * @param  array<mixed,mixed>       $type
     * @return string
     */
    public function serializeJsonDate(JsonSerializationVisitor $visitor, DateTime $date, array $type): string
    {
        return $visitor->visitString($date->format('Y-m-d'), $type);
    }

    /**
     * Deserialze JSON Date/Time
     *
     * @param  JsonDeserializationVisitor $visitor
     * @param  null|string                $data
     * @return null|DateTime
     */
    public function deserializeJsonDateTime(JsonDeserializationVisitor $visitor, $data): ?DateTime
    {
        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($data) ? null : new DateTime((string) $data, $this->defaultTimezone);
    }

    /**
     * Serialze JSON Date/Time
     *
     * @param  JsonSerializationVisitor $visitor
     * @param  DateTime                 $date
     * @param  array<mixed,mixed>       $type
     * @return string
     */
    public function serializeJsonDateTime(JsonSerializationVisitor $visitor, DateTime $date, array $type): string
    {
        return $visitor->visitString($date->format(DateTime::ATOM), $type);
    }

    /**
     * Deserialize JSON time
     *
     * @param  JsonDeserializationVisitor $visitor
     * @param  null|string                $data
     * @return null|DateTime
     */
    public function deserializeJsonTime(JsonDeserializationVisitor $visitor, $data): ?DateTime
    {
        return InvoiceSuiteStringUtils::stringIsNullOrEmpty($data) ? null : new DateTime($data, $this->defaultTimezone);
    }

    /**
     * Serialize JSON time
     *
     * @param  JsonSerializationVisitor $visitor
     * @param  DateTime                 $date
     * @param  array<mixed,mixed>       $type
     * @return string
     */
    public function serializeJsonTime(JsonSerializationVisitor $visitor, DateTime $date, array $type): string
    {
        $formattedDate = $date->format('H:i:s');

        if ($date->getTimezone()->getOffset($date) !== $this->defaultTimezone->getOffset($date)) {
            $formattedDate .= $date->format('P');
        }

        return $visitor->visitString($formattedDate, $type);
    }

    /**
     * Deserialize JSON BASE64
     *
     * @param  JsonDeserializationVisitor $visitor
     * @param  null|string                $data
     * @return null|string
     */
    public function deserializeBase64EncodedFromJson(JsonDeserializationVisitor $visitor, $data): ?string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($data)) {
            return null;
        }

        $decodedBase64 = base64_decode((string) $data, true);

        if ($decodedBase64 === false) {
            return null;
        }

        return $decodedBase64;
    }

    /**
     * Serialize JSON BASE64
     *
     * @param  JsonSerializationVisitor $visitor
     * @param  mixed                    $data
     * @param  array<mixed,mixed>       $type
     * @return string
     */
    public function serializeBase64EncodedToJson(JsonSerializationVisitor $visitor, $data, array $type): string
    {
        return $visitor->visitString(base64_encode((string) $data), $type);
    }
}
