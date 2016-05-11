<?php
namespace EsunBank\ACQ;

use Exception;

/*
SPEC
=====

回覆碼       RC X(2) M 訊息定義請參考Index A
特店代碼     MID X(15) M
訂單編號     ONO X(20) M 與請求授權的訂單編號相同
收單交易日期 LTD 9(8) C YYYYMMDD
收單交易時間 LTT 9(6) C HHMMSS
簽帳單序號   RRN X(12) C
授權碼       AIR X(6) C
卡號         AN X(19) C 遮蔽卡號

分期付款資料欄位
----------------

分期總金額   ITA  9(10)v99 C
分期期數     IP   9(8) C
頭期款金額   IFPA 9(10)v99 C
每期金額     IPA  9(10)v99 C

銀行紅利欄位
------------

折抵點數     BRP 9(8) C 有值才回覆
剩餘點數     BB 9(8) C 有值才回覆
折抵金額     BRA 9(8) C 有值才回覆
*/
class AuthResponseVerifier extends AuthBase
{
    public function verify(array $params)
    {
        $requiredKeys = explode(' ', 'RC MID ONO');
        $optionalKeys = explode(' ', 'LTD LTT RRN AIR AN ITA IP IFPA IPA BRP BB BRA');
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
    }
}




