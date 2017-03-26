<?php

namespace JM\Validators\SSLCertificate;

class CertInfo
{


    private $valid = false;


    /**
     * CertInfo constructor.
     */
    public function __construct($data = '')
    {

    }


    public function isValid()
    {
        return $this->valid;
    }


}