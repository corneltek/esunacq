<?php
namespace EsunBank\ACQ;

use Exception;

/**
回覆碼         RC    X(2)    M   訊息定義請參考 Index A
特店代碼       MID   X(15)   M
訂單編號       ONO   X(20)   M   與請求授權的訂單編號相同
收單交易日期   LTD   9(8)    C   YYYYMMDD
收單交易時間   LTT   9(6)    C   HHMMSS
簽帳單序號     RRN   X(12)   C
授權碼         AIR   X(6)    C
*/
class AuthCancelResponseVerifier extends AuthBase
{
    public function verify($responseBody)
    {
        $params = [];
        $paramPairList = explode(',',$responseBody);
        $pairs = array_map(function($pairstr) { return explode('=', $pairstr); }, $paramPairList);
        foreach ($pairs as list($key, $value)) {
            $params[$key] = $value;
        }
        return $params['MID'] === $this->config['MID'];
        /*
        $requiredKeys = explode(' ', 'RC MID ONO');
        $optionalKeys = explode(' ', 'LTD LTT RRN AIR');
        $fields = [];
        foreach ($requiredKeys as $key) {
            $fields[] = $params[$key];
        }
        foreach ($optionalKeys as $key) {
            if (isset($params[$key])) {
                $fields[] = $params[$key];
            }
        }
        $fields[] = $this->key;
        $pack = join('&',$fields);
        if (!isset($params['M'])) {
            throw new Exception('M is required for verification.');
        }
        return md5($pack) === $params['M'];
        */
    }
}




