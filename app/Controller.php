<?php namespace Register;

use Flight;

class Controller {
	
	/**
	 * Method for rendering the inital registration page
	 */
	public static function getRegister() {
		Flight::render('register', [], 'body_content');
		Flight::render('layout/layout');
	}
	
	/**
	 * Handle data that was POSTed to the register page
	 */
	public static function postRegister() {
		// Construct a Validator object to verify the input is correct
		$validator = new Validator(INPUT_POST, [
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Text',
			'dob' => 'Date'
		]);
		
		// Run the validation
		$result = $validator->run();
		if(!$result) {
			// Validation failed, show the registration page with errors
			Flight::render('register', [
				'errors' => $validator->getErrors()
			], 'body_content');
			Flight::render('layout/layout');
		} else {
			// Success, get the valid data back from the validator object
			$content = $validator->getFields();
			
			// Create a new user object
			$user = new User;
			$user->name = $content['name'];
			$user->email = $content['email'];
			$user->password = $content['password'];
			$user->dob = $content['dob'];
			
			// Save the user data
			$user->save();
			
			// Redirect to thank you page
			Flight::redirect('/thanks');
		}
	}
	
	/**
	 * Show a thank you page after registration is finished
	 */
	public static function getThanks() {
		Flight::render('thanks', [], 'body_content');
		Flight::render('layout/layout');
	}
}