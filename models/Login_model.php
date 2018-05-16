<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$sql = "SELECT id FROM users WHERE username = :username AND password = :password";
		$stmt = $this->db->prepare($sql);
                $stmt->execute(array(
			':username' => $_POST['username'],
			':password' => $_POST['password']
		));
		
		//$data = $stmt->fetchAll();
		
		$count =  $stmt->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			header('location: ../dashboard');
		} else {
			header('location: ../login');
		}
		
	}
	
}
