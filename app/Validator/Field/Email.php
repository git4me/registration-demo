<?php namespace Register\Validator\Field;

use Register\Validator\Field;
use Flight;
use PDO;

class Email extends Field {
	
	public function validate() {
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_VALIDATE_EMAIL);
		if($this->fieldContent !== false) {
			// Email matches a valid email pattern according to PHP. Check to see if it is unique in the database
			if($this->checkEmailDatabase()) {
				// Email is valid and not a duplicate of any existing emails
				return true;
			} else {
				$this->errors[] = 'Email already exists';
			}
		} else {
			$this->errors[] = 'Email was not valid';
		}
		return false;
	}
	
	/**
	 * Connect to the database and query if any users exist for the supplied email
	 * @return boolean
	 */
	private function checkEmailDatabase() {
		$db = Flight::db();
		$sql = 'SELECT COUNT(*) as count FROM users WHERE email = ?';
		$sth = $db->prepare($sql);
		$sth->execute([$this->fieldContent]);
		$result = $sth->fetchAll();
		if($result[0]['count'] > 0) {
			return false;
		}
		return true;
	}
}