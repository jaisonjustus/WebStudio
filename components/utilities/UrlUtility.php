<?php

/**
 * Url Utility is a supporting library for managing the url mimicing
 * functionality of the framework.
 * @author Jaison Justus
 * @version 1.0
 */

class UrlUtility
{

    /**
     * static url patterns.
     * @var string
     * @access private
     * @static 
     */
    private static $urlPatterns;

    /**
     * this method accept the url configured array and set it to the url pattern
     * static variable.
     * @access public
     * @param array $urlRules 
     */
    public static function setUrlRules($urlRules)
    {
        self::$urlPatterns = $urlRules;
    }

    /**
     * this function accept user define url rule and validate it across the 
     * static variable. if the url patter is valid it will return the actual url
     * else it will return null.
     * @access public
     * @param string $urlPart
     * @return string|null 
     */
    public static function getUrlRule($urlPart)
    {
        //echo $urlPart;
        //var_dump(self::$urlPatterns);
        if (array_key_exists($urlPart, self::$urlPatterns))
        {
            return self::$urlPatterns[$urlPart];
        } else
        {
            return null;
        }
    }

}

?>
