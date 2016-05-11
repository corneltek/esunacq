<?php
namespace EsunBank\ACQ;

class AuthRequestBuilder extends AuthBase
{
    public function packmd5($orderNo, $totalAmount, $txnType = TxnType::GENERAL, $ic = null, $bpf = null)
    {
        return md5($this->pack($orderNo, $totalAmount, $txnType, $ic, $bpf));
    }

    protected function buildArgs($orderNo, $totalAmount, $txnType = TxnType::GENERAL, $ic = null, $bpf = null)
    {
        $c = array_merge($this->config, [
            'CID' => '',
            'TID' => $txnType,
            'ONO' => $orderNo,
            'TA'  => $totalAmount,
        ]);
        if ($ic !== null) {
            $c['IC'] = $ic;
        }
        if ($bpf !== null) {
            $c['BPF'] = $bpf;
        }
        return $c;
    }

    public function formFields($orderNo, $totalAmount, $txnType = TxnType::GENERAL, $ic = null, $bpf = null)
    {
        $c = $this->buildArgs($orderNo, $totalAmount, $txnType, $ic, $bpf);
        $m = $this->packmd5($orderNo, $totalAmount, $txnType, $ic, $bpf);
        $c['M'] = $m; // add 'M'
        return $c;
    }

    public function pack($orderNo, $totalAmount, $txnType = TxnType::GENERAL, $ic = null, $bpf = null)
    {
        $c = $this->buildArgs($orderNo, $totalAmount, $txnType, $ic, $bpf);
        $requiredKeys = preg_split('/\s/', 'MID CID TID ONO TA U');
        $optionalKeys = preg_split('/\s/', 'IC BPF');
        $fields = [];
        foreach ($requiredKeys as $key) {
            $fields[] = $c[$key];
        }

        foreach ($optionalKeys as $key) {
            if (isset($c[$key])) {
                $fields[] = $c[$key];
            }
        }
        $fields[] = $this->key;
        return join('&', $fields);
    }
}
