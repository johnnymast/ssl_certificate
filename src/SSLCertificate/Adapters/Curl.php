<?php

namespace JM\Validators\SSLCertificate\Adapters;

class Curl extends AdapterAbstract implements AdapterInterface
{

    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param string $host
     * @param int $port
     * @return mixed
     */
    public function interact($host = '', $port = 0)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$host);
        curl_setopt($ch, CURLOPT_PORT, $port);
  //      curl_setopt($ch, CURLOPT_CERTINFO, 1);
 //       curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
        $result = curl_exec($ch);

        $cert = curl_getinfo($ch, CURLINFO_CERTINFO);

        if (is_array($cert) == true and count($cert) > 0) {
            $cert = $cert[0]['Cert'];
            return openssl_x509_parse($cert);
        }
        return null;
    }
}
