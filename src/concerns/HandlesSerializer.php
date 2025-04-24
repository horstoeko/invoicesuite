<?php

namespace horstoeko\invoicesuite\concerns;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\Exception\InvalidArgumentException;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProvider;

/**
 * Trait representing methods for handling the serializer/deserializer
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
trait HandlesSerializer
{
    /**
     * @var SerializerBuilder $serializerBuilder Serializer builder
     */
    protected $serializerBuilder;

    /**
     * @var SerializerInterface $serializer Serializer
     */
    protected $serializer;

    /**
     * Build the serializer by a format provider
     *
     * @param InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function initSerializerByFormatProvider(InvoiceSuiteAbstractFormatProvider $invoiceSuiteAbstractFormatProvider): void
    {
        $this->serializerBuilder = SerializerBuilder::create();

        $this->serializerBuilder->addMetadataDirs($invoiceSuiteAbstractFormatProvider->getMetadataDirectories());

        $this->serializerBuilder->addDefaultListeners();
        $this->serializerBuilder->addDefaultHandlers();

        $this->serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry) use ($invoiceSuiteAbstractFormatProvider): void {
            foreach ($invoiceSuiteAbstractFormatProvider->getHandlers() as $handlerClassname) {
                $handlerRegistry->registerSubscribingHandler(new $handlerClassname());
            }
        });

        $this->serializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher) use ($invoiceSuiteAbstractFormatProvider): void {
            foreach ($invoiceSuiteAbstractFormatProvider->getListeners() as $event => $callback) {
                $eventDispatcher->addListener($event, $callback);
            }
        });

        $this->serializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher) use ($invoiceSuiteAbstractFormatProvider): void {
            foreach ($invoiceSuiteAbstractFormatProvider->getSubscribers() as $subscriberClassname) {
                $eventDispatcher->addSubscriber(new $subscriberClassname());
            }
        });

        $this->serializer = $this->serializerBuilder->build();
    }
}
