<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="RecognizeRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "recognize" operation.
 */
class RecognizeRequestWrapper
{
    /**
     * Initializes a new instance of the RecognizeRequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\DecodeBarcodeType $barcode_type Type of barcode to recognize
     * @param string $file_url Url to barcode image
     * @param \Aspose\BarCode\Model\RecognitionMode $recognition_mode Recognition mode
     * @param \Aspose\BarCode\Model\RecognitionImageKind $recognition_image_kind Image kind for recognition
     */
    public function __construct($barcode_type, $file_url, $recognition_mode = null, $recognition_image_kind = null)
    {
        $this->barcode_type = $barcode_type;
        $this->file_url = $file_url;
        $this->recognition_mode = $recognition_mode;
        $this->recognition_image_kind = $recognition_image_kind;
    }

    /**
     * Type of barcode to recognize
     */
    public $barcode_type;

    /**
     * Url to barcode image
     */
    public $file_url;

    /**
     * Recognition mode
     */
    public $recognition_mode;

    /**
     * Image kind for recognition
     */
    public $recognition_image_kind;
}
