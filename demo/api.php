<?php
require dirname(__FILE__).'/../vendor/autoload.php';

use JM\Validators\Certificate;

// use https://badssl.com/ to verify
$host = 'https://wrong.host.badssl.com';
$cert = Certificate::of($host);

//print_r($cert);

echo "Issuer: ".$cert->issuer()."\n";
echo 'Is certificate valid: '.(($cert->isValid() == true) ? 'yes' : 'no');

