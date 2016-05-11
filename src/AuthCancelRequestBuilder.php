<?php
namespace EsunBank\ACQ;

class AuthCancelRequestBuilder extends AuthBase
{

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
}
