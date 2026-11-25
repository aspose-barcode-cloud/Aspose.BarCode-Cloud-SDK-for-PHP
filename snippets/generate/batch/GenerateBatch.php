<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Aspose\BarCode\Configuration;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\BatchGenerateItem;
use Aspose\BarCode\Model\BatchGenerateRequest;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Model\EncodeData;
use Aspose\BarCode\Requests\GenerateBatchRequestWrapper;

$configuration = new Configuration();
$configuration->setAccessToken(getenv('TEST_CONFIGURATION_ACCESS_TOKEN'));
$batch = new BatchGenerateRequest([
    'archive_format' => 'Zip',
    'items' => [new BatchGenerateItem([
        'file_name' => 'qr.png',
        'generation' => new GenerateParams([
            'barcode_type' => 'QR',
            'encode_data' => new EncodeData(['data' => 'Batch example']),
        ]),
    ])],
]);
$data = (new GenerateApi(null, $configuration))->generateBatch(new GenerateBatchRequestWrapper($batch));
file_put_contents('barcodes.zip', $data->fread($data->getSize()));
