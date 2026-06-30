<?php

use Aspose\BarCode\Configuration;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\Model\{DecodeBarcodeType, BarcodeResponseList, RecognitionMode, RecognitionImageKind};
use Aspose\BarCode\Requests\RecognizeMultipartRequestWrapper;

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

    $fileName = __DIR__ . '/../testdata/aztec.png';
    $file = new SplFileObject($fileName, 'rb');

    $request = new RecognizeMultipartRequestWrapper(DecodeBarcodeType::Aztec, $file);
    $request->recognition_mode = RecognitionMode::Normal;
    $request->recognition_image_kind = RecognitionImageKind::ScannedDocument;

    $result = $recognizeApi->recognizeMultipart($request);

    echo sprintf(
        "File '%s' recognized, result: '%s'\n",
        $fileName,
        $result->getBarcodes()[0]->getBarcodeValue()
    );
}

main();
