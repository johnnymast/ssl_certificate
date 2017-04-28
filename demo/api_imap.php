<?php
require dirname(__FILE__).'/../vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', true);

use JM\Validators\Certificate;

$expired = Certificate::of('imaps://mail.locovsworld.com')
    ->isExpired();




echo 'Expired: '.(($expired) ? 'true' : 'false');