<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

/**
 * Class representing the profile resolver
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 *
 * @phpstan-type ProfileDef array{
 *   name: string,
 *   altname: string,
 *   description: string,
 *   contextparameter: string,
 *   alternativecontextparameters: list<string>,
 *   businessprocess: string|null,
 *   attachmentfilename: string,
 *   xmpname: string,
 *   xmpversion: string,
 *   xsdfilename: string,
 *   schematronfilename: string,
 *   xsltfilename: string,
 *   invoicesuiteproviderid: string
 * }
 */
class ZugferdProfileResolver
{
    /**
     * Resolve profile id and profile definition by the content of $xmlContent
     *
     * @param  string                     $xmlContent
     * @return array{0:int, 1:ProfileDef}
     */
    public static function resolve(string $xmlContent): array
    {
        $documentReader = InvoiceSuiteDocumentReader::createFromContent($xmlContent);

        foreach (ZugferdProfiles::PROFILEDEF as $profile => $profileDef) {
            if ($profileDef['invoicesuiteproviderid'] == $documentReader->getCurrentDocumentFormatProvider()->getUniqueId()) {
                return [$profile, $profileDef];
            }
        }

        throw new InvoiceSuiteFormatProviderNotFoundException('unknown');
    }

    /**
     * Resolve profile id by the content of $xmlContent
     *
     * @param  string $xmlContent
     * @return int
     */
    public static function resolveProfileId(string $xmlContent): int
    {
        return static::resolve($xmlContent)[0];
    }

    /**
     * Resolve profile definition by the content of $xmlContent
     *
     * @param  string     $xmlContent
     * @return ProfileDef
     */
    public static function resolveProfileDef(string $xmlContent): array
    {
        return static::resolve($xmlContent)[1];
    }

    /**
     * Resolve profile id and profile definition by it's id
     *
     * @param  int                        $profileId
     * @return array{0:int, 1:ProfileDef}
     */
    public static function resolveById(int $profileId): array
    {
        if (!isset(ZugferdProfiles::PROFILEDEF[$profileId])) {
            throw new InvoiceSuiteFormatProviderNotFoundException((string) $profileId);
        }

        return [$profileId, ZugferdProfiles::PROFILEDEF[$profileId]];
    }

    /**
     * Resolve profile profile definition by it's id
     *
     * @param  int        $profileId
     * @return ProfileDef
     */
    public static function resolveProfileDefById(int $profileId): array
    {
        $resolved = static::resolveById($profileId);

        return $resolved[1];
    }
}
