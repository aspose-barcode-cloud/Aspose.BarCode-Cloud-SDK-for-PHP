<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\{BarcodeImageParams, EncodeBarcodeType, GraphicsUnit};
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
    $fileName = __DIR__ . '/../testdata/Qr.png';

    $generateApi = new GenerateApi(null, makeConfiguration());

    $request = new GenerateRequestWrapper(EncodeBarcodeType::QR, "Aspose.BarCode.Cloud");
    $request->barcode_image_params = new BarcodeImageParams([
        'image_height' => 200,
        'image_width' => 200,
        'resolution' => 300,
        'units' => GraphicsUnit::Pixel
    ]);

    $generated = $generateApi->generate($request);

    file_put_contents($fileName, $generated->fread($generated->getSize()));

    echo "File '{$fileName}' generated.\n";
}

main();
