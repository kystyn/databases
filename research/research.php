<?php
include_once('../database.php');

class research extends database {
    function __construct() {
        parent::__construct('localhost', 'root', '', 'research');
    }

    public function generate( $N ) {
        if ($N < 30000) {
            $q = array();
            for ($i = 0; $i < $N; $i++) {
                $q[] = array('\'station' . random_int(0, 50) . '\'', $i, $i, random_int(0, 5000));
            }
            parent::insertManyIntoTable('station' . $N . '_reserve', $q);
        }
        else {
            $k = 0;
            $step = 1000;
            while ($k < $N) {
                $q = array();

                for ($i = $k; $i < $k + $step; $i++) {
                    $q[] = array('\'station' . random_int(0, 50) . '\'', $i, $i, random_int(0, 5000));
                }
                parent::insertManyIntoTable('station' . $N . '_reserve', $q);
                $k += $step;
            }
        }
    }

    public function cloneTable( $N ) {
        parent::sqlQuery('TRUNCATE ' . 'station' . $N);
        parent::sqlQuery('INSERT INTO station' . $N . ' SELECT * FROM station' . $N . '_reserve');
    }

    public function evalTimeSearch( $N, $queries, $param ) {
        $starttime = microtime(true);
        for ($i = 0; $i < $queries; $i++)
            parent::selectWhatFromTableWhere('station' . $N, '*', $param . ' = ' . random_int(0, $N));
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

    public function evalTimeSearchMask( $N, $queries ) {
        $starttime = microtime(true);
        for ($i = 0; $i < $queries; $i++)
            parent::selectWhatFromTableWhere('station' . $N, '*', 'name LIKE \'station%12%\'');
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

    public function evalTimeInsert( $N, $queries ) {
        $starttime = microtime(true);
        for ($i = $N; $i < $N + $queries; $i++)
            parent::insertIntoTable('station' . $N, array('\'station' . random_int(0, 50) . '\'', $i, random_int(0, 5000), random_int(0, 5000)));
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

    public function evalTimeInsertMany( $N, $howMuchInsert, $queries ) {
        $starttime = microtime(true);
        $c = $N;
        for ($i = $N; $i < $N + $queries; $i++) {
            $q = array();
            for ($j = 0; $j < $howMuchInsert; $j++)
                $q[] = array('\'station' . random_int(0, 50) . '\'', $c++, random_int(0, 5000), random_int(0, 5000));
            parent::insertManyIntoTable('station' . $N, $q);
        }
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

    public function evalTimeUpdateKey( $N, $queries ) {
        $starttime = microtime(true);
        for ($i = 1; $i <= $queries; $i++) {
            parent::sqlQuery('UPDATE station' . $N . ' SET altitude = ' . random_int(0, 5000) . ' WHERE code = ' . $i);
        }
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

    public function     evalTimeUpdateNonKey( $N, $queries ) {
        $starttime = microtime(true);
        for ($i = $N - 1; $i >= $N - 1 -  $queries; $i--) {
            parent::sqlQuery('UPDATE station' . $N . ' SET altitude = ' . random_int(0, 5000) . ' WHERE name = \'station1\'');
        }
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }
	
	public function evalTimeDelete( $N, $queries, $field ) {
        $starttime = microtime(true);
        for ($i = 0; $i < $queries; $i++) {
            parent::sqlQuery('DELETE FROM station' . $N . ' WHERE ' . $field .' = ' . $i);
        }
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

	public function evalTimeDeleteMany( $N, $queries, $field, $howManyDelete ) {
        $starttime = microtime(true);
		$c = 0;
        for ($i = 0; $i < $queries; $i++) {
            parent::sqlQuery('DELETE FROM station' . $N . ' WHERE ' . $field .' >= ' . $c , ' AND ' .$field . ' < ' . ($c + $howManyDelete));
			$c += $howManyDelete;
        }
        $endtime = microtime(true);

        return ($endtime - $starttime) / (float)$queries;
    }

	public function evalTimeOptimize( $N, $howManyDelete ) {
        parent::sqlQuery('DELETE FROM station' . $N . ' WHERE code >= 0 AND code < ' . $howManyDelete);
		$starttime = microtime(true);
		parent::sqlQuery('OPTIMIZE TABLE station' . $N);
        $endtime = microtime(true);

        return $endtime - $starttime;
    }

}

?>
