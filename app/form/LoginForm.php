<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginForm
 *
 * @author jaisonjustus
 */
class LoginForm extends FormManager{
    
    private $userName;
    private $passCode;
    //private $property = array();
    
    public function __construct($userName = '',$passcode = '') {
        $this->userName = $userName;
        $this->passCode = $passcode;
        
    }
    
    public function test()  {
        echo 'loginform';
    }

    public function elementProperty() {
        
    }
}

?>
