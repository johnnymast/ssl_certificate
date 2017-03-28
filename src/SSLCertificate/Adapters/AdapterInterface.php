<?php

namespace JM\Validators\SSLCertificate\Adapters;

interface AdapterInterface
{
    public function interact($host = '', $port = 0);
}