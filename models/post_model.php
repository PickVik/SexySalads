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

   
    // construct and added topic at the end
    
    function __construct($article_id = 0, $title = 0, $body = 0, $slug = 0, $image = 0, $user_id = 0, $date_created = 0, $last_updated = 0, $published = 0) {
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
    
    //shows and lists all articles from database
    
    public function show_all() {
        $list = [];
        $req = $this->db->query('SELECT * FROM article');
        // we create a list of article objects from the database results
        foreach ($req->fetchAll() as $article) {
            $list[] = new Post_Model($article['article_id'], $article['title'], $article['body'], $article['slug'], $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        }
        return $list;
    }

    //for sidebar ajax search
    public function searcharticles($search_term) {
        $list = [];
        $req = $this->db->query("SELECT *                
                                FROM article 
                                LEFT JOIN article_topic ON article.article_id = article_topic.article_id
                                LEFT JOIN topic ON article_topic.topic_id = topic.topic_id
                                WHERE (title LIKE '%$search_term%' or topic_name LIKE '%$search_term%') 
                                AND published = 1");

        foreach ($req->fetchAll() as $article) {
            $list[] = new Post_Model($article['article_id'], $article['title'], $article['body'], $article['slug'], $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        }
        return $list;
    }
    
    
    //finds article on click based on article_id
    // show everything in article 
    // called in when opening an article for edit (open_edit)

    public function find_article($article_id) {

        //used intval to make sure $article_id is an integer
        $article_id = intval($article_id);
        $req = $this->db->prepare('SELECT * FROM article WHERE article_id = :article_id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('article_id' => $article_id));
        $article = $req->fetch();
        if ($article) {
            return new Post_model($article['article_id'], $article['title'], $article['body'], $article['slug'], $article['image'], $article['user_id'], $article['date_created'], $article['last_updated'], $article['published']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
    }


     

    
    
    //Updates title and body
    
    // NEED TO BE UPDATED - MISSING: PUBLISHED, IMAGE UPLOAD, USER, TOPIC
    
    public function update($article_id, $title, $body, $slug, $image, $published ) {


        $req = $this->db->prepare("UPDATE article set title=:title, body=:body, slug=:slug, image=:image, published=:published  where article_id=:article_id");
        $req->bindParam(':article_id', $article_id);
        $req->bindParam(':title', $title);
        $req->bindParam(':body', $body);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':image', $image);
        $req->bindParam(':published', $published,PDO::PARAM_INT);
        $req->execute();
    }

    
    //adds article into database - getting information by controller (data comes from view)
    //fetches last inserted article_id and couples it up with topic then inserts it in linking table
    

    public function add_article($title, $body, $slug, $image, $user_id, $topic_id, $published) {

        $req = $this->db->prepare("INSERT into article(title, body, slug, 
                                  image, user_id, published) 
                                  VALUES (:title, :body, :slug, 
                                  :image, :user_id, :published)");

        $req->bindParam(':title', $title);
        $req->bindParam(':body', $body);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':image', $image);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':published', $published,PDO::PARAM_INT);

        $req->execute();


        $article_id = $this->db->lastInsertId();

        $req1 = $this->db->prepare("INSERT into article_topic(article_id, topic_id)
                                   VALUES(:article_id, :topic_id)");

        $req1->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $req1->bindParam(':topic_id', $topic_id, PDO::PARAM_INT);

        $stm = $req1->execute();
        if (!$stm) {
            print_r($this->db->errorInfo());
        }
        
        
    }


    // deletes article from database - called from post::delete
    // on click it deletes data from database based on article_id
    
    public function delete($article_id) {

        $req = $this->db->prepare('DELETE FROM article WHERE article_id = :article_id');
        $req->bindParam(':article_id', $article_id);
        $req->execute(array('article_id' => $article_id));
    }

}


// TOPIC CLASS FOR article_topic LINKING TABLE

class Topic extends Model {

    public $topic_id;
    public $topic_name;

    function __construct($topic_id = 0, $topic_name = 0) {
        parent::__construct();
        $this->topic_id = $topic_id;
        $this->topic_name = $topic_name;
    }

     // gets all topic 
    // called in for newarticle view
    // lists all topic in the dropdown
    
    function get_all_topic() {
        $list = [];
        $req = $this->db->query('SELECT * FROM topic');
        // we create a list of article objects from the database results
        foreach ($req->fetchAll() as $topic) {
            $list[] = new Topic($topic['topic_id'], $topic['topic_name']);
        }
        return $list;
    }

}
