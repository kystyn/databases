<?php

include_once('station.php');
include_once('returner.php');
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 07.11.2018
 * Time: 23:29
 */

function reportCargoTurnover() {
    $fileName = $_GET['fileName'];
    $stationCode = $_GET['stationCode'];
    $dateFrom = $_GET['dateFrom'];
    $dateTo = $_GET['dateTo'];

    $r = &$GLOBALS['r'];
    $F = fopen($fileName, 'wt');

    if ($F == null)
        echo 'Не могу создать файл!<br>';

    fprintf($F,
        '<html><head><title>Отчёт по грузообороту в период с ' . $dateFrom . ' по ' . $dateTo .'</title>' .
        '<meta charset="utf-8"></head><body>');

    $r->sqlQuery('USE railroad');
    $wagons = $r->sqlQuery('SELECT wagon_turnover.*, cargo.* FROM wagon_turnover INNER JOIN cargo ON wagon_turnover.cargo_name = cargo.name WHERE ' .
        'date >= \'' . $dateFrom . '\' and date <= \'' . $dateTo .
        '\' and station_id = ' . $stationCode . ' ORDER BY cargo.category ASC');

    $last_category = '0';
    $n = $r->selectWhatFromTableWhere('stations', 'name', 'code = ' . $stationCode);
    $cargo = array();
    fprintf($F, '<center><h1>Отчёт по грузообороту станции ' . $n[0]['name'] . ' за период с ' . $dateFrom . ' по ' . $dateTo .'</h1></center>');
    fprintf($F, '<table>');

    foreach ($wagons as $i =>$wagon) {
        if (strcmp($wagon['category'], $last_category) !== 0 || $i == count($wagons) - 1) {
            foreach ($cargo as $cat => $c) {
                fprintf($F, '<tr><td>' . $cat . '</td>' .
                    '<td>' . $c['in'] . '</td>' .
                    '<td>' . $c['out'] . '</td></tr>');
                unset($cargo[$cat]);
            }

            if ($i != count($wagons) - 1) {
                $last_category = $wagon['category'];
                fprintf($F, '</table>');
                fprintf($F, '<p>Категория: ' . $last_category . '</p><table border = 1>' .
                    '<tr><td>Название</td><td>Принято тонн</td><td>Отправлено тонн</td></tr>');
            }
        }
        if (!array_key_exists($wagon['cargo_name'], $cargo)) {
            $cargo[$wagon['cargo_name']]['in'] = 0;
            $cargo[$wagon['cargo_name']]['out'] = 0;
        }

        if ($wagon['direction'] == $stationCode)
            $cargo[$wagon['cargo_name']]['in'] += $wagon['net'];
        else
            $cargo[$wagon['cargo_name']]['out'] += $wagon['net'];
    }
    fprintf($F, '</body></html>');
    fclose($F);
} /* End of 'reportCargoTurnover' function */


function reportTrainTurnover() {
    $fileName = $_GET['fileName'];
    $stationCode = $_GET['stationCode'];
    $dateFrom = $_GET['dateFrom'];
    $dateTo = $_GET['dateTo'];

    $r = &$GLOBALS['r'];
    $n = $r->selectWhatFromTableWhere('stations', 'name', 'code = ' . $stationCode);
    $F = fopen($fileName, 'wt');

    if ($F == null)
        echo 'Не могу создать файл!<br>';

    fprintf($F,
        '<html><head><title>Отчёт по обороту поездов в период с ' . $dateFrom . ' по ' . $dateTo .'</title>' .
        '<meta charset="utf-8"></head><body><center><h1>Отчёт по обороту поездов станции ' . $n[0]['name'] . ' за период с ' . $dateFrom . ' по ' . $dateTo .'</h1></center>');

    $r->sqlQuery('USE railroad');
    $wagons = $r->selectWhatFromTableWhere('wagon_turnover', '*',
        'date >= \'' . $dateFrom . '\' and date <= \'' . $dateTo .
        '\' and station_id = ' . $stationCode . ' ORDER BY train_id ASC');


    $last_train = $wagons[0]['train_id'];
    $is_empty = 0; //0 empty 1 full 2 mixed

    $empty_in = 0;
    $full_in = 0;
    $mixed_in = 0;
    $empty_out = 0;
    $full_out = 0;
    $mixed_out = 0;

    $with_cargo_count = 0;
    $without_cargo_count = 0;

    foreach ($wagons as $i => $wagon) {
        if ($wagon['train_id'] != $last_train || $i == count($wagons) - 1) {
            //arrival
            if ((int)$i == 0)
                continue;
            if ($wagons[$i - 1]['direction'] == $stationCode) {
                switch ($is_empty) {
                    case 0:
                        $empty_in++;
                        break;
                    case 1:
                        $full_in++;
                        break;
                    case 2:
                        $mixed_in++;
                        break;
                }
            }
            // departure
            else {
                switch ($is_empty) {
                    case 0:
                        $empty_out++;
                        break;
                    case 1:
                        $full_out++;
                        break;
                    case 2:
                        $mixed_out++;
                        break;
                }
            }
            $last_train = $wagon['train_id'];
            $is_empty = (int)$wagon['net'] !== 0;
        }

        if (((int)$wagon['net'] !== 0) != $is_empty)
            $is_empty = 2;

        if ($wagon['direction'] != $stationCode)
            $wagon['net'] == 0 ? $without_cargo_count++ : $with_cargo_count++;
    }
    fprintf($F,
        '<table border="1"><tr><td>Количество пустых принятых поедов</td><td>' . $empty_in . '</td></tr>
        <tr><td>Количество полных принятых поедов</td><td>' . $full_in . '</td></tr>
        <tr><td>Количество смешанных принятых поедов</td><td>' . $mixed_in . '</td></tr>
        <tr><td>Количество пустых отправленных поедов</td><td>' . $empty_out . '</td></tr>
        <tr><td>Количество полных отправленных поедов</td><td>' . $full_out . '</td></tr>
        <tr><td>Количество смешанных отправленных поедов</td><td>' . $mixed_out . '</td></tr></table><br>');
	fprintf($F, 'Среднее отношение вагонов с грузом к пустым в сформированных поездах: ');
	if ($without_cargo_count != 0)
	    fprintf($F, '%f<br>',	$with_cargo_count / $without_cargo_count);
	else
		fprintf($F, 'все отправленные вагоны полные<br>');

    fprintf($F, '</body></html>');
    fclose($F);
} /* End of 'reportTrainTurnover' function */


if (isset($_GET['cargo']))
    reportCargoTurnover();
if (isset($_GET['train']))
    reportTrainTurnover();

echo '<body></body>' .
'<script>' .
'var a = document.createElement("a");' .
'document.body.appendChild(a);' .
'a.style = "display: none";' .
'a.onclick = history.back();' .
'a.click();' .
'</script>';
