<?php

declare(strict_types=1);
/**
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose" file="GenerateApi.php">
 *   Copyright (c) 2026 Aspose Pty Ltd
 * </copyright>
 * <summary>
 *   Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE.
 * </summary>
 * --------------------------------------------------------------------------------------------------------------------
 */

namespace Aspose\BarCode;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Aspose\BarCode\Requests;
use InvalidArgumentException;
use RuntimeException;

/**
 * Aspose.BarCode for Cloud API.
 */

class GenerateApi
{
    /**
     * Stores client instance
     * @var ClientInterface client for calling api
     */
    protected $client;

    /**
     * Stores configuration
     * @var Configuration configuration info
     */
    protected $config;

    /**
     * Stores header selector
     * HeaderSelector class for header selection
     */
    protected $headerSelector;

    /**
     * Initialize a new instance of Api
     * @param ClientInterface|null $client client for calling api
     * @param Configuration|null $config configuration info
     * @param HeaderSelector|null $selector class for header selection
     */
    public function __construct(?ClientInterface $client = null, ?Configuration $config = null, ?HeaderSelector $selector = null)
    {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * Gets the config
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation generate
     *
     * Generate barcode using GET request with parameters in route and query string.
     *
     * @param Requests\GenerateRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \SplFileObject
     */
    public function generate(Requests\GenerateRequestWrapper $request)
    {
        try {
            list($response) = $this->generateWithHttpInfo($request);
            return $response;
        } catch (RepeatRequestException $e) {
            list($response) = $this->generateWithHttpInfo($request);
            return $response;
        }
    }

    /**
     * Operation generateWithHttpInfo
     *
     * Generate barcode using GET request with parameters in route and query string.
     *
     * @param Requests\GenerateRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function generateWithHttpInfo(Requests\GenerateRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateRequestWrapper($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_requestToken();
                    throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                }

                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            $code = $e->getCode();
            if ($code >= 400 && $code < 500) {
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Aspose\BarCode\Model\ApiErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
            }
            throw $e;
        }
    }

    /**
     * Operation generateAsync
     *
     * Generate barcode using GET request with parameters in route and query string.
     *
     * @param Requests\GenerateRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateAsync(Requests\GenerateRequestWrapper $request)
    {
        return $this->generateAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation generateAsyncWithHttpInfo
     *
     * Generate barcode using GET request with parameters in route and query string.
     *
     * @param Requests\GenerateRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateAsyncWithHttpInfo(Requests\GenerateRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateRequestWrapper($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    if ($exception instanceof RepeatRequestException) {
                        //$this->_refreshToken();
                        throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                    }

                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'generate'
     *
     * @param Requests\GenerateRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GenerateRequestWrapper(Requests\GenerateRequestWrapper $request)
    {
        // verify the required parameter 'barcode_type' is set
        if (!isset($request->barcode_type)) {
            throw new InvalidArgumentException('Missing the required parameter $barcode_type when calling generate');
        }
        // verify the required parameter 'data' is set
        if (!isset($request->data)) {
            throw new InvalidArgumentException('Missing the required parameter $data when calling generate');
        }
        if (isset($request->resolution) && $request->resolution > 100000) {
            throw new InvalidArgumentException("invalid value for resolution when calling GenerateApi.generate, must be smaller than or equal to 100000.");
        }
        if (isset($request->resolution) && $request->resolution < 1) {
            throw new InvalidArgumentException("invalid value for resolution when calling GenerateApi.generate, must be bigger than or equal to 1.");
        }


        $resourcePath = '/barcode/generate/{barcodeType}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
        if (isset($request->barcode_type)) {
            $localName = lcfirst('barcodeType');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->barcode_type), $resourcePath);
        }
        if (isset($request->data_type)) {
            $queryParamName = lcfirst('dataType');
            $queryParamValue = is_bool($request->data_type) ? ($request->data_type ? 'true' : 'false') : $request->data_type;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->data)) {
            $queryParamName = lcfirst('data');
            $queryParamValue = is_bool($request->data) ? ($request->data ? 'true' : 'false') : $request->data;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->image_format)) {
            $queryParamName = lcfirst('imageFormat');
            $queryParamValue = is_bool($request->image_format) ? ($request->image_format ? 'true' : 'false') : $request->image_format;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->text_location)) {
            $queryParamName = lcfirst('textLocation');
            $queryParamValue = is_bool($request->text_location) ? ($request->text_location ? 'true' : 'false') : $request->text_location;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->foreground_color)) {
            $queryParamName = lcfirst('foregroundColor');
            $queryParamValue = is_bool($request->foreground_color) ? ($request->foreground_color ? 'true' : 'false') : $request->foreground_color;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->background_color)) {
            $queryParamName = lcfirst('backgroundColor');
            $queryParamValue = is_bool($request->background_color) ? ($request->background_color ? 'true' : 'false') : $request->background_color;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->units)) {
            $queryParamName = lcfirst('units');
            $queryParamValue = is_bool($request->units) ? ($request->units ? 'true' : 'false') : $request->units;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->resolution)) {
            $queryParamName = lcfirst('resolution');
            $queryParamValue = is_bool($request->resolution) ? ($request->resolution ? 'true' : 'false') : $request->resolution;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->image_height)) {
            $queryParamName = lcfirst('imageHeight');
            $queryParamValue = is_bool($request->image_height) ? ($request->image_height ? 'true' : 'false') : $request->image_height;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->image_width)) {
            $queryParamName = lcfirst('imageWidth');
            $queryParamValue = is_bool($request->image_width) ? ($request->image_width ? 'true' : 'false') : $request->image_width;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }
        if (isset($request->rotation_angle)) {
            $queryParamName = lcfirst('rotationAngle');
            $queryParamValue = is_bool($request->rotation_angle) ? ($request->rotation_angle ? 'true' : 'false') : $request->rotation_angle;
            if (strpos($resourcePath, '{' . $queryParamName . '}') !== false) {
                $resourcePath = str_replace('{' . $queryParamName . '}', ObjectSerializer::toPathValue($queryParamValue), $resourcePath);
            } else {
                $queryParams[$queryParamName] = ObjectSerializer::toQueryValue($queryParamValue);
            }
        }

        $resourcePath = $this->_parseURL($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)

        if (!$this->config->getAccessToken()) {
            $this->_requestToken();
        }
        $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['x-aspose-client'] = $this->config->getUserAgent();
        }

        $defaultHeaders['x-aspose-client-version'] = $this->config->getClientVersion();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $req = new Request(
            'GET',
            $this->config->getHost() . $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $this->config->getHost() . $resourcePath, $headers, $httpBody);
        }

        return $req;
    }

    /**
     * Operation generateBody
     *
     * Generate barcode using POST request with parameters in body in json or xml format.
     *
     * @param Requests\GenerateBodyRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \SplFileObject
     */
    public function generateBody(Requests\GenerateBodyRequestWrapper $request)
    {
        try {
            list($response) = $this->generateBodyWithHttpInfo($request);
            return $response;
        } catch (RepeatRequestException $e) {
            list($response) = $this->generateBodyWithHttpInfo($request);
            return $response;
        }
    }

    /**
     * Operation generateBodyWithHttpInfo
     *
     * Generate barcode using POST request with parameters in body in json or xml format.
     *
     * @param Requests\GenerateBodyRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function generateBodyWithHttpInfo(Requests\GenerateBodyRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateBodyRequestWrapper($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_requestToken();
                    throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                }

                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            $code = $e->getCode();
            if ($code >= 400 && $code < 500) {
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Aspose\BarCode\Model\ApiErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
            }
            throw $e;
        }
    }

    /**
     * Operation generateBodyAsync
     *
     * Generate barcode using POST request with parameters in body in json or xml format.
     *
     * @param Requests\GenerateBodyRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateBodyAsync(Requests\GenerateBodyRequestWrapper $request)
    {
        return $this->generateBodyAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation generateBodyAsyncWithHttpInfo
     *
     * Generate barcode using POST request with parameters in body in json or xml format.
     *
     * @param Requests\GenerateBodyRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateBodyAsyncWithHttpInfo(Requests\GenerateBodyRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateBodyRequestWrapper($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    if ($exception instanceof RepeatRequestException) {
                        //$this->_refreshToken();
                        throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                    }

                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'generateBody'
     *
     * @param Requests\GenerateBodyRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GenerateBodyRequestWrapper(Requests\GenerateBodyRequestWrapper $request)
    {
        // verify the required parameter 'generate_params' is set
        if (!isset($request->generate_params)) {
            throw new InvalidArgumentException('Missing the required parameter $generate_params when calling generateBody');
        }

        $resourcePath = '/barcode/generate-body';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = $this->_parseURL($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->generate_params)) {
            if (is_string($request->generate_params)) {
                $_tempBody = "\"" . $request->generate_params . "\"";
            } else {
                $_tempBody = $request->generate_params;
            }
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        // $_tempBody is the method argument, if present
        $httpBody = $_tempBody;
        // \stdClass has no __toString(), so we should encode it manually
        if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
            $httpBody = \GuzzleHttp\json_encode($httpBody);
        }

        if (!$this->config->getAccessToken()) {
            $this->_requestToken();
        }
        $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['x-aspose-client'] = $this->config->getUserAgent();
        }

        $defaultHeaders['x-aspose-client-version'] = $this->config->getClientVersion();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $req = new Request(
            'POST',
            $this->config->getHost() . $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $this->config->getHost() . $resourcePath, $headers, $httpBody);
        }

        return $req;
    }

    /**
     * Operation generateMultipart
     *
     * Generate barcode using POST request with parameters in multipart form.
     *
     * @param Requests\GenerateMultipartRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return \SplFileObject
     */
    public function generateMultipart(Requests\GenerateMultipartRequestWrapper $request)
    {
        try {
            list($response) = $this->generateMultipartWithHttpInfo($request);
            return $response;
        } catch (RepeatRequestException $e) {
            list($response) = $this->generateMultipartWithHttpInfo($request);
            return $response;
        }
    }

    /**
     * Operation generateMultipartWithHttpInfo
     *
     * Generate barcode using POST request with parameters in multipart form.
     *
     * @param Requests\GenerateMultipartRequestWrapper $request is a request object for operation
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function generateMultipartWithHttpInfo(Requests\GenerateMultipartRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateMultipartRequestWrapper($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_requestToken();
                    throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                }

                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            $code = $e->getCode();
            if ($code >= 400 && $code < 500) {
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Aspose\BarCode\Model\ApiErrorResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
            }
            throw $e;
        }
    }

    /**
     * Operation generateMultipartAsync
     *
     * Generate barcode using POST request with parameters in multipart form.
     *
     * @param Requests\GenerateMultipartRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateMultipartAsync(Requests\GenerateMultipartRequestWrapper $request)
    {
        return $this->generateMultipartAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation generateMultipartAsyncWithHttpInfo
     *
     * Generate barcode using POST request with parameters in multipart form.
     *
     * @param Requests\GenerateMultipartRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateMultipartAsyncWithHttpInfo(Requests\GenerateMultipartRequestWrapper $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->GenerateMultipartRequestWrapper($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    if ($exception instanceof RepeatRequestException) {
                        //$this->_refreshToken();
                        throw new RepeatRequestException('Request must be retried', $statusCode, $response->getHeaders(), $response->getBody());
                    }

                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'generateMultipart'
     *
     * @param Requests\GenerateMultipartRequestWrapper $request is a request object for operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GenerateMultipartRequestWrapper(Requests\GenerateMultipartRequestWrapper $request)
    {
        // verify the required parameter 'barcode_type' is set
        if (!isset($request->barcode_type)) {
            throw new InvalidArgumentException('Missing the required parameter $barcode_type when calling generateMultipart');
        }
        // verify the required parameter 'data' is set
        if (!isset($request->data)) {
            throw new InvalidArgumentException('Missing the required parameter $data when calling generateMultipart');
        }
        if (isset($request->resolution) && $request->resolution > 100000) {
            throw new InvalidArgumentException("invalid value for resolution when calling GenerateApi.generateMultipart, must be smaller than or equal to 100000.");
        }
        if (isset($request->resolution) && $request->resolution < 1) {
            throw new InvalidArgumentException("invalid value for resolution when calling GenerateApi.generateMultipart, must be bigger than or equal to 1.");
        }


        $resourcePath = '/barcode/generate-multipart';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = $this->_parseURL($resourcePath, $queryParams);

        $multipart = true;
        // form params
        if (isset($request->barcode_type)) {
            $formParams['barcodeType'][] = ObjectSerializer::toFormValue($request->barcode_type);
        }

        if (isset($request->data_type)) {
            $formParams['dataType'][] = ObjectSerializer::toFormValue($request->data_type);
        }

        if (isset($request->data)) {
            $formParams['data'][] = ObjectSerializer::toFormValue($request->data);
        }

        if (isset($request->image_format)) {
            $formParams['imageFormat'][] = ObjectSerializer::toFormValue($request->image_format);
        }

        if (isset($request->text_location)) {
            $formParams['textLocation'][] = ObjectSerializer::toFormValue($request->text_location);
        }

        if (isset($request->foreground_color)) {
            $formParams['foregroundColor'][] = ObjectSerializer::toFormValue($request->foreground_color);
        }

        if (isset($request->background_color)) {
            $formParams['backgroundColor'][] = ObjectSerializer::toFormValue($request->background_color);
        }

        if (isset($request->units)) {
            $formParams['units'][] = ObjectSerializer::toFormValue($request->units);
        }

        if (isset($request->resolution)) {
            $formParams['resolution'][] = ObjectSerializer::toFormValue($request->resolution);
        }

        if (isset($request->image_height)) {
            $formParams['imageHeight'][] = ObjectSerializer::toFormValue($request->image_height);
        }

        if (isset($request->image_width)) {
            $formParams['imageWidth'][] = ObjectSerializer::toFormValue($request->image_width);
        }

        if (isset($request->rotation_angle)) {
            $formParams['rotationAngle'][] = ObjectSerializer::toFormValue($request->rotation_angle);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['image/png', 'image/bmp', 'image/gif', 'image/jpeg', 'image/svg+xml', 'image/tiff', 'application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)

        $multipartContents = [];
        foreach ($formParams as $formParamName => $formParamValues) {
            foreach ($formParamValues as $formParamValue) {
                $multipartFileName = '';
                $multipartContents[] = [
                    'name' => $formParamName,
                    'contents' => $formParamValue,
                    'filename' => $multipartFileName
                ];
            }
        }
        // for HTTP post (form)
        $httpBody = new MultipartStream($multipartContents);


        if (!$this->config->getAccessToken()) {
            $this->_requestToken();
        }
        $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['x-aspose-client'] = $this->config->getUserAgent();
        }

        $defaultHeaders['x-aspose-client-version'] = $this->config->getClientVersion();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $req = new Request(
            'POST',
            $this->config->getHost() . $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $this->config->getHost() . $resourcePath, $headers, $httpBody);
        }

        return $req;
    }

    /**
     * Create http client option
     *
     * @throws RuntimeException on file opening failure
     * @return array of http client options
     */
    private function _createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Executes response logging
     */
    private function _writeResponseLog($statusCode, $headers, $body)
    {
        $logInfo = "\nResponse: $statusCode \n";
        echo $logInfo . $this->_writeHeadersAndBody($logInfo, $headers, $body);
    }

    /**
     * Executes request logging
     */
    private function _writeRequestLog($method, $url, $headers, $body)
    {
        $logInfo = "\n$method: $url \n";
        echo $logInfo . $this->_writeHeadersAndBody($logInfo, $headers, $body);
    }

    /**
     * Executes header and boy formatting
     */
    private function _writeHeadersAndBody($logInfo, $headers, $body)
    {
        foreach ($headers as $name => $value) {
            $strValue = is_array($value) ? implode($value) : $value;
            $logInfo .= $name . ': ' . $strValue . '\n';
        }

        return $logInfo .= 'Body: ' . $body . '\n';
    }

    /**
     * Executes url parsing
     */
    private function _parseURL($url, $queryParams)
    {
        // parse the url
        $UrlToSign = trim($url, '/');
        $urlQuery = preg_replace('/%5B[0-9]+%5D=/', '=', http_build_query($queryParams));

        $urlPartToSign = $this->config->getBasePath() . '/' . parse_url($UrlToSign, PHP_URL_HOST) . parse_url($UrlToSign, PHP_URL_PATH) . '?' . $urlQuery;

        return $urlPartToSign;
    }

    /**
     * Gets a request token from server
     */
    private function _requestToken()
    {
        $requestUrl = $this->config->getAuthUrl();

        $response = $this->client->request('POST', $requestUrl, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->config->getClientId(),
                'client_secret' => $this->config->getClientSecret(),
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $this->config->setAccessToken($result['access_token']);
    }
}
