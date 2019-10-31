<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 30.11.2018
 * Time: 20:23
 */
include_once('research.php');

$rsr = new research();

set_time_limit(10000);

///*
$rsr->generate(1000);
$rsr->generate(10000);
$rsr->generate(100000);
//*/

///*
$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);
//*/

///*
$x1 = $rsr->evalTimeSearch(1000, 500, 'code');
$x2 = $rsr->evalTimeSearch(1000, 5000, 'code');
$x3 = $rsr->evalTimeSearch(1000, 20000, 'code');
echo 'key search 1000: ' . $x3 . '<br>';

$x1 = $rsr->evalTimeSearch(10000, 500, 'code');
$x2 = $rsr->evalTimeSearch(10000, 5000, 'code');
$x3 = $rsr->evalTimeSearch(10000, 20000, 'code');
echo 'key search 10000: ' . ($x1 + $x2 + $x3) / 3.0 . '<br>';

$x1 = $rsr->evalTimeSearch(100000, 500, 'code');
$x2 = $rsr->evalTimeSearch(100000, 5000, 'code');
$x3 = $rsr->evalTimeSearch(100000, 100000, 'code');
echo 'key search 100000: ' . ($x1 + $x2 + $x3) / 3.0 . '<br>';
//*/

///*
$x1 = $rsr->evalTimeSearch(1000, 500, 'longitude');
echo 'non key search 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeSearch(10000, 500, 'longitude');
echo 'non key search 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeSearch(100000, 500, 'longitude');
echo 'non key search 100000: ' . $x1 . '<br>';
//*/

///*
$x1 = $rsr->evalTimeSearchMask(1000, 500);
echo 'mask search 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeSearchMask(10000, 500);
echo 'mask search 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeSearchMask(100000, 500);
echo 'mask search 100000: ' . $x1 . '<br>';
//*/

///*
$x1 = $rsr->evalTimeInsert(1000, 10);
echo 'insert 1000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station1000 WHERE code >= 1000');

$x1 = $rsr->evalTimeInsert(10000, 10);
echo 'insert 10000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station10000 WHERE code >= 10000');

$x1 = $rsr->evalTimeInsert(100000, 10);
echo 'insert 100000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station100000 WHERE code >= 100000');
//*/

///*
$x1 = $rsr->evalTimeInsertMany(1000, 1000, 100);
echo 'insert many 1000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station1000 WHERE code >= 1000');

$x1 = $rsr->evalTimeInsertMany(10000, 1000, 100);
echo 'insert many 10000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station10000 WHERE code >= 10000');

$x1 = $rsr->evalTimeInsertMany(100000, 1000, 100);
echo 'insert many 100000: ' . $x1 . '<br>';
$rsr->sqlQuery('DELETE FROM station100000 WHERE code >= 100000');
//*/

///*
$x1 = $rsr->evalTimeUpdateKey(1000, 1000);
echo 'update key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeUpdateKey(10000, 1000);
echo 'update key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeUpdateKey(100000, 1000);
echo 'update key 100000: ' . $x1 . '<br>';
//*/

///*
$x1 = $rsr->evalTimeUpdateNonKey(1000, 10);
echo 'update non key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeUpdateNonKey(10000, 10);
echo 'update non key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeUpdateNonKey(100000, 10);
echo 'update non key 100000: ' . $x1 . '<br>';
//*/

///*
$x1 = $rsr->evalTimeDelete(1000, 100, 'code');
echo 'delete key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDelete(10000, 100, 'code');
echo 'delete key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDelete(100000, 100, 'code');
echo 'delete key 100000: ' . $x1 . '<br>';

$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);

//*/

///*
$x1 = $rsr->evalTimeDelete(1000, 20, 'longitude');
echo 'delete non key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDelete(10000, 20, 'longitude');
echo 'delete non key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDelete(100000, 20, 'longitude');
echo 'delete non key 100000: ' . $x1 . '<br>';

$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);

//*/

///*
$x1 = $rsr->evalTimeDeleteMany(1000, 20, 'code', 50);
echo 'delete group key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDeleteMany(10000, 20, 'code', 50);
echo 'delete group key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDeleteMany(100000, 20, 'code', 50);
echo 'delete group key 100000: ' . $x1 . '<br>';

$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);
//*/

///*
$x1 = $rsr->evalTimeDeleteMany(1000, 20, 'longitude', 50);
echo 'delete group key 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDeleteMany(10000, 20, 'longitude', 50);
echo 'delete group key 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeDeleteMany(100000, 20, 'longitude', 50);
echo 'delete group key 100000: ' . $x1 . '<br>';

$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);

//*/

///*
$x1 = $rsr->evalTimeOptimize(1000, 200);
echo 'optimize 200 1000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeOptimize(10000, 200);
echo 'optimize 200 10000: ' . $x1 . '<br>';

$x1 = $rsr->evalTimeOptimize(100000, 200);
echo 'optimize 200 100000: ' . $x1 . '<br>';

$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);
//*/

$x2 = 0;
$cnt = 10;
for ($i = 0 ; $i < $cnt; $i++) 
  $x2 += $rsr->evalTimeOptimize(1000, 1000 - 200);
echo 'optimize left 200 1000: ' . ($x2 / (float)$cnt) . '<br>';
$x2 = 0;

for ($i = 0 ; $i < $cnt; $i++) 
  $x2 += $rsr->evalTimeOptimize(10000, 10000 - 200);
echo 'optimize left 200 10000: ' . ($x2 / (float)$cnt) . '<br>';
$x2 = 0;	

for ($i = 0 ; $i < $cnt; $i++) 
  $x2 += $rsr->evalTimeOptimize(100000, 100000 - 200);
echo 'optimize left 200 100000: ' . ($x2 / (float)$cnt) . '<br>';


$rsr->cloneTable(1000);
$rsr->cloneTable(10000);
$rsr->cloneTable(100000);

?>
