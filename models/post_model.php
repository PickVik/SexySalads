<?php

class Post_Model extends Model {

    public $article_id;
    public $title;
    public $body;
    public $slug;
    public $image;
    public $user_id;
    public $date_created;
    public $last_updated;
    public $published;

    /*function __construct(){
        parent::__construct();
    }*/
    
    function __construct($article_id=0, $title=0, $body=0, $slug=0, $image=0, $user_id=0, $date_created=0, 
            $last_updated=0, $published=0) {
        parent::__construct();
        $this->article_id = $article_id;
        $this->title = $title;
        $this->body = $body;
        $this->slug = $slug;
        $this->image = $image;
        $this->user_id = $user_id;
        $this->date_created = $date_created;
        $this->last_updated = $last_updated;
        $this->published = $published;
        $this->topic = new Topic;
    }

    public function show_all() {
        $list = [];
        $req = $this->db->query('SELECT * FROM article');
        // we create a list of article objects from the database results
        foreach ($req->fetchAll() as $article) {
            $list[] = new Post_Model($article['article_id'], $article['title'], $article['body'],$article['slug'],
                    $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        }
        return $list;
    }

    //for sidebar ajax search
    public function searcharticles($search_term) {
        $list = [];
        $req = $this->db->query("SELECT * FROM article WHERE title LIKE '%$search_term%' OR body LIKE '%$search_term%'");
        foreach ($req->fetchAll() as $article) {
            $list[] = new Post_Model($article['article_id'], $article['title'], $article['body'],$article['slug'],
                    $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        }
        return $list;
    }
    
    public function find_article($article_id) {
        
        //use intval to make sure $id is an integer
        $article_id = intval($article_id);
        $req = $this->db->prepare('SELECT * FROM article WHERE article_id = :article_id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('article_id' => $article_id));
        $article = $req->fetch();
        if ($article) {
            return new Post_model($article['article_id'], $article['title'], $article['body'],$article['slug'],
                    $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
        
    }

    public function update($article_id, $title, $body) {
      
        $req = $this->db->prepare("UPDATE article set title=:title, body=:body where article_id=:article_id");
        $req->bindParam(':article_id', $article_id);
        $req->bindParam(':title', $title);
        $req->bindParam(':body', $body);


        $req->execute();

    }

    //$article_id, $title, $body, $slug, $image, $user_id, $date_created,$last_updated, $published

    public function add_article($title, $body, $slug, $image, $user_id, $topic_id){
        
        $req = $this->db->prepare("INSERT into article(title, body, slug, 
                            image, user_id) 
                            VALUES (:title, :body, :slug, 
                            :image, :user_id)");
       
        $req->bindParam(':title', $title);
        $req->bindParam(':body', $body);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':image', $image);
        $req->bindParam(':user_id', $user_id);
         
        $req->execute();
        
        
        $article_id = $this->db->lastInsertId();
        
        $req1 = $this->db->prepare("INSERT into article_topic(article_id, topic_id)
                                   VALUES(:article_id, :topic_id)");
                
        $req1->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $req1->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);
         
        $stm = $req1->execute();
        if(!$stm){
            print_r($this->db->errorInfo());
        }
        
        
        
       
    }
        
        /*
// set parameters and execute
        if (isset($_POST['name']) && $_POST['name'] != "") {
            $filteredName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['price']) && $_POST['price'] != "") {
            $filteredPrice = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $name = $filteredName;
        $price = $filteredPrice;
        $req->execute();

//upload product image
        Product::uploadFile($name);
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $name) {

        if (empty($_FILES[self::InputKey])) {
            //die("File Missing!");
            trigger_error("File Missing!");
        }

        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
        }


        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }

        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "C:/xampp/htdocs/MVC_Skeleton/views/images/";
        $destinationFile = $path . $name . '.jpeg';

        if (!move_uploaded_file($tempFile, $destinationFile)) {
            trigger_error("Handle Error");
        }

        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }
    }

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM product WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }*/

}

class Topic extends Model {
    
    public $topic_id;
    public $topic_name;

    function __construct($topic_id=0, $topic_name=0) {
        parent::__construct();
        $this->topic_id = $topic_id;
        $this->topic_name = $topic_name;
        
    }
    
    
    
    function get_all_topic(){
        $list = [];
        $req = $this->db->query('SELECT * FROM topic');
        // we create a list of article objects from the database results
        foreach ($req->fetchAll() as $topic) {
            $list[] = new Topic($topic['topic_id'], $topic['topic_name']);
        }
        return $list;
        
    }

}