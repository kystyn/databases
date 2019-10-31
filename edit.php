<html>
<head>
    <meta charset="utf-8">
    <title>Редактирования карты</title>
    <script src="http://openlayers.org/api/OpenLayers.js"></script>
    <script src="map.js"></script>
</head>
<body>
    <h1>Режим редактирования карты</h1>
    <h4>Клик ЛКМ по карте - добавление маркера-станции</h4>
    <h4>Двойной клик по карте - соединение последовательности станций путями</h4>
    <h4>Клик ПКМ по маркеру - внесение информации в базу данных</h4>
    <div style="width:80%; height:80%" id="edmap"></div>
    <a href="index.php">Перейти в обычный режим</a>
</body>
<script>
    loadMap('edmap', 30.35180, 59.97524, true, 9);
    addClickControl();
</script>
<?php
include_once("db_railroad.php");
$s = $r->selectAllFromTable('stations');
$d = $r->selectWhatFromTableWhere('paths', 'LonFrom, LatFrom, LonTo, LatTo', '1');
echo '<script>';
$r->showStations($s, $d);
echo '</script>';
?>
</html>
