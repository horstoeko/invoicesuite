<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\concerns;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use horstoeko\invoicesuite\utils\InvoiceSuiteCacheUtils;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\EnumHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Trait representing methods for handling the serializer/deserializer
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
trait HandlesDocumentSerializer
{
    /**
     * @var SerializerBuilder Serializer builder
     */
    protected $documentSerializerBuilder;

    /**
     * @var SerializerInterface Serializer
     */
    protected $documentSerializer;

    /**
     * Build the serializer by a format provider
     *
     * @return void
     */
    public function createAndInitDocumentSerializerByFormatProvider(): void
    {
        $this->documentSerializerBuilder = SerializerBuilder::create();

        $this->documentSerializerBuilder->addMetadataDirs($this->getCurrentDocumentFormatProvider()->getSerializerMetadataDirectories());
        $this->documentSerializerBuilder->addDefaultListeners();
        $this->documentSerializerBuilder->addDefaultHandlers();
        $this->documentSerializerBuilder->enableEnumSupport();
        $this->documentSerializerBuilder->setCacheDir(InvoiceSuiteCacheUtils::getSerializerCacheDirectory());

        $this->documentSerializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry): void {
            $handlerRegistry->registerSubscribingHandler(new BaseTypesHandler());
            $handlerRegistry->registerSubscribingHandler(new XmlSchemaDateHandler());
            $handlerRegistry->registerSubscribingHandler(new EnumHandler());
            foreach ($this->getCurrentDocumentFormatProvider()->getSerializerHandlers() as $handlerClassname) {
                $handlerRegistry->registerSubscribingHandler(new $handlerClassname());
            }
        });

        $this->documentSerializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher): void {
            foreach ($this->getCurrentDocumentFormatProvider()->getSerializerListeners() as $event => $callback) {
                $eventDispatcher->addListener($event, $callback);
            }
        });

        $this->documentSerializerBuilder->configureListeners(function (EventDispatcher $eventDispatcher): void {
            foreach ($this->getCurrentDocumentFormatProvider()->getSerializerSubscribers() as $subscriberClassname) {
                $eventDispatcher->addSubscriber(new $subscriberClassname());
            }
        });

        $this->documentSerializer = $this->documentSerializerBuilder->build();
    }
}
