<?php

declare(strict_types=1);

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Model\EncodeDataType;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Model\RecognitionImageKind;
use Aspose\BarCode\Model\RecognitionMode;
use Aspose\BarCode\Model\RecognizeBase64Request;
use Aspose\BarCode\Model\ScanBase64Request;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\Requests\GenerateBodyRequestWrapper;
use Aspose\BarCode\Requests\GenerateMultipartRequestWrapper;
use Aspose\BarCode\Requests\GenerateRequestWrapper;
use Aspose\BarCode\Requests\RecognizeBase64RequestWrapper;
use Aspose\BarCode\Requests\RecognizeMultipartRequestWrapper;
use Aspose\BarCode\Requests\RecognizeRequestWrapper;
use Aspose\BarCode\Requests\ScanBase64RequestWrapper;
use Aspose\BarCode\Requests\ScanMultipartRequestWrapper;
use Aspose\BarCode\Requests\ScanRequestWrapper;
use Aspose\BarCode\ScanApi;
use GuzzleHttp\Psr7\Request as HttpRequest;

require_once 'OfflineCoverageTestCase.php';

/**
 * Offline coverage for the request wrappers and the deterministic request-builder code paths of
 * the three API classes (`GenerateApi`, `RecognizeApi`, `ScanApi`). No network is touched, so
 * together with the other offline coverage tests this is part of the deterministic coverage floor
 * that keeps the SDK above the 80% line-coverage gate regardless of which live API calls run.
 */
final class RequestBuilderCoverageTest extends OfflineCoverageTestCase
{
    private function sampleImagePath(): string
    {
        $path = realpath(__DIR__ . '/../testdata/Qr.png');
        $this->assertIsString($path, 'testdata/Qr.png must exist');

        return $path;
    }

    private function offlineConfig(): Configuration
    {
        $config = new Configuration();
        // A non-empty access token keeps the request builders fully offline (no token fetch).
        $config->setAccessToken('offline-token');
        $config->setHost('https://api.aspose.cloud');

        return $config;
    }

    private function invokeBuilder(object $api, string $method, object $request): HttpRequest
    {
        $reflection = new ReflectionMethod($api, $method);
        $reflection->setAccessible(true);
        $built = $reflection->invoke($api, $request);
        assert($built instanceof HttpRequest);

        return $built;
    }

    public function testRequestWrappers(): void
    {
        $generate = new GenerateRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose',
            $this->enumValue(EncodeDataType::class),
            $this->barcodeImageParams(),
            $this->qrParams(),
            $this->code128Params(),
            $this->pdf417Params()
        );
        $this->assertSame('Aspose', $generate->data);

        $generateBody = new GenerateBodyRequestWrapper($this->makeModel(GenerateParams::class));
        $this->assertInstanceOf(GenerateParams::class, $generateBody->generate_params);

        $generateMultipart = new GenerateMultipartRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose'
        );
        $this->assertSame('Aspose', $generateMultipart->data);

        $recognize = new RecognizeRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            'https://example.com/barcode.png',
            $this->enumValue(RecognitionMode::class),
            $this->enumValue(RecognitionImageKind::class)
        );
        $this->assertSame('https://example.com/barcode.png', $recognize->file_url);

        $recognizeBase64 = new RecognizeBase64RequestWrapper($this->makeModel(RecognizeBase64Request::class));
        $this->assertInstanceOf(RecognizeBase64Request::class, $recognizeBase64->recognize_base64_request);

        $recognizeMultipart = new RecognizeMultipartRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            $this->sampleImagePath()
        );
        $this->assertSame($this->sampleImagePath(), $recognizeMultipart->file);

        $scan = new ScanRequestWrapper('https://example.com/barcode.png');
        $this->assertSame('https://example.com/barcode.png', $scan->file_url);

        $scanBase64 = new ScanBase64RequestWrapper($this->makeModel(ScanBase64Request::class));
        $this->assertInstanceOf(ScanBase64Request::class, $scanBase64->scan_base64_request);

        $scanMultipart = new ScanMultipartRequestWrapper($this->sampleImagePath());
        $this->assertSame($this->sampleImagePath(), $scanMultipart->file);
    }

    public function testGenerateApiRequestBuilders(): void
    {
        $api = new GenerateApi(null, $this->offlineConfig());
        $this->assertSame('offline-token', $api->getConfig()->getAccessToken());

        $get = $this->invokeBuilder($api, 'GenerateRequestWrapper', new GenerateRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose',
            $this->enumValue(EncodeDataType::class),
            $this->barcodeImageParams(),
            $this->qrParams(),
            $this->code128Params(),
            $this->pdf417Params()
        ));
        $this->assertSame('GET', $get->getMethod());
        $this->assertStringContainsString('/barcode/generate/', (string) $get->getUri());

        $body = $this->invokeBuilder($api, 'GenerateBodyRequestWrapper', new GenerateBodyRequestWrapper(
            $this->makeModel(GenerateParams::class)
        ));
        $this->assertSame('POST', $body->getMethod());

        $multipart = $this->invokeBuilder($api, 'GenerateMultipartRequestWrapper', new GenerateMultipartRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose',
            $this->enumValue(EncodeDataType::class),
            $this->barcodeImageParams(),
            $this->qrParams(),
            $this->code128Params(),
            $this->pdf417Params()
        ));
        $this->assertSame('POST', $multipart->getMethod());
    }

    public function testRecognizeApiRequestBuilders(): void
    {
        $api = new RecognizeApi(null, $this->offlineConfig());

        $get = $this->invokeBuilder($api, 'RecognizeRequestWrapper', new RecognizeRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            'https://example.com/barcode.png',
            $this->enumValue(RecognitionMode::class),
            $this->enumValue(RecognitionImageKind::class)
        ));
        $this->assertSame('GET', $get->getMethod());
        $this->assertStringContainsString('/barcode/recognize', (string) $get->getUri());

        $base64 = $this->invokeBuilder($api, 'RecognizeBase64RequestWrapper', new RecognizeBase64RequestWrapper(
            $this->makeModel(RecognizeBase64Request::class)
        ));
        $this->assertSame('POST', $base64->getMethod());

        $multipart = $this->invokeBuilder($api, 'RecognizeMultipartRequestWrapper', new RecognizeMultipartRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            $this->sampleImagePath(),
            $this->enumValue(RecognitionMode::class),
            $this->enumValue(RecognitionImageKind::class)
        ));
        $this->assertSame('POST', $multipart->getMethod());
    }

    public function testScanApiRequestBuilders(): void
    {
        $api = new ScanApi(null, $this->offlineConfig());

        $get = $this->invokeBuilder($api, 'ScanRequestWrapper', new ScanRequestWrapper(
            'https://example.com/barcode.png'
        ));
        $this->assertSame('GET', $get->getMethod());
        $this->assertStringContainsString('/barcode/scan', (string) $get->getUri());

        $base64 = $this->invokeBuilder($api, 'ScanBase64RequestWrapper', new ScanBase64RequestWrapper(
            $this->makeModel(ScanBase64Request::class)
        ));
        $this->assertSame('POST', $base64->getMethod());

        $multipart = $this->invokeBuilder($api, 'ScanMultipartRequestWrapper', new ScanMultipartRequestWrapper(
            $this->sampleImagePath()
        ));
        $this->assertSame('POST', $multipart->getMethod());
    }
}
