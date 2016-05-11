<?php
require dirname(__DIR__) . "/vendor/autoload.php";

use EsunBank\ACQ\AuthRequestBuilder;
use EsunBank\ACQ\TxnType;

$MAC = '{MAC}';
$MID = '{MID}';
$CID = '{CID}';
$ONO = 'TEST' . time();
$TA = 10;
$responseUrl = null;
$targetUrl = 'https://acqtest.esunbank.com.tw/acq_online/online/sale42.htm';

$acq = new AuthRequestBuilder($MAC, [
    'MID' => $MID,  // 特店代碼 char(15)
    'CID' => $CID,  // 子特店代碼 char(20)
    'U'   => $responseUrl ?: '/TestACQ/print.html',
]);
$formFields = $acq->formFields($ONO, $TA);
var_dump($formFields);
?>
<form method="post" action="<?=$targetUrl?>">
    <?php foreach ($formFields as $name => $value): ?>
    <div>
        <input type="text" name="<?=$name?>" value="<?=$value?>"/>
    </div>
    <?php endforeach ?>
    <input type="submit"/>
</form>
