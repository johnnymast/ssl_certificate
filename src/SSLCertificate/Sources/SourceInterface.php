<?php

namespace JM\Validators\SSLCertificate\Sources;

interface SourceInterface
{
    public function getHost();
    public function getPort();
}