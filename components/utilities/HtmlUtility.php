<?php

/**
 * HtmlUtility is a supporting library for the framework which handles all the
 * html tag genreation for the view.
 * @author Jaison Justus
 * @version 1.0
 */
class HtmlUtility {

    /**
     * this function provides a anchor tag using the supplied parameters.
     * @access public
     * @param string $anchorText
     * @param string $url
     * @param string $target
     * @return string 
     */
    public static function link($anchorText, $url = '#', $target='') {
        return '<a href="' . __BASE_URL . $url . '" targer="' . $target . '">' . $anchorText . '</a>';
    }

    /**
     * this function provides a menu listing using the supplied parameters.
     * the menu structure : <ol><li><a></li><ol>.
     * @access public
     * @param array $menus
     * @return string 
     */
    public static function navigation($menus) {
        $htmlOutput = '<ol>';
        foreach ($menus as $menu) {
            $htmlOutput .= '<li>' . self::link($menu['label'], $menu['url']) . '</li>';
        }
        $htmlOutput .= '</ol>';

        return $htmlOutput;
    }

    /**
     * this function provides a image tag using the supplied parameters.
     * @access public
     * @param string $imageUrl
     * @param string $altText
     * @return string 
     */
    public static function image($imageUrl, $altText) {
        return '<img src="' . __BASE_URL . $imageUrl . '" alt="' . $altText . '"/>';
    }

    /**
     * this method provides a form.
     * @access public
     * @param string $id
     * @param string $name
     * @param string $class
     * @param string $method
     * @param string $action
     * @param array $contents
     * @return string 
     */
    public static function form($id,$name,$class,$method = 'POST',$action,$contents) {
        $htmlOutput = '<form id="'.$id.'" class="'.$class.'" action="'.__BASE_URL.$action.'" method="'.strtoupper($method).'">';
        
        foreach($contents as $content)   {
            $htmlOutput .= $content;
        }
        
        $htmlOutput .= '</form>';
        
        return $htmlOutput;
    }
    
    /**
     * this function provides a label for the supplied arguments.
     * @access public
     * @param string $name
     * @param string $labelName
     * @return string  
     */
    public static function label($name,$labelName)  {
        return '<label for="'.$name.'">'.$labelName.'</label>';
    }

    /**
     * this function provides a textbox with optional label.
     * @access public
     * @param string $id
     * @param string $class
     * @param string $name
     * @param string $value
     * @param int $label
     * @param string $labelName
     * @return string 
     */
    public static function textbox($id='',$class='',$name='',$value='',$label=0,$labelName='')    {
        $htmlOutput = '';
        if($label == 1)    {
            $htmlOutput .= '<label for="'.$name.'">'.$labelName.'</label>';
        }
        $htmlOutput .= '<input type="text" id="'.$id.'" class="'.$class.'" name="'.$name.'" value="'.$value.'" />';
        
        return $htmlOutput;
    }
    
    /**
     * this function provides a textarea for te supplied arguments.
     * @access public
     * @param string $id
     * @param string $class
     * @param string $name
     * @return string 
     */
    public static function textarea($id='',$class='',$name='')   {
        return '<textarea id="'.$id.'" class="'.$class.'" name="'.$name.'"></textarea>';
    }

    /**
     * this function provides a password field with optional label.
     * @access public
     * @param string $id
     * @param string $class
     * @param string $name
     * @param string $value
     * @param int $label
     * @param string $labelName
     * @return string 
     */
    public static function password($id='',$class='',$name='',$value='',$label=0,$labelName='')   {
        $htmlOutput = '';
        if($label == 1)    {
            $htmlOutput .= '<label for="'.$name.'">'.$labelName.'</label>';
        }
        $htmlOutput .= '<input type="password" id="'.$id.'" class="'.$class.'" name="'.$name.'" value="'.$value.'" />';
        
        return $htmlOutput;
    }
    
    /**
     * this function provides a button depending on the type parameter 
     * 0: Normal Button | 1: Submit Button.
     * @access public
     * @param int $type
     * @param string $id
     * @param string $class
     * @param string $name
     * @param string $value
     * @param string $url
     * @return string 
     */
    public static function button($type=0,$id='',$class='',$name='',$value='',$url='') {
        $htmlOutput = '';
        if($type == 0)  {
            $htmlOutput .= '<input type="button" onclick="'.$url.'" ';
        }
        else if($type == 1)    {
            $htmlOutput .= '<input type="submit" ';
        }
        else    {
            $htmlOutput .= '<input type="button" onclick="'.$url.'" ';
        }
        
        $htmlOutput .= 'id="'.$id.'" name="'.$name.'" class="'.$class.'" value="'.$value.'" />';
        return $htmlOutput;
    }


    /**
     * this function provides a div.
     * @access public
     * @param string $id
     * @param string $class
     * @param array $contents
     * @return string 
     */
    public static function div($id='',$class='',$contents)    {
        $htmlOutput = '<div id="'.$id.'" class="'.$class.'">';
        
        foreach($contents as $content)   {
            $htmlOutput .= $content;
        }
        
        $htmlOutput .= '</div>';
        
        return $htmlOutput;
    }
    
    /**
     * this function provides a span.
     * @access public
     * @param string $id
     * @param string $class
     * @param array $contents
     * @return string 
     */
    public static function span($id='',$class='',$contents)    {
        $htmlOutput = '<div id="'.$id.'" class="'.$class.'">';
        
        foreach($contents as $content)   {
            $htmlOutput .= $content;
        }
        
        $htmlOutput .= '</div>';
        
        return $htmlOutput;
    }
    

}

?>
