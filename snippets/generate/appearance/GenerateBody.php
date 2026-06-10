<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\{GenerateParams, EncodeBarcodeType, EncodeData, EncodeDataType, BarcodeImageParams, BarcodeImageFormat, QrParams, QREncodeMode, QRErrorLevel, QRVersion};
use Aspose\BarCode\Requests\GenerateBodyRequestWrapper;

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
    $fileName = __DIR__ . "/../testdata/QrCustom.jpeg";

    $generateApi = new GenerateApi(null, makeConfiguration());

    $generateParams = new GenerateParams([
        'barcode_type' => EncodeBarcodeType::QR,
        'encode_data' => new EncodeData([
            'data' => 'Aspose',
            'data_type' => EncodeDataType::StringData
        ]),
        'barcode_image_params' => new BarcodeImageParams([
            'foreground_color' => '#FF0000',
            'background_color' => '#FFFF00',
            'image_format' => BarcodeImageFormat::Jpeg,
            'rotation_angle' => 90
        ]),
        'qr_params' => new QrParams([
            'qr_encode_mode' => QREncodeMode::Auto,
            'qr_error_level' => QRErrorLevel::LevelM,
            'qr_version' => QRVersion::Auto,
            'qr_aspect_ratio' => 0.75
        ])
    ]);

    $request = new GenerateBodyRequestWrapper($generateParams);
    $generated = $generateApi->generateBody($request);

    file_put_contents($fileName, $generated->fread($generated->getSize()));

    echo "File '{$fileName}' generated.\n";
}

main();
