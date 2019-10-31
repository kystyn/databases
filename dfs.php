<?php

include_once('db_railroad.php');

$route = array();

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

function search( $G, $StartKey, $EndKey ) {
    /* We should never get this case.
     * Possible if only programmers mistake */
    if (!array_key_exists($StartKey, $G)) {
        echo 'Something went wrong...' . '<br>';
        return false;
    }

    $p = $G[$StartKey];
    $visited = &$GLOBALS['visited'];
    $route = &$GLOBALS['route'];

    if ($StartKey == $EndKey)
        return true;

    $visited[$StartKey] = true;
    foreach ($p as $neighbour) {
        if (!array_key_exists($neighbour, $visited)) {
            $res = search($G, $neighbour, $EndKey);

            if ($res == true) {
                array_push($route, $neighbour);
                return true;
            }
        }
    }
    return false;
}


function dfs( $graph, $stationFrom, $stationTo ) {
    if (isset($GLOBALS['route']))
        while (array_pop($GLOBALS['route']) != null)
            ;
    if (isset($GLOBALS['visited']))
        while (array_pop($GLOBALS['visited']) != null)
            ;
    ///echo 'from: ' . $stationFrom . ' to : ' . $stationTo . '<br>';
    search($graph, $stationFrom, $stationTo);
}

function fillNextStations() {
    $G = generateGraph();
    $arr = array();

    foreach ($GLOBALS['stations'] as $stationFrom) {
        foreach ($GLOBALS['stations'] as $stationTo) {
            if ($stationTo['code'] == $stationFrom['code'])
                continue;

            $flag = false;
            dfs($G, $stationFrom['code'], $stationTo['code']);

            $GLOBALS['route'] = array_reverse($GLOBALS['route']);
            echo 'from: ' . $stationFrom['code'] . ' to : ' . $stationTo['code'] . '<br>';
            print_r($GLOBALS['route']);
            echo '<br>';
            if (count($GLOBALS['route']) == 0)
                echo 'Нет дороги из ' . $stationFrom['name'] . ' в ' . $stationTo['name'] . '<br>';
            foreach ($GLOBALS['route'] as $st)
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
