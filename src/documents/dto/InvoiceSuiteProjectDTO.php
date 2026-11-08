<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;
use JsonSerializable;

/**
 * Class representing a DTO for ...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteProjectDTO implements JsonSerializable
{
    /**
     * The project number
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getProjectNumber', setter: 'setProjectNumber')]
    #[JMS\SerializedName('projectNumber')]
    #[JMS\Type('string')]
    protected ?string $projectNumber = null;

    /**
     * The project name
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getProjectName', setter: 'setProjectName')]
    #[JMS\SerializedName('projectName')]
    #[JMS\Type('string')]
    protected ?string $projectName = null;

    /**
     * Constructor
     *
     * @param null|string $projectNumber The project number
     * @param null|string $projectName   The project name
     */
    public function __construct(
        ?string $projectNumber = null,
        ?string $projectName = null
    ) {
        $this->setProjectNumber($projectNumber);
        $this->setProjectName($projectName);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Returns the project number
     *
     * @return null|string
     */
    public function getProjectNumber(): ?string
    {
        return $this->projectNumber;
    }

    /**
     * Sets the project number
     *
     * @param  null|string $projectNumber The project number
     * @return static
     */
    public function setProjectNumber(
        ?string $projectNumber
    ): static {
        $this->projectNumber = InvoiceSuiteStringUtils::asNullWhenEmpty($projectNumber);

        return $this;
    }

    /**
     * Returns the project name
     *
     * @return null|string
     */
    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    /**
     * Sets the project name
     *
     * @param  null|string $projectName The project name
     * @return static
     */
    public function setProjectName(
        ?string $projectName
    ): static {
        $this->projectName = InvoiceSuiteStringUtils::asNullWhenEmpty($projectName);

        return $this;
    }
}
