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
     * @param \Aspose\BarCode\Model\DecodeBarcodeType $barcode_type See https://reference.aspose.com/barcode/net/aspose.barcode.barcoderecognition/decodetype/
     * @param \SplFileObject $file Barcode image file.
     * @param \Aspose\BarCode\Model\RecognitionMode $recognition_mode Recognition mode.
     * @param \Aspose\BarCode\Model\RecognitionImageKind $recognition_image_kind Image kind for recognition.
     */
    public function __construct($barcode_type, $file, $recognition_mode = null, $recognition_image_kind = null)
    {
        $this->barcode_type = $barcode_type;
        $this->file = $file;
        $this->recognition_mode = $recognition_mode;
        $this->recognition_image_kind = $recognition_image_kind;
    }

    /**
     * See https://reference.aspose.com/barcode/net/aspose.barcode.barcoderecognition/decodetype/
     */
    public $barcode_type;

    /**
     * Barcode image file.
     */
    public $file;

    /**
     * Recognition mode.
     */
    public $recognition_mode;

    /**
     * Image kind for recognition.
     */
    public $recognition_image_kind;
}
