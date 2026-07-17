<?php

use Aspose\BarCode\Configuration;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\Model\{DecodeBarcodeType, RecognitionImageKind};
use Aspose\BarCode\Requests\RecognizeRequestWrapper;

require_once 'vendor/autoload.php';

function makeConfiguration()
{
    $config = new Configuration();

    $envToken = getenv('TEST_CONFIGURATION_ACCESS_TOKEN');
    if (empty($envToken)) {
        $config->setClientId("Client Id from https://dashboard.aspose.cloud/applications");
        $config->setClientSecret("Client Secret from https://dashboard.aspose.cloud/applications");
    } else {
        $config->setAccessToken($envToken);
    }

    return $config;
}

function main()
{
    $recognizeApi = new RecognizeApi(null, makeConfiguration());

    $request = new RecognizeRequestWrapper(DecodeBarcodeType::QR, "https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png");
    $request->recognition_image_kind = RecognitionImageKind::Photo;

    $result = $recognizeApi->recognize($request);

    echo sprintf("File '%s' recognized, result: '%s'\n", "https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png", $result->getBarcodes()[0]->getBarcodeValue());
}

main();
