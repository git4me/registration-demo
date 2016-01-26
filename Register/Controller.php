<?php namespace Register;

use Flight;

class Controller {
	
	public static function getRegister() {
		Flight::render('register', [], 'body_content');
		Flight::render('layout/layout');
	}
	
	public static function postRegister() {
		$validator = new Register\Validator([
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Text',
			'dob' => 'Date'
		]);
		if(!$validator->run()) {
			echo 'Error occured';
		}
	}
	
	private function test() {
		echo 'fish';
	}
}