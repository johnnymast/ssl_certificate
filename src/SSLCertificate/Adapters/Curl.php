<?php

namespace JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Host;

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
    public function interact(Host $host)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $host->host);
        if ($host->post > 0) curl_setopt($ch, CURLOPT_PORT, $host->post);;
        curl_setopt($ch, CURLOPT_CERTINFO, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);

        $cert = curl_getinfo($ch, CURLINFO_CERTINFO);

        if (is_array($cert) == true and count($cert) > 0) {
            $cert = $cert[0]['Cert'];

            return openssl_x509_parse($cert);
        }

        return null;
    }
}
