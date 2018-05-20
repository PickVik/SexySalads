<?php

class Single_Post extends Controller {

    function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        $this->view->render('single_post/index');
    }
    function getPostTopic($post_id){
	$sql = "SELECT * FROM topics WHERE topic_id=
			(SELECT topic_id FROM article_topic WHERE article_id=$post_id) LIMIT 1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
        }
        
    function getPost($post_slug){
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM article WHERE slug='$post_slug'";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $post = $post[0];
        
        return $post;
        
        
        
	
	//if ($post) {
		// get the topic to which this post belongs
//		$post['topic'] = getPostTopic($post['id']);
//	}
	//return $post;
}
}

