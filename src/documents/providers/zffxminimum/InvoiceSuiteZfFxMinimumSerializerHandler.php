<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffxminimum;

use DOMText;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlSerializationVisitor;

class InvoiceSuiteZfFxMinimumSerializerHandler implements SubscribingHandlerInterface
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
                'type' => 'horstoeko\invoicesuite\documents\models\zffxminimum\udt\AmountType',
                'method' => 'serializeAmountType',
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
}
