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
            $sql = "SELECT topics . name, articles . *
                    FROM topics
                    LEFT JOIN article_topic ON post_topic . topic_id = topics . id
                    LEFT JOIN article ON article_topic . article_id = articles . id
    ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(); 
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['article_id']); 
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