<?php

declare(strict_types=1);

use Aspose\BarCode\Configuration;
use Aspose\BarCode\RecognizeApi;
use Aspose\BarCode\Model\DecodeBarcodeType;
use Aspose\BarCode\Requests\RecognizeRequestWrapper;
use Aspose\BarCode\Requests\RecognizeMultipartRequestWrapper;
use Aspose\BarCode\Requests\RecognizeBase64RequestWrapper;
use Aspose\BarCode\Model\RecognizeBase64Request;
use Aspose\BarCode\Model\RecognitionImageKind;
use Aspose\BarCode\Model\RecognitionMode;
use Aspose\BarCode\Model\RegionPoint;
use PHPUnit\Framework\TestCase;

require_once 'TestConfiguration.php';


final class RecognizeApiTest extends TestCase
{
    /**
    * @var ?RecognizeApi
    */
    private static ?RecognizeApi $api = null;
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
        self::$api = new RecognizeApi(null, self::$config);
        self::$testDataFolderPath = './testdata/';
    }


    public function testBarcodeRecognizeGet()
    {

        $response = self::$api->recognize(
            new RecognizeRequestWrapper(
                DecodeBarcodeType::QR,
                "https://raw.githubusercontent.com/aspose-barcode-cloud/Aspose.BarCode-Cloud-SDK-for-PHP/main/testdata/QR_and_Code128.png",
                RecognitionMode::Fast,
                RecognitionImageKind::ClearImage
            )
        );

        $this->assertCount(1, $response->getBarcodes());
        $barcode = $response->getBarcodes()[0];
        $this->assertEquals(DecodeBarcodeType::QR, $barcode->getType());
        $this->assertEquals("Hello world!", $barcode->getBarcodeValue());
    }

    public function testBarcodeRecognizeBodyPost()
    {

        $imageBytes = file_get_contents(self::$testDataFolderPath . 'pdf417Sample.png');
        $encodedString = base64_encode($imageBytes);

        $response = self::$api->recognizeBase64(
            new RecognizeBase64RequestWrapper(
                new RecognizeBase64Request([
                    'barcode_types' => [DecodeBarcodeType::Pdf417],
                    'file_base64' => $encodedString,
                ])
            )
        );

        $this->assertNotNull($response->getBarcodes());
        $this->assertCount(1, $response->getBarcodes());
        $barcode = $response->getBarcodes()[0];
        $this->assertEquals(DecodeBarcodeType::Pdf417, $barcode->getType());
        $this->assertEquals("Aspose.BarCode for Cloud Sample", $barcode->getBarcodeValue());
        $this->assertGreaterThan(0, $barcode->getRegion()[0]->getX());
        $this->assertGreaterThan(0, $barcode->getRegion()[0]->getY());
    }

    public function testBarcodeRecognizeMultipartPost()
    {

        $file = new SplFileObject(self::$testDataFolderPath . 'QR_and_Code128.png', 'rb');
        $response = self::$api->recognizeMultipart(
            new RecognizeMultipartRequestWrapper(DecodeBarcodeType::Code128, $file)
        );

        $this->assertCount(1, $response->getBarcodes());
        $barcode = $response->getBarcodes()[0];
        $this->assertEquals(DecodeBarcodeType::Code128, $barcode->getType());
        $this->assertEquals('Hello world!', $barcode->getBarcodeValue());
    }
}
