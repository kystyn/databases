<?php

include_once('db_railroad.php');
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 19.11.2018
 * Time: 21:04
 */

function generateGraph() {
    $r = &$GLOBALS['r'];
    $GLOBALS['stations'] = $r->selectAllFromTable('stations');

    $graph = array();

    foreach ($GLOBALS['stations'] as $station) {
        $neighbours = $r->selectWhatFromTableWhere('paths', 'StationTo', 'StationFrom = ' . $station['code']);
        $graph[$station['code']] = array_column($neighbours, 'StationTo');
    }

    return $graph;
}

function bfs( $graph, $from, $to ) {
    $used = array();
    $prev = array();
    $q = array();

    array_push($q, $from);
    $prev[$from] = -1;
    $used[$from] = 1;

    while (count($q) != 0) {
        $v = array_shift($q);

        foreach ($graph[$v] as $u) {
            if (!array_key_exists($u, $used)) {
                $used[$u] = 1;
                array_push($q, $u);
                $prev[$u] = $v;
            }
        }
    }

    if (!$used[$to])
        ;
    else {
        $path = array();
        for ($v = $to; $prev[$v] != -1; $v = $prev[$v])
            array_push($path, $v);

        return array_reverse($path);
    }
    return null;
}

function fillNextStations() {
    $G = generateGraph();
    $arr = array();

    foreach ($GLOBALS['stations'] as $stationFrom) {
        foreach ($GLOBALS['stations'] as $stationTo) {
            if ($stationTo['code'] == $stationFrom['code'])
                continue;

            $flag = false;
            $path = bfs($G, $stationFrom['code'], $stationTo['code']);

            echo 'from: ' . $stationFrom['code'] . ' to : ' . $stationTo['code'] . '<br>';
            echo '<br>';
            if (count($path) == 0)
                echo 'Нет дороги из ' . $stationFrom['name'] . ' в ' . $stationTo['name'] . '<br>';
            foreach ($path as $st)
                if (count($G[$st]) > 2) {
                    $GLOBALS['r']->insertIntoTable('next_stations', array($stationFrom['code'], $stationTo['code'], $st));
                    $flag = true;
                    break;
                }
            /* No junction */
            if (!$flag)
                $GLOBALS['r']->insertIntoTable('next_stations', array($stationFrom['code'], $stationTo['code'], $stationTo['code']));
        }
    }
}

fillNextStations();
//print_r(bfs(generateGraph(), 3007, 2));
