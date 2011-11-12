<?php

/**
 * HttpUtility is a supporting library for handling the http response|request 
 * action inside the framework.
 * @author Jaison Justus
 * @version 1.0
 */
class HttpUtility {

    /**
     * check the method of request whether it is post or get. 
     * if the request method is post it will return 1, if its 
     * get it will return 2 else 0.
     * @access public
     * @return int  
     */
    public static function checkRequestMethod() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            return 1;
        } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
            return 2;
        } else {
            return 0;
        }
    }

    /**
     * this function will send http request to the supplied url.
     * url should in format controller/action.
     * eg: home/index
     * @access public
     * @param string $url 
     */
    public static function redirect($url) {
        header('Location: ' . __BASE_URL . $url);
    }

}

?>
