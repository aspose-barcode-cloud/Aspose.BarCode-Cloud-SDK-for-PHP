<?php

declare(strict_types=1);

use Aspose\BarCode\Model\BarcodeImageFormat;
use Aspose\BarCode\Model\Code128EncodeMode;
use Aspose\BarCode\Model\CodeLocation;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Model\ECIEncodings;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Model\EncodeDataType;
use Aspose\BarCode\Model\GraphicsUnit;
use Aspose\BarCode\Model\MacroCharacter;
use Aspose\BarCode\Model\MicroQRVersion;
use Aspose\BarCode\Model\Pdf417EncodeMode;
use Aspose\BarCode\Model\Pdf417ErrorLevel;
use Aspose\BarCode\Model\QREncodeMode;
use Aspose\BarCode\Model\QRErrorLevel;
use Aspose\BarCode\Model\QRVersion;
use Aspose\BarCode\Model\RecognitionImageKind;
use Aspose\BarCode\Model\RecognitionMode;
use Aspose\BarCode\Model\RectMicroQRVersion;

require_once 'OfflineCoverageTestCase.php';

/**
 * Offline coverage for the generated enum classes.
 *
 * Mirrors the enum portion of the Python `test_generated_coverage.py` and the Java
 * `GeneratedModelCoverageTest`: it exercises every generated enum (constants only, no
 * constructor) and asserts each declares string wire constants. No network is touched, so
 * together with the other offline coverage tests this is part of the deterministic coverage
 * floor that keeps the SDK above the 80% line-coverage gate regardless of which live API calls
 * run.
 */
final class GeneratedEnumCoverageTest extends OfflineCoverageTestCase
{
    /**
     * Every generated enum class (constants only, no constructor).
     *
     * @var list<class-string>
     */
    private const ENUM_CLASSES = [
        BarcodeImageFormat::class,
        Code128EncodeMode::class,
        CodeLocation::class,
        DecodeBarcodeType::class,
        ECIEncodings::class,
        EncodeBarcodeType::class,
        EncodeDataType::class,
        GraphicsUnit::class,
        MacroCharacter::class,
        MicroQRVersion::class,
        Pdf417EncodeMode::class,
        Pdf417ErrorLevel::class,
        QREncodeMode::class,
        QRErrorLevel::class,
        QRVersion::class,
        RecognitionImageKind::class,
        RecognitionMode::class,
        RectMicroQRVersion::class,
    ];

    public function testEnumsExposeStringConstants(): void
    {
        foreach (self::ENUM_CLASSES as $enumClass) {
            $constants = (new ReflectionClass($enumClass))->getConstants();
            $this->assertNotEmpty($constants, "enum {$enumClass} has no constants");
            foreach ($constants as $value) {
                $this->assertIsString($value, "enum {$enumClass} constant must be a string");
            }
            $this->assertNotEmpty($this->enumValue($enumClass));
        }
    }
}
