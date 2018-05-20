<?php

class Filtered_Posts extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
    $this->view->render('filtered_posts/index');}
        
        function getPostTopic($article_id){
	$sql = "SELECT * FROM topic WHERE id=
			(SELECT topic_id FROM article_topic WHERE article_id=$article_id) LIMIT 1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
        }
    
        function getPublishedPostsByTopic($topic_id) {
	$sql = "SELECT * FROM article ps 
			WHERE ps.id IN 
			(SELECT pt.article_id FROM article_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.article_id 
				HAVING COUNT(1) = 1)";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = $this->getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
        }

        function getTopicNameById($id)
        {
	$sql = "SELECT name FROM topics WHERE topic_id=$id";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $t = $topic[0];
        return $t['name'];
        
        }
        
       

        
}