<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of homeController
 *
 * @author jaison.justus
 */
class homeController extends BaseController
{

    public function indexAction()
    {
        echo HtmlUtility::link('User Login', 'profile/login');
    }

    public function styles($action) {
        
    }

}

?>
