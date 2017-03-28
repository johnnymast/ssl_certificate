<?php
require dirname(__FILE__).'/../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

use JM\Validators\Certificate;

$version = Certificate::of('ssl://google.com:443')
    ->hash;




echo 'Version: '.$version;