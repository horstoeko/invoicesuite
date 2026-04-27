<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators\abstracts;

use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentFormatProviders;
use horstoeko\invoicesuite\concerns\HandlesMessageBag;
use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatProvider;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing methods base functionallity for a document validator
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentValidator
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentFormatProviders;
    use HandlesMessageBag;
    use HandlesRawContents;

    /**
     * Constructor (hidden)
     */
    final protected function __construct() {}

    /**
     * Create a validator instance by a file which contains the document to validate
     *
     * @param  string $fromFilename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromFile(
        string $fromFilename
    ): static {
        if (!InvoiceSuiteFileUtils::isReadableFilePath($fromFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fromFilename);
        }

        $rawDocumentContent = file_get_contents($fromFilename);

        if (false === $rawDocumentContent) {
            throw new InvoiceSuiteFileNotReadableException($fromFilename);
        }

        return static::createFromContent($rawDocumentContent);
    }

    /**
     * Create a validator instance by the XML content of a given InvoiceSuiteDocumentReader
     *
     * @param  InvoiceSuiteDocumentReader $fromDocumentReader
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public static function createFromDocumentReader(
        InvoiceSuiteDocumentReader $fromDocumentReader
    ): static {
        // @phpstan-ignore new.staticInAbstractClassStaticMethod
        return (new static())
            ->intializeAfterConstruct()
            ->setDocumentReader($fromDocumentReader);
    }

    /**
     * Create a validator instance by the XML content of a given InvoiceSuiteDocumentBuilder
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    public static function createFromDocumentBuilder(
        InvoiceSuiteDocumentBuilder $fromDocumentBuilder
    ): static {
        // @phpstan-ignore new.staticInAbstractClassStaticMethod
        return (new static())
            ->intializeAfterConstruct()
            ->setDocumentBuilder($fromDocumentBuilder);
    }

    /**
     * Create a validator instance by a given document content
     *
     * @param  string $fromDocumentContent
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    public static function createFromContent(
        string $fromDocumentContent
    ): static {
        // @phpstan-ignore new.staticInAbstractClassStaticMethod
        return (new static())
            ->intializeAfterConstruct()
            ->setDocumentContent($fromDocumentContent);
    }

    /**
     * Returns the original serialized content which was used
     *
     * @return string
     */
    public function getOriginalDocumentContent(): string
    {
        return $this->getRawDocumentContent();
    }

    /**
     * Main validation method. Checks for non-empty content
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function validate(): static
    {
        if (!$this->hasRawDocumentContent()) {
            throw new InvoiceSuiteInvalidArgumentException('You did not present any content to validate');
        }

        return $this->doValidate();
    }

    /**
     * Init after constructing the validator
     *
     * @return static
     */
    protected function intializeAfterConstruct(): static
    {
        return $this;
    }

    /**
     * Internal method to set a document builder from which to get the content from. This will check
     * if the given provider fullfills the requirements for this validator
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws RuntimeException
     */
    protected function setDocumentBuilder(
        InvoiceSuiteDocumentBuilder $fromDocumentBuilder
    ): static {
        if (!$this->checkFormatProviderRequirements($fromDocumentBuilder->getCurrentDocumentFormatProvider())) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The provider %s does not meet the requirements.', $fromDocumentBuilder->getCurrentDocumentFormatProvider()->getUniqueId()));
        }

        $this->setCurrentDocumentFormatProvider($fromDocumentBuilder->getCurrentDocumentFormatProvider());
        $this->setRawDocumentContent($fromDocumentBuilder->getContent());

        return $this;
    }

    /**
     * Internal method to set a document reader from which to get the content from. This will check
     * if the given provider fullfills the requirements for this validator
     *
     * @param  InvoiceSuiteDocumentReader $fromDocumentReader
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function setDocumentReader(
        InvoiceSuiteDocumentReader $fromDocumentReader
    ): static {
        if (!$this->checkFormatProviderRequirements($fromDocumentReader->getCurrentDocumentFormatProvider())) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('The provider %s does not meet the requirements.', $fromDocumentReader->getCurrentDocumentFormatProvider()->getUniqueId()));
        }

        $this->setCurrentDocumentFormatProvider($fromDocumentReader->getCurrentDocumentFormatProvider());
        $this->setRawDocumentContent($fromDocumentReader->getOriginalDocumentContent());

        return $this;
    }

    /**
     * Internal method to set the document content directly. This will look for a provider and the
     * provider fullfills the requirements for this validator
     *
     * @param  string $fromDocumentContent
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     */
    protected function setDocumentContent(
        string $fromDocumentContent
    ): static {
        $this->resolveAvailableDocumentFormatProviders();

        $formatProviders = array_filter(
            $this->getRegisteredDocumentFormatProviders(),
            fn ($formatProvider) => (
                $formatProvider->getIsSatisfiableBySerializedContent($fromDocumentContent)
                && $this->checkFormatProviderRequirements($formatProvider)
            )
        );

        if ([] === $formatProviders) {
            throw new InvoiceSuiteFormatProviderNotFoundException('unknown');
        }

        $formatProvider = reset($formatProviders);

        $this->setCurrentDocumentFormatProvider($formatProvider);
        $this->setRawDocumentContent($fromDocumentContent);

        return $this;
    }

    /**
     * Perform additional checks for a given format provider
     *
     * @param  InvoiceSuiteAbstractDocumentFormatProvider $formatProvider
     * @return bool
     */
    protected function checkFormatProviderRequirements(
        InvoiceSuiteAbstractDocumentFormatProvider $formatProvider
    ): bool {
        return true;
    }

    /**
     * The validator-specifc validation entry point
     *
     * @return static
     */
    abstract protected function doValidate(): static;
}
