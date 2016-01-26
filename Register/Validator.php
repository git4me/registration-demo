<?php namespace Register;

class Validator {
	
	private $config;
	
	public function __construct($config) {
		$this->config = $config;
	}
	
	public function run() {
		$errors = array();
		foreach($this->config as $field => $validationObject) {
			
		}
	}
}