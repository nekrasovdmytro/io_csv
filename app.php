<?php

require_once 'vendor/autoload.php';

use IO\CsvInputFile;

$inputFile = new CsvInputFile(__DIR__, 'input.csv');

$delimeter = ';';
foreach ($inputFile->getInput($delimeter) as $item) {
    print_r($item);
}