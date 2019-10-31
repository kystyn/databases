<?php
include_once('database.php');

/* Railroad class */
class railroad extends database {
    /* Class constructor.
     * ARGUMENTS: None.
     */
    public function __construct()
    {
        parent::__construct('localhost', 'root', '', 'railroad');
    } /* End of 'railroad' constructor */

    /* Add wagon event (arrival at station) function.
     * ARGUMENTS:
     *   array with fields: $station_id, $train_in, $train_out, $wagon_id, $urgency, $date_in, 		       $date_out, $is_full, $departure, $destination;
     * RETURNS: None.
     */
    public function addWagonEvent( $data ) {
         parent::insertIntoTable('wagon_turnover', $data);
    } /* End of 'addWagonEvent' function */

    /* Add wagon events (arrival at station) function.
     * ARGUMENTS:
     *   array with fields: $station_id, $train_in, $train_out, $wagon_id, $urgency, $date_in, 		       $date_out, $is_full, $departure, $destination;
     * RETURNS: None.
     */
    public function addWagonEvents( $data ) {
        parent::insertManyIntoTable('wagon_turnover', $data);
    } /* End of 'addWagonEvent' function */

    /* Add station ro RAILROAD base function.
     * ARGUMENTS:
     *   - railroad database:
     *       database $db;
     *   - name, code, lon, lat:
     *       $name, $code, $lon, $lat;
     * RETURNS: None.
     */
    public function addStation( $name, $code, $lon, $lat )
    {
        /* Insert into STATIONS table */
        $row = array('\'' . $name . '\'', $code, $lon, $lat);
        parent::insertIntoTable('stations', $row);
    } /* End of 'addStation' function */

    /* Find station by coordinates in RAILROAD base function.
     * ARGUMENTS:
     *   - coordinates:
     *       $lon, $lat;
     * RETURNS:
     *   station info.
     */
    public function findStationByCoordinate( $lon, $lat ) {
        $q = parent::selectWhatFromTableWhere('stations', '*', 'longitude = ' . $lon . ' and altitude = ' . $lat);
        return $q[0];
    } /* End of 'findStation' function */

    /* Find station by code in RAILROAD base function.
     * ARGUMENTS:
     *   - code:
     *       $code;
     * RETURNS:
     *   station info.
     */
    public function findStationByCode( $code ) {
        $q = parent::selectWhatFromTableWhere('stations', '*', 'code = ' . $code);
        return $q[0];
    } /* End of 'findStation' function */

    /* Add path to RAILROAD base function.
     * ARGUMENTS:
     *   - railroad database:
     *       database $db;
     *   - lon, lat of 1 and 2 stations:
     *       $lon1, $lat1, $lon2, $lat2;
     * RETURNS: None.
     */
    public function addPath( $lon1, $lat1, $lon2, $lat2 )
    {
        $code1 = parent::selectWhatFromTableWhere('stations', 'code, longitude, altitude', 'longitude = ' . $lon1 . ' AND altitude = ' . $lat1);
        $code2 = parent::selectWhatFromTableWhere('stations', 'code, longitude, altitude', 'longitude = ' . $lon2 . ' AND altitude = ' . $lat2);

        /* Insert into PATHS table */
        $row = array($code1[0]['code'], $code1[0]['longitude'], $code1[0]['altitude'],
                     $code2[0]['code'], $code2[0]['longitude'], $code2[0]['altitude']);
        parent::insertIntoTable('paths', $row);
    } /* End of 'addStation' function */

    /* Show station function.
     * ARGUMENTS:
     *   - name, code, lon, lat:
     *       $name, $code, $lon, $lat;
     * RETURNS: None.
     */
    public function showStations( $data, $paths )
    {
        $len = count($data);
        $dstr = '[';

        for ($i = 0; $i < $len; $i++) {
            $dstr = $dstr .
                "{name: '" . $data[$i]['name'] . "', code: " . $data[$i]['code'] . ", lon: " . $data[$i]['longitude']  . ", lat: " . $data[$i]['altitude'] . "},\n";
        }

        $dstr = $dstr . ']';

        $len = count($paths);
        $pstr = '[';
        for ($i = 0; $i < $len; $i++) {
            $pstr = $pstr .
                "{LonFrom: " . $paths[$i]['LonFrom'] . ", LatFrom: " . $paths[$i]['LatFrom'] .
                ", LonTo: " . $paths[$i]['LonTo'] . ", LatTo: " . $paths[$i]['LatTo'] . "},\n";
        }
        $pstr = $pstr . ']';

        echo
            'showStations(' . $dstr . ', ' . $pstr . ');';
    } /* End of 'showStation' function */

    /* Get all stations function.
     * ARGUMENTS: None.
     * RETURNS:
     *   (array) stations array.
     */
} /* End of 'railroad ' class */

/* Global variable - railroad database interface */
$GLOBALS['r'] = new railroad();
?>
