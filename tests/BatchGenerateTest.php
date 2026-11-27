<?php

declare(strict_types=1);

use Aspose\BarCode\GenerateApi;
use Aspose\BarCode\Model\BatchGenerateItem;
use Aspose\BarCode\Model\BatchGenerateRequest;
use Aspose\BarCode\Model\GenerateParams;
use Aspose\BarCode\Model\EncodeData;
use Aspose\BarCode\Requests\GenerateBatchRequestWrapper;
use PHPUnit\Framework\TestCase;

require_once 'TestConfiguration.php';

class BatchGenerateTest extends TestCase
{
    public function testBatchModelRetainsNamespacedGenerationType(): void
    {
        self::assertSame('\\' . GenerateParams::class, BatchGenerateItem::swaggerTypes()['generation']);
        $item = \Aspose\BarCode\ObjectSerializer::deserialize(
            (object) ['generation' => (object) [
                'encodeData' => (object) ['data' => 'Batch example'],
            ]],
            BatchGenerateItem::class
        );
        if (!$item instanceof BatchGenerateItem) {
            self::fail('Batch deserialization must return a BatchGenerateItem');
        }
        self::assertInstanceOf(GenerateParams::class, $item->getGeneration());
        self::assertSame('Batch example', $item->getGeneration()->getEncodeData()->getData());
    }

    public function testGenerateBatchArchives(): void
    {
        $api = new GenerateApi(null, TestConfiguration::fromFileOrEnv());
        foreach (['Zip', 'Tar', 'TarGzip'] as $format) {
            $batch = new BatchGenerateRequest([
                'archive_format' => $format,
                'items' => [new BatchGenerateItem([
                    'file_name' => 'qr.png',
                    'generation' => new GenerateParams([
                        'barcode_type' => 'QR',
                        'encode_data' => new EncodeData(['data' => 'Batch example']),
                    ]),
                ])],
            ]);
            $result = $api->generateBatch(new GenerateBatchRequestWrapper($batch));
            $data = $result->fread($result->getSize());
            self::assertNotEmpty($data);
            if ($format === 'Zip') {
                self::assertSame("PK\x03\x04", substr($data, 0, 4));
            } elseif ($format === 'TarGzip') {
                self::assertSame("\x1f\x8b", substr($data, 0, 2));
            } else {
                self::assertSame('ustar', substr($data, 257, 5));
            }
        }
    }
}
