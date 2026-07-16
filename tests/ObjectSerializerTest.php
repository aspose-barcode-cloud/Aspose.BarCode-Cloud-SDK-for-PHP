<?php

declare(strict_types=1);

use Aspose\BarCode\Model\RegionPoint;
use Aspose\BarCode\ObjectSerializer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Offline coverage for `ObjectSerializer`: scalar and date formatting, collection serialization,
 * query building, and deserialization. No network is touched, so together with the other offline
 * coverage tests this is part of the deterministic coverage floor that keeps the SDK above the
 * 80% line-coverage gate regardless of which live API calls run.
 */
final class ObjectSerializerTest extends TestCase
{
    #[DataProvider('dataProvider')]
    public function testToString($obj, $expected): void
    {
        $strVal = ObjectSerializer::toString($obj);
        $this->assertEquals($expected, $strVal);
        $this->assertSame($expected, $strVal);
    }

    public static function dataProvider(): array
    {
        return [
            // ObjectSerializer::toString() only formats DateTime; scalars pass through unchanged.
            [0, 0],
            [0.1, 0.1],
            ["string", "string"],
            [new DateTime("2023-02-09", new DateTimeZone("UTC")), "2023-02-09T00:00:00+00:00"],
        ];
    }

    public function testObjectSerializerScalarsAndDates(): void
    {
        $this->assertSame('text', ObjectSerializer::toString('text'));
        $this->assertSame('text', ObjectSerializer::toPathValue('text'));
        $this->assertSame('a,b,c', ObjectSerializer::toQueryValue(['a', 'b', 'c']));
        $this->assertSame('scalar', ObjectSerializer::toQueryValue('scalar'));
        $this->assertSame('plain', ObjectSerializer::toFormValue('plain'));

        $date = new DateTime('2026-06-29T01:02:03+00:00');
        $this->assertSame('2026-06-29T01:02:03+00:00', ObjectSerializer::toString($date));
        $this->assertSame('2026-06-29', ObjectSerializer::sanitizeForSerialization($date, 'date'));
        $this->assertSame('2026-06-29T01:02:03+00:00', ObjectSerializer::sanitizeForSerialization($date));

        $this->assertNull(ObjectSerializer::sanitizeForSerialization(null));
        $this->assertSame(42, ObjectSerializer::sanitizeForSerialization(42));
        $this->assertSame(['a' => 1], ObjectSerializer::sanitizeForSerialization(['a' => 1]));

        $this->assertSame('sun.gif', ObjectSerializer::sanitizeFilename('../../sun.gif'));
        $this->assertSame('sun.gif', ObjectSerializer::sanitizeFilename('sun.gif'));
    }

    public function testObjectSerializerCollections(): void
    {
        $collection = ['a', 'b', 'c'];
        $this->assertSame('a,b,c', ObjectSerializer::serializeCollection($collection, 'csv'));
        $this->assertSame('a b c', ObjectSerializer::serializeCollection($collection, 'ssv'));
        $this->assertSame("a\tb\tc", ObjectSerializer::serializeCollection($collection, 'tsv'));
        $this->assertSame('a|b|c', ObjectSerializer::serializeCollection($collection, 'pipes'));
        $this->assertSame('a,b,c', ObjectSerializer::serializeCollection($collection, 'unknown'));
        $this->assertStringContainsString(
            '=a',
            ObjectSerializer::serializeCollection($collection, 'multi', true)
        );
    }

    public function testObjectSerializerBuildQuery(): void
    {
        $this->assertSame('', ObjectSerializer::buildQuery([]));
        $this->assertSame('a=1&b=2', ObjectSerializer::buildQuery(['a' => 1, 'b' => 2]));
        $this->assertSame('flag=true', ObjectSerializer::buildQuery(['flag' => true]));
        $this->assertSame('list=1&list=2', ObjectSerializer::buildQuery(['list' => [1, 2]]));
        $this->assertSame('a b', ObjectSerializer::buildQuery(['a b' => null], false));
        $this->assertSame('a%20b=1', ObjectSerializer::buildQuery(['a b' => 1], PHP_QUERY_RFC3986));
        $this->assertSame('a+b=1', ObjectSerializer::buildQuery(['a b' => 1], PHP_QUERY_RFC1738));

        $this->expectException(InvalidArgumentException::class);
        ObjectSerializer::buildQuery(['a' => 1], 999);
    }

    public function testObjectSerializerDeserialize(): void
    {
        $this->assertNull(ObjectSerializer::deserialize(null, 'string'));
        $this->assertSame('hello', ObjectSerializer::deserialize('hello', 'string'));
        $this->assertSame(123, ObjectSerializer::deserialize('123', 'int'));
        $this->assertSame(['a' => 1], ObjectSerializer::deserialize((object) ['a' => 1], 'object'));

        $list = ObjectSerializer::deserialize([['x' => 1, 'y' => 2]], '\Aspose\BarCode\Model\RegionPoint[]');
        $this->assertIsArray($list);
        $this->assertInstanceOf(RegionPoint::class, $list[0]);

        $map = ObjectSerializer::deserialize((object) ['first' => 'a', 'second' => 'b'], 'map[string,string]');
        $this->assertSame(['first' => 'a', 'second' => 'b'], $map);

        $emptyMap = ObjectSerializer::deserialize((object) ['x' => 1], 'map[string]');
        $this->assertSame([], $emptyMap);

        $date = ObjectSerializer::deserialize('2026-06-29T01:02:03Z', '\DateTime');
        $this->assertInstanceOf(DateTime::class, $date);
        $this->assertNull(ObjectSerializer::deserialize('', '\DateTime'));
        $this->assertNull(ObjectSerializer::deserialize('not-a-date', '\DateTime'));

        $region = ObjectSerializer::deserialize('{"x":10,"y":20}', '\Aspose\BarCode\Model\RegionPoint');
        $this->assertInstanceOf(RegionPoint::class, $region);
        $this->assertSame(10, $region->getX());
        $this->assertSame(20, $region->getY());
    }
}
