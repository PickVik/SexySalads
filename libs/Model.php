<?php

class Model {

    function __construct() {
        $this->db = new Database;
    }
    
     public function getAllTopics()
{
	
	$sql = "SELECT * FROM topics";
	$stmt = $this->db->prepare($sql);
        $stmt->execute();     
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topics;
}

    public function getPublishedPosts() {
	
	$sql = "SELECT * FROM posts WHERE published=true";
	$stmt = $this->db->prepare($sql);
        $stmt->execute();     
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $posts;
        
        $final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;

        }
}
