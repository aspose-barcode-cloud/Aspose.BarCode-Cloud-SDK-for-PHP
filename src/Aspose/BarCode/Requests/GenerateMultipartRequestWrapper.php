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
     * @param \Aspose\BarCode\Model\EncodeBarcodeType $barcode_type
     * @param string $data String that represents the data to encode.
     * @param \Aspose\BarCode\Model\EncodeDataType $data_type
     * @param \Aspose\BarCode\Model\BarcodeImageFormat $image_format
     * @param \Aspose\BarCode\Model\CodeLocation $text_location
     * @param string $foreground_color Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black.
     * @param string $background_color Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White.
     * @param \Aspose\BarCode\Model\GraphicsUnit $units
     * @param float $resolution Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot.
     * @param float $image_height Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     * @param float $image_width Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     * @param int $rotation_angle Barcode image rotation angle, measured in degrees. For example, RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
     * @param \Aspose\BarCode\Model\QREncodeMode $qr_encode_mode
     * @param \Aspose\BarCode\Model\QRErrorLevel $qr_error_level
     * @param \Aspose\BarCode\Model\QRVersion $qr_version
     * @param \Aspose\BarCode\Model\ECIEncodings $qr_eci_encoding
     * @param float $qr_aspect_ratio QR barcode aspect ratio. Values: 0 to 1.
     * @param \Aspose\BarCode\Model\MicroQRVersion $micro_qr_version
     * @param \Aspose\BarCode\Model\RectMicroQRVersion $rect_micro_qr_version
     * @param \Aspose\BarCode\Model\Code128EncodeMode $code128_encode_mode
     * @param \Aspose\BarCode\Model\Pdf417EncodeMode $pdf417_encode_mode
     * @param \Aspose\BarCode\Model\Pdf417ErrorLevel $pdf417_error_level
     * @param bool $pdf417_truncate Whether to use truncated PDF417 format (removes right-side stop pattern).
     * @param int $pdf417_columns Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto.
     * @param int $pdf417_rows Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic.
     * @param float $pdf417_aspect_ratio PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417.
     * @param \Aspose\BarCode\Model\ECIEncodings $pdf417_eci_encoding
     * @param bool $pdf417_is_reader_initialization Whether the barcode is used for reader initialization (programming).
     * @param \Aspose\BarCode\Model\MacroCharacter $pdf417_macro_characters
     * @param bool $pdf417_is_linked Whether to use linked mode (for MicroPdf417).
     * @param bool $pdf417_is_code128_emulation Whether to use Code128 emulation for MicroPdf417.
     */
    public function __construct($barcode_type, $data, $data_type = null, $image_format = null, $text_location = null, $foreground_color = null, $background_color = null, $units = null, $resolution = null, $image_height = null, $image_width = null, $rotation_angle = null, $qr_encode_mode = null, $qr_error_level = null, $qr_version = null, $qr_eci_encoding = null, $qr_aspect_ratio = null, $micro_qr_version = null, $rect_micro_qr_version = null, $code128_encode_mode = null, $pdf417_encode_mode = null, $pdf417_error_level = null, $pdf417_truncate = null, $pdf417_columns = null, $pdf417_rows = null, $pdf417_aspect_ratio = null, $pdf417_eci_encoding = null, $pdf417_is_reader_initialization = null, $pdf417_macro_characters = null, $pdf417_is_linked = null, $pdf417_is_code128_emulation = null)
    {
        $this->barcode_type = $barcode_type;
        $this->data = $data;
        $this->data_type = $data_type;
        $this->image_format = $image_format;
        $this->text_location = $text_location;
        $this->foreground_color = $foreground_color;
        $this->background_color = $background_color;
        $this->units = $units;
        $this->resolution = $resolution;
        $this->image_height = $image_height;
        $this->image_width = $image_width;
        $this->rotation_angle = $rotation_angle;
        $this->qr_encode_mode = $qr_encode_mode;
        $this->qr_error_level = $qr_error_level;
        $this->qr_version = $qr_version;
        $this->qr_eci_encoding = $qr_eci_encoding;
        $this->qr_aspect_ratio = $qr_aspect_ratio;
        $this->micro_qr_version = $micro_qr_version;
        $this->rect_micro_qr_version = $rect_micro_qr_version;
        $this->code128_encode_mode = $code128_encode_mode;
        $this->pdf417_encode_mode = $pdf417_encode_mode;
        $this->pdf417_error_level = $pdf417_error_level;
        $this->pdf417_truncate = $pdf417_truncate;
        $this->pdf417_columns = $pdf417_columns;
        $this->pdf417_rows = $pdf417_rows;
        $this->pdf417_aspect_ratio = $pdf417_aspect_ratio;
        $this->pdf417_eci_encoding = $pdf417_eci_encoding;
        $this->pdf417_is_reader_initialization = $pdf417_is_reader_initialization;
        $this->pdf417_macro_characters = $pdf417_macro_characters;
        $this->pdf417_is_linked = $pdf417_is_linked;
        $this->pdf417_is_code128_emulation = $pdf417_is_code128_emulation;
    }

    /**
     * Gets or sets barcode_type
     */
    public $barcode_type;

    /**
     * String that represents the data to encode.
     */
    public $data;

    /**
     * Gets or sets data_type
     */
    public $data_type;

    /**
     * Gets or sets image_format
     */
    public $image_format;

    /**
     * Gets or sets text_location
     */
    public $text_location;

    /**
     * Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black.
     */
    public $foreground_color;

    /**
     * Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White.
     */
    public $background_color;

    /**
     * Gets or sets units
     */
    public $units;

    /**
     * Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot.
     */
    public $resolution;

    /**
     * Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     */
    public $image_height;

    /**
     * Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     */
    public $image_width;

    /**
     * Barcode image rotation angle, measured in degrees. For example, RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
     */
    public $rotation_angle;

    /**
     * Gets or sets qr_encode_mode
     */
    public $qr_encode_mode;

    /**
     * Gets or sets qr_error_level
     */
    public $qr_error_level;

    /**
     * Gets or sets qr_version
     */
    public $qr_version;

    /**
     * Gets or sets qr_eci_encoding
     */
    public $qr_eci_encoding;

    /**
     * QR barcode aspect ratio. Values: 0 to 1.
     */
    public $qr_aspect_ratio;

    /**
     * Gets or sets micro_qr_version
     */
    public $micro_qr_version;

    /**
     * Gets or sets rect_micro_qr_version
     */
    public $rect_micro_qr_version;

    /**
     * Gets or sets code128_encode_mode
     */
    public $code128_encode_mode;

    /**
     * Gets or sets pdf417_encode_mode
     */
    public $pdf417_encode_mode;

    /**
     * Gets or sets pdf417_error_level
     */
    public $pdf417_error_level;

    /**
     * Whether to use truncated PDF417 format (removes right-side stop pattern).
     */
    public $pdf417_truncate;

    /**
     * Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto.
     */
    public $pdf417_columns;

    /**
     * Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic.
     */
    public $pdf417_rows;

    /**
     * PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417.
     */
    public $pdf417_aspect_ratio;

    /**
     * Gets or sets pdf417_eci_encoding
     */
    public $pdf417_eci_encoding;

    /**
     * Whether the barcode is used for reader initialization (programming).
     */
    public $pdf417_is_reader_initialization;

    /**
     * Gets or sets pdf417_macro_characters
     */
    public $pdf417_macro_characters;

    /**
     * Whether to use linked mode (for MicroPdf417).
     */
    public $pdf417_is_linked;

    /**
     * Whether to use Code128 emulation for MicroPdf417.
     */
    public $pdf417_is_code128_emulation;
}
