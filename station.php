<?php
include_once('db_railroad.php');

class station {

    private $stationInfo;
    private $next_stations;
    private $trains;
    private $fake_date;
    private $trainLength;
    private $trainMass;

    /* Class constructor.
     * ARGUMENTS:
     *   - station params;
     * RETURNS: None.
     */
    public function __construct( $lon, $lat, $code ) {
        $r = &$GLOBALS['r'];

        if ($lon != null && $lat != null)
            $this->stationInfo = $r->findStationByCoordinate($lon, $lat);
        else if ($code != null)
            $this->stationInfo = $r->findStationByCode($code);
        else
            echo 'Bad station requested!';
        echo
            '<script>loadMap(\'stmap\', ' . $this->stationInfo['longitude'] . ', ' . $this->stationInfo['altitude'] . ', false, 13);' . "\n" .
            'h2 = document.getElementById(\'stname\');' . "\n" .
            'h2.innerHTML = \'Станция: ' . $this->stationInfo['name'] . '\'; ' . "\n" .

            'h4 = document.getElementById(\'stcode\')' . "\n" .
            'h4.innerHTML = \'Код в АСУ "Экспресс-3 / ЕСР": ' . $this->stationInfo['code'] . '\'; ' . "\n";

        //$d = $r->selectWhatFromTableWhere('paths', 'LonFrom, LatFrom, LonTo, LatTo', 'StationFrom = ' . $this->stationInfo['code']);
        $d = $r->selectAllFromTable('paths');
        //$nghb = $r->selectWhatFromTableWhere('paths', 'StationTo', 'StationFrom = ' . $this->stationInfo['code']);

        /*$q = 'code = ' . $this->stationInfo['code'];
        foreach ($nghb as $pth)
            $q = $q . ' or code = ' . $pth['StationTo'];
        $s = $r->selectWhatFromTableWhere('stations', '*', 'code = ' . $q);*/
        $s = $r->selectAllFromTable('stations', '*');

        $r->showStations($s, $d);
        $GLOBALS['r']->showStations([$this->stationInfo], $d);
        // delete yesterday and earlier arrived trains
        $GLOBALS['r']->sqlQuery('DELETE FROM trains WHERE arrival_date < \'' . date('Y-m-d') . '\' and way > 0');
        echo '</script>';

        $this->trains = array();
        $this->fake_date = '\'2000-00-00\'';
        $this->trainLength = 20;
        $this->trainMass = 1800;
        $this->next_stations = array_column($GLOBALS['r']->selectWhatFromTableWhere('next_stations', 'destination', 'current_station = ' . $this->stationInfo['code']), 'destination');
    } /* End of constructor */

    /* Parse train from file function.
     * ARGUMENTS:
     *   - file variable:
     *       $F;
     * RETURNS:
     *   parsed data.
     */
    private function parseTrain( $F ) {
        $data = array();

        while (!feof($F)) {
            $wagon //= list($wagon_id, $cargo_cat, $cargo, $net, $gross, $dep, $dest, $urg)
                = fscanf($F, "%d %s %s %d %d %d %d %s");
            array_push($data, $wagon);
        }

        array_pop($data);

        return $data;
    } /* End of 'parseTrain' function */

    /* Get free function.
     * ARGUMENTS: None.
     * RETURNS: last busy way.
     */
    private function getFreeWay() {
        $way = $GLOBALS['r']->selectWhatFromTableWhere('trains', 'ABS(way)', '(destination = ' . $this->stationInfo['code'] .
            ' and way > 0) or (departure = ' . $this->stationInfo['code'] .' and way < 0) ORDER BY `ABS(way)` ASC');

        if ($way == null || $way[0]['ABS(way)'] > 1)
            return 1;

        for ($i = 1; $i < count($way); $i++)
            if ($way[$i]['ABS(way)'] - $way[$i - 1]['ABS(way)'] > 1)
                return $way[$i - 1]['ABS(way)'] + 1;

        return $way[count($way) - 1]['ABS(way)'] + 1;
    } /* End of 'getLastBusyWay' function */

    /* Get last busy train function.
     * ARGUMENTS: None.
     * RETURNS: last busy way.
     */
    private function getFreeTrain() {
        $tr = $GLOBALS['r']->selectWhatFromTableWhere('trains', 'number', '1 ORDER BY number ASC');

        if ($tr == null || $tr[0]['number'] > 1)
            return 1;

        for ($i = 1; $i < count($tr); $i++)
            if ($tr[$i]['number'] - $tr[$i - 1]['number'] > 1)
                return $tr[$i - 1]['number'] + 1;
        return $tr[count($tr) - 1]['number'] + 1;
    } /* End of 'getLastBusyWay' function */

    public function getCode() {
        return $this->stationInfo['code'];
    }

    /* Get next station by destination function.
     * ARGUMENTS:
     *   - destination code:
     *      $destination;
     * RETURNS:
     *   next station code.
     */
    private function getNextByDestination( $destination ) {
        $next = $GLOBALS['r']->selectWhatFromTableWhere('next_stations', 'next_station', 'current_station = ' . $this->stationInfo['code'] . ' and destination = ' . (int)$destination);
        return $next[0]['next_station'];
    } /* End of 'getNextByDestination' function */

    /* Draw table function.
     * ARGUMENTS:
     *   - trains array:
     *       $today_trains;
     * RETURNS: None.
     */
    private function drawTrainsTable( array $today_trains, $showVia, $showWay ) {
        $r = &$GLOBALS['r'];
        for ($i = 0; $i < count($today_trains);) {
            $cur_tr = $today_trains[$i]['train_id'];
            $way = $r->selectWhatFromTableWhere('trains', 'way', 'number = ' . $today_trains[$i]['train_id']);
            echo
                '<table border="1">' .
                '<tr>' .
                    '<td><b>Номер поезда:</b></td>' .
                    '<td>' . $cur_tr . '</td>';
            if ($showWay)
                echo
                    '<td><b>Номер пути:</b></td>' .
                    '<td>' . ABS($way[0]['way'])  . '</td>';
            echo
                '</tr>' .
                '<tr>
                    <td><b>Тип ваг.</b></td>
                    <td><b>Номер</b></td>
                    <td><b>П. отправления</b></td>';
            if ($showVia)
                echo
                    '<td><b>След. ст.</b></td>';
            echo
                    '<td><b>П. назначения</b></td>
                    <td><b>Полный</b></td>
                    <td><b>Срочный</b></td>
                </tr>';

            while ($i < count($today_trains) && $cur_tr == $today_trains[$i]['train_id']) {
                $img = $r->selectWhatFromTableWhere('cargo_images', 'image', 'category = ' .
                '(SELECT category FROM cargo WHERE name = \'' . $today_trains[$i]['cargo_name'] . '\')');

                $dep = $r->selectWhatFromTableWhere('stations', 'name', 'code = ' . $today_trains[$i]['departure']);
                $dest = $r->selectWhatFromTableWhere('stations', 'name', 'code = ' . $today_trains[$i]['destination']);
                $via = $r->selectWhatFromTableWhere('stations', 'name', 'code = ' . $today_trains[$i]['direction']);
                $is_full = $today_trains[$i]['net'] != 0;
                $urgent = $today_trains[$i]['urgency'];
                echo
                    '<tr class="trainTable">' .
                    '<td width="60px" class="centredtxt"> ' .
                        '<img src="images/' . $img[0]['image'] . '"  width="50" height="30" />' .
                    '</td>' .
                    '<td class="centredtxt"> ' . $today_trains[$i]['wagon_id'] . '</td>' .
                    '<td class="centredtxt">' . $dep[0]['name'] . '</td>';
                if ($showVia)
                    echo
                        '<td class="centredtxt">' . $via[0]['name'] . '</td>';
                echo
                    '<td class="centredtxt">' . $dest[0]['name'] . '</td>' .
                    '<td class="centredtxt">' .
                    '<img src="images/' . ($is_full ? 'is_full.png' : 'is_empty.png') . '" width="20" height="20" /> ' .
                    '</td>' .
                    '<td class="centredtxt">' .
                    '<img src="images/' . ($urgent ? 'is_full.png' : 'is_empty.png') . '" width="20" height="20" /> ' .
                    '</td>' .
                    '</tr>';

                $i++;
            }
            echo '</table><br>';
        }
    } /* End of 'drawTrainsTable' function */

    /* Report about arrived trains function.
     * ARGUMENTS: None.
     * RETURNS: prints a report into table on the called from page.
     */
    public function reportArrivedTrains() {
        if (isset($_FILES['train_descr_file']['tmp_name'])) {
            $F = fopen($_FILES['train_descr_file']['tmp_name'], 'rt');
            $trainno = fscanf($F, "%d");
            $train = $this->parseTrain($F);
            $t = $GLOBALS['r']->selectWhatFromTableWhere('trains', '*', 'number = ' . $trainno[0] .
                ' and destination = ' . $this->stationInfo['code']);
            $way = $this->getFreeWay();
            // new trains, from fabric
            if ($t == null) {
                $res = $GLOBALS['r']->insertIntoTable('trains', array($trainno[0], 0, $this->stationInfo['code'],
                    $way, '\'' . date('Y-m-d' . '\'')));

                if ($res == 0) {
                    echo '<b>Поезд ' . $trainno[0] . ' едет куда-то не сюда!</b><br>';
                    return;
                }
            }

            //list($wagon_id, $cargo_cat, $cargo, $net, $gross, $dep, $dest, $urg)
            $q = 'UPDATE trains SET arrival_date = \'' . date('Y-m-d') . '\', way = ' . $way .
                 ' WHERE number = ' . $trainno[0] . ' and destination = ' . $this->stationInfo['code'];
            //echo 'QUERY: ' . $q;
            $GLOBALS['r']->sqlQuery($q);

            foreach ($train as $tr) {
                //station_id 	train_id 	wagon_id 	urgency 	date 	departure 	destination 	cargo_name 	net 	gross 	direction 	way
                $arr = array(
                    'station_id' => $this->stationInfo['code'],
                    'train_id' => $trainno[0],
                    'wagon_id' => $tr[0],
                    'urgency' => strcasecmp($tr[7], 'СРОЧНО') == 0 ? 1 : 0,
                    'date' => '\'' . date('Y-m-d') . '\'',
                    'departure' => $tr[5],
                    'destination' => $tr[6],
                    'cargo_name' => '\'' . $tr[2] . '\'',
                    'net' => $tr[3],
                    'gross' => $tr[4],
                    'direction' => $this->stationInfo['code']);
                $GLOBALS['r']->addWagonEvent($arr);
                //echo 'TO DISTRIBUTE:<br>';
                //print_r($arr);
                //echo '<br>';
                $this->distributeWagon($arr);
            }
            $this->formTrains();
        }

        $today_trains = $GLOBALS['r']->selectWhatFromTableWhere('wagon_turnover', '*', 'date = \'' . date('Y-m-d') . '\' and station_id = ' . $this->stationInfo['code'] .
            ' and direction = ' . $this->stationInfo['code'] . ' ORDER BY train_id ASC');
        if ($today_trains == null)
            echo '<h4>На сегодня принимаемых поездов нет</h4>';
        else
            echo '<h4>Принятые сегодня поезда:</h4>';

        $this->drawTrainsTable($today_trains, 0, 1);
    } /* End of 'reportArrivedTrains' function */

    /* Distribute wagon into trains function.
     * ARGUMENTS:
     *   - file string:
     *       $arr;
     * RETURNS: None.
     */
    private function distributeWagon( &$arr ) {
        // wagon arrived - turn back
        if ($arr['destination'] == $this->stationInfo['code'] && $arr['net'] == 0) {
            $tmp = $arr['destination'];
            $arr['destination'] = $arr['departure'];
            $arr['departure'] = $tmp;
        }

        $arr['direction'] = $this->getNextByDestination($arr['destination']); // direction
        $arr['train_id'] = 0;
        $arr['date'] = $this->fake_date; // fake date

        $this->trains[$arr['direction']][] = $arr;
    } /* End of 'distributeWagon' function */

    /* Write train information into file function.
     * ARGUMENTS: train number.
     * RETURNS: None.
     */
    private function writeTrainInfoToFile( $trainNo ) {
        $r = &$GLOBALS['r'];
        $F = fopen('trains/train_' . $trainNo .'.txt', 'wt');
        fprintf($F, "%d\n", $trainNo);
        if ($F == null)
            echo "Couldn't create file!";
        $train = $r->selectWhatFromTableWhere('wagon_turnover', '*', 'train_id = ' . $trainNo);
        foreach ($train as $wagon) {
            $cargo_cat = $r->selectWhatFromTableWhere('cargo', 'category', 'name = \'' . $wagon['cargo_name'] . '\'');
            //list($wagon_id, $cargo_cat, $cargo, $net, $gross, $dep, $dest, $urg)
            fprintf($F, "%d %s %s %d %d %d %d %s\n",
                $wagon['wagon_id'], /*iconv('UTF-8', 'windows-1251', */$cargo_cat[0]['category']/*)*/,
                /*iconv('UTF-8', 'windows-1251', */$wagon['cargo_name']/*)*/,
                $wagon['net'], $wagon['gross'], $wagon['departure'], $wagon['destination'], $wagon['urgency'] ? 'СРОЧНО' : 'ОБЫКН');
        }
        fclose($F);
    } /* End of 'writeTrainInfoToFile' function */

    /* Form train function
     * ARGUMENTS:
     *    the way where just arrived train - $busyWay.
     * RETURNS: None.
     */
    private function formTrains() {
        $r = &$GLOBALS['r'];

        foreach ($this->trains as $next => $hi) {
            $way = $this->getFreeWay();
            $train = $r->selectWhatFromTableWhere('trains', 'number', 'destination = ' . (int)$next . ' and way != 0 and departure = ' . $this->stationInfo['code']);
            $length = 0;
            $mass = 0;

            // no train
            if ($train == null) {
                $train_number = $this->getFreeTrain();
                $r->insertIntoTable('trains', array($train_number, $this->stationInfo['code'], (int)$next, $way * -1, '\'' . date('Y-m-d') . '\''));
                // len = mass = 0
            }
            else {
                $train_number = $train[0]['number'];
                $forming = $r->selectWhatFromTableWhere('wagon_turnover', 'gross', 'train_id = ' . $train_number . ' and date = ' .
                    $this->fake_date);

                // evaluate len and mass
                foreach ($forming as $w) {
                    $length++;
                    $mass += $w['gross'];
                }
            }

            $depart = function($wagon, &$length, &$mass) use ($r, &$train_number, $next, &$way) {
                // depart train
                $r->sqlQuery('UPDATE trains SET way = 0 WHERE number = ' . $train_number);
                $r->sqlQuery('UPDATE wagon_turnover SET date = \''. date('Y-m-d') .
                    '\', direction = ' . $wagon['direction'] .
                    ' WHERE train_id = ' . $train_number .
                    ' and date = ' . $this->fake_date . ' and station_id = ' . $this->stationInfo['code']);
                $this->writeTrainInfoToFile($train_number);

                $length = $mass = 0;
                $train_number = $this->getFreeTrain();
                $way = $this->getFreeWay();
                $r->insertIntoTable('trains', array($train_number, $this->stationInfo['code'], $next, $way * -1, '\'' . date('Y-m-d') . '\''));
            };

            // urgent
            foreach ($this->trains[$next] as $wagon) {
                if ($wagon['urgency']) {
                    $wagon['train_id'] = $train_number;
                    $r->addWagonEvent($wagon);
                    $length++;
                    $mass += $wagon['gross'];
                }
                if ($length > $this->trainLength || $mass > $this->trainMass)
                    $depart($wagon, $length, $mass);
            }

            // not urgent
            foreach ($this->trains[$next] as $wagon) {
                if (!$wagon['urgency']) {
                    $wagon['train_id'] = $train_number;
                    $r->addWagonEvent($wagon);
                    $length++;
                    $mass += $wagon['gross'];
                }
                // depart train
                if ($length > $this->trainLength || $mass > $this->trainMass) {
                    $depart($wagon, $length, $mass);
                }
            }
        }
    } /* End of 'formTrains' function */

    /* Report about preparing trains function.
     * ARGUMENTS: None.
     * RETURNS: None.
     */
    public function reportPreparingTrains() {
        $today_trains = $GLOBALS['r']->selectWhatFromTableWhere('wagon_turnover', '*', 'date = ' .  $this->fake_date . ' and station_id = ' . $this->stationInfo['code'] .
            ' and direction != ' . $this->stationInfo['code'] . ' ORDER BY train_id ASC');
        if ($today_trains == null)
            echo '<h4>На сегодня подготавливаемых поездов нет</h4>';
        else
            echo '<h4>Подготавливаемые сегодня поезда:</h4>';

        foreach ($today_trains as $train)
            $train['date'] = '`' . date('Y-m-d') . '`';

        $this->drawTrainsTable($today_trains, 1, 1);
    } /* End of 'reportPreparingTrains' function */

    /* Report about ready trains function.
     * ARGUMENTS: None.
     * RETURNS: None.
     */
    public function reportReadyTrains() {
        $today_trains = $GLOBALS['r']->selectWhatFromTableWhere('wagon_turnover', '*', 'date = \'' .  date('Y-m-d') . '\' and station_id = ' . $this->stationInfo['code'] .
            ' and direction != ' . $this->stationInfo['code'] . ' ORDER BY train_id ASC');
        if ($today_trains == null)
            echo '<h4>Пока готовых поездов нет</h4>';
        else
            echo '<h4>Отправленные сегодня поезда:</h4>';

        $this->drawTrainsTable($today_trains, 1, 0);
    } /* End of 'reportPreparingTrains' function */
}
?>
