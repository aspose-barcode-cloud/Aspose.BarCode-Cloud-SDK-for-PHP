<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="ScanMultipartRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "scanMultipart" operation.
 */
class ScanMultipartRequestWrapper
{
    /**
     * Initializes a new instance of the ScanMultipartRequestWrapper class.
     *
     * @param \SplFileObject $file Barcode image file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Barcode image file
     */
    public $file;
}
