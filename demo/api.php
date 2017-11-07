<?php
require dirname(__FILE__).'/../vendor/autoload.php';

use JM\Validators\Certificate;

$host = 'https://www.directtuin.323/';
$cert = Certificate::of($host);

echo "\n";
print ("name function ".$cert->name()."\n");
print ("name property ".$cert->name."\n");
echo "DUMPING THE CERT\n";
print_r($cert);
