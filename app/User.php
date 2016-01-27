<?php namespace Register;

use Flight;
use PDO;

class User {
	
	public $name;
	public $email;
	public $password;
	public $dob;
	
	/**
	 * Store a reference to the DB connection
	 * @var resource
	 */
	private $db;
	
	/**
	 * Construct the User object
	 */
	public function __construct() {
		$this->db = Flight::db();
	}
	
	/**
	 * Write the data stored in the object to the database. Not abstracted as this
	 * is the only other database operation in the system.
	 */
	public function save() {
		$sql = 'INSERT INTO users SET email = ?, password = ?, name = ?, dob = ?';
		$sth = $this->db->prepare($sql);
		$sth->execute([
			$this->email,
			password_hash($this->password, PASSWORD_BCRYPT),
			$this->name,
			$this->dob
		]);
	}
	
}