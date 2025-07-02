<?php

namespace horstoeko\invoicesuite\utils;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\mimedb\MimeDb;
use horstoeko\stringmanagement\FileUtils;
use InvalidArgumentException;

/**
 * class representing a definition for a binary object
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteAttachment
{
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
    protected $internalContent = "";

    /**
     * The filename
     *
     * @var string
     */
    protected $internalFilename = "";

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
     * Create a binary object definition by file contents
     *
     * @param string $filename
     * @return InvoiceSuiteAttachment
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     */
    public static function fromFile(string $filename): InvoiceSuiteAttachment
    {
        if (!file_exists($filename)) {
            throw new InvoiceSuiteFileNotFoundException($filename);
        }

        $content = file_get_contents($filename);

        if ($content === false) {
            throw new InvoiceSuiteFileNotReadableException($filename);
        }

        return new static($content, $filename, static::IS_FROM_FILE);
    }

    /**
     * Create a binary object definition by a string containing binary data
     *
     * @param string $content
     * @param string $filename
     * @return InvoiceSuiteAttachment
     */
    public static function fromBinaryString(string $content, string $filename): InvoiceSuiteAttachment
    {
        return new static($content, $filename, static::IS_FROM_BINARY_STRING);
    }

    /**
     * Create a binary object definition by a string containing BASE64 data
     *
     * @param string $content
     * @param string $filename
     * @return InvoiceSuiteAttachment
     * @throws InvalidArgumentException
     */
    public static function fromBase64String(string $content, string $filename): InvoiceSuiteAttachment
    {
        $content = base64_decode($content, true);

        if ($content === false) {
            throw new InvalidArgumentException("Not a BASE64 string");
        }

        return new static($content, $filename, static::IS_FROM_BASE64_STRING);
    }

    /**
     * Create a binary object definition by a string containing an URL
     *
     * @param string $url
     * @return InvoiceSuiteAttachment
     * @throws InvalidArgumentException
     */
    public static function fromUrl(string $url): InvoiceSuiteAttachment
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException(sprintf('Not a valid URL: %s', $url));
        }

        return new static($url, '', static::IS_FROM_URL);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $internalContent
     * @param string $internalFilename
     * @param int $internalType
     * @return void
     */
    final protected function __construct(string $internalContent, string $internalFilename, int $internalType)
    {
        $this->internalType = $internalType;
        $this->internalContent = $internalContent;
        $this->internalFilename = FileUtils::getFilenameWithoutExtension($internalFilename);
    }

    /**
     * Returns true if the attachment contains data from a file
     *
     * @return boolean
     */
    public function isFileAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_FILE;
    }

    /**
     * Returns true if the attachment contains BASE64-Data
     *
     * @return boolean
     */
    public function isBase64StringAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_BASE64_STRING;
    }

    /**
     * Returns true if the attachment contains binary data
     *
     * @return boolean
     */
    public function isBinaryStringAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_BINARY_STRING;
    }

    /**
     * Returns true if the attachment is URL based
     *
     * @return boolean
     */
    public function isUrlAttachment(): bool
    {
        return $this->internalType == static::IS_FROM_URL;
    }

    /**
     * Returns true if the attachment contains binary data
     *
     * @return boolean
     */
    public function isBinaryAttachment(): bool
    {
        return $this->isFileAttachment() || $this->isBinaryStringAttachment() || $this->isFileAttachment();
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

        if ($this->isBase64StringAttachment()) {
            return $this->getRawContent();
        }

        return base64_encode($this->getRawContent());
    }

    /**
     * Get the attachment mimetype. Returns false if not a file-based attachment
     *
     * @return false|string
     */
    public function getContentMimeType()
    {
        if (!$this->isBinaryAttachment()) {
            return false;
        }

        $tempFileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $tempFilename = tempnam(sys_get_temp_dir(), 'b64');
        file_put_contents($tempFilename, $this->internalContent);
        $mime = $tempFileInfo->file($tempFilename);
        unlink($tempFilename);

        return $mime;
    }

    /**
     * Get the attachment filename. Returns false if not a file-based attachment
     *
     * @return false|string
     */
    public function getFilename()
    {
        if (!$this->isBinaryAttachment()) {
            return false;
        }

        $tempFileExtension = (MimeDb::singleton())->findFirstFileExtensionByMimeType($this->getContentMimeType());

        return FileUtils::combineFilenameWithFileextension($this->internalFilename, $tempFileExtension);
    }
}
