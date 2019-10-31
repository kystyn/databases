<?php

$return = 0;
include_once('db_railroad.php');
include_once('returner.php');
include_once('bfs.php');

/* Add station */
if (isset($_POST['st_name']) && isset($_POST['st_code']) &&
    isset($_POST['st_lon']) && isset($_POST['st_lat'])) {
    $r->addStation($_POST['st_name'], $_POST['st_code'],
        $_POST['st_lon'], $_POST['st_lat']);
    $return = 1;
}

$i = 0;

while (isset($_POST['point_lon_' . ($i + 1)]) && isset($_POST['point_lat_' . ($i + 1)])) {
    $r->addPath($_POST['point_lon_' . $i], $_POST['point_lat_' . $i],
        $_POST['point_lon_' . ($i + 1)], $_POST['point_lat_' . ($i + 1)]);
    $r->addPath($_POST['point_lon_' . ($i + 1)], $_POST['point_lat_' . ($i + 1)],
        $_POST['point_lon_' . $i], $_POST['point_lat_' . $i]);
    $i++;
}
if ($i != 0)
    fillNextStations();
$return += $i != 0;
if ($return)
  returnToPage('edit.php');
?>