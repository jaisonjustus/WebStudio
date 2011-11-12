<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registry
 *
 * @author jaisonjustus
 */


class Registry {
    
    private $vars = array();
    
    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }
    
    public function __get($index) {
        return $this->vars[$index];
    }
    
}

?>
