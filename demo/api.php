<?php
require dirname(__FILE__).'/../vendor/autoload.php';

use JM\Validators\SSLCertificate;

$isValid = SSLCertificate::of('google.com')
    ->isValid();

echo 'done';