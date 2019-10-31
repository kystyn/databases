<?php
include_once('station.php');
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Управление станцией</title>
    <script src="http://openlayers.org/api/OpenLayers.js"></script>
    <script src="map.js"></script>
    <script src="utils.js"></script>
    <link rel="stylesheet" type="text/css" href="ststyle.css" />
</head>
<body>
<div>
    <div id="start_info">
        <h2 id = "stname"></h2>
        <h3 id = "stcode"></h3>
    </div>
    <div id="today">
        <?php
        echo '<p style="font-size: 24; font-weight: bold">Сегодня</p><p style="font-size: 18px">' . date('d.m.Y') . '</p>';
        ?>
        <a href="index.php">Вернуться на главную страницу</a>
    </div>
</div>
<div style="clear:left"></div>
<div>
    <div id="stmap"></div>

    <?php
    if (isset($_GET['station_lon']) && isset($_GET['station_lat']))
        $s = new station($_GET['station_lon'], $_GET['station_lat'], null);
    else if (isset($_GET['station_code']))
        $s = new station(null, null, $_GET['station_code']);
    else
        echo 'BAAAAAD';
    ?>

    <div id="add-train">
        <p id="recieve">Принять поезд</p>
        <?php
        echo '<form enctype="multipart/form-data" method="post" > ' .
            '<input type="file" name="train_descr_file">' .
            '<input type="submit" value="Принять поезд" />' .
            '</form>';
        ?>
        <form>
            <input type="checkbox" onclick="showArrivedTrains('arrivedTrain', 'showArrived')" id="showArrived" />Показать принятые сегодня поезда<br>
            <input type="checkbox" onclick="showArrivedTrains('formingTrain', 'showForming')" id="showForming" />Показать формируемые сегодня поезда<br>
            <input type="checkbox" onclick="showArrivedTrains('readyTrain', 'showReady')" id="showReady" />Показать сформированные сегодня поезда<br>
            <input type="checkbox" onclick="showArrivedTrains('reportCargoTurnover', 'showCargoTurnoverReportInp')" id="showCargoTurnoverReportInp"/>Сформировать отчёт о грузообороте станции<br>
            <input type="checkbox" onclick="showArrivedTrains('reportTrainsTurnover', 'showTrainsTurnoverReport')" id="showTrainsTurnoverReport"/>Сформировать отчёт об обороте поездов<br>
        </form>
        <div id="reportCargoTurnover" class="trainT">
            <p>Выберите период формирования отчёта об обороте поездов</p>
            С <input type="date" id="date1"/> по <input type="date" id="date2"/>
            <?php
            echo '<input type="button" value="Сформировать отчёт" onclick="showCargoTurnoverReport(' . $s->getCode() . ')"/>';
            echo '<p id="rep2">Отчёт будет записан в файл  <b>reportCargoTurnover_<с>_<по>.html</b></p>';
            ?>
        </div>
        <div id="reportTrainsTurnover" class="trainT">
            <p>Выберите период формирования отчёта о грузообороте</p>
            С <input type="date" id="date3"/> по <input type="date" id="date4"/>
            <?php
            echo '<input type="button" value="Сформировать отчёт" onclick="showTrainTurnoverReport(' . $s->getCode() . ')"/><br>';
            echo '<p id="rep2">Отчёт будет записан в файл  <b>reportTrainTurnover_<с>_<по>.html</b></p>';
            ?>
        </div>
    </div>
    <div id="arrivedTrain" class="trainT">
        <?php
            $s->reportArrivedTrains();
        ?>
    </div>
    <div id="formingTrain" class="trainT">
        <?php
            $s->reportPreparingTrains();
        ?>
    </div>
    <div id="readyTrain" class="trainT">
        <?php
            $s->reportReadyTrains();
        ?>
    </div>
</div>
</body>
</html>
