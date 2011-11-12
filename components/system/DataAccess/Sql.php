<?php

/**
 * Description of Database
 *
 * @author jaisonjustus
 */
class Sql extends Database{

    protected $registry;

    function __construct($config, $registry) {
        $this->registry = $registry;
        $this->username = $config['DbUserName'];
        $this->password = $config['DbPassCode'];
        $this->hostname = $config['DbServerName'];
        $this->schema = $config['DbSchema'];

    }

    protected function connect() {
        $this->connectionString = mysql_connect($this->hostname, $this->username, $this->password);
        mysql_select_db($this->schema, $this->connectionString);
    }

    public function execute($sqlQuery) {
        $this->dbConnect();
        $data = mysql_query($sqlQuery, $this->connectionString);
        $this->dbDisconnect();

        return $data;
    }

    protected function disconnect() {
        $this->connectionString = null;
    }

}

?>
