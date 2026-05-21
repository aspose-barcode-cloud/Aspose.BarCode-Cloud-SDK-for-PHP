# Aspose\BarCode\GenerateApi



All URIs are relative to https://api.aspose.cloud/v4.0, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generate()**](GenerateApi.md#generate) | **GET** /barcode/generate/{barcodeType} | Generate barcode using GET request with parameters in route and query string. |
| [**generateBody()**](GenerateApi.md#generateBody) | **POST** /barcode/generate-body | Generate barcode using POST request with parameters in body in json or xml format. |
| [**generateMultipart()**](GenerateApi.md#generateMultipart) | **POST** /barcode/generate-multipart | Generate barcode using POST request with parameters in multipart form. |


## `generate()`

```php
generate($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle): \SplFileObject
```

Generate barcode using GET request with parameters in route and query string.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\GenerateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$barcode_type = new \Aspose\BarCode\Model\EncodeBarcodeType(); // \Aspose\BarCode\Model\EncodeBarcodeType | Type of barcode to generate.
$data = 'data_example'; // string | String represents data to encode
$data_type = new \Aspose\BarCode\Model\EncodeDataType(); // \Aspose\BarCode\Model\EncodeDataType | Type of data to encode. Default value: StringData.
$image_format = new \Aspose\BarCode\Model\BarcodeImageFormat(); // \Aspose\BarCode\Model\BarcodeImageFormat | Barcode output image format. Default value: png
$text_location = new \Aspose\BarCode\Model\CodeLocation(); // \Aspose\BarCode\Model\CodeLocation | Specify the displaying Text Location, set to CodeLocation.None to hide CodeText. Default value: Depends on BarcodeType. CodeLocation.Below for 1D Barcodes. CodeLocation.None for 2D Barcodes.
$foreground_color = 'Black'; // string | Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black.
$background_color = 'White'; // string | Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White.
$units = new \Aspose\BarCode\Model\GraphicsUnit(); // \Aspose\BarCode\Model\GraphicsUnit | Common Units for all measuring in query. Default units: pixel.
$resolution = 3.4; // float | Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot.
$image_height = 3.4; // float | Height of the barcode image in given units. Default units: pixel. Decimal separator is dot.
$image_width = 3.4; // float | Width of the barcode image in given units. Default units: pixel. Decimal separator is dot.
$rotation_angle = 56; // int | BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.

try {
    $result = $apiInstance->generate($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GenerateApi->generate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\Aspose\BarCode\Model\EncodeBarcodeType**](../Model/.md)| Type of barcode to generate. | |
| **data** | **string**| String represents data to encode | |
| **data_type** | [**\Aspose\BarCode\Model\EncodeDataType**](../Model/.md)| Type of data to encode. Default value: StringData. | [optional] |
| **image_format** | [**\Aspose\BarCode\Model\BarcodeImageFormat**](../Model/.md)| Barcode output image format. Default value: png | [optional] |
| **text_location** | [**\Aspose\BarCode\Model\CodeLocation**](../Model/.md)| Specify the displaying Text Location, set to CodeLocation.None to hide CodeText. Default value: Depends on BarcodeType. CodeLocation.Below for 1D Barcodes. CodeLocation.None for 2D Barcodes. | [optional] |
| **foreground_color** | **string**| Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black. | [optional] [default to &#39;Black&#39;] |
| **background_color** | **string**| Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White. | [optional] [default to &#39;White&#39;] |
| **units** | [**\Aspose\BarCode\Model\GraphicsUnit**](../Model/.md)| Common Units for all measuring in query. Default units: pixel. | [optional] |
| **resolution** | **float**| Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot. | [optional] |
| **image_height** | **float**| Height of the barcode image in given units. Default units: pixel. Decimal separator is dot. | [optional] |
| **image_width** | **float**| Width of the barcode image in given units. Default units: pixel. Decimal separator is dot. | [optional] |
| **rotation_angle** | **int**| BarCode image rotation angle, measured in degree, e.g. RotationAngle &#x3D; 0 or RotationAngle &#x3D; 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `image/png`, `image/bmp`, `image/gif`, `image/jpeg`, `image/svg+xml`, `image/tiff`, `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `generateBody()`

```php
generateBody($generate_params): \SplFileObject
```

Generate barcode using POST request with parameters in body in json or xml format.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\GenerateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generate_params = new \Aspose\BarCode\Model\GenerateParams(); // \Aspose\BarCode\Model\GenerateParams | Parameters of generation

try {
    $result = $apiInstance->generateBody($generate_params);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GenerateApi->generateBody: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **generate_params** | [**\Aspose\BarCode\Model\GenerateParams**](../Model/GenerateParams.md)| Parameters of generation | |

### Return type

**\SplFileObject**

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `image/png`, `image/bmp`, `image/gif`, `image/jpeg`, `image/svg+xml`, `image/tiff`, `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `generateMultipart()`

```php
generateMultipart($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle): \SplFileObject
```

Generate barcode using POST request with parameters in multipart form.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: JWT
$config = Aspose\BarCode\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Aspose\BarCode\Api\GenerateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$barcode_type = new \Aspose\BarCode\Model\EncodeBarcodeType(); // \Aspose\BarCode\Model\EncodeBarcodeType
$data = 'data_example'; // string | String represents data to encode
$data_type = new \Aspose\BarCode\Model\EncodeDataType(); // \Aspose\BarCode\Model\EncodeDataType
$image_format = new \Aspose\BarCode\Model\BarcodeImageFormat(); // \Aspose\BarCode\Model\BarcodeImageFormat
$text_location = new \Aspose\BarCode\Model\CodeLocation(); // \Aspose\BarCode\Model\CodeLocation
$foreground_color = 'Black'; // string | Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black.
$background_color = 'White'; // string | Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White.
$units = new \Aspose\BarCode\Model\GraphicsUnit(); // \Aspose\BarCode\Model\GraphicsUnit
$resolution = 3.4; // float | Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot.
$image_height = 3.4; // float | Height of the barcode image in given units. Default units: pixel. Decimal separator is dot.
$image_width = 3.4; // float | Width of the barcode image in given units. Default units: pixel. Decimal separator is dot.
$rotation_angle = 56; // int | BarCode image rotation angle, measured in degree, e.g. RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.

try {
    $result = $apiInstance->generateMultipart($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GenerateApi->generateMultipart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\Aspose\BarCode\Model\EncodeBarcodeType**](../Model/EncodeBarcodeType.md)|  | |
| **data** | **string**| String represents data to encode | |
| **data_type** | [**\Aspose\BarCode\Model\EncodeDataType**](../Model/EncodeDataType.md)|  | [optional] |
| **image_format** | [**\Aspose\BarCode\Model\BarcodeImageFormat**](../Model/BarcodeImageFormat.md)|  | [optional] |
| **text_location** | [**\Aspose\BarCode\Model\CodeLocation**](../Model/CodeLocation.md)|  | [optional] |
| **foreground_color** | **string**| Specify the displaying bars and content Color. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: Black. | [optional] [default to &#39;Black&#39;] |
| **background_color** | **string**| Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value started with #. For example: AliceBlue or #FF000000 Default value: White. | [optional] [default to &#39;White&#39;] |
| **units** | [**\Aspose\BarCode\Model\GraphicsUnit**](../Model/GraphicsUnit.md)|  | [optional] |
| **resolution** | **float**| Resolution of the BarCode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is dot. | [optional] |
| **image_height** | **float**| Height of the barcode image in given units. Default units: pixel. Decimal separator is dot. | [optional] |
| **image_width** | **float**| Width of the barcode image in given units. Default units: pixel. Decimal separator is dot. | [optional] |
| **rotation_angle** | **int**| BarCode image rotation angle, measured in degree, e.g. RotationAngle &#x3D; 0 or RotationAngle &#x3D; 360 means no rotation. If RotationAngle NOT equal to 90, 180, 270 or 0, it may increase the difficulty for the scanner to read the image. Default value: 0. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[JWT](../../README.md#JWT)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `image/png`, `image/bmp`, `image/gif`, `image/jpeg`, `image/svg+xml`, `image/tiff`, `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
