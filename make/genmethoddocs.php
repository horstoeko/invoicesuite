<?php

use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProvider;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProviderBuilder;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProviderReader;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProvider;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungCIIInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungCIIInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungCIIInvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLCreditNoteProviderReader;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProvider;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProviderBuilder;
use horstoeko\invoicesuite\documents\providers\xr\InvoiceSuiteXRechnungUBLInvoiceProviderReader;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxBasicProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxBasicWlProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxComfortProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxMinimumProvider;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProviderBuilder;
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProviderReader;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Printer;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlockFactory;

require __DIR__ . '/../vendor/autoload.php';

class CustomPhpPrinter extends Printer
{
    public function __construct()
    {
        parent::__construct();

        $this->indentation = '  ';
    }
}

class ExtractClass implements Stringable
{
    /**
     * The class to analyze
     *
     * @var string
     */
    protected $className = '';

    /**
     * Class + method name to ignore in inheritance check
     *
     * @var array
     */
    protected $ignoreInheritance = [];

    /**
     * Constructor
     *
     * @param string $className
     * @param array  $ignoreInheritance
     */
    public function __construct(
        string $className,
        array $ignoreInheritance = []
    ) {
        $this->className = $className;
        $this->ignoreInheritance = $ignoreInheritance;
    }

    /**
     * Magic method __toString, String converstion
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getJson();
    }

    /**
     * Returns the current classnane
     *
     * @return string
     * */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Returns the base name of the current classname
     *
     * @return string
     */
    public function getClassBasename(): string
    {
        $classParts = explode('\\', $this->className);

        return end($classParts);
    }

    /**
     * Returns the result as array
     *
     * @return array
     */
    public function getArray(): array
    {
        $reflection = new ReflectionClass($this->className);
        $classDocComment = $reflection->getDocComment();
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC); // Only public methods
        $docBlockFactory = DocBlockFactory::createInstance();
        $result = [];
        $result['methods'] = [];

        if (false !== $classDocComment) {
            $classDocBlock = $docBlockFactory->create($classDocComment);
            $deprecatedTag = $classDocBlock->getTagsByName('deprecated');
            $result['class'] = [
                'summary' => in_array($classDocBlock->getSummary(), ['', '0'], true) ? '' : $classDocBlock->getSummary(),
                'description' => '' !== (string) $classDocBlock->getDescription() && '0' !== (string) $classDocBlock->getDescription() ? (string) $classDocBlock->getDescription() : '',
                'deprecated' => [] === $deprecatedTag ? '' : (string) $deprecatedTag[0],
            ];
        } else {
            $result['class'] = [
                'summary' => '',
                'description' => '',
                'deprecated' => '',
            ];
        }

        foreach ($methods as $method) {
            if ($method->getDeclaringClass()->getName() != $this->className && !in_array(sprintf('%s::%s', $this->className, $method->getName()), $this->ignoreInheritance)) {
                continue;
            }

            $docComment = $method->getDocComment();
            $parameters = [];
            $methodReturnType = $method->getReturnType();
            $returnDetails = [
                'type' => $this->getReflectionTypeString($methodReturnType),
                'description' => '',
            ];
            $methodDetails = [
                'summary' => '',
                'description' => '',
                'static' => false,
                'abstract' => false,
                'final' => false,
                'hasadditional' => false,
                'deprecated' => '',
            ];

            if (false !== $docComment) {
                $docBlock = $docBlockFactory->create($docComment);

                // Extract summary and description
                $methodDetails['summary'] = in_array($docBlock->getSummary(), ['', '0'], true) ? 'No summary available.' : $docBlock->getSummary();
                $methodDetails['description'] = '' !== (string) $docBlock->getDescription() && '0' !== (string) $docBlock->getDescription() ? (string) $docBlock->getDescription() : '';
                $methodDetails['static'] = $method->isStatic();
                $methodDetails['abstract'] = $method->isAbstract();
                $methodDetails['final'] = $method->isFinal();
                $methodDetails['hasadditional'] = $method->isStatic() || $method->isAbstract() || $method->isFinal();
                $deprecatedTag = $docBlock->getTagsByName('deprecated');

                if ([] !== $deprecatedTag) {
                    $methodDetails['deprecated'] = (string) $deprecatedTag[0];
                }

                // Parse @param tags
                $paramDescriptions = [];
                foreach ($docBlock->getTagsByName('param') as $tag) {
                    if ($tag instanceof Param) {
                        $paramDescriptions[$tag->getVariableName()] = [
                            'type' => (string) $tag->getType(),
                            'description' => (string) $tag->getDescription(),
                        ];
                    }
                }

                // Parse @return tag
                $returnTag = $docBlock->getTagsByName('return');

                if ([] !== $returnTag && $returnTag[0] instanceof Return_) {
                    $returnDetails['type'] = (string) $returnTag[0]->getType();
                    $returnDetails['description'] = (string) $returnTag[0]->getDescription();
                }
            }

            // Get method parameters and match them with DocBlock descriptions
            foreach ($method->getParameters() as $parameter) {
                $parameterName = $parameter->getName();
                $parameterType = $parameter->getType();
                $parameterTypeString = '';

                if ($parameterType instanceof ReflectionUnionType) {
                    $types = $parameterType->getTypes();
                    foreach ($types as $type) {
                        $parameterTypeString .= $type->getName() . '|';
                    }

                    $parameterTypeString = rtrim($parameterTypeString, '|');
                } elseif ($parameterType instanceof ReflectionNamedType) {
                    $parameterTypeString = $parameterType->getName();
                } else {
                    $parameterTypeString = 'mixed';
                }

                $parameters[] = [
                    'name' => $parameterName,
                    'type' => $parameterTypeString ?: 'mixed',
                    'isNullable' => $parameterType && $parameterType->allowsNull(),
                    'defaultValueavailable' => $parameter->isOptional() && $parameter->isDefaultValueAvailable(),
                    'defaultValue' => $parameter->isOptional() ? ($parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null) : null,
                    'description' => $paramDescriptions[$parameterName]['description'] ?? '',
                ];
            }

            $result['methods'][$method->getName()] = [
                'methodDetails' => $methodDetails,
                'parameters' => $parameters,
                'return' => $returnDetails,
            ];
        }

        return $result;
    }

    /**
     * Returns the result as JSON string
     *
     * @return string
     */
    public function getJson(): string
    {
        return json_encode($this->getArray(), JSON_PRETTY_PRINT);
    }

    /**
     * Save Json to file
     *
     * @param  string $filename
     * @return void
     */
    public function saveJson(
        string $filename
    ): void {
        file_put_contents($filename, $this->getJson());
    }

    /**
     * Returns a PHP type string from a reflection type
     *
     * @param  null|ReflectionType $reflectionType
     * @return string
     */
    private function getReflectionTypeString(?ReflectionType $reflectionType): string
    {
        if ($reflectionType instanceof ReflectionUnionType) {
            $typeNames = [];

            foreach ($reflectionType->getTypes() as $reflectionNamedType) {
                $typeNames[] = $this->getReflectionTypeString($reflectionNamedType);
            }

            return implode('|', $typeNames);
        }

        if ($reflectionType instanceof ReflectionIntersectionType) {
            $typeNames = [];

            foreach ($reflectionType->getTypes() as $reflectionNamedType) {
                $typeNames[] = $this->getReflectionTypeString($reflectionNamedType);
            }

            return implode('&', $typeNames);
        }

        if ($reflectionType instanceof ReflectionNamedType) {
            $typeName = $reflectionType->getName();

            if ($reflectionType->allowsNull() && 'null' !== $typeName && 'mixed' !== $typeName) {
                return '?' . $typeName;
            }

            return $typeName;
        }

        return 'void';
    }
}

class MarkDownGenerator
{
    /**
     * Extractor
     *
     * @var ExtractClass
     */
    protected $extractor;

    /**
     * The lines for the MD
     *
     * @var string[]
     */
    protected $lines = [];

    /**
     * Constructor
     *
     * @param ExtractClass $extractor
     */
    public function __construct(
        ExtractClass $extractor
    ) {
        $this->extractor = $extractor;
    }

    /**
     * Generate markdown
     *
     * @return MarkDownGenerator
     */
    public function generateMarkdown(): self
    {
        $metaData = $this->extractor->getArray();

        $this->addLineH2('Summary');

        $phpPrinter = new CustomPhpPrinter();
        $phpClass = new ClassType($this->extractor->getClassBasename());

        if (!empty($metaData['class']['summary'])) {
            $this->addLine($this->removeSprintfPlaceholder($metaData['class']['summary'] ?? ''))->addEmptyLine();
        }

        if (!empty($metaData['class']['description'])) {
            $this->addLine($this->removeSprintfPlaceholder($metaData['class']['description'] ?? ''))->addEmptyLine();
        }

        if (!empty($metaData['class']['deprecated'])) {
            $this->addLine('> [!CAUTION]');
            $this->addLine('> Deprecated %s', $metaData['class']['deprecated']);
            $this->addEmptyLine();
        }

        $this->addExample(__DIR__ . sprintf('/md/%s.md', $this->extractor->getClassBasename()), true);

        if (!empty($metaData['methods'])) {
            $this->addLineH2('Methods');
        }

        foreach ($metaData['methods'] as $methodName => $methodData) {
            $this->addLineH3($methodName, false === $methodData['methodDetails']['hasadditional']);

            if (true === $methodData['methodDetails']['static']) {
                $this->addToLastLine('<span style="color: white; background-color: blue; padding: 0.2em 0.5em; border-radius: 0.2em; font-size: .8rem">``[static]``</span>', ' ');
            }

            if (true === $methodData['methodDetails']['abstract']) {
                $this->addToLastLine('<span style="color: white; background-color: red; padding: 0.2em 0.5em; border-radius: 0.2em; font-size: .8rem">``[abstract]``</span>', ' ');
            }

            if (true === $methodData['methodDetails']['final']) {
                $this->addToLastLine('<span style="color: white; background-color: green; padding: 0.2em 0.5em; border-radius: 0.2em; font-size: .8rem">``[final]``</span>', ' ');
            }

            if (true === $methodData['methodDetails']['hasadditional']) {
                $this->addEmptyLine();
            }

            if (!empty($methodData['methodDetails']['deprecated'])) {
                $this->addLine('> [!CAUTION]');
                $this->addLine('> Deprecated %s', $methodData['methodDetails']['deprecated']);
                $this->addEmptyLine();
            }

            $this->addLineH4('Summary');

            if (!empty($methodData['methodDetails']['summary'])) {
                $this->addLineItalic($this->removeSprintfPlaceholder($methodData['methodDetails']['summary']))->addEmptyLine();
            }

            if (!empty($methodData['methodDetails']['description'])) {
                $this->addLineItalic($this->removeSprintfPlaceholder($methodData['methodDetails']['description']))->addEmptyLine();
            }

            $this->addLineH4('Signature');

            $phpMethod = $phpClass->addMethod($methodName);
            $phpMethod->setPublic();
            $phpMethod->setStatic(true === $methodData['methodDetails']['static']);
            $phpMethod->setAbstract(true === $methodData['methodDetails']['abstract']);
            $phpMethod->setFinal(true === $methodData['methodDetails']['final']);
            $phpMethod->setReturnType($this->fixPhpType($methodData['return']['type']));
            // $phpMethod->setBody(null);

            foreach ($methodData['parameters'] as $parameter) {
                $phpParameter = $phpMethod
                    ->addParameter($parameter['name'])
                    ->setType($this->fixPhpType($parameter['type']))
                    ->setNullable($parameter['isNullable']);

                if (true === $parameter['defaultValueavailable']) {
                    $phpParameter->setDefaultValue($parameter['defaultValue']);
                }
            }

            $this->addLineRaw('```php');
            $this->addLineRaw($phpPrinter->printMethod($phpMethod));
            $this->addLineRaw('```');

            if (!empty($methodData['parameters'])) {
                $this->addLineH4('Parameters');
                $this->addLine('| Name | Type | Allows Null | Description');
                $this->addLine('| :------ | :------ | :-----: | :------');

                foreach ($methodData['parameters'] as $parameter) {
                    $this->addLine(
                        '| %s | %s | %s | %s',
                        $parameter['name'],
                        $parameter['type'],
                        $this->boolToMarkDown($parameter['isNullable'] ? 'Yes' : 'No'),
                        $parameter['description'] ?? '',
                    );
                }

                $this->addEmptyLine();
            } else {
                $this->addEmptyLine();
            }

            if ($methodData['return']['type'] && 'void' != $methodData['return']['type']) {
                $this->addLineH4('Returns');
                $this->addLineRaw(sprintf('Returns a value of type __%s__', $methodData['return']['type']));
                $this->addEmptyLine();
            }

            $this->addExample(__DIR__ . sprintf('/md/%s_%s.md', $this->extractor->getClassBasename(), $methodName));
        }

        return $this;
    }

    /**
     * Save MD to file
     *
     * @param  string            $filename
     * @return MarkDownGenerator
     */
    public function saveToFile(
        string $filename
    ): self {
        $dir = InvoiceSuiteFileUtils::getFileDirectory($filename);

        if (!is_dir($dir)) {
            mkdir($dir, recursive: true);
        }

        file_put_contents($filename, implode(PHP_EOL, $this->lines));

        return $this;
    }

    /**
     * Add a line to internal container
     *
     * @param  string            $string
     * @param  mixed             ...$args
     * @return MarkDownGenerator
     */
    private function addLine(
        string $string,
        ...$args
    ): self {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($string)) {
            return $this;
        }

        $this->lines[] = $this->sanatizeString(sprintf($string, ...$args));

        return $this;
    }

    /**
     * Add a line to internal container
     *
     * @param  string            $string
     * @param  mixed             ...$args
     * @return MarkDownGenerator
     */
    private function addLineRaw(
        string $string,
        ...$args
    ): self {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($string)) {
            return $this;
        }

        $this->lines[] = sprintf($string, ...$args);

        return $this;
    }

    /**
     * Add an empty line to internal container
     *
     * @return MarkDownGenerator
     */
    private function addEmptyLine(): self
    {
        $this->lines[] = '';

        return $this;
    }

    /**
     * Add an H2-Line to internal container
     *
     * @param  string            $string
     * @param  bool              $newLine
     * @return MarkDownGenerator
     */
    private function addLineH2(
        string $string,
        bool $newLine = true
    ): self {
        $this->addLine('## %s', $string);

        if ($newLine) {
            $this->addEmptyLine();
        }

        return $this;
    }

    /**
     * Add an H3-Line to internal container
     *
     * @param  string            $string
     * @param  bool              $newLine
     * @return MarkDownGenerator
     */
    private function addLineH3(
        string $string,
        bool $newLine = true
    ): self {
        $this->addLine('### %s', $string);

        if ($newLine) {
            $this->addEmptyLine();
        }

        return $this;
    }

    /**
     * Add an H4-Line to internal container
     *
     * @param  string            $string
     * @param  bool              $newLine
     * @return MarkDownGenerator
     */
    private function addLineH4(
        string $string,
        bool $newLine = true
    ): self {
        $this->addLine('#### %s', $string);

        if ($newLine) {
            $this->addEmptyLine();
        }

        return $this;
    }

    /**
     * Add a string to the latest line which was added
     *
     * @param  string            $string
     * @param  string            $delimiter
     * @param  mixed             ...$args
     * @return MarkDownGenerator
     */
    private function addToLastLine(
        string $string,
        string $delimiter = '',
        ...$args
    ): self {
        if ([] === $this->lines) {
            return $this->addLine($string, ...$args);
        }

        $lastIndex = count($this->lines) - 1;
        $this->lines[$lastIndex] = $this->lines[$lastIndex] . $delimiter . sprintf($string, ...$args);

        return $this;
    }

    /**
     * Add line as italic formatted
     *
     * @param  string            $string
     * @param  mixed             ...$args
     * @return MarkDownGenerator
     */
    private function addLineItalic(
        string $string,
        ...$args
    ): self {
        return $this->addLine(sprintf('_%s_', $string), ...$args);
    }

    /**
     * Import an example from a markdown file
     *
     * @param  string            $exampleFilename
     * @param  bool              $isClass
     * @return MarkDownGenerator
     */
    private function addExample(
        string $exampleFilename,
        bool $isClass = false
    ): self {
        if (!file_exists($exampleFilename)) {
            return $this;
        }

        $exampleFileContent = file_get_contents($exampleFilename);

        if (false === $exampleFileContent) {
            return $this;
        }

        if ($isClass) {
            $this->addLineH2('Example');
        } else {
            $this->addLineH4('Example');
        }

        $exampleFileContent = str_replace(["\r\n", "\r", "\n"], "\n", $exampleFileContent);

        foreach (explode("\n", $exampleFileContent) as $exampleFileContentLine) {
            $this->lines[] = $exampleFileContentLine;
        }

        $this->addEmptyLine();

        return $this;
    }

    /**
     * Sanatize a string
     *
     * @param  string $string
     * @return string
     */
    private function sanatizeString(
        string $string
    ): string {
        $string = str_replace("\n", '<br/>', $string);
        $string = str_replace('__BT-, From __', '', $string);
        $string = str_replace('__BT-, From', '__BT-??, From', $string);

        return trim($string);
    }

    /**
     * Remove sprintf placeholders
     *
     * @param  string $string
     * @return string
     */
    private function removeSprintfPlaceholder(
        string $string
    ): string {
        return str_replace('%', '', $string);
    }

    /**
     * Fix the PHP type
     *
     * @param  string $string
     * @return string
     */
    private function fixPhpType(
        string $string
    ): string {
        if (false !== stripos($string, '[]')) {
            $string = 'array';
        }

        if (0 === stripos($string, 'array<')) {
            $string = 'array';
        }

        if (0 === stripos($string, '\Traversable')) {
            $string = 'array';
        }

        if ('$this' === $string) {
            return 'static';
        }

        return $string;
    }

    /**
     * Convert yes/no to markdown markup
     *
     * @param  string $boolText
     * @return string
     */
    private function boolToMarkDown(
        string $boolText
    ): string {
        return 0 === strcasecmp($boolText, 'no') ? ':x:' : ':heavy_check_mark:';
    }
}

class BatchMarkDownGenerator
{
    /**
     * Start a batch documentation creation
     *
     * @param  array $classes
     * @return void
     */
    public static function generate(
        array $classes,
        array $ignoreInheritance = []
    ): void {
        foreach ($classes as $className => $toFilename) {
            $extractor = new ExtractClass($className, $ignoreInheritance);
            $generator = new MarkDownGenerator($extractor);
            $generator->generateMarkdown();
            $generator->saveToFile($toFilename);
        }
    }
}

BatchMarkDownGenerator::generate([
    InvoiceSuiteDocumentReader::class => __DIR__ . '/classes/Class-InvoiceSuiteDocumentReader.md',
    InvoiceSuiteDocumentBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteDocumentBuilder.md',
    InvoiceSuitePdfDocumentReader::class => __DIR__ . '/classes/Class-InvoiceSuitePdfDocumentReader.md',
    InvoiceSuitePdfDocumentBuilder::class => __DIR__ . '/classes/Class-InvoiceSuitePdfDocumentBuilder.md',
    // ZF/FX
    InvoiceSuiteZfFxMinimumProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxMinimumProvider.md',
    InvoiceSuiteZfFxBasicProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxBasicProvider.md',
    InvoiceSuiteZfFxBasicWlProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxBasicWlProvider.md',
    InvoiceSuiteZfFxComfortProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxComfortProvider.md',
    InvoiceSuiteZfFxExtendedProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxExtendedProvider.md',
    InvoiceSuiteZfFxProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxProviderReader.md',
    InvoiceSuiteZfFxProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteZfFxProviderBuilder.md',
    // Peppol
    InvoiceSuitePeppol30InvoiceProvider::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30InvoiceProvider.md',
    InvoiceSuitePeppol30InvoiceProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30InvoiceProviderReader.md',
    InvoiceSuitePeppol30InvoiceProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30InvoiceProviderBuilder.md',
    InvoiceSuitePeppol30CreditNoteProvider::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30CreditNoteProvider.md',
    InvoiceSuitePeppol30CreditNoteProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30CreditNoteProviderReader.md',
    InvoiceSuitePeppol30CreditNoteProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuitePeppol30CreditNoteProviderBuilder.md',
    // XRechnung CII
    InvoiceSuiteXRechnungCIIInvoiceProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungCIIInvoiceProvider.md',
    InvoiceSuiteXRechnungCIIInvoiceProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungCIIInvoiceProviderBuilder.md',
    InvoiceSuiteXRechnungCIIInvoiceProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungCIIInvoiceProviderReader.md',
    // XRechnung UBL
    InvoiceSuiteXRechnungUBLCreditNoteProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLCreditNoteProvider.md',
    InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLCreditNoteProviderBuilder.md',
    InvoiceSuiteXRechnungUBLCreditNoteProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLCreditNoteProviderReader.md',
    InvoiceSuiteXRechnungUBLInvoiceProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLInvoiceProvider.md',
    InvoiceSuiteXRechnungUBLInvoiceProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLInvoiceProviderBuilder.md',
    InvoiceSuiteXRechnungUBLInvoiceProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuiteXRechnungUBLInvoiceProviderReader.md',
    // FatturaPA
    InvoiceSuiteFatturaPaProvider::class => __DIR__ . '/classes/Class-InvoiceSuiteFatturaPaProvider.md',
    InvoiceSuiteFatturaPaProviderBuilder::class => __DIR__ . '/classes/Class-InvoiceSuiteFatturaPaProviderBuilder.md',
    InvoiceSuiteFatturaPaProviderReader::class => __DIR__ . '/classes/Class-InvoiceSuiteFatturaPaProviderReader.md',
], [
    // 'horstoeko\\invoicesuite\\MyClass::myMethodName',
]);
