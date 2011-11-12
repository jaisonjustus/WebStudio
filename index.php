<?php

/**
 * Intialiaing the Micro Network System
 */
define('__SITE_PATH', realpath(dirname(__FILE__)));
include __SITE_PATH . '/components/system/System/System.php';

/**
 * Intialing and registering Primary Controller Objects
 */
$registry->router = new Router($registry);
$registry->template = new Template($registry);

/**
 * loading router to parse the url
 */
$registry->router->setPath(__SITE_PATH . '/app/controller');
$registry->router->loader();

?>
