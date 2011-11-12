<?php

/**
 * Description of blogModel
 *
 * @author jaisonjustus
 */
class blogModel implements IModel {

    public $tableName = 'user_blog';

    public $id;
    
    public $userId;
    
    public $contentTitle;
    
    public $contentTag;
    
    public $contentDesc;
    
    public $content;
    
    
    
    public function attributes() {
        
        return array(
            'Id' => 'id',
            'userId' => 'user_id',
            'contentTitle' => 'title',
            'contentTag' => 'tags',
            'contentDesc' => 'desc',
            'content' => 'content',
        );
        
    }

}

?>
