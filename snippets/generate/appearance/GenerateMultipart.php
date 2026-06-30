<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\{BarcodeImageFormat, BarcodeImageParams, CodeLocation, Pdf417Params, Pdf417EncodeMode, Pdf417ErrorLevel};
use Aspose\BarCode\Requests\GenerateMultipartRequestWrapper;
use Aspose\BarCode\Model\EncodeBarcodeType;

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
    $fileName = __DIR__ . '/../testdata/Pdf417.svg';

    $generateApi = new GenerateApi(null, makeConfiguration());

    $request = new GenerateMultipartRequestWrapper(
        EncodeBarcodeType::Pdf417,
        "Aspose.BarCode.Cloud"
    );
    $request->barcode_image_params = new BarcodeImageParams([
        'text_location' => CodeLocation::Above,
        'image_format' => BarcodeImageFormat::Svg
    ]);
    $request->pdf417_params = new Pdf417Params([
        'pdf417_encode_mode' => Pdf417EncodeMode::Auto,
        'pdf417_error_level' => Pdf417ErrorLevel::Level2,
        'pdf417_aspect_ratio' => 3
    ]);

    $barcodeStream = $generateApi->generateMultipart($request);

    file_put_contents($fileName, $barcodeStream->fread($barcodeStream->getSize()));

    echo "File '{$fileName}' generated.\n";
}

main();
