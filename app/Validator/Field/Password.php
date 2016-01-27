<?php namespace Register\Validator\Field;

use Register\Validator\Field;

class Password extends Field {
	
	/**
	 * Stores an array of blacklisted passwords
	 * @var array
	 */
	private $passwordBlacklist;
	
	/**
	 * Validate that:
	 * - password was supplied
	 * - password isn't blacklisted
	 * - password matches the confirmation
	 * @return boolean
	 */
	public function validate() {
		$this->loadPasswordBlacklist();
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_SANITIZE_STRING);
		
		// Check the password is longer than 1 character (no other rules specified)
		if(strlen($this->fieldContent) < 1) {
			$this->errors[] = 'Password must be supplied';
			return false;
		}
		
		// Check the blacklist array to see if the password is banned
		if(in_array($this->fieldContent, $this->passwordBlacklist)) {
			$this->errors[] = 'Password is blacklisted';
			return false;
		}
		
		// Check the _confirm field for the password to see if it matches
		$confirmFieldContent = filter_input($this->inputMethod, $this->field . '_confirm', FILTER_SANITIZE_STRING);
		if($this->fieldContent != $confirmFieldContent) {
			$this->errors[] = 'Passwords do not match';
			return false;
		}
		
		return true;
	}
	
	/**
	 * Loads the password blacklist into the object
	 * @return void
	 */
	private function loadPasswordBlacklist() {
		$blacklistContents = file_get_contents(APP_ROOT . '/password-blacklist.txt');
		$this->passwordBlacklist = explode("\n", $blacklistContents);
	}
}