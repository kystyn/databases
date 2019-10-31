<?php
/* Description of database class  FILE */

/* Database class */
class database extends mysqli {
    private $Connected;  /* boolean variable checking connection */

    /* Exec query function.
     * ARGUMENTS:
     *   - query:
     *       string $query.
     */
    public function sqlQuery( $query ) {
        $q = parent::real_query($query);
        if (!$q) {
            printf('Передайте это сообщение администратору: Couldn\'t execute ' . $query . '<br>');
            return -1;
        }
        $res = parent::store_result();

        /* Nothing returned */
        if ($res == false)
            return null;

        return $res->fetch_all(MYSQLI_BOTH);
    } /* End of 'sqlQuery' function */

    /* Class constructor.
     * ARGUMENTS:
     *   host,
     *   username,
     *   password,
     *   name of database
     */
    public function __construct($host, $user, $passwd, $dbname) {
        $this->Connected = FALSE;
        parent::init();

        if (!parent::real_connect($host, $user, $passwd, $dbname))
            die('Ошибка подключения (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());

        $this->Connected = TRUE;
        $this->sqlQuery('USE ' . $dbname);
    } /* End of 'database' constructor */

    /* Insert row into table function.
     * ARGUMENTS:
     *   - table name:
     *       $tablename;
     *   - field tuple:
     *       $fields.
     */
    public function insertIntoTable( $tableName, $fields ) {
        if (!$this->Connected) {
            printf('Connect firstly!\n');
            return false;
        }
        $str = 'INSERT INTO ' . $tableName . ' VALUES ';

        $str = $str . '(';
        foreach ($fields as $row) {
            $str = $str . $row . ',';
        }
        $str[strlen($str) - 1] = ')';

        unset($row);
        unset($fields);

        return $this->sqlQuery($str) != -1;
    } /* End of 'insertIntoTable' function */

    /* Insert row into table function.
     * ARGUMENTS:
     *   - table name:
     *       $tablename;
     *   - field tuple:
     *       $fields.
     */
    public function insertManyIntoTable( $tableName, $fields ) {
        if (!$this->Connected) {
            printf('Connect firstly!\n');
            return;
        }
        $str = 'INSERT INTO ' . $tableName . ' VALUES ';

        foreach ($fields as $field) {
            $str = $str . '(';

            foreach ($field as $row) {
                $str = $str . $row . ',';
            }
            $str[strlen($str) - 1] = ')';
            $str = $str . ',';
        }
        $str = substr($str, 0, -1);

        unset($row);
        unset($field);
        unset($fields);

        $this->sqlQuery($str);
    } /* End of 'insertIntoTable' function */

    /* SELECT * FROM table query function.
     * ARGUMENTS:
     *   - table name:
     *       $tableName;
     * RETURNS:
     *   SELECT query result.
     */
    public function selectAllFromTable( $tableName ) {
        if (!$this->Connected) {
            printf('Connect firstly!\n');
            return NULL;
        }

        $str = 'SELECT * FROM ' . $tableName;
        return $this->sqlQuery($str);
    } /* End of 'selectAllFromTable' function */

    /* SELECT FROM table WHERE query function.
     * ARGUMENTS:
     *   - table name:
     *       $tableName;
     * RETURNS:
     *   SELECT query result.
     */
    public function selectWhatFromTableWhere( $tableName, $what, $cond ) {
        if (!$this->Connected) {
            printf('Connect firstly!\n');
            return NULL;
        }

        $str = 'SELECT ' . $what . ' FROM ' . $tableName . ' WHERE ' . $cond;
        return $this->sqlQuery($str);
    } /* End of 'selectAllFromTable' function */
} /* End of 'database' class */

?>
