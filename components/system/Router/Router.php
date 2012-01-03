<?php

/**
 * Router handles the parsing and loading of the action from the controller. Router 
 * take the parameter(controller/action) from the url.
 *
 * @author Jaison Justus
 * @version 0.1
 * @package Router
 */

class Router {

    /*
     * Variable to handle the registry object.
     * 
     * @access private
     * @var RegistryObject 
     */
    private $registry;
    
    /**
     * Variable to andle the url.
     * 
     * @access private
     * @var string 
     */
    private $path;
    
    /**
     * 
     */
    private $args = array();
    public $file;
    public $controller;
    public $action;
    public $template;

    /**
     *
     * @param RegistryObject $registry 
     */
    function __construct($registry) {
        $this->registry = $registry;
        $this->template = new RainTPL;
    }

    /**
     * @author Jaison Justus
     * @version 0.1
     * 
     * @access public
     * @param string $path 
     */
    public function setPath($path) {
        $this->path = $path;
    }

    /**
     * @author Jaison Justus
     * @version 0.1
     * 
     * @access public
     */
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

    /**
     * @author Jaison Justus
     * @version 0.1
     * 
     * @access public
     */
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
