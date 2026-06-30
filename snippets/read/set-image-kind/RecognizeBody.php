<?php

use Aspose\BarCode\Configuration;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\Model\{DecodeBarcodeType, RecognizeBase64Request, RecognitionImageKind};
use Aspose\BarCode\Requests\RecognizeBase64RequestWrapper;

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

    $fileName = __DIR__ . '/../testdata/QR_and_Code128.png';
    $imageBytes = file_get_contents($fileName);
    $imageBase64 = base64_encode($imageBytes);

    $base64Request = new RecognizeBase64Request([
        'barcode_types' => [DecodeBarcodeType::Aztec, DecodeBarcodeType::QR],
        'file_base64' => $imageBase64,
        'recognition_image_kind' => RecognitionImageKind::ScannedDocument
    ]);

    $request = new RecognizeBase64RequestWrapper($base64Request);

    $result = $recognizeApi->recognizeBase64($request);

    echo sprintf(
        "File '%s' recognized, results: value: '%s', type: %s\n",
        $fileName,
        $result->getBarcodes()[0]->getBarcodeValue(),
        $result->getBarcodes()[0]->getType()
    );
}

main();
