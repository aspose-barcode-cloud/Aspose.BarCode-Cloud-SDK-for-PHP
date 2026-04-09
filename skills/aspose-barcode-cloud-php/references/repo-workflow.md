# PHP submodule workflow

Use this reference when the task edits SDK source, tests, snippets, package metadata, or generated files inside `submodules/php`.

## Layout

- `src/Aspose/BarCode`: generated API clients, `Configuration`, `ApiException`, serializer, and transport helpers.
- `src/Aspose/BarCode/Model`: generated request and response models plus enums.
- `src/Aspose/BarCode/Requests`: request-wrapper objects for every SDK endpoint.
- `tests`: PHPUnit coverage for configuration, generate, recognize, scan, exceptions, end-to-end flows, and serialization.
- `snippets`: runnable documentation snippets grouped by `generate/*` and `read/*` scenarios.
- `scripts`: snippet runners and post-generation helpers such as credential insertion, example insertion, and deprecation-warning injection.
- `README.md` and `index.php`: user-facing usage examples.
- `composer.json` and `Makefile`: local validation and automation entry points.

## Validation

On Windows, run repo scripts and Make targets through WSL.

From `submodules/php`:

- `make init`
- `make format`
- `make lint`
- `make test`
- `make after-gen`

What these targets do:

- `make init`: run `composer install`.
- `make format`: run `php-cs-fixer fix index.php src/Aspose/ tests/ snippets/ --config=php-cs-fixer.conf`.
- `make lint`: run `phpstan analyse index.php src/ tests/ --level=3`.
- `make test`: run `composer test` (`phpunit`) and then `./scripts/run_snippets.sh`.
- `make after-gen`: run `format`, `insert-example`, and `./scripts/add-deprecation-warnings.bash`.

`run_snippets.sh` does more than execute samples:

- creates `snippets_test`
- symlinks the local `src` tree into that temp folder
- copies each snippet through `scripts/insert-credentials.py`
- executes each generated temp snippet with `php`

Treat snippet failures as consumer-facing regressions, not just sample breakage.

## Test configuration

- Tests load `tests/Configuration.json` first and then fall back to `TEST_CONFIGURATION_*` environment variables via `TestConfiguration::fromFileOrEnv()`.
- Useful names include `TEST_CONFIGURATION_CLIENT_ID`, `TEST_CONFIGURATION_CLIENT_SECRET`, `TEST_CONFIGURATION_ACCESS_TOKEN`, `TEST_CONFIGURATION_HOST`, `TEST_CONFIGURATION_AUTH_URL`, and `TEST_CONFIGURATION_DEBUG`.
- `tests/Configuration.example.json` only contains placeholder client credentials. The runtime defaults still use `https://api.aspose.cloud` plus `/v4.0` and `https://id.aspose.cloud/connect/token`.
- Snippets embed placeholder dashboard credentials and optionally prefer `TEST_CONFIGURATION_ACCESS_TOKEN`. Mirror the surrounding file when editing repo code.

## Regenerated code workflow

If you change generated SDK code in this mono-repo:

1. Make the intended SDK edit in `submodules/php` so the target behavior is clear.
2. Mirror the change in the matching template under `codegen/Templates/php` when the file is generated.
3. Stage the PHP submodule changes.
4. From the repo root, run `make php` through WSL.
5. Ensure `submodules/php` has no new unstaged diffs after regeneration.
6. If regeneration reintroduces old code, keep fixing templates or post-generation helpers until the generated output matches the intended SDK change.

## Useful anchors

- `src/Aspose/BarCode/Configuration.php`: auth defaults, debug flags, and user-agent behavior.
- `src/Aspose/BarCode/Requests/*.php`: the wrapper shapes every endpoint expects.
- `tests/TestConfiguration.php`: how tests discover config from JSON and environment variables.
- `tests/EndToEndTest.php`: generate a barcode stream, then pass it directly into `ScanMultipartRequestWrapper`.
- `scripts/run_snippets.sh` and `scripts/run_snippet.sh`: snippet execution harness.
- `Makefile`: the local validation and post-generation entry points.
