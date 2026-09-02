<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\validators;

use CURLStringFile;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\abstracts\InvoiceSuiteAbstractDocumentValidator;
use JsonException;
use Throwable;

/**
 * Class representing the implementation for the DocuFlair Validator
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocuflairDocumentValidator extends InvoiceSuiteAbstractDocumentValidator
{
    /**
     * The URL to the validation endpoint
     *
     * @var string
     */
    private string $baseUrl = 'https://invoice.docuflair.com';

    /**
     * Set the required API key
     *
     * @var string
     */
    private string $apiKey = '';

    /**
     * Set the base URL
     *
     * @param  string $newBaseUrl
     * @return static
     */
    public function setBaseUrl(
        string $newBaseUrl
    ): static {
        if (false !== filter_var($newBaseUrl, FILTER_VALIDATE_URL)) {
            $this->baseUrl = InvoiceSuiteStringUtils::trimEnd($newBaseUrl, '/');
        }

        return $this;
    }

    /**
     * Set the required API key
     *
     * @param  string $newApiKey
     * @return static
     */
    public function setApiKey(
        string $newApiKey
    ): static {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newApiKey)) {
            $this->apiKey = $newApiKey;
        }

        return $this;
    }

    /**
     * The validation entry point
     *
     * @return static
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    protected function doValidate(): static
    {
        if (false === $this->checkRequirements()) {
            return $this;
        }

        $this->performValidation();

        return $this;
    }

    /**
     * Check Requirements
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function checkRequirements(): bool
    {
        if (InvoiceSuiteContentType::XML !== InvoiceSuiteContentTypeResolver::resolveContentType($this->getRawDocumentContent())) {
            $this->addInternalErrorMessageToMessageBag('Only XML content can be validated with this Validator');

            return false;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getRawDocumentContent())) {
            $this->addInternalErrorMessageToMessageBag('Content to validate must be given');

            return false;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->baseUrl)) {
            $this->addInternalErrorMessageToMessageBag('URL to validation endpoint must be given');

            return false;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->apiKey)) {
            $this->addInternalErrorMessageToMessageBag('API key must be given');

            return false;
        }

        try {
            $httpConnection = curl_init($this->baseUrl);

            curl_setopt($httpConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($httpConnection, CURLOPT_HEADER, false);
            curl_setopt($httpConnection, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($httpConnection, CURLOPT_ENCODING, '');
            curl_setopt($httpConnection, CURLOPT_AUTOREFERER, true);
            curl_setopt($httpConnection, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($httpConnection, CURLOPT_TIMEOUT, 120);
            curl_setopt($httpConnection, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
            curl_setopt($httpConnection, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($httpConnection, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($httpConnection);

            if (false === $response) {
                $this->addInternalErrorMessageToMessageBag('Failed to connect to the host');
                $this->addInternalErrorMessageToMessageBag(curl_error($httpConnection));

                return false;
            }

            $responseStatusCode = curl_getinfo($httpConnection, CURLINFO_HTTP_CODE);

            if (($responseStatusCode < 200) || ($responseStatusCode >= 400)) {
                $this->addInternalErrorMessageToMessageBag('Failed to connect to the host');
                $this->addInternalErrorMessageToMessageBag(curl_error($httpConnection));

                return false;
            }
        } catch (Throwable $throwable) {
            $this->addInternalErrorMessageToMessageBag($throwable->getMessage());

            return false;
        }

        return true;
    }

    /**
     * Runs the validation against the validation endpoint of docuflair
     *
     * @return void
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    private function performValidation(): void
    {
        try {
            $httpConnection = curl_init($this->baseUrl . '/api/validate');

            $body = new CURLStringFile($this->getRawDocumentContent(), 'document.xml', 'application/xml');

            curl_setopt($httpConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($httpConnection, CURLOPT_HEADER, false);
            curl_setopt($httpConnection, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($httpConnection, CURLOPT_ENCODING, '');
            curl_setopt($httpConnection, CURLOPT_AUTOREFERER, true);
            curl_setopt($httpConnection, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($httpConnection, CURLOPT_TIMEOUT, 120);
            curl_setopt($httpConnection, CURLOPT_POST, true);
            curl_setopt($httpConnection, CURLOPT_POSTFIELDS, ['file' => $body]);
            curl_setopt($httpConnection, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data', 'X-Api-Key: ' . $this->apiKey]);
            curl_setopt($httpConnection, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
            curl_setopt($httpConnection, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($httpConnection, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($httpConnection);

            if (false === $response) {
                $this->addInternalErrorMessageToMessageBag('Failed to connect to the host');
                $this->addInternalErrorMessageToMessageBag(curl_error($httpConnection));

                return;
            }

            $responseStatusCode = curl_getinfo($httpConnection, CURLINFO_HTTP_CODE);

            if ($this->handleHttpError($responseStatusCode, $response)) {
                return;
            }

            $this->handleHttpSuccess($response);
        } catch (Throwable $throwable) {
            $this->addInternalErrorMessageToMessageBag($throwable->getMessage());
        }
    }

    /**
     * Check must handle general HTTP error (400, 401, 413, 419). Returns true if a HTTP error was handled
     *
     * @param  int    $responseStatusCode
     * @param  string $response
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JsonException
     */
    private function handleHttpError(int $responseStatusCode, string $response): bool
    {
        if (!InvoiceSuiteArrayUtils::arrayContains([400, 401, 413, 429], $responseStatusCode)) {
            return false;
        }

        /**
         * @var null|array{
         *     type: null|string,
         *     title: null|string,
         *     status: null|int,
         *     detail: null|string,
         *     instance: null|string,
         *     error: null|string,
         * } $resposeJson
         */
        $resposeJson = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (null === $resposeJson) {
            $this->addInternalErrorMessageToMessageBag('Failed to decode the response content');

            return true;
        }

        $this->addInternalErrorMessageToMessageBag(
            newMessageContent: InvoiceSuiteStringUtils::sprintf(
                'Error %s occurred. Error: %s, Type: %s, Title: %s, Status: %s, Detail %s',
                $responseStatusCode,
                $resposeJson['error'] ?? 'unknown',
                $resposeJson['type'] ?? 'unknown',
                $resposeJson['title'] ?? 'unknown',
                $resposeJson['status'] ?? 'unknown',
                $resposeJson['detail'] ?? 'unknown',
            ),
            newMessageAdditionalData: $resposeJson
        );

        return true;
    }

    /**
     * Check must handle general success response (200).
     *
     * @param  string $response
     * @return void
     *
     * @throws InvoiceSuiteInvalidArgumentException
     * @throws JsonException
     */
    private function handleHttpSuccess(string $response): void
    {
        /**
         * @var null|array{
         *     detected: bool,
         *     format: string,
         *     formatName: string,
         *     validationLevel: string,
         *     isValid: bool,
         *     errorCount: int,
         *     warningCount: int,
         *     findings: list<array{
         *         ruleId: null|string,
         *         level: int,
         *         message: string,
         *         location: null|string,
         *         field: null|string,
         *         code: null|string,
         *         args: mixed
         *     }>
         * } $resposeJson
         */
        $resposeJson = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        if (null === $resposeJson) {
            $this->addInternalErrorMessageToMessageBag('Failed to decode the response content');

            return;
        }

        // Get information from response

        $docuemntIsAutoDetected = $resposeJson['detected'] ?? false;
        $documentIsValid = $resposeJson['isValid'] ?? false;
        $documentFindings = $resposeJson['findings'] ?? [];

        // Check that the document content was auto-detected

        if (false === $docuemntIsAutoDetected) {
            $this->addErrorMessageToMessageBag(
                newMessageContent: 'The document could not be auto-detected',
                newMessageAdditionalData: $resposeJson
            );

            return;
        }

        // Check that the document content is valid

        if (false === $documentIsValid) {
            foreach ($documentFindings as $documentFindingIndex => $documentFinding) {
                $this->addErrorMessageToMessageBag(
                    newMessageContent: InvoiceSuiteStringUtils::sprintf(
                        'Index: %s, Message: %s, RuleId: %s, Level: %s, Location: %s',
                        $documentFindingIndex,
                        $documentFinding['message'] ?? '',
                        $documentFinding['ruleId'] ?? '',
                        $documentFinding['level'] ?? '',
                        $documentFinding['location'] ?? '',
                    ),
                    newMessageAdditionalData: $documentFinding
                );
            }
        }
    }
}
