<?php

declare(strict_types=1);

use Aspose\BarCode\ApiException;
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
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

require_once 'OfflineCoverageTestCase.php';

/**
 * Offline coverage for the call methods of the three API classes (`GenerateApi`, `RecognizeApi`,
 * `ScanApi`). `RequestBuilderCoverageTest` already covers the request builders; this drives the
 * `send`/`sendAsync`/response-deserialization and error-handling branches of every operation by
 * injecting a mocked Guzzle client (`MockHandler`), so no network is touched. Mirrors the Java
 * SDK's `*ApiMethodCoverageUnitTest`. Together with the other offline coverage tests this keeps
 * the SDK above the 80% line-coverage gate regardless of which live API calls run.
 */
final class ApiMethodCoverageTest extends OfflineCoverageTestCase
{
    /** A short byte payload; enough for the `\SplFileObject` return-type deserializer. */
    private const IMAGE_BODY = "\x89PNG\r\n\x1a\nfake-image";

    /** A valid `BarcodeResponseList` wire body for the Recognize/Scan return type. */
    private const LIST_BODY = '{"barcodes":[{"type":"QR","barcodeValue":"12345","region":[{"x":1,"y":2}],"checksum":"c"}]}';

    /** A valid `ApiErrorResponse` wire body, deserialized on the 4xx error branch. */
    private const ERROR_BODY = '{"requestId":"req-1","error":{"code":"400","message":"Bad Request","description":"invalid"}}';

    private function offlineConfig(): Configuration
    {
        $config = new Configuration();
        // A non-empty access token keeps the call fully offline (no token fetch).
        $config->setAccessToken('offline-token');
        $config->setHost('https://api.aspose.cloud');

        return $config;
    }

    private function sampleImagePath(): string
    {
        $path = realpath(__DIR__ . '/../testdata/Qr.png');
        $this->assertIsString($path, 'testdata/Qr.png must exist');

        return $path;
    }

    /**
     * @param class-string  $apiClass
     * @param list<Response> $responses queued in the order the mocked client will return them
     */
    private function makeApi(string $apiClass, array $responses): object
    {
        // HandlerStack::create keeps Guzzle's default middleware (notably http_errors), so a
        // mocked 4xx/5xx response is raised as a RequestException, exactly as against the live API.
        $client = new Client(['handler' => HandlerStack::create(new MockHandler($responses))]);

        return new $apiClass($client, $this->offlineConfig());
    }

    /**
     * Drives one operation through its success, async, 4xx-error and 5xx-error paths.
     *
     * @param callable():object $makeRequest builds a fresh request wrapper for each call
     */
    private function exerciseOperation(string $apiClass, string $method, string $okBody, callable $makeRequest): void
    {
        $api = $this->makeApi($apiClass, [
            new Response(200, ['Content-Type' => 'application/json'], $okBody), // sync success
            new Response(200, ['Content-Type' => 'application/json'], $okBody), // async success
            new Response(400, [], self::ERROR_BODY),                            // sync error  -> ApiException(400)
            new Response(500, [], self::ERROR_BODY),                            // async error -> ApiException(500)
        ]);
        $asyncMethod = $method . 'Async';

        $this->assertNotNull($api->$method($makeRequest()), "{$apiClass}::{$method} sync result");
        $this->assertNotNull($api->$asyncMethod($makeRequest())->wait(), "{$apiClass}::{$asyncMethod} async result");

        try {
            $api->$method($makeRequest());
            $this->fail("{$apiClass}::{$method} must raise ApiException on a 4xx response");
        } catch (ApiException $e) {
            $this->assertSame(400, $e->getCode());
        }

        try {
            $api->$asyncMethod($makeRequest())->wait();
            $this->fail("{$apiClass}::{$asyncMethod} must raise ApiException on a 5xx response");
        } catch (ApiException $e) {
            $this->assertGreaterThanOrEqual(400, $e->getCode());
        }
    }

    public function testGenerateApiMethods(): void
    {
        $this->exerciseOperation(GenerateApi::class, 'generate', self::IMAGE_BODY, fn () => new GenerateRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose',
            $this->enumValue(EncodeDataType::class),
            $this->barcodeImageParams(),
            $this->qrParams(),
            $this->code128Params(),
            $this->pdf417Params()
        ));

        $this->exerciseOperation(GenerateApi::class, 'generateBody', self::IMAGE_BODY, fn () => new GenerateBodyRequestWrapper(
            $this->makeModel(GenerateParams::class)
        ));

        $this->exerciseOperation(GenerateApi::class, 'generateMultipart', self::IMAGE_BODY, fn () => new GenerateMultipartRequestWrapper(
            $this->enumValue(EncodeBarcodeType::class),
            'Aspose',
            $this->enumValue(EncodeDataType::class),
            $this->barcodeImageParams(),
            $this->qrParams(),
            $this->code128Params(),
            $this->pdf417Params()
        ));
    }

    public function testRecognizeApiMethods(): void
    {
        $this->exerciseOperation(RecognizeApi::class, 'recognize', self::LIST_BODY, fn () => new RecognizeRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            'https://example.com/barcode.png',
            $this->enumValue(RecognitionMode::class),
            $this->enumValue(RecognitionImageKind::class)
        ));

        $this->exerciseOperation(RecognizeApi::class, 'recognizeBase64', self::LIST_BODY, fn () => new RecognizeBase64RequestWrapper(
            $this->makeModel(RecognizeBase64Request::class)
        ));

        $this->exerciseOperation(RecognizeApi::class, 'recognizeMultipart', self::LIST_BODY, fn () => new RecognizeMultipartRequestWrapper(
            $this->enumValue(DecodeBarcodeType::class),
            $this->sampleImagePath(),
            $this->enumValue(RecognitionMode::class),
            $this->enumValue(RecognitionImageKind::class)
        ));
    }

    public function testScanApiMethods(): void
    {
        $this->exerciseOperation(ScanApi::class, 'scan', self::LIST_BODY, fn () => new ScanRequestWrapper(
            'https://example.com/barcode.png'
        ));

        $this->exerciseOperation(ScanApi::class, 'scanBase64', self::LIST_BODY, fn () => new ScanBase64RequestWrapper(
            $this->makeModel(ScanBase64Request::class)
        ));

        $this->exerciseOperation(ScanApi::class, 'scanMultipart', self::LIST_BODY, fn () => new ScanMultipartRequestWrapper(
            $this->sampleImagePath()
        ));
    }
}
