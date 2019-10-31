<html>
<head>
    <meta charset="utf-8">
    <title>Система управления АО РЖД</title>
    <script src="http://openlayers.org/api/OpenLayers.js"></script>
    <script src="map.js"></script>
</head>
<body>
    <h1 style="text-align: center">Система управления грузоперевозками АО РЖД</h1>
    <div style="width:80%; height:80%; display: block;
    margin-left: auto;
    margin-right: auto" id="idxmap"></div>
    <a href="edit.php">Перейти в режим редактирования</a>
</body>
<script>
    loadMap('idxmap', 30.35180, 59.97524, true, 9);
</script>
<?php
include_once("db_railroad.php");
$s = $r->selectAllFromTable('stations');
$d = $r->selectWhatFromTableWhere('paths', 'LonFrom, LatFrom, LonTo, LatTo', 1);
echo '<script>';
$r->showStations($s, $d);
echo '</script>';
?>
</html>
