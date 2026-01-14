<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="RecognizeBase64RequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "recognizeBase64" operation.
 */
class RecognizeBase64RequestWrapper
{
    /**
     * Initializes a new instance of the RecognizeBase64RequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\RecognizeBase64Request $recognize_base64_request Barcode recognition request
     */
    public function __construct($recognize_base64_request)
    {
        $this->recognize_base64_request = $recognize_base64_request;
    }

    /**
     * Barcode recognition request
     */
    public $recognize_base64_request;
}
