<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="GenerateBodyRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "generateBody" operation.
 */
class GenerateBodyRequestWrapper
{
    /**
     * Initializes a new instance of the GenerateBodyRequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\GenerateParams $generate_params Parameters of generation
     */
    public function __construct($generate_params)
    {
        $this->generate_params = $generate_params;
    }

    /**
     * Parameters of generation
     */
    public $generate_params;
}
