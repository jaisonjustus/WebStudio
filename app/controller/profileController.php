<?php

/**
 * Description of profileController
 *
 * @author jaison.justus
 */
class profileController extends BaseController {

    public function styles($action) {
        if ($action == 'viewAction') {
            return array(
                'reset', 'applayout', 'blog'
            );
        }
    }

    public function indexAction() {
        echo 'index';
    }

    public function viewAction($args) {
        $this->loadArguments($args);
        $name = $this->param[0];
        $blogPostArrayForTemplate = array();

        $blogModel = new blogModel;
        $dataSet = $this->registry->blogModule->getBlogPosts($blogModel, '$userId = :id', array(':id' => '1'));
        foreach ($dataSet as $data) {
            array_push($blogPostArrayForTemplate, array("title" => $data->contentTitle, "desc" => $data->contentDesc));
        }
        
        

        $this->templater->loadStyles($this->styles(__FUNCTION__));
        $this->templater->initializeRender();

        $this->templater->brush->assign('name', $name);
        $this->templater->brush->assign('posts',$blogPostArrayForTemplate);
        $this->templater->brush->draw('profile');
    }

    public function loginAction() {

        if (HttpUtility::checkRequestMethod() == 1) {
            if ($_POST['username'] == 'jaison' and $_POST['password'] == '123') {
                HttpUtility::redirect('profiles/' . 'Jaison Justus Lawrence Periera');
            }
        }
        
        
        $this->templater->initializeRender();
        $this->templater->brush->assign('userName', HtmlUtility::textbox('username', '', 'username', '', 1, 'Username'));
        $this->templater->brush->assign('passWord', HtmlUtility::password('password', '', 'password', '', 1, 'Password'));
        $this->templater->brush->draw('login');
    }

}

?>
