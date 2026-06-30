<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\{BarcodeImageFormat, BarcodeImageParams, CodeLocation, EncodeBarcodeType, QrParams, QREncodeMode, QRErrorLevel, QRVersion};
use Aspose\BarCode\Requests\GenerateRequestWrapper;

function makeConfiguration(): Configuration
{
    $config = new Configuration();

    $envToken = getenv("TEST_CONFIGURATION_ACCESS_TOKEN");
    if (empty($envToken)) {
        $config->setClientId("Client Id from https://dashboard.aspose.cloud/applications");
        $config->setClientSecret("Client Secret from https://dashboard.aspose.cloud/applications");
    } else {
        $config->setAccessToken($envToken);
    }

    return $config;
}

function main(): void
{
    $fileName = __DIR__ . "/../testdata/Qr.png";

    $generateApi = new GenerateApi(null, makeConfiguration());

    $request = new GenerateRequestWrapper(
        EncodeBarcodeType::QR,
        'Aspose.BarCode.Cloud'
    );
    $request->barcode_image_params = new BarcodeImageParams([
        'image_format' => BarcodeImageFormat::Png,
        'foreground_color' => 'Black',
        'background_color' => 'White',
        'text_location' => CodeLocation::Below,
        'resolution' => 300,
        'image_height' => 200,
        'image_width' => 200
    ]);
    $request->qr_params = new QrParams([
        'qr_encode_mode' => QREncodeMode::Auto,
        'qr_error_level' => QRErrorLevel::LevelM,
        'qr_version' => QRVersion::Auto,
        'qr_aspect_ratio' => 0.75
    ]);

    $generated = $generateApi->generate($request);

    file_put_contents($fileName, $generated->fread($generated->getSize()));

    echo "File '{$fileName}' generated.\n";
}

main();
