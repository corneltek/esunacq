<?php
require dirname(__DIR__) . "/vendor/autoload.php";

use EsunBank\ACQ\AuthRequestBuilder;
use EsunBank\ACQ\AuthCancelRequestBuilder;
use EsunBank\ACQ\TxnType;

$MAC = '{MAC}';
$MID = '{MID}';
$CID = '{CID}';
$ONO = 'TEST' . time();
$targetUrl = 'https://acqtest.esunbank.com.tw/acq_online/online/sale51.htm';
$builder = new AuthCancelRequestBuilder($MAC, [
    'MID' => $MID,
    'CID' => $CID,
]);
$formFields = $builder->formFields($ONO);
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
