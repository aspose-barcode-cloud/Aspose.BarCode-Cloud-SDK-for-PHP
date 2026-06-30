# Aspose\BarCode\RecognizeApi



All URIs are relative to https://api.aspose.cloud/v4.0, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**recognize()**](RecognizeApi.md#recognize) | **GET** /barcode/recognize | Recognize a barcode from a file on an Internet server using a GET request with a query string parameter. For recognizing files from your hard drive, use &#x60;recognize-body&#x60; or &#x60;recognize-multipart&#x60; endpoints instead. |
| [**recognizeBase64()**](RecognizeApi.md#recognizeBase64) | **POST** /barcode/recognize-body | Recognize a barcode from a file in the request body using a POST request with JSON or XML body parameters. |
| [**recognizeMultipart()**](RecognizeApi.md#recognizeMultipart) | **POST** /barcode/recognize-multipart | Recognize a barcode from a file in the request body using a POST request with multipart form parameters. |


## `recognize()`

```php
recognize($barcode_type, $file_url, $recognition_mode, $recognition_image_kind): \Aspose\BarCode\Model\BarcodeResponseList
```

Recognize a barcode from a file on an Internet server using a GET request with a query string parameter. For recognizing files from your hard drive, use `recognize-body` or `recognize-multipart` endpoints instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\RecognizeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$barcode_type = new \Aspose\BarCode\Model\\AsposeBarCodeModelDecodeBarcodeType(); // \AsposeBarCodeModelDecodeBarcodeType | Type of barcode to recognize.
$file_url = 'file_url_example'; // string | URL to the barcode image.
$recognition_mode = new \Aspose\BarCode\Model\\AsposeBarCodeModelRecognitionMode(); // \AsposeBarCodeModelRecognitionMode | Recognition mode.
$recognition_image_kind = new \Aspose\BarCode\Model\\AsposeBarCodeModelRecognitionImageKind(); // \AsposeBarCodeModelRecognitionImageKind | Image kind for recognition.

try {
    $result = $apiInstance->recognize($barcode_type, $file_url, $recognition_mode, $recognition_image_kind);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecognizeApi->recognize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\AsposeBarCodeModelDecodeBarcodeType**](../Model/.md)| Type of barcode to recognize. | |
| **file_url** | **string**| URL to the barcode image. | |
| **recognition_mode** | [**\AsposeBarCodeModelRecognitionMode**](../Model/.md)| Recognition mode. | [optional] |
| **recognition_image_kind** | [**\AsposeBarCodeModelRecognitionImageKind**](../Model/.md)| Image kind for recognition. | [optional] |

### Return type

[**\Aspose\BarCode\Model\BarcodeResponseList**](../Model/BarcodeResponseList.md)

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `recognizeBase64()`

```php
recognizeBase64($recognize_base64_request): \Aspose\BarCode\Model\BarcodeResponseList
```

Recognize a barcode from a file in the request body using a POST request with JSON or XML body parameters.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\RecognizeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$recognize_base64_request = new \Aspose\BarCode\Model\RecognizeBase64Request(); // \Aspose\BarCode\Model\RecognizeBase64Request | Barcode recognition request.

try {
    $result = $apiInstance->recognizeBase64($recognize_base64_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecognizeApi->recognizeBase64: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **recognize_base64_request** | [**\Aspose\BarCode\Model\RecognizeBase64Request**](../Model/RecognizeBase64Request.md)| Barcode recognition request. | |

### Return type

[**\Aspose\BarCode\Model\BarcodeResponseList**](../Model/BarcodeResponseList.md)

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `recognizeMultipart()`

```php
recognizeMultipart($barcode_type, $file, $recognition_mode, $recognition_image_kind): \Aspose\BarCode\Model\BarcodeResponseList
```

Recognize a barcode from a file in the request body using a POST request with multipart form parameters.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\RecognizeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$barcode_type = new \Aspose\BarCode\Model\DecodeBarcodeType(); // \Aspose\BarCode\Model\DecodeBarcodeType | See https://reference.aspose.com/barcode/net/aspose.barcode.barcoderecognition/decodetype/
$file = '/path/to/file.txt'; // \SplFileObject | Barcode image file.
$recognition_mode = new \Aspose\BarCode\Model\RecognitionMode(); // \Aspose\BarCode\Model\RecognitionMode | Recognition mode.
$recognition_image_kind = new \Aspose\BarCode\Model\RecognitionImageKind(); // \Aspose\BarCode\Model\RecognitionImageKind | Image kind for recognition.

try {
    $result = $apiInstance->recognizeMultipart($barcode_type, $file, $recognition_mode, $recognition_image_kind);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecognizeApi->recognizeMultipart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\Aspose\BarCode\Model\DecodeBarcodeType**](../Model/DecodeBarcodeType.md)| See https://reference.aspose.com/barcode/net/aspose.barcode.barcoderecognition/decodetype/ | |
| **file** | **\SplFileObject****\SplFileObject**| Barcode image file. | |
| **recognition_mode** | [**\Aspose\BarCode\Model\RecognitionMode**](../Model/RecognitionMode.md)| Recognition mode. | [optional] |
| **recognition_image_kind** | [**\Aspose\BarCode\Model\RecognitionImageKind**](../Model/RecognitionImageKind.md)| Image kind for recognition. | [optional] |

### Return type

[**\Aspose\BarCode\Model\BarcodeResponseList**](../Model/BarcodeResponseList.md)

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
