<?php
echo '<pre>';
if($fp = tmpfile())
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.digital4u.nl/");
    curl_setopt($ch, CURLOPT_STDERR, $fp);
    curl_setopt($ch, CURLOPT_CERTINFO, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    $result = curl_exec($ch);
    curl_errno($ch)==0 or die("Error:".curl_errno($ch)." ".curl_error($ch));
    fseek($fp, 0);//rewind
    $str='';
    while(strlen($str.=fread($fp,8192))==8192);
    echo $str;

    $cert = curl_getinfo($ch, CURLINFO_CERTINFO);
    if (is_array($cert) == true and count($cert) > 0) {
        $cert = $cert[0]['Cert'];
        print_r(openssl_x509_parse($cert));
    } else {
        print_r($cert);
    }
    fclose($fp);
}

echo 'done';