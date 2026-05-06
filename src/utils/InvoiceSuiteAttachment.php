<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use finfo;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\mimedb\MimeDb;

/**
 * class representing a definition for a binary object
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteAttachment
{
    /**
     * Indicator that attachment comes from a real file
     */
    protected const IS_FROM_FILE = 1;

    /**
     * Indicator that attachment comes from a binary string
     */
    protected const IS_FROM_BINARY_STRING = 2;

    /**
     * Indicator that attachment comes from a Base64 string
     */
    protected const IS_FROM_BASE64_STRING = 3;

    /**
     * Indicator that attachment comes from a URL
     */
    protected const IS_FROM_URL = 4;

    /**
     * The content type
     *
     * @var int
     */
    protected $internalType = -1;

    /**
     * The content
     *
     * @var string
     */
    protected $internalContent = '';

    /**
     * The filename
     *
     * @var string
     */
    protected $internalFilename = '';

    /**
     * The original filename extension (lowercase, without dot)
     *
     * @var string
     */
    protected $internalFilenameExtension = '';

    /**
     * Constructor (hidden)
     *
     * @param string $internalContent
     * @param string $internalFilename
     * @param int    $internalType
     */
    final protected function __construct(
        string $internalContent,
        string $internalFilename,
        int $internalType
    ) {
        $this->internalType = $internalType;
        $this->internalContent = $internalContent;
        $this->internalFilename = InvoiceSuiteFileUtils::getFilenameWithoutExtension($internalFilename);
        $this->internalFilenameExtension = strtolower(InvoiceSuiteFileUtils::getFileExtension($internalFilename));
    }

    /**
     * Create a binary object definition by file contents
     *
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function fromFile(
        string $filename
    ): static {
        if (!InvoiceSuiteFileUtils::isReadableFilePath($filename)) {
            throw new InvoiceSuiteFileNotFoundException($filename);
        }

        $content = file_get_contents($filename);

        if (false === $content) {
            throw new InvoiceSuiteFileNotReadableException($filename);
        }

        return new static($content, $filename, static::IS_FROM_FILE);
    }

    /**
     * Create a binary object definition by a string containing binary data
     *
     * @param  string $content
     * @param  string $filename
     * @return static
     */
    public static function fromBinaryString(
        string $content,
        string $filename
    ): static {
        return new static($content, $filename, static::IS_FROM_BINARY_STRING);
    }

    /**
     * Create a binary object definition by a string containing BASE64 data
     *
     * @param  string $content
     * @param  string $filename
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public static function fromBase64String(
        string $content,
        string $filename
    ): static {
        $content = base64_decode($content, true);

        if (false === $content) {
            throw new InvoiceSuiteInvalidArgumentException('Not a BASE64 string');
        }

        return new static($content, $filename, static::IS_FROM_BASE64_STRING);
    }

    /**
     * Create a binary object definition by a string containing an URL
     *
     * @param  string $url
     * @return static
     */
    public static function fromUrl(
        string $url
    ): static {
        return new static($url, '', static::IS_FROM_URL);
    }

    /**
     * Returns true if the attachment contains data from a file
     *
     * @return bool
     */
    public function isFileAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_FILE;
    }

    /**
     * Returns true if the attachment contains BASE64-Data
     *
     * @return bool
     */
    public function isBase64StringAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_BASE64_STRING;
    }

    /**
     * Returns true if the attachment contains binary data
     *
     * @return bool
     */
    public function isBinaryStringAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_BINARY_STRING;
    }

    /**
     * Returns true if the attachment is URL based
     *
     * @return bool
     */
    public function isUrlAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_URL;
    }

    /**
     * Returns true if the attachment contains binary data
     *
     * @return bool
     */
    public function isBinaryAttachment(): bool
    {
        return $this->isFileAttachment() || $this->isBinaryStringAttachment() || $this->isBase64StringAttachment();
    }

    /**
     * Get the raw attachment content
     *
     * @return string
     */
    public function getRawContent(): string
    {
        return $this->internalContent;
    }

    /**
     * Get the attachment content
     *
     * @return string
     */
    public function getContent(): string
    {
        if ($this->isUrlAttachment()) {
            return $this->getRawContent();
        }

        return base64_encode($this->getRawContent());
    }

    /**
     * Get the attachment mimetype. Returns false if not a file-based attachment
     *
     * @return false|string
     */
    public function getContentMimeType(): false|string
    {
        if (!$this->isBinaryAttachment()) {
            return false;
        }

        $tempFileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $tempFileInfo->buffer($this->internalContent);

        if ($mimeType === 'text/plain' && $this->internalFilenameExtension === 'csv') {
            return 'text/csv';
        }

        return $mimeType;
    }

    /**
     * Get the attachment filename. Returns false if not a file-based attachment
     *
     * @return false|string
     */
    public function getFilename(): false|string
    {
        if (!$this->isBinaryAttachment()) {
            return false;
        }

        $tempFileExtension = MimeDb::singleton()->findFirstFileExtensionByMimeType($this->getContentMimeType());

        return InvoiceSuiteFileUtils::combineFilenameWithFileextension($this->internalFilename, $tempFileExtension);
    }
}
