<?php

class Filtered_Posts_Model extends Model {

    public function __construct()
	{
		parent::__construct();
	}
    
        function getPost($slug){
	// Get single post slug
	$post_slug = $_GET['article-slug'];
	$sql = "SELECT * FROM articles WHERE slug='$article_slug' AND published==1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['article_id']);
	}
	return $post;
} 


        function getPublishedPostsByTopic($topic_id) {
	$sql = "SELECT `article`.*, `topic`.`topic_id` FROM `topic` 
                LEFT JOIN `article_topic` ON `article_topic`.`topic_id` = `topic`.`topic_id` 
                LEFT JOIN `article` ON `article_topic`.`article_id` = `article`.`article_id` 
                WHERE ((`article`.`published` ='1') AND (`topic`.`topic_id` ='$topic_id'))";
            
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = $this->getPostTopic($post['article_id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
        }
        
        function getTopicNameById($id)
        {
	$sql = "SELECT topic_name FROM topic WHERE topic_id=$id";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($topic);
        $t = $topic[0];
        return $t['topic_name'];
        
        }



        function getPostTopic($article_id){
	$sql = "SELECT * FROM topic WHERE article_id=
			(SELECT topic_id FROM article_topic WHERE article_id=$article_id) LIMIT 1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
        }
    
}