<?php
namespace EsunBank\ACQ;

use ArrayAccess;


class AuthBase implements ArrayAccess
{

    protected $config;

    protected $key;

    /**
     * MAC Key is always required.
     */
    public function __construct($key, array $config)
    {
        $this->key = $key;
        $this->config = $config;
    }

    public function offsetSet($key,$value)
    {
        $this->config[ $key ] = $value;
    }
    
    public function offsetExists($key)
    {
        return isset($this->config[ $key ]);
    }
    
    public function offsetGet($key)
    {
        return $this->config[ $key ];
    }
    
    public function offsetUnset($key)
    {
        unset($this->config[$key]);
    }

}

