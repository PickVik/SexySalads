<?php
// import the db config
require '../config/database.php';

// import the database class (used in Model)
require '../libs/Database.php';

// import the model class (used in Index_model)
require '../libs/Model.php';

// import the TopicModel
require 'Index_model.php';

// create an instance of TopicModel 
$topic = new Index_model();

// run method (function) on topic instance and assign to new variable (result)
$result = $topic->getTopicNameById(4);


print_r($result);




