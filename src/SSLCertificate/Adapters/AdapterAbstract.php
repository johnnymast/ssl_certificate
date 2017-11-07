<?php

namespace JM\Validators\SSLCertificate\Adapters;

class AdapterAbstract
{
    const VERIFY_COMMON_NAME_ONLY = 1;

    const VERIFY_COMMON_NAME_AND_MATCHES_HOST = 2;

    /**
     * @var bool
     */
    protected $verificationMethod = self::VERIFY_COMMON_NAME_AND_MATCHES_HOST;

    /**
     * @var int
     */
    protected $timeout = 30;

    /**
     * @param bool $verificationMethod
     */
    public function setVerificationMethod($verificationMethod)
    {
        $this->verificationMethod = $verificationMethod;
    }

    /**
     * @param int $timeout
     * @return AdapterAbstract
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }
}
