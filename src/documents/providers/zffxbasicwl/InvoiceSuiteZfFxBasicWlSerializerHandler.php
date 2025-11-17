<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffxbasicwl;

use DOMElement;
use DOMText;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlSerializationVisitor;

class InvoiceSuiteZfFxBasicWlSerializerHandler implements SubscribingHandlerInterface
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
                'type' => 'horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\AmountType',
                'method' => 'serializeAmountType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\PercentType',
                'method' => 'serializePercentType',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'horstoeko\invoicesuite\documents\models\zffxbasicwl\udt\IndicatorType',
                'method' => 'serializeIndicatorType',
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
