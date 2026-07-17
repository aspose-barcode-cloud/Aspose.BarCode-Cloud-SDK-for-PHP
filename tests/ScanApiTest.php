<?php

declare(strict_types=1);

use Aspose\BarCode\Configuration;
use Aspose\BarCode\ScanApi;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Requests\ScanRequestWrapper;
use Aspose\BarCode\Requests\ScanMultipartRequestWrapper;
use Aspose\BarCode\Requests\ScanBase64RequestWrapper;
use Aspose\BarCode\Model\ScanBase64Request;
use PHPUnit\Framework\TestCase;

require_once 'TestConfiguration.php';


final class ScanApiTest extends TestCase
{
    /**
    * @var ?ScanApi
    */
    private static ?ScanApi $api = null;
    /**
     * @var ?Configuration
     */
    private static ?Configuration $config = null;

    /**
     * @var ?string
     */
    private static ?string $testDataFolderPath = null;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        self::$config = TestConfiguration::fromFileOrEnv();
        self::$api = new ScanApi(null, self::$config);
        self::$testDataFolderPath = './testdata/';
    }


    public function testBarcodeScanMultipartPost(): void
    {
        $file = new SplFileObject(self::$testDataFolderPath . 'pdf417Sample.png');
        $scanRequest = new ScanMultipartRequestWrapper($file);

        $scanResponse = self::$api->scanMultipart($scanRequest);
        $this->assertNotEmpty($scanResponse);

        $this->assertEquals(DecodeBarcodeType::Pdf417, $scanResponse->getBarcodes()[0]->getType());
        $this->assertEquals('Aspose.BarCode for Cloud Sample', $scanResponse->getBarcodes()[0]->getBarcodeValue());
    }

    public function testBarcodeScanBodyPost(): void
    {
        $file = new SplFileObject(self::$testDataFolderPath . 'QR_and_Code128.png');
        $scanBase64request = new ScanBase64Request(["file_base64" => base64_encode($file->fread($file->getSize()))]);
        $scanRequest = new ScanBase64RequestWrapper($scanBase64request);

        $scanResponse = self::$api->scanBase64($scanRequest);
        $this->assertNotEmpty($scanResponse);

        $this->assertCount(2, $scanResponse->getBarcodes());
        $this->assertEquals(DecodeBarcodeType::QR, $scanResponse->getBarcodes()[0]->getType());
        $this->assertEquals('Hello world!', $scanResponse->getBarcodes()[0]->getBarcodeValue());

        $this->assertEquals(DecodeBarcodeType::Code128, $scanResponse->getBarcodes()[1]->getType());
        $this->assertEquals('Hello world!', $scanResponse->getBarcodes()[1]->getBarcodeValue());
    }

    public function testBarcodeScanGet()
    {

        $response = self::$api->scan(new ScanRequestWrapper("https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png"));

        $this->assertCount(2, $response->getBarcodes());

        $this->assertEquals(DecodeBarcodeType::QR, $response->getBarcodes()[0]->getType());
        $this->assertEquals("Hello world!", $response->getBarcodes()[0]->getBarcodeValue());
        $this->assertEquals(DecodeBarcodeType::Code128, $response->getBarcodes()[1]->getType());
        $this->assertEquals("Hello world!", $response->getBarcodes()[1]->getBarcodeValue());
    }
}
