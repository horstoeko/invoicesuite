<?php

namespace horstoeko\invoicesuite\concerns;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Exception\InvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

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
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function createAndInitSerializerByFormatProvider(): void
    {
        $this->serializerBuilder = SerializerBuilder::create();

        $this->serializerBuilder->addMetadataDirs($this->getCurrentFormatProvider()->getSerializerMetadataDirectories());
        $this->serializerBuilder->addDefaultListeners();
        $this->serializerBuilder->addDefaultHandlers();

        if (InvoiceSuiteSettings::hasSerializerCacheDirectory()) {
            $this->serializerBuilder->setCacheDir(InvoiceSuiteSettings::getSerializerCacheDirectory());
        } else {
            $this->serializerBuilder->setCacheDir(sys_get_temp_dir() . "\jms");
        }

        $this->serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry): void {
            $handlerRegistry->registerSubscribingHandler(new BaseTypesHandler());
            $handlerRegistry->registerSubscribingHandler(new XmlSchemaDateHandler());
            foreach ($this->getCurrentFormatProvider()->getSerializerHandlers() as $handlerClassname) {
                $handlerRegistry->registerSubscribingHandler(new $handlerClassname());
            }
        });

        $this->serializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher): void {
            foreach ($this->getCurrentFormatProvider()->getSerializerListeners() as $event => $callback) {
                $eventDispatcher->addListener($event, $callback);
            }
        });

        $this->serializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher): void {
            foreach ($this->getCurrentFormatProvider()->getSerializerSubscribers() as $subscriberClassname) {
                $eventDispatcher->addSubscriber(new $subscriberClassname());
            }
        });

        $this->serializer = $this->serializerBuilder->build();
    }
}
