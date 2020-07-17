<?php

require_once 'vendor/autoload.php';

try {
    $app = new \app\Main();
} catch (Exception $e) {
    echo $e->getMessage();
}