# Aspose.BarCode Cloud SDK for PHP

[![PHP 8.5 Supported](https://img.shields.io/badge/PHP-8.5-777bb3?logo=php&logoColor=white)](https://github.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/actions/workflows/php-versions.yml?query=branch%3Amain)
[![License](https://img.shields.io/github/license/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP)](LICENSE)
[![Test](https://github.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/actions/workflows/php-versions.yml/badge.svg?branch=main)](https://github.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/actions/workflows/php-versions.yml)
[![Supported PHP Versions](https://img.shields.io/packagist/dependency-v/aspose/barcode-cloud-php/php)](https://packagist.org/packages/aspose/barcode-cloud-php)
[![Packagist Version](https://img.shields.io/packagist/v/aspose/barcode-cloud-php)](https://packagist.org/packages/aspose/barcode-cloud-php)

- API version: 4.0
- Package version: 26.7.0
- Supported PHP versions: ">=8.0"

## SDK and API Version Compatibility:

- SDK Version 25.1 and Later: Starting from SDK version 25.1, all subsequent versions are compatible with API Version v4.0.
- SDK Version 24.12 and Earlier: These versions are compatible with API Version v3.0.

## Demo applications

[Scan QR](https://products.aspose.app/barcode/scanqr) | [Generate Barcode](https://products.aspose.app/barcode/generate) | [Recognize Barcode](https://products.aspose.app/barcode/recognize)
:---: | :---: | :---:
[![ScanQR](https://products.aspose.app/barcode/scanqr/img/aspose_scanqr-app-48.png)](https://products.aspose.app/barcode/scanqr) | [![Generate](https://products.aspose.app/barcode/generate/img/aspose_generate-app-48.png)](https://products.aspose.app/barcode/generate) | [![Recognize](https://products.aspose.app/barcode/recognize/img/aspose_recognize-app-48.png)](https://products.aspose.app/barcode/recognize)
[**Generate Wi-Fi QR**](https://products.aspose.app/barcode/wifi-qr) | [**Embed Barcode**](https://products.aspose.app/barcode/embed) | [**Scan Barcode**](https://products.aspose.app/barcode/scan)
[![Wi-FiQR](https://products.aspose.app/barcode/embed/img/aspose_wifi-qr-app-48.png)](https://products.aspose.app/barcode/wifi-qr) | [![Embed](https://products.aspose.app/barcode/embed/img/aspose_embed-app-48.png)](https://products.aspose.app/barcode/embed) | [![Scan](https://products.aspose.app/barcode/embed/img/aspose_scan-app-48.png)](https://products.aspose.app/barcode/scan)

[Aspose.BarCode for Cloud](https://products.aspose.cloud/barcode/) is a REST API for Linear, 2D and postal barcode generation and recognition in the cloud. API recognizes and generates barcode images in a variety of formats. Barcode REST API allows to specify barcode image attributes like image width, height, border style and output image format in order to customize the generation process. Developers can also specify the barcode type and text attributes such as text location and font styles in order to suit the application requirements.

This repository contains Aspose.BarCode Cloud SDK for PHP source code.

To use these SDKs, you will need Client Id and Client Secret which can be looked up at [Aspose Cloud Dashboard](https://dashboard.aspose.cloud/applications) (free registration in Aspose Cloud is required for this).

## How to use the SDK

You can either directly use it in your project via source code or get [Packagist distribution](https://packagist.org/packages/aspose/barcode-cloud-php) (recommended).

## AI Agent Skills

This repository includes an AI-agent skill in [`skills/generate-and-scan-barcode-php/SKILL.md`](skills/generate-and-scan-barcode-php/SKILL.md). Point your coding agent to it when working with this SDK so it follows the repo workflow and SDK-specific API patterns.

## Installation

### Via Composer

*barcode-cloud-php* is available on Packagist as the
[`barcode-cloud-php`](https://packagist.org/packages/aspose/barcode-cloud-php) package. Run the following command:

```sh
composer require aspose/barcode-cloud-php
```

To use the SDK, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require __DIR__ . '/vendor/autoload.php';
```

### Sample usage

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Requests\GenerateRequestWrapper;
use Aspose\BarCode\Model\{BarcodeImageParams, EncodeBarcodeType, EncodeDataType, CodeLocation, BarcodeImageFormat, QrParams, QREncodeMode, QRErrorLevel, QRVersion};

$config = new Configuration();
$config->setClientId('ClientId from https://dashboard.aspose.cloud/applications');
$config->setClientSecret('Client Secret from https://dashboard.aspose.cloud/applications');
if (getenv("TEST_CONFIGURATION_ACCESS_TOKEN")) {
    $config->setAccessToken(getenv("TEST_CONFIGURATION_ACCESS_TOKEN"));
}

$request = new GenerateRequestWrapper(EncodeBarcodeType::QR, 'PHP SDK Test');
$request->barcode_image_params = new BarcodeImageParams();
$request->barcode_image_params->setImageFormat(BarcodeImageFormat::Png);
$request->barcode_image_params->setTextLocation(CodeLocation::None);
$request->qr_params = new QrParams();
$request->qr_params->setQrEncodeMode(QREncodeMode::Auto);
$request->qr_params->setQrErrorLevel(QRErrorLevel::LevelM);
$request->qr_params->setQrVersion(QRVersion::Auto);
$request->qr_params->setQrAspectRatio(0.75);

$api = new GenerateApi(null, $config);
$response = $api->generate($request);

$type = 'image/png';
$size = $response->getSize();
header("Content-Type: $type");
header("Content-Length: $size");
echo $response->fread($size);

```

## Licensing

All Aspose.BarCode for Cloud SDKs, helper scripts and templates are licensed under [MIT License](LICENSE).

## Resources

- [**Website**](https://www.aspose.cloud)
- [**Product Home**](https://products.aspose.cloud/barcode/)
- [**Documentation**](https://docs.aspose.cloud/barcode/)
- [**Free Support Forum**](https://forum.aspose.cloud/c/barcode)
- [**Paid Support Helpdesk**](https://helpdesk.aspose.cloud/)
- [**Blog**](https://blog.aspose.cloud/categories/aspose.barcode-cloud-product-family/)

## Documentation for API Endpoints

All URIs are relative to *<https://api.aspose.cloud/v4.0>*

Class | Method | HTTP request | Description
----- | ------ | ------------ | -----------
*GenerateApi* | [**generate**](docs/Api/GenerateApi.md#generate) | **GET** /barcode/generate/{barcodeType} | Generate a barcode using a GET request with parameters in the route and query string.
*GenerateApi* | [**generateBody**](docs/Api/GenerateApi.md#generatebody) | **POST** /barcode/generate-body | Generate a barcode using a POST request with parameters in the request body in JSON or XML format.
*GenerateApi* | [**generateMultipart**](docs/Api/GenerateApi.md#generatemultipart) | **POST** /barcode/generate-multipart | Generate a barcode using a POST request with parameters in a multipart form.
*RecognizeApi* | [**recognize**](docs/Api/RecognizeApi.md#recognize) | **GET** /barcode/recognize | Recognize a barcode from a file on an Internet server using a GET request with a query string parameter. For recognizing files from your hard drive, use &#x60;recognize-body&#x60; or &#x60;recognize-multipart&#x60; endpoints instead.
*RecognizeApi* | [**recognizeBase64**](docs/Api/RecognizeApi.md#recognizebase64) | **POST** /barcode/recognize-body | Recognize a barcode from a file in the request body using a POST request with JSON or XML body parameters.
*RecognizeApi* | [**recognizeMultipart**](docs/Api/RecognizeApi.md#recognizemultipart) | **POST** /barcode/recognize-multipart | Recognize a barcode from a file in the request body using a POST request with multipart form parameters.
*ScanApi* | [**scan**](docs/Api/ScanApi.md#scan) | **GET** /barcode/scan | Scan a barcode from a file on an Internet server using a GET request with a query string parameter. For scanning files from your hard drive, use &#x60;scan-body&#x60; or &#x60;scan-multipart&#x60; endpoints instead.
*ScanApi* | [**scanBase64**](docs/Api/ScanApi.md#scanbase64) | **POST** /barcode/scan-body | Scan a barcode from a file in the request body using a POST request with a JSON or XML body parameter.
*ScanApi* | [**scanMultipart**](docs/Api/ScanApi.md#scanmultipart) | **POST** /barcode/scan-multipart | Scan a barcode from a file in the request body using a POST request with a multipart form parameter.

## Documentation For Models

- [ApiError](docs/Model/ApiError.md)
- [ApiErrorResponse](docs/Model/ApiErrorResponse.md)
- [BarcodeImageFormat](docs/Model/BarcodeImageFormat.md)
- [BarcodeImageParams](docs/Model/BarcodeImageParams.md)
- [BarcodeResponse](docs/Model/BarcodeResponse.md)
- [BarcodeResponseList](docs/Model/BarcodeResponseList.md)
- [Code128EncodeMode](docs/Model/Code128EncodeMode.md)
- [Code128Params](docs/Model/Code128Params.md)
- [CodeLocation](docs/Model/CodeLocation.md)
- [DecodeBarcodeType](docs/Model/DecodeBarcodeType.md)
- [ECIEncodings](docs/Model/ECIEncodings.md)
- [EncodeBarcodeType](docs/Model/EncodeBarcodeType.md)
- [EncodeData](docs/Model/EncodeData.md)
- [EncodeDataType](docs/Model/EncodeDataType.md)
- [GenerateParams](docs/Model/GenerateParams.md)
- [GraphicsUnit](docs/Model/GraphicsUnit.md)
- [MacroCharacter](docs/Model/MacroCharacter.md)
- [MicroQRVersion](docs/Model/MicroQRVersion.md)
- [Pdf417EncodeMode](docs/Model/Pdf417EncodeMode.md)
- [Pdf417ErrorLevel](docs/Model/Pdf417ErrorLevel.md)
- [Pdf417Params](docs/Model/Pdf417Params.md)
- [QREncodeMode](docs/Model/QREncodeMode.md)
- [QRErrorLevel](docs/Model/QRErrorLevel.md)
- [QRVersion](docs/Model/QRVersion.md)
- [QrParams](docs/Model/QrParams.md)
- [RecognitionImageKind](docs/Model/RecognitionImageKind.md)
- [RecognitionMode](docs/Model/RecognitionMode.md)
- [RecognizeBase64Request](docs/Model/RecognizeBase64Request.md)
- [RectMicroQRVersion](docs/Model/RectMicroQRVersion.md)
- [RegionPoint](docs/Model/RegionPoint.md)
- [ScanBase64Request](docs/Model/ScanBase64Request.md)
