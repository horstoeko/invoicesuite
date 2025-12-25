<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

/**
 * Class representing a converter to change a document's profile to another profile
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentProfileConverter
{
    /**
     * Path to the profile id
     */
    protected const PATH_1 = 'getExchangedDocumentContext.getGuidelineSpecifiedDocumentContextParameter.setID';

    /**
     * Path to the context parameter
     */
    protected const PATH_2 = 'getExchangedDocumentContext.setBusinessProcessSpecifiedDocumentContextParameter';

    /**
     * Path to the context parameter id
     */
    protected const PATH_3 = 'getExchangedDocumentContext.getBusinessProcessSpecifiedDocumentContextParameter.setID';

    /**
     * The source
     *
     * @var string
     */
    protected $convertFromContent = '';

    /**
     * The new profile ID
     *
     * @var int
     */
    protected $convertToProfileId = -1;

    /**
     * Internal builder class
     *
     * @var InvoiceSuiteDocumentBuilder
     */
    protected $documentBuilder;

    /**
     * Convert from file to file
     *
     * @param  string $fromFilename
     * @param  string $toFile
     * @param  int    $newProfileId
     * @return void
     */
    public static function convertFromFileToFile(string $fromFilename, string $toFile, int $newProfileId): void
    {
        static::convertFromFile($fromFilename, $newProfileId)->convertToFile($toFile);
    }

    /**
     * Convert from file to string
     *
     * @param  string $fromFilename
     * @param  int    $newProfileId
     * @return string
     */
    public static function convertFromFileToString(string $fromFilename, int $newProfileId): string
    {
        return static::convertFromFile($fromFilename, $newProfileId)->convertToString();
    }

    /**
     * Convert from content to file
     *
     * @param  string $fromContent
     * @param  string $toFile
     * @param  int    $newProfileId
     * @return void
     */
    public static function convertFromContentToFile(string $fromContent, string $toFile, int $newProfileId): void
    {
        static::convertFromContent($fromContent, $newProfileId)->convertToFile($toFile);
    }

    /**
     * Convert from content to string
     *
     * @param  string $fromContent
     * @param  int    $newProfileId
     * @return string
     */
    public static function convertFromContentToString(string $fromContent, int $newProfileId): string
    {
        return static::convertFromContent($fromContent, $newProfileId)->convertToString();
    }

    /**
     * Create an instance by filename
     *
     * @param  string $fromFilename
     * @param  int    $newProfileId
     * @return static
     */
    protected static function convertFromFile(string $fromFilename, int $newProfileId): static
    {
        if (!file_exists($fromFilename)) {
            throw new InvoiceSuiteFileNotFoundException($fromFilename);
        }

        $fromContent = file_get_contents($fromFilename);

        if ($fromContent === false) {
            throw new InvoiceSuiteFileNotReadableException($fromFilename);
        }

        return static::convertFromContent($fromContent, $newProfileId);
    }

    /**
     * Create an instance by cpntent
     *
     * @param  string $fromContent
     * @param  int    $newProfileId
     * @return static
     */
    protected static function convertFromContent(string $fromContent, int $newProfileId): static
    {
        $fromProfileId = ZugferdProfileResolver::resolveProfileId($fromContent);

        // @phpstan-ignore new.static
        $profileConverter = new static($fromProfileId);
        $profileConverter->setConvertFromContent($fromContent);
        $profileConverter->setConvertToProfileId($newProfileId);

        return $profileConverter;
    }

    /**
     * Set the destination (the new) profile id
     *
     * @param  int    $toProfileId
     * @return static
     */
    protected function setConvertToProfileId(int $toProfileId): static
    {
        $this->convertToProfileId = $toProfileId;

        return $this;
    }

    /**
     * Set the source-content
     *
     * @param  string $fromContent
     * @return static
     */
    protected function setConvertFromContent(string $fromContent): static
    {
        $this->convertFromContent = $fromContent;

        return $this;
    }

    /**
     * Convert and save to file
     *
     * @param  string $toFile
     * @return static
     */
    protected function convertToFile(string $toFile): static
    {
        file_put_contents($toFile, $this->convertToString());

        return $this;
    }

    /**
     * Convert and get xml content as string
     *
     * @return string
     */
    protected function convertToString(): string
    {
        return $this->performConversion()->documentBuilder->getContentAsXml();
    }

    /**
     * Internal conversion method
     *
     * @return static
     */
    protected function performConversion(): static
    {
        if (!is_null($this->documentBuilder)) {
            return $this;
        }

        $documentReader = InvoiceSuiteDocumentReader::createFromContent($this->convertFromContent);
        $documentReader->convertToDTO($documentDTO);

        $this->documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(ZugferdProfiles::PROFILEDEF[$this->convertToProfileId]['invoicesuiteproviderid']);
        $this->documentBuilder->createFromDTO($documentDTO);

        return $this;
    }
}
