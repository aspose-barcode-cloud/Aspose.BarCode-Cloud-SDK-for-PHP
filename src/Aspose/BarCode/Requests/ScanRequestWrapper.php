<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="ScanRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "scan" operation.
 */
class ScanRequestWrapper
{
    /**
     * Initializes a new instance of the ScanRequestWrapper class.
     *
     * @param string $file_url Url to barcode image
     */
    public function __construct($file_url)
    {
        $this->file_url = $file_url;
    }

    /**
     * Url to barcode image
     */
    public $file_url;
}
