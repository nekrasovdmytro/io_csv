<?php

require_once 'vendor/autoload.php';

use IO\CsvInputFile;
use IO\CsvOutputFile;

$inputFile = new CsvInputFile(__DIR__, 'input.csv');

$delimiter = ';';
foreach ($inputFile->getInput($delimiter) as $item) {
    print_r($item);
}

$output = [
    ['Hello', 'World', 1],
    ['Hello', 'World', 2],
    ['Hello', 'World', 3],
];
$outputFile = new CsvOutputFile(__DIR__ . '/output.csv', $output);
$outputFile->output($delimiter);