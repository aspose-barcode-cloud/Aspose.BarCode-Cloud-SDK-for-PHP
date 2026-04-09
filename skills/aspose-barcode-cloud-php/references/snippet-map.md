# Snippet and example map

Use this reference when you want the closest existing PHP pattern before writing new SDK code or when updating docs, snippets, and examples.

## Small end-user examples

- `index.php`: compact generate-and-stream example suitable for quick starts.
- `snippets/ManualFetchToken.php`: manual OAuth client-credentials token fetch without using the SDK.

## Generate patterns

- `snippets/generate/save/GenerateGet.php`: simple `generate()` and save-to-file flow.
- `snippets/generate/save/GenerateBody.php`: `generateBody()` with `GenerateParams`.
- `snippets/generate/save/GenerateMultipart.php`: multipart generation flow.
- `snippets/generate/set-text/*`: `EncodeData` and `EncodeDataType` examples.
- `snippets/generate/set-size/*`: width, height, resolution, and units examples.
- `snippets/generate/set-colorscheme/*`: foreground and background color examples.
- `snippets/generate/appearance/*`: richer `BarcodeImageParams` examples.

## Recognize and scan patterns

- `snippets/read/set-source/RecognizeGet.php`: recognize from a public URL.
- `snippets/read/set-source/RecognizeMultipart.php`: recognize from a local `SplFileObject`.
- `snippets/read/set-source/RecognizeBody.php`: recognize from base64 bytes.
- `snippets/read/set-source/ScanGet.php`: auto-scan from a public URL.
- `snippets/read/set-source/ScanMultipart.php`: auto-scan from a local `SplFileObject`.
- `snippets/read/set-source/ScanBody.php`: auto-scan from base64 bytes.
- `snippets/read/set-target-types/*`: choosing a single `DecodeBarcodeType` or a list for `RecognizeBase64Request`.
- `snippets/read/set-quality/*`: `RecognitionMode` examples.
- `snippets/read/set-image-kind/*`: `RecognitionImageKind` examples.

## Tests worth copying

- `tests/EndToEndTest.php`: generate a barcode stream, then scan that same stream end to end.
- `tests/GenerateApiTest.php`: generate via GET, body, and multipart variants.
- `tests/RecognizeApiTest.php`: recognize via base64 body, multipart, and public URL.
- `tests/ScanApiTest.php`: scan via base64 body, multipart, and public URL.
- `tests/ConfigurationTest.php`: configuration defaults, JSON serialization, and environment-variable loading.
- `tests/ExceptionTest.php`: expected API failures and parsed error behavior.
- `tests/ObjectSerializerTests.php`: serializer behavior if model or date formatting changes.
