<?php

namespace horstoeko\invoicesuite\concerns;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
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
trait HandlesDocumentSerializer
{
    /**
     * @var SerializerBuilder $documentSerializerBuilder Serializer builder
     */
    protected $documentSerializerBuilder;

    /**
     * @var SerializerInterface $documentSerializer Serializer
     */
    protected $documentSerializer;

    /**
     * Build the serializer by a format provider
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function createAndInitDocumentSerializerByFormatProvider(): void
    {
        $this->documentSerializerBuilder = SerializerBuilder::create();

        $this->documentSerializerBuilder->addMetadataDirs($this->getCurrentDocumentFormatProvider()->getSerializerMetadataDirectories());
        $this->documentSerializerBuilder->addDefaultListeners();
        $this->documentSerializerBuilder->addDefaultHandlers();

        if (InvoiceSuiteSettings::hasSerializerCacheDirectory()) {
            $this->documentSerializerBuilder->setCacheDir(InvoiceSuiteSettings::getSerializerCacheDirectory());
        } else {
            $this->documentSerializerBuilder->setCacheDir(InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), "jms"));
        }

        $this->documentSerializerBuilder->configureHandlers(function (HandlerRegistryInterface $handlerRegistry): void {
            $handlerRegistry->registerSubscribingHandler(new BaseTypesHandler());
            $handlerRegistry->registerSubscribingHandler(new XmlSchemaDateHandler());
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
