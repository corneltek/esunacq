<?php
namespace EsunBank\ACQ;

class AuthReturnCode
{
    static public $messages = array(
            '00' => '核准',
            '01' => '請查詢銀行',
            '02' => '請查詢銀行',
            '03' => '拒絕交易',
            '04' => '拒絕交易',
            '05' => '請查詢銀行',
            '06' => '拒絕交易',
            '07' => '拒絕交易',
            '08' => '拒絕交易',
            '09' => '拒絕交易',
            '10' => '拒絕交易',
            '11' => '拒絕交易',
            '12' => '拒絕交易',
            '13' => '拒絕交易',
            '14' => '卡號錯誤',
            '15' => '拒絕交易',
            '30' => '拒絕交易',
            '31' => '拒絕交易',
            '33' => '過期卡',
            '34' => '拒絕交易',
            '35' => '拒絕交易',
            '36' => '拒絕交易',
            '37' => '拒絕交易',
            '38' => '拒絕交易',
            '39' => '拒絕交易',
            '41' => '拒絕交易',
            '43' => '拒絕交易',
            '51' => '拒絕交易',
            '54' => '有效年月過期',
            '55' => '拒絕交易',
            '56' => '拒絕交易',
            '57' => '拒絕交易',
            '58' => '拒絕交易',
            '61' => '拒絕交易',
            '62' => '拒絕交易',
            '65' => '拒絕交易',
            '68' => '拒絕交易',
            '75' => '拒絕交易',
            '82' => '拒絕交易',
            '83' => '拒絕交易',
            '84' => '拒絕交易',
            '85' => '拒絕交易',
            '86' => '拒絕交易',
            '88' => '拒絕交易',
            '89' => '拒絕交易',
            '90' => '拒絕交易',
            '91' => '拒絕交易',
            '92' => '拒絕交易',
            '94' => '拒絕交易',
            '96' => '拒絕交易',
            'E1' => '卡片過期',
            'EI' => '未開卡',
            'EE' => '持卡人ID 錯誤',
            'N0' => '拒絕交易',
            'N1' => '拒絕交易',
            'N2' => '拒絕交易',
            'N3' => '拒絕交易',
            'N4' => '拒絕交易',
            'N5' => '拒絕交易',
            'N6' => '拒絕交易',
            'N7' => '拒絕交易',
            'N8' => '拒絕交易',
            'N9' => '拒絕交易',
            'O0' => '拒絕交易',
            'O1' => '拒絕交易',
            'O2' => '拒絕交易',
            'O3' => '拒絕交易',
            'O4' => '拒絕交易',
            'O5' => '拒絕交易',
            'O6' => '拒絕交易',
            'O7' => '拒絕交易',
            'O8' => '拒絕交易',
            'O9' => '拒絕交易',
            'P0' => '拒絕交易',
            'P2' => '拒絕交易',
            'P3' => '拒絕交易',
            'P7' => '拒絕交易',
            'P8' => '拒絕交易',
            'Q3' => '拒絕交易',
            'Q4' => '拒絕交易',
            'Q6' => '拒絕交易',
            'Q7' => '拒絕交易',
            'Q8' => '拒絕交易',
            'Q9' => '拒絕交易',
            'R0' => '拒絕交易',
            'R1' => '拒絕交易',
            'R2' => '拒絕交易',
            'R3' => '拒絕交易',
            'R4' => '拒絕交易',
            'R5' => '拒絕交易',
            'R6' => '拒絕交易',
            'R7' => '拒絕交易',
            'R8' => '拒絕交易',
            'S4' => '拒絕交易',
            'S5' => '拒絕交易',
            'S6' => '拒絕交易',
            'S7' => '拒絕交易',
            'S8' => '拒絕交易',
            'L1' => '產品代碼錯誤',
            'L2' => '期數錯誤',
            'L3' => '不支援分期(他行卡)',
            'L4' => '產品代碼過期',
            'L5' => '金額無效',
            'L6' => '不支援分期',
            'G0' => '系統功能有誤',
            'G1' => '交易逾時',
            'G2' => '資料格式錯誤',
            'G3' => '非使用中特店',
            'G4' => '特店交易類型不合',
            'G5' => '連線IP 不合',
            'G6' => '訂單編號重複',
            'G7' => '使用未定義之紅利點數進行交易',
            'G8' => '押碼錯誤',
            'G9' => 'Session 檢查有誤',
            'GA' => '無效的持卡人資料',
            'GB' => '不允許執行授權取消交易',
            'GC' => '交易資料逾期',
            'GD' => '查無訂單編號',
            'GE' => '查無交易明細',
            'GF' => '交易資料狀態不符',
            'GG' => '交易失敗',
            'GT' => '交易時間逾時',
            'GH' => '訂單編號重複送出交易',
            'GI' => '銀行紅利狀態不符',
            'GJ' => '出團日期不合法',
            'GK' => '延後出團天數超過限定天數',
            'GL' => '非限定特店，不可使用「玉山卡」參數',
            'GM' => '限定特店，必須傳送「玉山卡」參數',
            'GN' => '該卡號非玉山卡所屬',
            'XA' => '紅利自付額有誤',
            'XB' => '紅利商品數量有誤',
            'XC' => '紅利商品數量超過可折抵上限',
            'XD' => '紅利商品折抵點數超過最高折',
            'XE' => '紅利商品傳入之固定點數有誤',
            'X1' => '不允許使用紅利折抵現金功能',
            'X2' => '點數未達可折抵點數下限',
            'X3' => '他行卡不支援紅利折抵',
            'X4' => '此活動已逾期',
            'X5' => '金額未超過限額不允許使用',
            'X6' => '特店不允許紅利交易',
            'X7' => '點數不足',
            'X8' => '非正卡持卡人',
            'X9' => '紅利商品編號有誤或空白',
            'TG' => '風險卡管制',
    );

    public static function getMessage($code)
    {
        if (isset(static::$messages[$code])) {
            return static::$messages[$code];
        }
        return false;
    }

}


