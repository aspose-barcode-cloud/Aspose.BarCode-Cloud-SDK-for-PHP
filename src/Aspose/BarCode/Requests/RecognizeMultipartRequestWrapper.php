<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="RecognizeMultipartRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "recognizeMultipart" operation.
 */
class RecognizeMultipartRequestWrapper
{
    /**
     * Initializes a new instance of the RecognizeMultipartRequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\DecodeBarcodeType $barcode_type
     * @param \SplFileObject $file Barcode image file
     * @param \Aspose\BarCode\Model\RecognitionMode $recognition_mode
     * @param \Aspose\BarCode\Model\RecognitionImageKind $recognition_image_kind
     */
    public function __construct($barcode_type, $file, $recognition_mode = null, $recognition_image_kind = null)
    {
        $this->barcode_type = $barcode_type;
        $this->file = $file;
        $this->recognition_mode = $recognition_mode;
        $this->recognition_image_kind = $recognition_image_kind;
    }

    /**
     * Gets or sets barcode_type
     */
    public $barcode_type;

    /**
     * Barcode image file
     */
    public $file;

    /**
     * Gets or sets recognition_mode
     */
    public $recognition_mode;

    /**
     * Gets or sets recognition_image_kind
     */
    public $recognition_image_kind;
}
