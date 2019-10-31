<?php
include_once 'db_railroad.php';

$r = &$GLOBALS['r'];

$st = $r->selectWhatFromTableWhere('stations', 'name, code', '1');

foreach ($st as $n) {
    //$s = iconv('utf-8', 'windows-1252', $n['name']);
    $s = iconv('utf-8', 'windows-1251', $n['name']);
    $q = 'update `stations` set name = \''.$s.'\' where code = '.$n['code'];
    $r->sqlQuery($q);
}

?>

