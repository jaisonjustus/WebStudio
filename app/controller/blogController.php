<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blogController
 *
 * @author jaisonjustus
 */
class blogController extends BaseController {

    public function styles($action) {
        if ($action == 'createAction') {
            return array(
                'reset', 'applayout', 'blog'
            );
        }
    }

    public function indexAction() {
        
    }

    public function createAction()  {
        $name = 'jaison';
        
        
        $this->templater->loadStyles($this->styles(__FUNCTION__));
        $this->templater->initializeRender();
        $this->templater->loadStyles($this->styles(__FUNCTION__));
        $this->templater->initializeRender();

        $this->templater->brush->assign('name', $name);
        $this->templater->brush->assign('blogform', $this->registry->blogModule->createBlogForm());
        $this->templater->brush->draw('blog');
    }
    
    public function saveAction() {
        if (HttpUtility::checkRequestMethod() == 1) {
            if (isset($_POST['blog']['save'])) {

                $blogModel = new blogModel;

                $blogModel->userId = '1';
                $blogModel->contentTitle = $_POST['blog']['title'];
                $blogModel->contentTag = $_POST['blog']['tag'];
                $blogModel->contentDesc = $_POST['blog']['desc'];
                $blogModel->content = htmlspecialchars($_POST['blog']['editor']);

                $this->registry->blogModule->saveBlogPost($blogModel);
                HttpUtility::redirect('profiles/jaison');
            } else if (isset($_POST['blog']['savePub'])) {
                echo 'save and publish: ' . $_POST['blog']['title'];

                $blogModel = new blogModel;
                //$blogModel = $this->registry->orm->findByPk($blogModel, '2');
                $dataSet = $this->registry->orm->findByCond($blogModel, '$contentTitle = :title', array(':title' => 'IPH'));
                foreach ($dataSet as $data) {
                    echo $data->userId . '<br/>';
                    echo html_entity_decode($data->content) . '<br/>';
                    echo '<hr/>';
                }
            }
        }
    }

}

?>
