<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="GenerateBatchRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "generateBatch" operation.
 */
class GenerateBatchRequestWrapper
{
    /**
     * Initializes a new instance of the GenerateBatchRequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\BatchGenerateRequest $batch_generate_request Batch generation request in JSON or XML format.
     */
    public function __construct($batch_generate_request)
    {
        $this->batch_generate_request = $batch_generate_request;
    }

    /**
     * Batch generation request in JSON or XML format.
     */
    public $batch_generate_request;
}
