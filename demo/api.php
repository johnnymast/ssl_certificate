<?php
require dirname(__FILE__).'/../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

use JM\Validators\Certificate;

$info = Certificate::of('ssl://google.com');

print_r($info);


echo 'done';