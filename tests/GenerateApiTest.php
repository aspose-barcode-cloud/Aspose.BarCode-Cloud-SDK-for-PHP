<?php

declare(strict_types=1);

use Aspose\BarCode\ApiException;
use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Configuration;
use Aspose\BarCode\Model\EncodeBarcodeType;
use Aspose\BarCode\Model\EncodeDataType;
use Aspose\BarCode\Model\EncodeData;
use Aspose\BarCode\Model\BarcodeImageParams;
use Aspose\BarCode\Model\BarcodeImageFormat;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Requests\GenerateRequestWrapper;
use Aspose\BarCode\Requests\GenerateBodyRequestWrapper;
use Aspose\BarCode\Requests\GenerateMultipartRequestWrapper;
use PHPUnit\Framework\TestCase;

require_once 'TestConfiguration.php';


/**
 * GenerateApiTest Class Doc Comment
 */
class GenerateApiTest extends TestCase
{
    /**
     * @var ?GenerateApi
     */
    private static ?GenerateApi $api = null;
    /**
     * @var ?Configuration
     */
    private static ?Configuration $config = null;

    /**
     * @var ?string
     */
    private static ?string $tempFolderPath = null;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        self::$config = TestConfiguration::fromFileOrEnv();
        self::$api = new GenerateApi(null, self::$config);
        self::$tempFolderPath = 'BarcodeTests/' . uniqid();
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }


    /**
     * Test case for generate
     *
     * Generate barcode.
     */
    public function testBarcodeGenerateBarcodeTypeGet()
    {
        $request = new GenerateRequestWrapper(EncodeBarcodeType::QR, 'PHP SDK Test');
        $request->barcode_image_params = new BarcodeImageParams();
        $request->barcode_image_params->setImageFormat(BarcodeImageFormat::Png);

        $response = self::$api->generate($request);

        $imageSize = $response->getSize();
        $this->assertGreaterThan(0, $imageSize);
    }


    /**
     * Test case for generateBody
     *
     */
    public function testbarcodeGenerateBodyPost()
    {
        $params = new GenerateParams();
        $params->setBarcodeType(EncodeBarcodeType::QR);
        $params->setEncodeData(new EncodeData(["data" => "PHP Test"]));
        $params->setBarcodeImageParams(new BarcodeImageParams(["image_format" => BarcodeImageFormat::Jpeg]));
        $request = new GenerateBodyRequestWrapper($params);

        $response = self::$api->generateBody($request);

        $this->assertGreaterThan(0, $response->getSize());
    }


    /**
     * Test case for generateMultipart
     *
     */
    public function testbarcodeGenerateMultipartPost()
    {
        $request = new GenerateMultipartRequestWrapper(
            EncodeBarcodeType::Code128,
            'PHP SDK Test'
        );


        $response = self::$api->generateMultipart($request);


        $this->assertGreaterThan(0, $response->getSize());
    }
}
