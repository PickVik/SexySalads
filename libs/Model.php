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
}
