<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blogModule
 *
 * @author jaisonjustus
 */
class blogModule {
    
    function __construct($registry) {
        $this->registry = $registry;
    }

    /**
     * @access public
     * @return HTML String 
     */
    public function createBlogForm() {
        $mainContent = array();
        
        $subContent = array(
            HtmlUtility::label('blog[title]', 'Blog Title'),
            HtmlUtility::span('', 'label-message-black', array('* Please enter a good meaningful and attractive title for you blog post.')),
            HtmlUtility::textbox('blog[title]', '', 'blog[title]', '', 0));

        array_push($mainContent, HtmlUtility::div('', 'blog-component-holder', $subContent));

        $subContent = array(
            HtmlUtility::label('blog[tag]', 'Tags'),
            HtmlUtility::span('', 'label-message-black', array('* Please enter tags seperated by ', ' related to your post. It will help the informations seekers during search.')),
            HtmlUtility::textbox('blog[tag]', '', 'blog[tag]', '', 0));
        
        array_push($mainContent, HtmlUtility::div('', 'blog-component-holder',$subContent));
        
        $subContent = array(
            HtmlUtility::label('blog[desc]', 'Desc'),
            HtmlUtility::span('', 'label-message-black', array('* Please enter a sort brief description about the post ')),
            HtmlUtility::textbox('blog[desc]', '', 'blog[desc]', '', 0));
        
        array_push($mainContent, HtmlUtility::div('', 'blog-component-holder',$subContent));
        
        $subContent = array(
            HtmlUtility::textarea('blog[editor]','', 'blog[editor]'));
        
        array_push($mainContent, HtmlUtility::div('', 'blog-component-holder',$subContent));
        
        $subContent = array(
            HtmlUtility::button(1, 'blog[save]', 'button', 'blog[save]', 'Save Post'),
            HtmlUtility::button(1, 'blog[savePub]', 'button', 'blog[savePub]', 'Save & Publish Post')
        );

        array_push($mainContent, HtmlUtility::div('', 'blog-component-holder', $subContent));
        
        return HtmlUtility::form('blog', 'blog','','POST','blog/save',array(HtmlUtility::div('blog','',$mainContent)));
    }

    /**
     *
     * @access public
     * @param object $blogModel
     */
    public function saveBlogPost($blogModel) {
        $this->registry->orm->save($blogModel);
    }

    /**
     *
     * @access public
     * @param int $userId
     * @param int $limit 
     * @return array of objects  
     */
    public function getBlogPosts($blogModel,$condition,$parameters,$limit = 0) {
        if($limit != 0) {
            $condition .= ' LIMIT '.$limit;
        }
        return $this->registry->orm->findByCond($blogModel, $condition, $parameters);
    }

    /**
     *
     * @access public
     * @param int $userId
     * @param int $postId 
     */
    public function deleteBlogPost($userId, $postId) {
        
    }

    /**
     *
     * @access public
     * @param int $userId
     * @param int $postId
     * @param array $content 
     */
    public function updateBlogPost($userId, $postId, $content) {
        
    }

}

?>
