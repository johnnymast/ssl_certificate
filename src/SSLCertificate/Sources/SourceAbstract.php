<?php

namespace JM\Validators\SSLCertificate\Sources;

use JM\Validators\SSLCertificate\Adapters\AdapterInterface;
use JM\Validators\SSLCertificate\Adapters\Curl;
use JM\Validators\SSLCertificate\Adapters\Stream;

class SourceAbstract
{

    /**
     * The Adapter we will use either Curl
     * or Streams.
     * @var AdapterInterface|null
     */
    private $adapter = null;

    /**
     * This will be the default Adapter
     * to use.
     * @var string
     */
    private $defaultAdapter = Curl::class;


    /**
     * Determine the adapter to use.
     */
    public function adapter()
    {
        /**
         * If we already selected an
         * adapter then return it.
         */
        if ($this->adapter) {
            return $this->adapter;
        }

        if (extension_loaded('curl')) {
            if ($this->defaultAdapter != Curl::class) {
                $this->adapter = Stream::class;
            } else {
                $this->adapter = new Curl();
            }
        } else {
            /**
             * We can always fallback on Streams
             * to do the dirty work for us.
             */
            $this->adapter = new Stream();
        }
        return $this->adapter;
    }


    /**
     * Set the default Adapter this can either
     * Curl or Stream.
     *
     * @param string $defaultAdapter
     */
    public function setDefaultAdapter($defaultAdapter)
    {
        $this->defaultAdapter = $defaultAdapter;
    }
}
