<?php

declare(strict_types=1);

use Aspose\BarCode\Model\ApiError;
use Aspose\BarCode\Model\ApiErrorResponse;
use Aspose\BarCode\Model\BarcodeImageParams;
use Aspose\BarCode\Model\BarcodeResponse;
use Aspose\BarCode\Model\BarcodeResponseList;
use Aspose\BarCode\Model\Code128Params;
use Aspose\BarCode\Model\EncodeData;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Model\Pdf417Params;
use Aspose\BarCode\Model\QrParams;
use Aspose\BarCode\Model\RecognizeBase64Request;
use Aspose\BarCode\Model\RegionPoint;
use Aspose\BarCode\Model\ScanBase64Request;
use Aspose\BarCode\ObjectSerializer;
use PHPUnit\Framework\Attributes\DataProvider;

require_once 'OfflineCoverageTestCase.php';

/**
 * Offline coverage for the generated model value objects.
 *
 * Mirrors the model portion of the Python `test_generated_coverage.py` and the Java
 * `GeneratedModelCoverageTest`: it exercises every generated model (constructors, accessors,
 * ArrayAccess, `__toString`, `valid()`, and serialize/deserialize round-trips). No network is
 * touched, so together with the other offline coverage tests this is part of the deterministic
 * coverage floor that keeps the SDK above the 80% line-coverage gate regardless of which live
 * API calls run.
 */
final class GeneratedModelCoverageTest extends OfflineCoverageTestCase
{
    /**
     * Models the SDK deserializes from API responses (no enum-typed properties).
     *
     * @var list<class-string>
     */
    private const DESERIALIZABLE_MODELS = [
        ApiError::class,
        ApiErrorResponse::class,
        BarcodeResponse::class,
        BarcodeResponseList::class,
        RegionPoint::class,
    ];

    /**
     * @return list<array{class-string}>
     */
    public static function modelProvider(): array
    {
        return [
            [ApiError::class],
            [ApiErrorResponse::class],
            [BarcodeImageParams::class],
            [BarcodeResponse::class],
            [BarcodeResponseList::class],
            [Code128Params::class],
            [EncodeData::class],
            [GenerateParams::class],
            [Pdf417Params::class],
            [QrParams::class],
            [RecognizeBase64Request::class],
            [RegionPoint::class],
            [ScanBase64Request::class],
        ];
    }

    /**
     * @param class-string $modelClass
     */
    #[DataProvider('modelProvider')]
    public function testModelValueObject(string $modelClass): void
    {
        $model = $this->makeModel($modelClass);
        $this->assertInstanceOf(ArrayAccess::class, $model);

        $this->assertNotEmpty(call_user_func([$modelClass, 'swaggerTypes']));
        call_user_func([$modelClass, 'swaggerFormats']);
        call_user_func([$modelClass, 'attributeMap']);

        /** @var array<string, string> $getters */
        $getters = call_user_func([$modelClass, 'getters']);
        /** @var array<string, string> $setters */
        $setters = call_user_func([$modelClass, 'setters']);

        $this->assertNotEmpty(call_user_func([$model, 'getModelName']));
        $this->assertIsArray(call_user_func([$model, 'listInvalidProperties']));
        $this->assertTrue(call_user_func([$model, 'valid']));

        foreach ($getters as $property => $getter) {
            $value = call_user_func([$model, $getter]);
            $this->assertNotNull($value, "{$modelClass}::{$property} should be populated");
            $this->assertTrue(isset($model[$property]));
            $this->assertSame($value, $model[$property]);
            // Setter round-trip re-stores the same value.
            call_user_func([$model, $setters[$property]], $value);
            $this->assertSame($value, call_user_func([$model, $getter]));
        }

        // ArrayAccess mutators.
        $model['coverageProbe'] = 'probe';
        $this->assertTrue(isset($model['coverageProbe']));
        $this->assertSame('probe', $model['coverageProbe']);
        unset($model['coverageProbe']);
        $this->assertFalse(isset($model['coverageProbe']));
        $this->assertNull($model['missingOffset']);
        $model[] = 'appended';

        // __toString yields valid JSON.
        $json = call_user_func([$model, '__toString']);
        $this->assertIsString($json);
        $this->assertJson($json);

        // Serialize works for every model.
        $sanitized = ObjectSerializer::sanitizeForSerialization($model);
        $encoded = json_encode($sanitized);
        $this->assertIsString($encoded);

        // Deserialize round-trip only for models the SDK actually parses from responses.
        // Request models carry enum-typed properties, which the string-backed enum classes cannot
        // resolve through ObjectSerializer::deserialize (they declare no DISCRIMINATOR constant),
        // so they are never deserialized in practice.
        if (in_array($modelClass, self::DESERIALIZABLE_MODELS, true)) {
            $restored = ObjectSerializer::deserialize($encoded, '\\' . $modelClass);
            $this->assertInstanceOf($modelClass, $restored);
        }
    }
}
