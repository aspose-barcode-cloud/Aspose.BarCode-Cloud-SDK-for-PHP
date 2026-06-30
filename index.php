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
