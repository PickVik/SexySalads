<?php

class Admin extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function topics() {
//        $topics = $this->model->getAllTopics();
//        $this->view->render('admin/topics', $topics);
        $this->view->render('admin/index');
    }
    
//    public function comments() {
//        $comments = $this->model->getCommentsNeedingApproval();
//        $this->view->render('admin/commentsApprovalDashboard', $comments);
//    }
    
 
}


// /admin/topics
// /admin/comments

