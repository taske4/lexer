<?php

require_once 'vendor/autoload.php';

$sourceFileName = 'source.taske';

try {
    $app = new \taske\Main($sourceFileName);
} catch (Exception $e) {
    echo $e->getMessage();
}