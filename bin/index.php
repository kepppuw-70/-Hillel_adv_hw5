<?php

require_once __DIR__ . '/../vendor/autoload.php';

use QuizProcessing\DataParser;

$dataParser = new DataParser(__DIR__ . '/../data/data.json');
$dataParser->process();