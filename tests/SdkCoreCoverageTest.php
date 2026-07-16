<?php

declare(strict_types=1);

use Aspose\BarCode\ApiException;
use Aspose\BarCode\Configuration;
use Aspose\BarCode\HeaderSelector;
use Aspose\BarCode\RepeatRequestException;
use PHPUnit\Framework\TestCase;

/**
 * Offline coverage for the network-free parts of the SDK core.
 *
 * Mirrors the Java `SdkCoreCoverageTest`: it exercises `Configuration`, `HeaderSelector`, and the
 * exception hierarchy. No network is touched, so together with the other offline coverage tests
 * this is part of the deterministic coverage floor that keeps the SDK above the 80% line-coverage
 * gate regardless of which live API calls run.
 */
final class SdkCoreCoverageTest extends TestCase
{
    public function testConfigurationAccessors(): void
    {
        $config = new Configuration();
        $config->setClientId('client-id');
        $config->setClientSecret('client-secret');
        $config->setAccessToken('access-token');
        $config->setHost('https://api.example.com');
        $config->setAuthUrl('https://id.example.com/connect/token');
        $config->setDebug(true);

        $this->assertSame('client-id', $config->getClientId());
        $this->assertSame('client-secret', $config->getClientSecret());
        $this->assertSame('access-token', $config->getAccessToken());
        $this->assertSame('https://api.example.com', $config->getHost());
        $this->assertSame('https://id.example.com/connect/token', $config->getAuthUrl());
        $this->assertTrue($config->getDebug());
        $this->assertNotEmpty($config->getClientVersion());
        $this->assertNotEmpty($config->getBasePath());
        $this->assertSame('php://output', $config->getDebugFile());
        $this->assertNotEmpty($config->getTempFolderPath());

        $config->setUserAgent('unit-test-agent');
        $this->assertSame('unit-test-agent', $config->getUserAgent());

        $this->assertInstanceOf(Configuration::class, Configuration::getDefaultConfiguration());
        $this->assertSame(
            Configuration::getDefaultConfiguration(),
            Configuration::getDefaultConfiguration()
        );

        $encoded = $config->jsonSerialize();
        $this->assertSame('client-id', $encoded['ClientId']);
        $this->assertTrue($encoded['Debug']);
    }

    public function testConfigurationRejectsNonStringUserAgent(): void
    {
        $config = new Configuration();
        $this->expectException(InvalidArgumentException::class);
        // The untyped setter guards against non-string user agents at runtime.
        $config->setUserAgent(123);
    }

    public function testApiExceptionHierarchy(): void
    {
        $headers = ['X-Test' => 'value'];
        $exception = new ApiException('boom', 500, $headers, '{"error":"boom"}');
        $this->assertSame('boom', $exception->getMessage());
        $this->assertSame(500, $exception->getCode());
        $this->assertSame($headers, $exception->getResponseHeaders());
        $this->assertSame('{"error":"boom"}', $exception->getResponseBody());

        $exception->setResponseObject(['parsed' => true]);
        $this->assertSame(['parsed' => true], $exception->getResponseObject());

        $repeat = new RepeatRequestException('retry', 401);
        $this->assertInstanceOf(ApiException::class, $repeat);
        $this->assertSame(401, $repeat->getCode());
    }

    public function testHeaderSelector(): void
    {
        $selector = new HeaderSelector();

        $jsonHeaders = $selector->selectHeaders(['application/json'], ['application/json']);
        $this->assertSame('application/json', $jsonHeaders['Accept']);
        $this->assertSame('application/json', $jsonHeaders['Content-Type']);

        $customHeaders = $selector->selectHeaders(['image/png', 'image/tiff'], ['image/png']);
        $this->assertSame('image/png,image/tiff', $customHeaders['Accept']);
        $this->assertSame('image/png', $customHeaders['Content-Type']);

        $emptyAccept = $selector->selectHeaders([], []);
        $this->assertArrayNotHasKey('Accept', $emptyAccept);
        $this->assertSame('application/json', $emptyAccept['Content-Type']);

        $multipart = $selector->selectHeadersForMultipart(['application/json']);
        $this->assertArrayNotHasKey('Content-Type', $multipart);
        $this->assertSame('application/json', $multipart['Accept']);
    }
}
