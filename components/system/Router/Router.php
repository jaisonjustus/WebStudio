<?php

/**
 * Description of Router
 *
 * @author Jaison Justus
 * @version 1.0
 */

class Router {

    private $registry;
    private $path;
    private $args = array();
    public $file;
    public $controller;
    public $action;
    public $template;

    function __construct($registry) {
        $this->registry = $registry;
        $this->template = new RainTPL;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function loader() {
        $this->getController();

        if (is_readable($this->file) == false)  { 
            $this->template->assign('site',__BASE_URL);
            $this->template->draw('error');
        } 
        else {

            include $this->file;

            $class = $this->controller;
            $controller = new $class($this->registry);

            if (is_callable(array($controller, $this->action)) == false) {
                $action = 'indexAction';
            } else {
                $action = $this->action;
            }
            if (empty($this->args)) {
                $reflect = new ReflectionClass($controller);
                 if($reflect->getMethod($action)->getNumberOfParameters() != 0) {
                     $controller->$action(' ');
                 }
                 else   {
                    $controller->$action();
                 }
            }
            else    {
                $controller->$action($this->args);
            }
        }
    }

    private function getController() {
        $route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

        if (empty($route)) {
            $route = 'index';
        } else {
            $parts = explode('/', $route);
            $partsCount = sizeof($parts);
            
            $newRoute = UrlUtility::getUrlRule($parts[0]);
            if($newRoute != null)   {
                $route = $newRoute;
                
                for($i = 1;$i < $partsCount;$i++)   {
                    $route .= '/' . $parts[$i];
                }

                $parts = explode('/', $route);
                $partsCount = sizeof($parts);
                
            }
            
            if(isset($parts[0]))    {
                $this->controller = $parts[0].'Controller';
            }
            
            if (isset($parts[1])) {
                $this->action = $parts[1] . 'Action';
            }

            $parts = array_slice($parts, 2);
            if ($partsCount > 2) {
                foreach ($parts as $part) {
                    array_push($this->args, $part);
                }
            }
        }

        if (empty($this->controller)) {
            $this->controller = __HOME_CONTROLLER;
        }

        if (empty($this->action)) {
            $this->action = 'indexAction';
        }

        $this->file = $this->path . '/' . $this->controller . '.php';
    }
    
}

?>
