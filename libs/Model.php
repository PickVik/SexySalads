<?php

class Model {

    function __construct() {
        $this->db = new Database;
    }
    
     public function getAllTopics()
{
	
	$sql = "SELECT * FROM topic";
	$stmt = $this->db->prepare($sql);
        $stmt->execute();     
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topics;
}

    public function getPublishedPosts() {
	
	$sql = "SELECT * FROM article WHERE published=true";
	$stmt = $this->db->prepare($sql);
        $stmt->execute();     
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $posts;
        
        $final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['topic_id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;

        }
        
        public function getPost($slug){
	// Get single post slug
	$slug = $_GET['post-slug'];
	$sql = "SELECT * FROM article WHERE slug='$slug'";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($post);
        $post = $post[0];
        
        return $post;
}
}