<?php

/**
 * Orm class help to connect the database and map the details to object using the
 * concept Object Relation Mapping. This class is extended from the base Database 
 * class. This class wraps the basic redbean methods to the extend easy access.
 *  
 * @version 1.0
 * @author jaisonjustus
 */
class Orm extends Database {

    /**
     * Hold the registry object to access other registered core and supporting 
     * objects.
     * @var object $registry 
     */
    protected $registry;

    /**
     * Register the Orm object to the registry and intialize the database 
     * configurations.
     * @param array $config
     * @param object $registry 
     */
    function __construct($config, $registry) {
        $this->registry = $registry;
        $this->username = $config['DbUserName'];
        $this->password = $config['DbPassCode'];
        $this->hostname = $config['DbServerName'];
        $this->schema = $config['DbSchema'];
    }

    /**
     * Intialize the RedBean Object and establish connection with the database.
     * @access proteced
     * @return object RedBean Facaded Helper Object.
     */
    protected function connect() {
        $this->connectionString = R::setup('mysql:host=' . $this->hostname . ';dbname=' . $this->schema, $this->username, $this->password);
        return $this->connectionString;
    }

    /**
     * Deintialize the connection.
     * @access protected
     */
    protected function disconnect() {
        $this->connectionString = null;
    }

    protected function condParser($model, $condition, $parameters) {
        $condBreakUp = explode(' ', $condition);
        for ($i = 0; $i < count($condBreakUp); $i++) {
            if ($condBreakUp[$i][0] == '$') {
                $attribute = trim($condBreakUp[$i], '$');
                foreach ($model->attributes() as $key => $param) {
                    if ($key == $attribute) {
                        $condBreakUp[$i] = $param;
                    }
                }
            }
        }

        return implode(' ', $condBreakUp);
    }

    /**
     * Save the Data to te database.
     * @access public
     * @param object $model 
     */
    public function save($model) {
        $this->connect();

        $bean = R::dispense($model->tableName);

        foreach ($model->attributes() as $key => $param) {
            if ($param != 'id') {
                $bean->$param = $model->$key;
            }
        }

        R::store($bean);

        $this->disconnect();
    }

    /**
     * Find the record from the database table using the primary key.
     * @param object $model
     * @param int $primaryKey
     * @return object $model 
     */
    public function findByPk($model, $primaryKey) {
        $this->connect();

        $bean = R::load($model->tableName, $primaryKey);

        foreach ($model->attributes() as $key => $param) {
            $model->$key = $bean->$param;
        }

        $this->disconnect();

        return $model;
    }

    public function findByCond($model, $condition, $parameters = array()) {
        $dataSet = array();
        $this->connect();

        $beans = R::find($model->tableName, $this->condParser($model, $condition, $parameters), $parameters);

        foreach ($beans as $bean) {
            $blogObj = new blogModel;
            foreach ($model->attributes() as $key => $param) {
                $blogObj->$key = $bean->$param;
            }
            array_push($dataSet, $blogObj);
            unset($blogObj);
        }

        $this->disconnect();
        return $dataSet;
    }

}

?>
