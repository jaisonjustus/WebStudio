<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author jaisonjustus
 */
abstract class BaseController {

    protected $registry;
    protected $param = array();
    protected $templater;
    
    //protected $entityManager;


    function __construct($registry) {
        $this->registry = $registry;
        $this->templater = $this->registry->template;
        //$this->entityManager = $this->registry->em;
    }

    abstract function indexAction();
    
    abstract function styles($action);


    function loadArguments($args)    {
        for($i = 0; $i < count($args);$i++) {
            array_push($this->param, $args[$i]);
        }
        
    }
}

?>
