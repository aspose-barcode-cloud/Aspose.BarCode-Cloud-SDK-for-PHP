# Aspose\BarCode\GenerateApi



All URIs are relative to https://api.aspose.cloud/v4.0, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generate()**](GenerateApi.md#generate) | **GET** /barcode/generate/{barcodeType} | Generate a barcode using a GET request with parameters in the route and query string. |
| [**generateBody()**](GenerateApi.md#generateBody) | **POST** /barcode/generate-body | Generate a barcode using a POST request with parameters in the request body in JSON or XML format. |
| [**generateMultipart()**](GenerateApi.md#generateMultipart) | **POST** /barcode/generate-multipart | Generate a barcode using a POST request with parameters in a multipart form. |


## `generate()`

```php
generate($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle, $qr_encode_mode, $qr_error_level, $qr_version, $qr_eci_encoding, $qr_aspect_ratio, $micro_qr_version, $rect_micro_qr_version, $code128_encode_mode, $pdf417_encode_mode, $pdf417_error_level, $pdf417_truncate, $pdf417_columns, $pdf417_rows, $pdf417_aspect_ratio, $pdf417_eci_encoding, $pdf417_is_reader_initialization, $pdf417_macro_characters, $pdf417_is_linked, $pdf417_is_code128_emulation): \SplFileObject
```

Generate a barcode using a GET request with parameters in the route and query string.

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
$barcode_type = new \Aspose\BarCode\Model\\AsposeBarCodeModelEncodeBarcodeType(); // \AsposeBarCodeModelEncodeBarcodeType | Type of barcode to generate.
$data = 'data_example'; // string | String that represents the data to encode.
$data_type = new \Aspose\BarCode\Model\\AsposeBarCodeModelEncodeDataType(); // \AsposeBarCodeModelEncodeDataType | Type of data to encode. Default value: StringData.
$image_format = new \Aspose\BarCode\Model\\AsposeBarCodeModelBarcodeImageFormat(); // \AsposeBarCodeModelBarcodeImageFormat | Barcode output image format. Default value: png.
$text_location = new \Aspose\BarCode\Model\CodeLocation(); // \Aspose\BarCode\Model\CodeLocation | Specify the displayed text location. Set to CodeLocation.None to hide CodeText. Default value depends on BarcodeType: CodeLocation.Below for 1D barcodes and CodeLocation.None for 2D barcodes.
$foreground_color = 'Black'; // string | Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black.
$background_color = 'White'; // string | Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White.
$units = new \Aspose\BarCode\Model\GraphicsUnit(); // \Aspose\BarCode\Model\GraphicsUnit | Common units for all measurements. Default units: pixels.
$resolution = 3.4; // float | Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot.
$image_height = 3.4; // float | Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
$image_width = 3.4; // float | Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
$rotation_angle = 56; // int | Barcode image rotation angle, measured in degrees. For example, RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
$qr_encode_mode = new \Aspose\BarCode\Model\QREncodeMode(); // \Aspose\BarCode\Model\QREncodeMode | QR barcode encode mode.
$qr_error_level = new \Aspose\BarCode\Model\QRErrorLevel(); // \Aspose\BarCode\Model\QRErrorLevel | QR barcode error correction level.
$qr_version = new \Aspose\BarCode\Model\QRVersion(); // \Aspose\BarCode\Model\QRVersion | QR barcode version. Automatically selects the smallest version that fits the data.
$qr_eci_encoding = new \Aspose\BarCode\Model\ECIEncodings(); // \Aspose\BarCode\Model\ECIEncodings | ECI encoding for QR barcode data.
$qr_aspect_ratio = 3.4; // float | QR barcode aspect ratio. Values: 0 to 1.
$micro_qr_version = new \Aspose\BarCode\Model\MicroQRVersion(); // \Aspose\BarCode\Model\MicroQRVersion | MicroQR barcode version. Used when BarcodeType is MicroQR.
$rect_micro_qr_version = new \Aspose\BarCode\Model\RectMicroQRVersion(); // \Aspose\BarCode\Model\RectMicroQRVersion | RectMicroQR barcode version. Used when BarcodeType is RectMicroQR.
$code128_encode_mode = new \Aspose\BarCode\Model\Code128EncodeMode(); // \Aspose\BarCode\Model\Code128EncodeMode | Code128 barcode encode mode. Controls which Code 128 subset (A, B, C, or mix) is used.
$pdf417_encode_mode = new \Aspose\BarCode\Model\Pdf417EncodeMode(); // \Aspose\BarCode\Model\Pdf417EncodeMode | PDF417 barcode encode mode.
$pdf417_error_level = new \Aspose\BarCode\Model\Pdf417ErrorLevel(); // \Aspose\BarCode\Model\Pdf417ErrorLevel | PDF417 barcode error correction level.
$pdf417_truncate = True; // bool | Whether to use truncated PDF417 format (removes right-side stop pattern).
$pdf417_columns = 56; // int | Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto.
$pdf417_rows = 56; // int | Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic.
$pdf417_aspect_ratio = 3.4; // float | PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417.
$pdf417_eci_encoding = new \Aspose\BarCode\Model\ECIEncodings(); // \Aspose\BarCode\Model\ECIEncodings | ECI encoding for PDF417 barcode data.
$pdf417_is_reader_initialization = True; // bool | Whether the barcode is used for reader initialization (programming).
$pdf417_macro_characters = new \Aspose\BarCode\Model\MacroCharacter(); // \Aspose\BarCode\Model\MacroCharacter | Macro character to prepend (structured append).
$pdf417_is_linked = True; // bool | Whether to use linked mode (for MicroPdf417).
$pdf417_is_code128_emulation = True; // bool | Whether to use Code128 emulation for MicroPdf417.

try {
    $result = $apiInstance->generate($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle, $qr_encode_mode, $qr_error_level, $qr_version, $qr_eci_encoding, $qr_aspect_ratio, $micro_qr_version, $rect_micro_qr_version, $code128_encode_mode, $pdf417_encode_mode, $pdf417_error_level, $pdf417_truncate, $pdf417_columns, $pdf417_rows, $pdf417_aspect_ratio, $pdf417_eci_encoding, $pdf417_is_reader_initialization, $pdf417_macro_characters, $pdf417_is_linked, $pdf417_is_code128_emulation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GenerateApi->generate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\AsposeBarCodeModelEncodeBarcodeType**](../Model/.md)| Type of barcode to generate. | |
| **data** | **string**| String that represents the data to encode. | |
| **data_type** | [**\AsposeBarCodeModelEncodeDataType**](../Model/.md)| Type of data to encode. Default value: StringData. | [optional] [default to &#39;StringData&#39;] |
| **image_format** | [**\AsposeBarCodeModelBarcodeImageFormat**](../Model/.md)| Barcode output image format. Default value: png. | [optional] [default to &#39;Png&#39;] |
| **text_location** | [**\Aspose\BarCode\Model\CodeLocation**](../Model/.md)| Specify the displayed text location. Set to CodeLocation.None to hide CodeText. Default value depends on BarcodeType: CodeLocation.Below for 1D barcodes and CodeLocation.None for 2D barcodes. | [optional] |
| **foreground_color** | **string**| Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black. | [optional] [default to &#39;Black&#39;] |
| **background_color** | **string**| Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White. | [optional] [default to &#39;White&#39;] |
| **units** | [**\Aspose\BarCode\Model\GraphicsUnit**](../Model/.md)| Common units for all measurements. Default units: pixels. | [optional] |
| **resolution** | **float**| Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot. | [optional] |
| **image_height** | **float**| Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot. | [optional] |
| **image_width** | **float**| Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot. | [optional] |
| **rotation_angle** | **int**| Barcode image rotation angle, measured in degrees. For example, RotationAngle &#x3D; 0 or RotationAngle &#x3D; 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0. | [optional] |
| **qr_encode_mode** | [**\Aspose\BarCode\Model\QREncodeMode**](../Model/.md)| QR barcode encode mode. | [optional] |
| **qr_error_level** | [**\Aspose\BarCode\Model\QRErrorLevel**](../Model/.md)| QR barcode error correction level. | [optional] |
| **qr_version** | [**\Aspose\BarCode\Model\QRVersion**](../Model/.md)| QR barcode version. Automatically selects the smallest version that fits the data. | [optional] |
| **qr_eci_encoding** | [**\Aspose\BarCode\Model\ECIEncodings**](../Model/.md)| ECI encoding for QR barcode data. | [optional] |
| **qr_aspect_ratio** | **float**| QR barcode aspect ratio. Values: 0 to 1. | [optional] |
| **micro_qr_version** | [**\Aspose\BarCode\Model\MicroQRVersion**](../Model/.md)| MicroQR barcode version. Used when BarcodeType is MicroQR. | [optional] |
| **rect_micro_qr_version** | [**\Aspose\BarCode\Model\RectMicroQRVersion**](../Model/.md)| RectMicroQR barcode version. Used when BarcodeType is RectMicroQR. | [optional] |
| **code128_encode_mode** | [**\Aspose\BarCode\Model\Code128EncodeMode**](../Model/.md)| Code128 barcode encode mode. Controls which Code 128 subset (A, B, C, or mix) is used. | [optional] |
| **pdf417_encode_mode** | [**\Aspose\BarCode\Model\Pdf417EncodeMode**](../Model/.md)| PDF417 barcode encode mode. | [optional] |
| **pdf417_error_level** | [**\Aspose\BarCode\Model\Pdf417ErrorLevel**](../Model/.md)| PDF417 barcode error correction level. | [optional] |
| **pdf417_truncate** | **bool**| Whether to use truncated PDF417 format (removes right-side stop pattern). | [optional] |
| **pdf417_columns** | **int**| Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto. | [optional] |
| **pdf417_rows** | **int**| Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic. | [optional] |
| **pdf417_aspect_ratio** | **float**| PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417. | [optional] |
| **pdf417_eci_encoding** | [**\Aspose\BarCode\Model\ECIEncodings**](../Model/.md)| ECI encoding for PDF417 barcode data. | [optional] |
| **pdf417_is_reader_initialization** | **bool**| Whether the barcode is used for reader initialization (programming). | [optional] |
| **pdf417_macro_characters** | [**\Aspose\BarCode\Model\MacroCharacter**](../Model/.md)| Macro character to prepend (structured append). | [optional] |
| **pdf417_is_linked** | **bool**| Whether to use linked mode (for MicroPdf417). | [optional] |
| **pdf417_is_code128_emulation** | **bool**| Whether to use Code128 emulation for MicroPdf417. | [optional] |

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

Generate a barcode using a POST request with parameters in the request body in JSON or XML format.

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
$generate_params = new \Aspose\BarCode\Model\GenerateParams(); // \Aspose\BarCode\Model\GenerateParams | Generation parameters.

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
| **generate_params** | [**\Aspose\BarCode\Model\GenerateParams**](../Model/GenerateParams.md)| Generation parameters. | |

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
generateMultipart($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle, $qr_encode_mode, $qr_error_level, $qr_version, $qr_eci_encoding, $qr_aspect_ratio, $micro_qr_version, $rect_micro_qr_version, $code128_encode_mode, $pdf417_encode_mode, $pdf417_error_level, $pdf417_truncate, $pdf417_columns, $pdf417_rows, $pdf417_aspect_ratio, $pdf417_eci_encoding, $pdf417_is_reader_initialization, $pdf417_macro_characters, $pdf417_is_linked, $pdf417_is_code128_emulation): \SplFileObject
```

Generate a barcode using a POST request with parameters in a multipart form.

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
$barcode_type = new \Aspose\BarCode\Model\EncodeBarcodeType(); // \Aspose\BarCode\Model\EncodeBarcodeType | See https://reference.aspose.com/barcode/net/aspose.barcode.generation/encodetypes/
$data = 'data_example'; // string | String that represents the data to encode.
$data_type = new \Aspose\BarCode\Model\EncodeDataType(); // \Aspose\BarCode\Model\EncodeDataType | Type of data to encode. Default value: StringData.
$image_format = new \Aspose\BarCode\Model\BarcodeImageFormat(); // \Aspose\BarCode\Model\BarcodeImageFormat | Barcode output image format. Default value: png.
$text_location = new \Aspose\BarCode\Model\CodeLocation(); // \Aspose\BarCode\Model\CodeLocation | Specify the displayed text location. Set to CodeLocation.None to hide CodeText. Default value depends on BarcodeType: CodeLocation.Below for 1D barcodes and CodeLocation.None for 2D barcodes.
$foreground_color = 'Black'; // string | Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black.
$background_color = 'White'; // string | Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White.
$units = new \Aspose\BarCode\Model\GraphicsUnit(); // \Aspose\BarCode\Model\GraphicsUnit | Common units for all measurements. Default units: pixels.
$resolution = 3.4; // float | Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot.
$image_height = 3.4; // float | Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
$image_width = 3.4; // float | Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
$rotation_angle = 56; // int | Barcode image rotation angle, measured in degrees. For example, RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
$qr_encode_mode = new \Aspose\BarCode\Model\QREncodeMode(); // \Aspose\BarCode\Model\QREncodeMode | QR barcode encode mode.
$qr_error_level = new \Aspose\BarCode\Model\QRErrorLevel(); // \Aspose\BarCode\Model\QRErrorLevel | QR barcode error correction level.
$qr_version = new \Aspose\BarCode\Model\QRVersion(); // \Aspose\BarCode\Model\QRVersion | QR barcode version. Automatically selects the smallest version that fits the data.
$qr_eci_encoding = new \Aspose\BarCode\Model\ECIEncodings(); // \Aspose\BarCode\Model\ECIEncodings | ECI encoding for QR barcode data.
$qr_aspect_ratio = 3.4; // float | QR barcode aspect ratio. Values: 0 to 1.
$micro_qr_version = new \Aspose\BarCode\Model\MicroQRVersion(); // \Aspose\BarCode\Model\MicroQRVersion | MicroQR barcode version. Used when BarcodeType is MicroQR.
$rect_micro_qr_version = new \Aspose\BarCode\Model\RectMicroQRVersion(); // \Aspose\BarCode\Model\RectMicroQRVersion | RectMicroQR barcode version. Used when BarcodeType is RectMicroQR.
$code128_encode_mode = new \Aspose\BarCode\Model\Code128EncodeMode(); // \Aspose\BarCode\Model\Code128EncodeMode | Code128 barcode encode mode. Controls which Code 128 subset (A, B, C, or mix) is used.
$pdf417_encode_mode = new \Aspose\BarCode\Model\Pdf417EncodeMode(); // \Aspose\BarCode\Model\Pdf417EncodeMode | PDF417 barcode encode mode.
$pdf417_error_level = new \Aspose\BarCode\Model\Pdf417ErrorLevel(); // \Aspose\BarCode\Model\Pdf417ErrorLevel | PDF417 barcode error correction level.
$pdf417_truncate = True; // bool | Whether to use truncated PDF417 format (removes right-side stop pattern).
$pdf417_columns = 56; // int | Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto.
$pdf417_rows = 56; // int | Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic.
$pdf417_aspect_ratio = 3.4; // float | PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417.
$pdf417_eci_encoding = new \Aspose\BarCode\Model\ECIEncodings(); // \Aspose\BarCode\Model\ECIEncodings | ECI encoding for PDF417 barcode data.
$pdf417_is_reader_initialization = True; // bool | Whether the barcode is used for reader initialization (programming).
$pdf417_macro_characters = new \Aspose\BarCode\Model\MacroCharacter(); // \Aspose\BarCode\Model\MacroCharacter | Macro character to prepend (structured append).
$pdf417_is_linked = True; // bool | Whether to use linked mode (for MicroPdf417).
$pdf417_is_code128_emulation = True; // bool | Whether to use Code128 emulation for MicroPdf417.

try {
    $result = $apiInstance->generateMultipart($barcode_type, $data, $data_type, $image_format, $text_location, $foreground_color, $background_color, $units, $resolution, $image_height, $image_width, $rotation_angle, $qr_encode_mode, $qr_error_level, $qr_version, $qr_eci_encoding, $qr_aspect_ratio, $micro_qr_version, $rect_micro_qr_version, $code128_encode_mode, $pdf417_encode_mode, $pdf417_error_level, $pdf417_truncate, $pdf417_columns, $pdf417_rows, $pdf417_aspect_ratio, $pdf417_eci_encoding, $pdf417_is_reader_initialization, $pdf417_macro_characters, $pdf417_is_linked, $pdf417_is_code128_emulation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GenerateApi->generateMultipart: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **barcode_type** | [**\Aspose\BarCode\Model\EncodeBarcodeType**](../Model/EncodeBarcodeType.md)| See https://reference.aspose.com/barcode/net/aspose.barcode.generation/encodetypes/ | |
| **data** | **string**| String that represents the data to encode. | |
| **data_type** | [**\Aspose\BarCode\Model\EncodeDataType**](../Model/EncodeDataType.md)| Type of data to encode. Default value: StringData. | [optional] [default to &#39;StringData&#39;] |
| **image_format** | [**\Aspose\BarCode\Model\BarcodeImageFormat**](../Model/BarcodeImageFormat.md)| Barcode output image format. Default value: png. | [optional] [default to &#39;Png&#39;] |
| **text_location** | [**\Aspose\BarCode\Model\CodeLocation**](../Model/CodeLocation.md)| Specify the displayed text location. Set to CodeLocation.None to hide CodeText. Default value depends on BarcodeType: CodeLocation.Below for 1D barcodes and CodeLocation.None for 2D barcodes. | [optional] |
| **foreground_color** | **string**| Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black. | [optional] [default to &#39;Black&#39;] |
| **background_color** | **string**| Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White. | [optional] [default to &#39;White&#39;] |
| **units** | [**\Aspose\BarCode\Model\GraphicsUnit**](../Model/GraphicsUnit.md)| Common units for all measurements. Default units: pixels. | [optional] |
| **resolution** | **float**| Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot. | [optional] |
| **image_height** | **float**| Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot. | [optional] |
| **image_width** | **float**| Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot. | [optional] |
| **rotation_angle** | **int**| Barcode image rotation angle, measured in degrees. For example, RotationAngle &#x3D; 0 or RotationAngle &#x3D; 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0. | [optional] |
| **qr_encode_mode** | [**\Aspose\BarCode\Model\QREncodeMode**](../Model/QREncodeMode.md)| QR barcode encode mode. | [optional] |
| **qr_error_level** | [**\Aspose\BarCode\Model\QRErrorLevel**](../Model/QRErrorLevel.md)| QR barcode error correction level. | [optional] |
| **qr_version** | [**\Aspose\BarCode\Model\QRVersion**](../Model/QRVersion.md)| QR barcode version. Automatically selects the smallest version that fits the data. | [optional] |
| **qr_eci_encoding** | [**\Aspose\BarCode\Model\ECIEncodings**](../Model/ECIEncodings.md)| ECI encoding for QR barcode data. | [optional] |
| **qr_aspect_ratio** | **float**| QR barcode aspect ratio. Values: 0 to 1. | [optional] |
| **micro_qr_version** | [**\Aspose\BarCode\Model\MicroQRVersion**](../Model/MicroQRVersion.md)| MicroQR barcode version. Used when BarcodeType is MicroQR. | [optional] |
| **rect_micro_qr_version** | [**\Aspose\BarCode\Model\RectMicroQRVersion**](../Model/RectMicroQRVersion.md)| RectMicroQR barcode version. Used when BarcodeType is RectMicroQR. | [optional] |
| **code128_encode_mode** | [**\Aspose\BarCode\Model\Code128EncodeMode**](../Model/Code128EncodeMode.md)| Code128 barcode encode mode. Controls which Code 128 subset (A, B, C, or mix) is used. | [optional] |
| **pdf417_encode_mode** | [**\Aspose\BarCode\Model\Pdf417EncodeMode**](../Model/Pdf417EncodeMode.md)| PDF417 barcode encode mode. | [optional] |
| **pdf417_error_level** | [**\Aspose\BarCode\Model\Pdf417ErrorLevel**](../Model/Pdf417ErrorLevel.md)| PDF417 barcode error correction level. | [optional] |
| **pdf417_truncate** | **bool**| Whether to use truncated PDF417 format (removes right-side stop pattern). | [optional] |
| **pdf417_columns** | **int**| Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto. | [optional] |
| **pdf417_rows** | **int**| Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic. | [optional] |
| **pdf417_aspect_ratio** | **float**| PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417. | [optional] |
| **pdf417_eci_encoding** | [**\Aspose\BarCode\Model\ECIEncodings**](../Model/ECIEncodings.md)| ECI encoding for PDF417 barcode data. | [optional] |
| **pdf417_is_reader_initialization** | **bool**| Whether the barcode is used for reader initialization (programming). | [optional] |
| **pdf417_macro_characters** | [**\Aspose\BarCode\Model\MacroCharacter**](../Model/MacroCharacter.md)| Macro character to prepend (structured append). | [optional] |
| **pdf417_is_linked** | **bool**| Whether to use linked mode (for MicroPdf417). | [optional] |
| **pdf417_is_code128_emulation** | **bool**| Whether to use Code128 emulation for MicroPdf417. | [optional] |

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
