<?php
class User {
	public $display_name;
	public $username;
	public $password;
	public $confirm; //we use the same model to fetch form data
	public $email;
	public $phone;
	
	public function __construct($a_name=NULL) {
		if ($a_name!==NULL) $this->set_name($a_name);
	}
	
	private function set_name($a_name) {
		$this->display_name = $a_name;
		$this->username = $a_name;
		$this->email = $a_name.'@nospam.org';
	}
}