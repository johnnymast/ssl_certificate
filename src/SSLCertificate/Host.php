<?php

namespace JM\Validators\SSLCertificate;

class Host
{

    /**
     * @var array
     */
    protected $fields = [];


    /**
     * Host constructor.
     *
     * @param array $information
     */
    public function __construct($information = [])
    {
        $this->fields = [
            'scheme'   => '',
            'host'     => '',
            'port'     => 0,
            'user'     => '',
            'pass'     => '',
            'path'     => '',
            'query'    => '',
            'fragment' => '',
        ];

        if (is_array($information) == true) {
            $this->fields = array_merge($this->fields, $information);
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
     * @return bool
     */
    public function isValid()
    {

        if ($this->scheme == 'file') {
            $this->fields['port'] = 0;

            return true;
        }

        if ($this->fields['port'] == 0) {
            $port = getservbyname($this->scheme, 'tcp');
            if ($port) {
                $this->fields['port'] = $port;

                return true;
            }
        } else {
            return true;
        }

        return false;
    }
}
