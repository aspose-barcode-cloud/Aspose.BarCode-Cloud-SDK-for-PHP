<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Requests\GenerateRequestWrapper;
use Aspose\BarCode\Model\{EncodeBarcodeType, EncodeDataType, CodeLocation, BarcodeImageFormat, QREncodeMode, QRErrorLevel, QRVersion};

$config = new Configuration();
$config->setClientId('ClientId from https://dashboard.aspose.cloud/applications');
$config->setClientSecret('Client Secret from https://dashboard.aspose.cloud/applications');
if (getenv("TEST_CONFIGURATION_ACCESS_TOKEN")) {
    $config->setAccessToken(getenv("TEST_CONFIGURATION_ACCESS_TOKEN"));
}

$request = new GenerateRequestWrapper(EncodeBarcodeType::QR, 'PHP SDK Test');
$request->image_format = BarcodeImageFormat::Png;
$request->text_location = CodeLocation::None;
$request->qr_encode_mode = QREncodeMode::Auto;
$request->qr_error_level = QRErrorLevel::LevelM;
$request->qr_version = QRVersion::Auto;
$request->qr_aspect_ratio = 0.75;

$api = new GenerateApi(null, $config);
$response = $api->generate($request);

$type = 'image/png';
$size = $response->getSize();
header("Content-Type: $type");
header("Content-Length: $size");
echo $response->fread($size);
