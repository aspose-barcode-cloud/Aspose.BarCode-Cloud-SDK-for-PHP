<?php

declare(strict_types=1);

use Aspose\BarCode\Model\ApiError;
use Aspose\BarCode\Model\ApiErrorResponse;
use Aspose\BarCode\Model\BarcodeImageFormat;
use Aspose\BarCode\Model\BarcodeImageParams;
use Aspose\BarCode\Model\BarcodeResponse;
use Aspose\BarCode\Model\BarcodeResponseList;
use Aspose\BarCode\Model\Code128EncodeMode;
use Aspose\BarCode\Model\Code128Params;
use Aspose\BarCode\Model\CodeLocation;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Model\ECIEncodings;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Model\EncodeData;
use Aspose\BarCode\Model\EncodeDataType;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Model\GraphicsUnit;
use Aspose\BarCode\Model\MacroCharacter;
use Aspose\BarCode\Model\MicroQRVersion;
use Aspose\BarCode\Model\Pdf417EncodeMode;
use Aspose\BarCode\Model\Pdf417ErrorLevel;
use Aspose\BarCode\Model\Pdf417Params;
use Aspose\BarCode\Model\QREncodeMode;
use Aspose\BarCode\Model\QRErrorLevel;
use Aspose\BarCode\Model\QrParams;
use Aspose\BarCode\Model\QRVersion;
use Aspose\BarCode\Model\RecognitionImageKind;
use Aspose\BarCode\Model\RecognitionMode;
use Aspose\BarCode\Model\RecognizeBase64Request;
use Aspose\BarCode\Model\RectMicroQRVersion;
use Aspose\BarCode\Model\RegionPoint;
use Aspose\BarCode\Model\ScanBase64Request;
use PHPUnit\Framework\TestCase;

/**
 * Shared fixtures for the offline coverage tests (`GeneratedModelCoverageTest`,
 * `RequestBuilderCoverageTest`): fully populated instances of every generated model and a
 * helper that picks one wire string constant from a generated enum class. No network is
 * touched. Not a test case itself.
 */
abstract class OfflineCoverageTestCase extends TestCase
{
    /**
     * Returns one wire string constant declared on a generated enum class.
     *
     * @param class-string $enumClass
     */
    protected function enumValue(string $enumClass): string
    {
        $constants = (new ReflectionClass($enumClass))->getConstants();
        foreach ($constants as $value) {
            if (is_string($value)) {
                return $value;
            }
        }
        $this->fail("enum {$enumClass} declares no string constants");
    }

    protected function barcodeImageParams(): BarcodeImageParams
    {
        return new BarcodeImageParams([
            'image_format' => $this->enumValue(BarcodeImageFormat::class),
            'text_location' => $this->enumValue(CodeLocation::class),
            'foreground_color' => 'Black',
            'background_color' => 'White',
            'units' => $this->enumValue(GraphicsUnit::class),
            'resolution' => 96.0,
            'image_height' => 200.0,
            'image_width' => 300.0,
            'rotation_angle' => 90,
        ]);
    }

    protected function qrParams(): QrParams
    {
        return new QrParams([
            'qr_encode_mode' => $this->enumValue(QREncodeMode::class),
            'qr_error_level' => $this->enumValue(QRErrorLevel::class),
            'qr_version' => $this->enumValue(QRVersion::class),
            'qr_eci_encoding' => $this->enumValue(ECIEncodings::class),
            'qr_aspect_ratio' => 0.75,
            'micro_qr_version' => $this->enumValue(MicroQRVersion::class),
            'rect_micro_qr_version' => $this->enumValue(RectMicroQRVersion::class),
        ]);
    }

    protected function code128Params(): Code128Params
    {
        return new Code128Params([
            'code128_encode_mode' => $this->enumValue(Code128EncodeMode::class),
        ]);
    }

    protected function pdf417Params(): Pdf417Params
    {
        return new Pdf417Params([
            'pdf417_encode_mode' => $this->enumValue(Pdf417EncodeMode::class),
            'pdf417_error_level' => $this->enumValue(Pdf417ErrorLevel::class),
            'pdf417_truncate' => false,
            'pdf417_columns' => 5,
            'pdf417_rows' => 12,
            'pdf417_aspect_ratio' => 3.0,
            'pdf417_eci_encoding' => $this->enumValue(ECIEncodings::class),
            'pdf417_is_reader_initialization' => false,
            'pdf417_macro_characters' => $this->enumValue(MacroCharacter::class),
            'pdf417_is_linked' => false,
            'pdf417_is_code128_emulation' => false,
        ]);
    }

    protected function encodeData(): EncodeData
    {
        return new EncodeData([
            'data' => 'Aspose',
            'data_type' => $this->enumValue(EncodeDataType::class),
        ]);
    }

    protected function regionPoint(): RegionPoint
    {
        return new RegionPoint(['x' => 11, 'y' => 22]);
    }

    protected function barcodeResponse(): BarcodeResponse
    {
        return new BarcodeResponse([
            'barcode_value' => 'value',
            'type' => 'QR',
            'region' => [$this->regionPoint()],
            'checksum' => 'checksum',
        ]);
    }

    protected function apiError(bool $withInner = true): ApiError
    {
        return new ApiError([
            'code' => 'code',
            'message' => 'message',
            'description' => 'description',
            'date_time' => new DateTime('2026-06-29T00:00:00Z'),
            'inner_error' => $withInner ? $this->apiError(false) : null,
        ]);
    }

    /**
     * Builds a fully populated instance of a generated model (mirrors the Python `_make_model`).
     */
    protected function makeModel(string $modelClass): object
    {
        switch ($modelClass) {
            case ApiError::class:
                return $this->apiError();
            case ApiErrorResponse::class:
                return new ApiErrorResponse(['request_id' => 'request', 'error' => $this->apiError()]);
            case BarcodeImageParams::class:
                return $this->barcodeImageParams();
            case BarcodeResponse::class:
                return $this->barcodeResponse();
            case BarcodeResponseList::class:
                return new BarcodeResponseList(['barcodes' => [$this->barcodeResponse()]]);
            case Code128Params::class:
                return $this->code128Params();
            case EncodeData::class:
                return $this->encodeData();
            case GenerateParams::class:
                return new GenerateParams([
                    'barcode_type' => $this->enumValue(EncodeBarcodeType::class),
                    'encode_data' => $this->encodeData(),
                    'barcode_image_params' => $this->barcodeImageParams(),
                    'qr_params' => $this->qrParams(),
                    'code128_params' => $this->code128Params(),
                    'pdf417_params' => $this->pdf417Params(),
                ]);
            case Pdf417Params::class:
                return $this->pdf417Params();
            case QrParams::class:
                return $this->qrParams();
            case RecognizeBase64Request::class:
                return new RecognizeBase64Request([
                    'barcode_types' => [$this->enumValue(DecodeBarcodeType::class)],
                    'file_base64' => 'ZmlsZQ==',
                    'recognition_mode' => $this->enumValue(RecognitionMode::class),
                    'recognition_image_kind' => $this->enumValue(RecognitionImageKind::class),
                ]);
            case RegionPoint::class:
                return $this->regionPoint();
            case ScanBase64Request::class:
                return new ScanBase64Request(['file_base64' => 'ZmlsZQ==']);
        }

        $this->fail("no fixture for model {$modelClass}");
    }
}
