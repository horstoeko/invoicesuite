<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\fatturapa;

use DateTimeInterface;
use DOMNode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

class InvoiceSuiteFatturaPaSerializerHandler implements SubscribingHandlerInterface
{
    /**
     * Get subscribing methods
     *
     * @return array<int, array{direction: 1|2, format: string, type: string, method: string}>
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'fatturapa_decimal',
                'method' => 'serializeDecimalToXml',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'fatturapa_decimal',
                'method' => 'deserializeDecimalFromXml',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'fatturapa_int',
                'method' => 'serializeIntToXml',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'fatturapa_int',
                'method' => 'deserializeIntFromXml',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date',
                'method' => 'serializeDateToXml',
            ],
        ];
    }

    /**
     * @param  XmlSerializationVisitor      $visitor
     * @param  null|float                   $data
     * @param  array<string,array<int,int>> $type
     * @param  Context                      $context
     * @return null|DOMNode
     */
    public function serializeDecimalToXml(
        XmlSerializationVisitor $visitor,
        ?float $data,
        array $type,
        Context $context
    ): ?DOMNode {
        if (null === $data) {
            return null;
        }

        [$minScale, $maxScale] = $this->readScaleParams($type);

        $formatted = InvoiceSuiteStringUtils::numberFormat($data, $maxScale, '.', '');

        if ($minScale < $maxScale) {
            [$integerPart, $decimalPart] = InvoiceSuiteStringUtils::explode('.', $formatted, 2);
            $decimalPart = rtrim($decimalPart, '0');
            $decimalPart = str_pad($decimalPart, $minScale, '0');
            $formatted = '' === $decimalPart ? $integerPart : $integerPart . '.' . $decimalPart;
        }

        return $visitor->getDocument()->createTextNode($formatted);
    }

    /**
     * @param  XmlDeserializationVisitor    $visitor
     * @param  mixed                        $data
     * @param  array<string,array<int,int>> $type
     * @param  Context                      $context
     * @return null|float
     */
    public function deserializeDecimalFromXml(
        XmlDeserializationVisitor $visitor,
        $data,
        array $type,
        Context $context
    ): ?float {
        $s = $this->scalarToString($data);

        if ('' === $s) {
            return null;
        }

        $s = InvoiceSuiteStringUtils::replace(',', '.', $s);

        return (float) $s;
    }

    /**
     * @param  XmlSerializationVisitor $visitor
     * @param  null|int                $data
     * @param  array<int,int>          $type
     * @param  Context                 $context
     * @return null|DOMNode
     */
    public function serializeIntToXml(
        XmlSerializationVisitor $visitor,
        ?int $data,
        array $type,
        Context $context
    ): ?DOMNode {
        if (null === $data) {
            return null;
        }

        return $visitor->getDocument()->createTextNode((string) $data);
    }

    /**
     * @param  XmlDeserializationVisitor $visitor
     * @param  mixed                     $data
     * @param  array<int,int>            $type
     * @param  Context                   $context
     * @return null|int
     */
    public function deserializeIntFromXml(
        XmlDeserializationVisitor $visitor,
        $data,
        array $type,
        Context $context
    ): ?int {
        $s = $this->scalarToString($data);

        if ('' === $s) {
            return null;
        }

        return (int) $s;
    }

    /**
     * Serialize an XML Schema date from any DateTimeInterface implementation.
     *
     * @param  XmlSerializationVisitor $visitor
     * @param  DateTimeInterface       $data
     * @param  array<string,mixed>     $type
     * @param  Context                 $context
     * @return DOMNode
     */
    public function serializeDateToXml(
        XmlSerializationVisitor $visitor,
        DateTimeInterface $data,
        array $type,
        Context $context
    ): DOMNode {
        return $visitor->getDocument()->createTextNode($data->format('Y-m-d'));
    }

    /**
     * @param  array<string,array<int,int>> $type
     * @return array<int,int>
     */
    private function readScaleParams(
        array $type
    ): array {
        $params = $type['params'] ?? [];

        if (InvoiceSuiteArrayUtils::empty($params)) {
            return [0, 8];
        }

        if (1 === InvoiceSuiteArrayUtils::count($params)) {
            $s = $params[0];

            return [$s, $s];
        }

        return [(int) $params[0], (int) $params[1]];
    }

    /**
     * @param  mixed  $data
     * @return string
     */
    private function scalarToString(
        $data
    ): string {
        if (null === $data) {
            return '';
        }

        return InvoiceSuiteStringUtils::trim((string) $data);
    }
}
