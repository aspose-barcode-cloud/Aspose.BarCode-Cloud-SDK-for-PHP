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
     * @param string $data String represents data to encode
     * @param \Aspose\BarCode\Model\EncodeDataType $data_type
     * @param \Aspose\BarCode\Model\BarcodeImageFormat $image_format
     * @param \Aspose\BarCode\Model\CodeLocation $text_location
     * @param string $foreground_color Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black.
     * @param string $background_color Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White.
     * @param \Aspose\BarCode\Model\GraphicsUnit $units
     * @param float $resolution Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot.
     * @param float $image_height Height of the barcode image in given units. Default units: pixel. Decimal separator is dot.
     * @param float $image_width Width of the barcode image in given units. Default units: pixel. Decimal separator is dot.
     * @param int $rotation_angle BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
     */
    public function __construct($barcode_type, $data, $data_type = null, $image_format = null, $text_location = null, $foreground_color = null, $background_color = null, $units = null, $resolution = null, $image_height = null, $image_width = null, $rotation_angle = null)
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
    }

    /**
     * Gets or sets barcode_type
     */
    public $barcode_type;

    /**
     * String represents data to encode
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
     * Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black.
     */
    public $foreground_color;

    /**
     * Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White.
     */
    public $background_color;

    /**
     * Gets or sets units
     */
    public $units;

    /**
     * Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot.
     */
    public $resolution;

    /**
     * Height of the barcode image in given units. Default units: pixel. Decimal separator is dot.
     */
    public $image_height;

    /**
     * Width of the barcode image in given units. Default units: pixel. Decimal separator is dot.
     */
    public $image_width;

    /**
     * BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
     */
    public $rotation_angle;
}
