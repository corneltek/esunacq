<?php
$lines = file('return_code.txt');
$messages = [];
foreach ($lines as $line) {
    if (preg_match('/^(\d{2})\s+~\s+(\d{2})\s+(\S+)$/', $line, $matches)) {
        list($o, $a, $b, $message) = $matches;
        echo "{$a} ~ {$b} => {$message}\n";
        foreach (range(intval($a), intval($b)) as $i) {
            $key = str_pad($i, 2, '0', STR_PAD_LEFT) ;
            $messages[$key] = $message;
        }
    } else if (preg_match('/^(\w)(\d)-(\w)(\d)\s+(\S+)$/', $line, $matches)) {
        list($o, $a, $ad, $b, $bd, $message) = $matches;

        if ($a != $b) {
            throw new Exception("invalid range:$line");
        }

        echo "$a{$ad}~$b{$bd} => {$message}\n";

        foreach (range(intval($ad), intval($bd)) as $i) {
            $key = str_pad($i, 2, $a, STR_PAD_LEFT) ;
            $messages[$key] = $message;
        }

    } else if (preg_match('/^(\w{2})\s+(.+)$/', $line, $matches)) {
        list($o, $code, $message) = $matches;
        echo "{$code} => {$message}\n";
        $messages[$code] = $message;
    } else {
        echo "parse error: $line\n";
    }
}
var_export($messages);
