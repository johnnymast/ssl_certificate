<?php
require dirname(__FILE__).'/../vendor/autoload.php';

use JM\Validators\Certificate;

$isValid = Certificate::of('google.com')
    ->isValid();

echo 'isValid: '.$isValid;