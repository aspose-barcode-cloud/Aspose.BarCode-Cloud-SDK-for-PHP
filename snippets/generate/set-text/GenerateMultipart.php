<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Requests\GenerateMultipartRequestWrapper;
use Aspose\BarCode\Model\{EncodeBarcodeType, EncodeDataType, Code128Params, Code128EncodeMode};

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
    $fileName = __DIR__ . '/../testdata/Code128.png';

    $generateApi = new GenerateApi(null, makeConfiguration());

    $formRequest = new GenerateMultipartRequestWrapper(EncodeBarcodeType::Code128, "4173706F73652E426172436F64652E436C6F7564");
    $formRequest->data_type = EncodeDataType::HexBytes;
    $formRequest->code128_params = new Code128Params([
        'code128_encode_mode' => Code128EncodeMode::Auto
    ]);

    $generated = $generateApi->generateMultipart($formRequest);

    file_put_contents($fileName, $generated->fread($generated->getSize()));

    echo "File '{$fileName}' generated.\n";
}

main();
