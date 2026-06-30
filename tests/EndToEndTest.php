<?php

declare(strict_types=1);

use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\ScanApi;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Model\EncodeDataType;
use Aspose\BarCode\Model\BarcodeImageFormat;
use Aspose\BarCode\Model\BarcodeImageParams;
use Aspose\BarCode\Requests\GenerateRequestWrapper;
use Aspose\BarCode\Requests\ScanMultipartRequestWrapper;
use PHPUnit\Framework\TestCase;

require_once 'TestConfiguration.php';


final class EndToEndTest extends TestCase
{
    public function testGenerateAndRecognize(): void
    {
        $config = TestConfiguration::fromFileOrEnv();
        $genApi = new GenerateApi(null, $config);
        $scanApi = new ScanApi(null, $config);

        // Generate
        $genRequest = new GenerateRequestWrapper(EncodeBarcodeType::QR, 'PHP SDK Test');
        $genRequest->barcode_image_params = new BarcodeImageParams();
        $genRequest->barcode_image_params->setImageFormat(BarcodeImageFormat::Png);

        $genResponse = $genApi->generate($genRequest);

        // Scan

        $scanRequest = new ScanMultipartRequestWrapper($genResponse);

        $scanResponse = $scanApi->scanMultipart($scanRequest);
        $this->assertNotEmpty($scanResponse);

        $this->assertEquals('QR', $scanResponse->getBarcodes()[0]->getType());
        $this->assertEquals('PHP SDK Test', $scanResponse->getBarcodes()[0]->getBarcodeValue());
    }
}
