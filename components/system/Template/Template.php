<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author jaisonjustus
 */
class Template {

    private $registry;
    private $stylePath;
    private $scriptPath;
    
    public $brush;

    /**
     *
     * @param Registry $registry 
     */
    public function __construct($registry) {
        $this->registry = $registry;
        raintpl::configure("base_url", null);
        raintpl::configure("tpl_dir", __SITE_PATH . '/app/view/');
        raintpl::configure("cache_dir", __SITE_PATH . '/app/view_tmp/');
        raintpl::configure( 'path_replace_list', array( 'img', 'link', 'script','href' ) );
        
        $this->brush = new RainTPL();
        
        $this->stylePath = __STYLES;
        $this->scriptPath = __SCRIPTS;
        
    }
    
    public function initializeRender()    {
        $this->brush->assign('site',__BASE_URL);
    }
    
    public function loadStyles($styles) {
        $styleArray = array();
        
        foreach($styles as $style)   {
            array_push($styleArray, $this->stylePath.$style.'.css');
        }
        
        $this->brush->assign('styles',$styleArray);
    }
    
    public function loadScript($scripts) {
        $scriptArray = array();
        
        foreach($scripts as $script)   {
            array_push($scriptArray, $this->scriptPath.$script.'.js');
        }
        
        $this->brush->assign('scripts',$scriptArray);
    }

}

?>
