<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\dto;

/**
 * Class representing a DTO for...
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteProjectDTO
{
    /**
     * The project number
     *
     * @var null|string
     */
    protected ?string $projectNumber = null;

    /**
     * The project name
     *
     * @var null|string
     */
    protected ?string $projectName = null;

    /**
     * Constructor
     *
     * @param null|string $projectNumber The project number
     * @param null|string $projectName   The project name
     */
    public function __construct(?string $projectNumber = null, ?string $projectName = null)
    {
        $this->setProjectNumber($projectNumber);
        $this->setProjectName($projectName);
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
     * @return self
     */
    public function setProjectNumber(?string $projectNumber): self
    {
        $this->projectNumber = $projectNumber;

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
     * @return self
     */
    public function setProjectName(?string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }
}
