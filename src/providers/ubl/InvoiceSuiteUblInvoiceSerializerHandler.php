<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\providers\ubl;

use DOMElement;
use DOMText;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlSerializationVisitor;

class InvoiceSuiteUblInvoiceSerializerHandler implements SubscribingHandlerInterface
{
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
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\Amount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\BaseAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\PriceAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\LineExtensionAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\TaxExclusiveAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\TaxInclusiveAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\AllowanceTotalAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\ChargeTotalAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\PrepaidAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\PayableRoundingAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\PayableAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\TaxAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\TaxableAmount',
                'method' => 'serializeAmountType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\InvoicedQuantity',
                'method' => 'serializeQuantityType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\ValueQuantity',
                'method' => 'serializeQuantityType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\BaseQuantity',
                'method' => 'serializeQuantityType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\MultiplierFactorNumeric',
                'method' => 'serializePercentType'
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\models\ubl\cbc\Percent',
                'method' => 'serializePercentType'
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
            $attr = $visitor->getDocument()->createAttribute("currencyID");
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
            $attr = $visitor->getDocument()->createAttribute("unitCode");
            $attr->value = $data->getUnitCode();
            $visitor->getCurrentNode()->appendChild($attr);
        }

        return $node;
    }

    /**
     * Serialize a percantage value
     * The valze will be serialized (by default) with a precission of 2 digits
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
     * The valze will be serialized (by default) with a precission of 2 digits
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
            $attr = $visitor->getDocument()->createAttribute("unitCode");
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
}
