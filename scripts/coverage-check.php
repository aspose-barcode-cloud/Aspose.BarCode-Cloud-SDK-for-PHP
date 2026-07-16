<?php

/**
 * Fails the build when line coverage reported in a Clover XML file drops below a threshold.
 *
 * Line coverage is computed by summing the per-file `<metrics>` `statements` and
 * `coveredstatements` attributes across the whole report (Clover treats one executable
 * statement as one line), matching the gate used by the Python and Java SDKs.
 *
 * Usage:
 *   php scripts/coverage-check.php [clover.xml] [threshold]
 *
 * Defaults: clover.xml, threshold 80 (percent).
 */

declare(strict_types=1);

$cloverPath = $argv[1] ?? 'clover.xml';
$threshold = isset($argv[2]) ? (float) $argv[2] : 80.0;

if (!is_file($cloverPath)) {
    fwrite(STDERR, "Coverage report not found: {$cloverPath}\n");
    exit(2);
}

$xml = simplexml_load_file($cloverPath);
if ($xml === false) {
    fwrite(STDERR, "Unable to parse coverage report: {$cloverPath}\n");
    exit(2);
}

$fileMetrics = $xml->xpath('//file/metrics');
if ($fileMetrics === false || count($fileMetrics) === 0) {
    fwrite(STDERR, "No per-file metrics found in {$cloverPath}\n");
    exit(2);
}

$statements = 0;
$covered = 0;
foreach ($fileMetrics as $metrics) {
    $statements += (int) $metrics['statements'];
    $covered += (int) $metrics['coveredstatements'];
}

if ($statements === 0) {
    fwrite(STDERR, "Coverage report contains zero statements\n");
    exit(2);
}

$percent = $covered / $statements * 100.0;

printf(
    "Line coverage: %.2f%% (%d/%d statements), threshold %.2f%%\n",
    $percent,
    $covered,
    $statements,
    $threshold
);

if ($percent + 1e-9 < $threshold) {
    fwrite(STDERR, sprintf("FAIL: line coverage %.2f%% is below the %.2f%% gate\n", $percent, $threshold));
    exit(1);
}

echo "PASS: coverage gate satisfied\n";
exit(0);
