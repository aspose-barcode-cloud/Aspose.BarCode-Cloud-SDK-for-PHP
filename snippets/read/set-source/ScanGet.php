<?php

use Aspose\BarCode\Configuration;
use Aspose\BarCode\ScanApi;
use Aspose\BarCode\Requests\ScanRequestWrapper;

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
    $scanApi = new ScanApi(null, makeConfiguration());

    $request = new ScanRequestWrapper("https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png");
    $result = $scanApi->scan($request);

    echo sprintf(
        "File '%s' recognized, result: '%s'\n",
        "https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png",
        $result->getBarcodes()[0]->getBarcodeValue()
    );
}

main();
