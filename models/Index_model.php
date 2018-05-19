<?php

class Index_Model extends Model {

    public function __construct()
	{
		parent::__construct();
	}
        
   
        function getPostTopic($post_id){
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic;
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
	$sql = "SELECT topic_name FROM topic WHERE topic_id=$id";
	$stmt = $this->db->prepare($sql);
        $stmt->execute(); 
	$topic = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $topic[0]['topic_name'];
//        return $topic;
}
}