<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators;

use horstoeko\invoicesuite\concerns\HandlesMessageBag;
use horstoeko\invoicesuite\concerns\HandlesRawContents;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInternalMethodCallException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteValidationContentNotSpecifiedException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteClassFinder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use JMS\Serializer\Exception\RuntimeException as JMSSerializerRuntimeException;
use PrinsFrank\PdfParser\Exception\PdfParserException;

/**
 * Class coordinating document validation with multiple validators
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteCompositeDocumentValidator
{
    use HandlesMessageBag;
    use HandlesRawContents;

    /**
     * List of registered document validators
     *
     * @var list<class-string<InvoiceSuiteAbstractDocumentValidator>>
     */
    protected array $registeredValidators = [];

    /**
     * List of disabled document validator classes
     *
     * @var list<class-string<InvoiceSuiteAbstractDocumentValidator>>
     */
    protected array $disabledValidators = [];

    /**
     * Configuration method arguments indexed by validator class and method name
     *
     * @var array<string, array<string, list<mixed>>>
     */
    private array $validatorOptions = [];

    /**
     * Constructor (hidden)
     */
    final protected function __construct()
    {
        $this->init();
    }

    /**
     * Factory
     *
     * @return static
     */
    public static function factory(): static
    {
        return new static();
    }

    /**
     * Create a validator from a file containing XML or JSON invoice content
     *
     * @param  string $fromFilename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function createFromFile(
        string $fromFilename
    ): static {
        return static::createFromContent(InvoiceSuiteFileUtils::getContentFromFile($fromFilename));
    }

    /**
     * Create a validator from the original content of a document reader
     *
     * @param  InvoiceSuiteDocumentReader $fromDocumentReader
     * @return static
     */
    public static function createFromDocumentReader(
        InvoiceSuiteDocumentReader $fromDocumentReader
    ): static {
        return static::createFromContent($fromDocumentReader->getOriginalDocumentContent());
    }

    /**
     * Create a validator from the content of a document builder
     *
     * @param  InvoiceSuiteDocumentBuilder $fromDocumentBuilder
     * @return static
     *
     * @throws JMSSerializerRuntimeException
     */
    public static function createFromDocumentBuilder(
        InvoiceSuiteDocumentBuilder $fromDocumentBuilder
    ): static {
        return static::createFromContent($fromDocumentBuilder->getContent());
    }

    /**
     * Create a validator for the invoice embedded in a PDF
     *
     * @param  InvoiceSuitePdfDocumentReader $fromPdfDocumentReader
     * @return static
     */
    public static function createFromPdfDocumentReader(
        InvoiceSuitePdfDocumentReader $fromPdfDocumentReader
    ): static {
        return static::createFromDocumentReader($fromPdfDocumentReader->getDocumentReader());
    }

    /**
     * Create a validator from XML or JSON invoice content
     *
     * @param  string $fromDocumentContent
     * @return static
     */
    public static function createFromContent(
        string $fromDocumentContent
    ): static {
        return static::factory()->setRawDocumentContent($fromDocumentContent);
    }

    /**
     * Create a validator from XML, JSON, or a PDF containing an embedded invoice
     *
     * @param  string $fromDocumentContent
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteInternalMethodCallException
     * @throws InvoiceSuiteUnknownContentException
     * @throws JMSSerializerRuntimeException
     * @throws PdfParserException
     */
    public static function createFromVariableContent(
        string $fromDocumentContent
    ): static {
        if (InvoiceSuiteStringUtils::isPdfString($fromDocumentContent)) {
            return static::createFromPdfDocumentReader(InvoiceSuitePdfDocumentReader::createFromContent($fromDocumentContent));
        }

        if (InvoiceSuiteStringUtils::isJsonString($fromDocumentContent) || InvoiceSuiteStringUtils::isXmlString($fromDocumentContent)) {
            return static::createFromDocumentReader(InvoiceSuiteDocumentReader::createFromContent($fromDocumentContent));
        }

        throw new InvoiceSuiteUnknownContentException();
    }

    /**
     * Initialize and resolve available validators
     *
     * @return static
     */
    public function init(): static
    {
        /** @var list<class-string<InvoiceSuiteAbstractDocumentValidator>> $availableDocumentValidators */
        $availableDocumentValidators = InvoiceSuiteClassFinder::factory()->getClassesWhenItsSubClassOf(InvoiceSuiteAbstractDocumentValidator::class);
        $this->registeredValidators = [];

        array_walk(
            $availableDocumentValidators,
            function (string $availableDocumentValidator): void {
                if (!InvoiceSuiteArrayUtils::inArrayNoCase($this->registeredValidators, $availableDocumentValidator)) {
                    $this->registeredValidators[] = $availableDocumentValidator;
                }
            }
        );

        return $this;
    }

    /**
     * Return the validator classes skipped during validation
     *
     * @return list<class-string<InvoiceSuiteAbstractDocumentValidator>>
     */
    public function getDisabledValidators(): array
    {
        return $this->disabledValidators;
    }

    /**
     * Set the validator classes to skip on each validation run
     *
     * @param  list<class-string<InvoiceSuiteAbstractDocumentValidator>> $disabledValidators
     * @return static
     */
    public function setDisabledValidators(
        array $disabledValidators
    ): static {
        $this->disabledValidators = $disabledValidators;

        return $this;
    }

    /**
     * Return the configured arguments for the public configuration methods of a validator
     *
     * @param  class-string<InvoiceSuiteAbstractDocumentValidator> $validatorClass
     * @return array<string, list<mixed>>
     */
    public function getValidatorOptions(
        string $validatorClass
    ): array {
        return $this->validatorOptions[InvoiceSuiteStringUtils::lower($validatorClass)] ?? [];
    }

    /**
     * Replace the options for a validator
     *
     * Pass the validator class name and map each public configuration method to its positional arguments.
     * For example, use InvoiceSuiteXsdDocumentValidator::class with ['setXsdFilename' => [$xsdFilename]].
     * Methods are called in array order before validation. Use an empty list for a method without arguments.
     *
     * @param  class-string<InvoiceSuiteAbstractDocumentValidator> $validatorClass
     * @param  array<string, list<mixed>>                          $newValidatorOptions Method names and their positional arguments in call order
     * @return static
     */
    public function setValidatorOptions(
        string $validatorClass,
        array $newValidatorOptions
    ): static {
        $this->validatorOptions[InvoiceSuiteStringUtils::lower($validatorClass)] = $newValidatorOptions;

        return $this;
    }

    /**
     * Validate the stored XML or JSON invoice content with the enabled validators
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws InvoiceSuiteValidationContentNotSpecifiedException
     */
    public function validate(): static
    {
        $this->clearMessageBag();
        $documentContent = $this->getRawDocumentContent();

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($documentContent)) {
            throw new InvoiceSuiteValidationContentNotSpecifiedException();
        }

        $enabledValidators = InvoiceSuiteArrayUtils::filter(
            $this->registeredValidators,
            fn (string $validatorClass): bool => !InvoiceSuiteArrayUtils::inArrayNoCase($this->disabledValidators, $validatorClass)
        );

        if (InvoiceSuiteArrayUtils::empty($enabledValidators)) {
            return $this->addInternalErrorMessageToMessageBag('No document validator is enabled');
        }

        foreach ($enabledValidators as $validatorClass) {
            try {
                $validator = $validatorClass::createFromContent($documentContent);
            } catch (InvoiceSuiteFormatProviderNotFoundException $exception) {
                $this->addInternalErrorMessageToMessageBag(InvoiceSuiteStringUtils::sprintf('%s: %s', $validatorClass, $exception->getMessage()));

                continue;
            }

            foreach ($this->getValidatorOptions($validatorClass) as $optionMethod => $optionArguments) {
                $configureValidator = [$validator, $optionMethod];

                if (!is_callable($configureValidator)) {
                    throw new InvoiceSuiteInvalidArgumentException(InvoiceSuiteStringUtils::sprintf('Invalid validator option method %s::%s', $validatorClass, $optionMethod));
                }

                $configureValidator(...$optionArguments);
            }

            $validator->validate();
            $this->copyFromMessageBag($validator->getMessageBag());
        }

        return $this;
    }
}
