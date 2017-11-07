<?php

namespace JM\Validators\SSLCertificate\Adapters;

use JM\Validators\SSLCertificate\Host;

class Curl extends AdapterAbstract implements AdapterInterface
{
    /**
     * Interact with the given source and
     * grab the certificate.
     *
     * @param Host $host
     * @return mixed
     */
    public function interact(Host $host)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $host->host);

        if ($host->port > 0) {
            curl_setopt($ch, CURLOPT_PORT, $host->port);
        }
        curl_setopt($ch, CURLOPT_CERTINFO, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        /**
         * Please note: Option 1 will be removed in PHP 7.2
         * This will affect: "check the existence of a common name in the SSL peer certificate."
         */
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        $result = curl_exec($ch);

        if ($result !== false) {

            $cert = curl_getinfo($ch, CURLINFO_CERTINFO);
            $this->close($ch);

            if (is_array($cert) == true and count($cert) > 0) {
                $cert = $cert[0]['Cert'];

                return openssl_x509_parse($cert);
            }
        }

        $this->close($ch);

        return null;
    }

    /**
     * Close the resource.
     *
     * @param null $resource
     */
    private function close($resource = null)
    {
        if ($resource) {
            return curl_close($resource);
        }
    }
}
