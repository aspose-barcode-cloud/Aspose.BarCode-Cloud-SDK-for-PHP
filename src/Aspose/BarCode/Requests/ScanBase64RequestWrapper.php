<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="ScanBase64RequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "scanBase64" operation.
 */
class ScanBase64RequestWrapper
{
    /**
     * Initializes a new instance of the ScanBase64RequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\ScanBase64Request $scan_base64_request Barcode scan request
     */
    public function __construct($scan_base64_request)
    {
        $this->scan_base64_request = $scan_base64_request;
    }

    /**
     * Barcode scan request
     */
    public $scan_base64_request;
}
