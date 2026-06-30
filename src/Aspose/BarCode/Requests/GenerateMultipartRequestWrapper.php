<?php

/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="GenerateMultipartRequestWrapper.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * --------------------------------------------------------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Aspose\BarCode\Requests;

/**
 * Request model for "generateMultipart" operation.
 */
class GenerateMultipartRequestWrapper
{
    /**
     * Initializes a new instance of the GenerateMultipartRequestWrapper class.
     *
     * @param \Aspose\BarCode\Model\EncodeBarcodeType $barcode_type See https://reference.aspose.com/barcode/net/aspose.barcode.generation/encodetypes/
     * @param string $data String that represents the data to encode.
     * @param \Aspose\BarCode\Model\EncodeDataType $data_type Type of data to encode. Default value: StringData.
     * @param \Aspose\BarCode\Model\BarcodeImageParams $barcode_image_params Grouped parameters for BarcodeImageParams.
     * @param \Aspose\BarCode\Model\QrParams $qr_params Grouped parameters for QrParams.
     * @param \Aspose\BarCode\Model\Code128Params $code128_params Grouped parameters for Code128Params.
     * @param \Aspose\BarCode\Model\Pdf417Params $pdf417_params Grouped parameters for Pdf417Params.
     */
    public function __construct($barcode_type, $data, $data_type = null, $barcode_image_params = null, $qr_params = null, $code128_params = null, $pdf417_params = null)
    {
        $this->barcode_type = $barcode_type;
        $this->data = $data;
        $this->data_type = $data_type;
        $this->barcode_image_params = $barcode_image_params;
        $this->qr_params = $qr_params;
        $this->code128_params = $code128_params;
        $this->pdf417_params = $pdf417_params;
    }

    /**
     * See https://reference.aspose.com/barcode/net/aspose.barcode.generation/encodetypes/
     */
    public $barcode_type;

    /**
     * String that represents the data to encode.
     */
    public $data;

    /**
     * Type of data to encode. Default value: StringData.
     */
    public $data_type;

    /**
     * Grouped parameters for BarcodeImageParams.
     *
     * @var \Aspose\BarCode\Model\BarcodeImageParams|null
     */
    public $barcode_image_params;

    /**
     * Grouped parameters for QrParams.
     *
     * @var \Aspose\BarCode\Model\QrParams|null
     */
    public $qr_params;

    /**
     * Grouped parameters for Code128Params.
     *
     * @var \Aspose\BarCode\Model\Code128Params|null
     */
    public $code128_params;

    /**
     * Grouped parameters for Pdf417Params.
     *
     * @var \Aspose\BarCode\Model\Pdf417Params|null
     */
    public $pdf417_params;
}
