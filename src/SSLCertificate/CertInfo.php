<?php

namespace JM\Validators\SSLCertificate;

// TODO make sure we dont have errors
class CertInfo
{

    protected $valid = false;

    /**
     * @var array
     */
    private $fields = [];


    /**
     * CertInfo constructor.
     */
    public function __construct($fields = [])
    {
        $this->fields = [
            'name'             => '',
            'subject'          => '',
            'hash'             => '',
            'issuer'           => '',
            'version'          => '',
            'serialNumber'     => '',
            'validFrom'        => '',
            'validTo'          => '',
            'validFrom_time_t' => '',
            'validTo_time_t'   => '',
            'signatureTypeSN'  => '',
            'signatureTypeLN'  => '',
            'signatureTypeNID' => '',
            'purposes'         => '',
            'extensions'       => ''
        ];
        if (is_array($fields) == true) {
            $this->fields = array_merge($this->fields, $fields);
        }
    }


    /**
     * @param $name
     *
     * @return mixed
     */
    function __get($name)
    {
        if (isset($this->fields[$name]) == true) {
            return $this->fields[$name];
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
    }


    /**
     * @return mixed
     */
    public function isValid()
    {
        return $this->valid;
    }


    /**
     *
     */
    public function isExpired()
    {
        return (time() > $this->validTo);
    }
}