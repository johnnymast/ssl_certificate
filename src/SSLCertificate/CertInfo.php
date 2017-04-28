<?php

namespace JM\Validators\SSLCertificate;

/**
 * Class CertInfo
 *
 * @package JM\Validators\SSLCertificate
 */
class CertInfo
{
    /**
     * @var array
     */
    private $fields = [];

    /**
     * CertInfo constructor.
     *
     * @param array $fields
     */
    public function __construct($fields = [])
    {
        $this->fields = [
            'name' => '',
            'subject' => '',
            'hash' => '',
            'issuer' => '',
            'version' => '',
            'serialNumber' => '',
            'validFrom' => '',
            'validTo' => '',
            'validFrom_time_t' => '',
            'validTo_time_t' => '',
            'signatureTypeSN' => '',
            'signatureTypeLN' => '',
            'signatureTypeNID' => '',
            'purposes' => '',
            'extensions' => '',
        ];
        if (is_array($fields) == true) {
            $this->fields = array_merge($this->fields, $fields);
        }
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    function __call($name, $arguments)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->fields;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return false;
    }

    /**
     * Check if the certificate is expired
     * or not.
     */
    public function isExpired()
    {
        return (time() > $this->fields['validTo_time_t']);
    }

    /**
     * Return the certificate as array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->fields;
    }

    /**
     * Return the certificate as json string.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->fields);
    }
}