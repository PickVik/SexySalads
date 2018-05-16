<?php

class Index_Model extends Model {

    public function __construct()
	{
		parent::__construct();
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

    public function getAllTopics()
{
	
	$sql = "SELECT * FROM topics";
	$stmt = $this->db->prepare($sql);
        $stmt->execute();     
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topics;
}
        

        function getPostTopic($post_id){
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
}

        function getPost($slug){
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published==1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

        function getPublishedPostsByTopic($topic_id) {
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

        function getTopicNameById($id)
{
	$sql = "SELECT name FROM topics WHERE id=$id";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic['name'];
}
}