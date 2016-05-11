<?php
namespace EsunBank\ACQ;

use ArrayAccess;

class AuthCancelRequestBuilder implements ArrayAccess
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

    protected function buildArgs($orderNo)
    {
        // MID, ONO
        return array_merge($this->config, [
            'ONO' => $orderNo,
        ]);
    }

    public function formFields($orderNo)
    {
        $c = $this->buildArgs($orderNo);
        $c['M'] = md5($this->pack($orderNo));
        return $c;
    }

    public function pack($orderNo)
    {
        $c = $this->buildArgs($orderNo);
        $requiredKeys = preg_split('/\s/', 'MID ONO');
        $fields = [];
        foreach ($requiredKeys as $key) {
            $fields[] = $c[$key];
        }
        $fields[] = $this->key;
        return join('&', $fields);
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
