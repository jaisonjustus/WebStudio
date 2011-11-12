<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author jaisonjustus
 */
abstract class Database {

    private $connectionString;
    private $username;
    private $password;
    private $hostname;
    private $schema;

    abstract protected function connect();

    abstract protected function disconnect();

    public function execute() {
        return TRUE;
    }
    
    private function sqlCommands()   {
        return array('=','!=','AND','OR','LIKE','ORDER BY',);
    }

}

?>
