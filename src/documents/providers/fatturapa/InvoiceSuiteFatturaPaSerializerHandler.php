<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\fatturapa;

use DOMNode;
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
     * @return array<int, array{direction: int, format: string, type: string, method: string}>
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

        $scale = ($minScale === $maxScale) ? $minScale : $minScale;

        $formatted = number_format($data, $scale, '.', '');

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

        $s = str_replace(',', '.', $s);

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
     * @param  array<string,array<int,int>> $type
     * @return array<int,int>
     */
    private function readScaleParams(
        array $type
    ): array {
        $params = $type['params'] ?? [];

        if ([] === $params) {
            return [0, 8];
        }

        if (1 === count($params)) {
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

        return trim((string) $data);
    }
}
