---
name: generate-and-scan-barcode-php
description: Write or update PHP code that uses the Aspose.BarCode Cloud SDK (`Aspose\BarCode\...`; Composer package `aspose/barcode-cloud-php`) to generate, recognize, or scan barcodes through Aspose's cloud REST API. Use this skill whenever the user wants barcode work in PHP, touches files under `submodules/php`, or mentions `GenerateApi`, `RecognizeApi`, `ScanApi`, `Configuration`, `GenerateRequestWrapper`, `GenerateBodyRequestWrapper`, `RecognizeBase64Request`, or `ScanMultipartRequestWrapper`. The PHP SDK has several easy-to-miss idioms, including constructing APIs as `new ...Api(null, $config)`, wrapping every call in a request-wrapper object, treating generate results as `SplFileObject` streams, using public `file_url` values for GET recognize and scan methods, and base64-encoding body payloads yourself.
---

# Generate and scan barcode in PHP

Use this skill to write PHP code against the generated Aspose.BarCode Cloud SDK or to maintain the PHP SDK inside `submodules/php`. Most tasks boil down to choosing the right API class, choosing the right request wrapper, and using the correct transport shape for the data you have.

The Composer package name and PHP namespace differ. Install `aspose/barcode-cloud-php`, then import classes from `Aspose\BarCode\...`.

## Quick start

Use these imports in most PHP examples:

```php
use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\ScanApi;
```

Prefer creating one `Configuration` instance and passing it into each API class:

```php
$config = new Configuration();
$config->setClientId($clientId);
$config->setClientSecret($clientSecret);

$generateApi = new GenerateApi(null, $config);
$recognizeApi = new RecognizeApi(null, $config);
$scanApi = new ScanApi(null, $config);
```

If the task edits SDK source, tests, snippets, or generated files in `submodules/php`, read `references/repo-workflow.md`. If the task needs the closest existing example or snippet, read `references/snippet-map.md`.

## Authenticate correctly

Use one of these two patterns:

1. Let the SDK fetch an access token lazily from client credentials.

```php
$config = new Configuration();
$config->setClientId($clientId);
$config->setClientSecret($clientSecret);
```

2. Inject a pre-fetched bearer token.

```php
$config = new Configuration();
$config->setAccessToken($token);
```

The runtime defaults are:

- `Host`: `https://api.aspose.cloud`
- `BasePath`: `/v4.0`
- `AuthUrl`: `https://id.aspose.cloud/connect/token`

Inside this repo, tests load `tests/Configuration.json` first and then fall back to `TEST_CONFIGURATION_*` environment variables. Snippets usually check `TEST_CONFIGURATION_ACCESS_TOKEN` first and otherwise rely on client credentials. Mirror the surrounding file when editing existing repo code.

## Choose the right API shape

Pick the operation first:

- `GenerateApi`: create a barcode image.
- `RecognizeApi`: decode one or more known barcode types and optionally tune recognition.
- `ScanApi`: auto-detect barcode types with the smallest API surface.

Then pick the transport variant based on what the caller has:

- Public internet URL to an image: use `recognize()` or `scan()`. `file_url` must be publicly reachable, not a local path.
- Local file on disk: use `recognizeMultipart()` or `scanMultipart()` with `new SplFileObject(..., 'rb')`.
- Raw bytes already in memory: call `base64_encode()` yourself and use `recognizeBase64()` or `scanBase64()`.
- Simple text plus query parameters for generation: use `generate()`.
- Structured generate payload: use `generateBody()`.
- Multipart-form generation: use `generateMultipart()` when the caller explicitly needs that shape.

Key method names:

- `generate`
- `generateBody`
- `generateMultipart`
- `recognize`
- `recognizeBase64`
- `recognizeMultipart`
- `scan`
- `scanBase64`
- `scanMultipart`

## Follow the PHP-specific SDK rules

1. Instantiate APIs as `new GenerateApi(null, $config)` and the equivalent `RecognizeApi` or `ScanApi` constructors. The first constructor argument is the optional Guzzle client, not the `Configuration`.
2. Pass a request-wrapper object for every endpoint. Examples include `GenerateRequestWrapper`, `GenerateBodyRequestWrapper`, `RecognizeMultipartRequestWrapper`, and `ScanBase64RequestWrapper`.
3. Treat `generate()`, `generateBody()`, and `generateMultipart()` results as `\SplFileObject`. Read them with `getSize()` and `fread()`, save them to disk, or pass them directly into `ScanMultipartRequestWrapper`.
4. Build base64-body requests in two layers: create `RecognizeBase64Request` or `ScanBase64Request`, then wrap that model in the matching `...RequestWrapper`.
5. Call `base64_encode()` yourself before `recognizeBase64()` or `scanBase64()`. The SDK does not encode raw bytes for you.
6. Use one `DecodeBarcodeType` for `RecognizeRequestWrapper` and `RecognizeMultipartRequestWrapper`. Use a list in `RecognizeBase64Request(['barcode_types' => [...]])` when the request body should search multiple types.
7. Use GET-based recognize and scan methods only for public URLs. For local files, use multipart or base64 instead.
8. Expect `BarcodeResponseList` from recognize and scan methods. Iterate `getBarcodes()` and read `getBarcodeValue()`, `getType()`, `getRegion()`, and `getChecksum()`.
9. Let the SDK fetch a token automatically when `AccessToken` is empty but `ClientId` and `ClientSecret` are present. On `401`, the generated clients refresh the token and retry once.
10. Turn on `setDebug(true)` when request and response logging would help, and use `setUserAgent()` when a custom user agent is required.
11. Catch `Aspose\BarCode\ApiException` for API failures. For many `4xx` failures, `getResponseObject()` contains a parsed `ApiErrorResponse`.

## Reuse the common patterns

Generate and save a QR code:

```php
use Aspose\BarCode\Model\BarcodeImageFormat;
use Aspose\BarCode\Model\CodeLocation;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Requests\GenerateRequestWrapper;

$request = new GenerateRequestWrapper(EncodeBarcodeType::QR, 'hello from PHP');
$request->image_format = BarcodeImageFormat::Png;
$request->text_location = CodeLocation::None;

$file = $generateApi->generate($request);
$file->rewind();
file_put_contents('qr.png', $file->fread($file->getSize()));
```

Recognize a local file stream:

```php
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Requests\RecognizeMultipartRequestWrapper;

$file = new SplFileObject('qr.png', 'rb');
$result = $recognizeApi->recognizeMultipart(
    new RecognizeMultipartRequestWrapper(DecodeBarcodeType::QR, $file)
);

foreach ($result->getBarcodes() as $barcode) {
    echo $barcode->getBarcodeValue() . PHP_EOL;
}
```

Auto-scan bytes already in memory:

```php
use Aspose\BarCode\Model\ScanBase64Request;
use Aspose\BarCode\Requests\ScanBase64RequestWrapper;

$payload = base64_encode(file_get_contents('unknown.png'));
$result = $scanApi->scanBase64(
    new ScanBase64RequestWrapper(
        new ScanBase64Request(['file_base64' => $payload])
    )
);
```

## Work inside this repo

Read `references/repo-workflow.md` when the task changes SDK source, tests, snippets, package metadata, or generated code in `submodules/php`.

Read `references/snippet-map.md` when the task needs example code, README-aligned snippets, or the closest existing pattern for a generate, recognize, or scan scenario.

## Final checklist

1. Use the correct package and namespace pair: Composer `aspose/barcode-cloud-php`, namespace `Aspose\BarCode\...`.
2. Construct API classes as `new ...Api(null, $config)`.
3. Pass the matching request-wrapper object into every SDK call.
4. Use GET only for public URLs, multipart for local files, and base64-body requests for bytes already in memory.
5. Base64-encode request payloads yourself before `recognizeBase64()` or `scanBase64()`.
6. Treat generate responses as `SplFileObject` streams and recognize or scan responses as `BarcodeResponseList`.
7. When changing the repo, validate with the submodule workflow in `references/repo-workflow.md`.
