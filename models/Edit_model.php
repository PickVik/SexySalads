<?php

class Edit_model extends Model{

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
        
    }
    
    public function update($article_id, $title, $slug, $body, $image, $published) {
        $sql = "UPDATE article SET title=:title, slug=:slug, body=:body, image=:image, published=:published WHERE article_id=:article_id";
        $req = $this->db->prepare($sql);
        $req->bindParam(':article_id', $article_id);
        $req->bindParam(':title', $title);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':body', $body);
        $req->bindParam(':image', $image);
        $req->bindParam(':published', $published);


        $req->execute();
        echo $req->rowCount() . " records UPDATED successfully";
    }

    }


