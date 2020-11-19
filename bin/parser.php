<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

if ($argc !== 2) {
    throw new ArgumentCountError("Specify apache2 log file path!");
}

$logParser = new \MeinderA\Apache2LogsStats\App\LogParser();
$data = $logParser->parse($argv[1]);

$logAnalyzer = new \MeinderA\Apache2LogsStats\App\LogAnalyzer($data);
dd($logAnalyzer->getMostUsedEndpoints());