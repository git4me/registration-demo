<?php namespace Register\Validator;

class Field {
	
	/**
	 * Array of errors that occured
	 * @var array
	 */
	protected $errors = [];
	
	/**
	 * Name of the field validation is being run on
	 * @var string
	 */
	protected $field;
	
	/**
	 * The contents of the field
	 * @var string
	 */
	protected $fieldContent;
	
	/**
	 * PHP constant identifiying the type of input
	 * @var int
	 */
	protected $inputMethod;
	
	/**
	 * Construct the field object by specifying the input location (GET/POST) and
	 * the name of the field
	 * @param int $inputMethod One of INPUT_GET, INPUT_POST
	 * @param string $field
	 */
	public function __construct($inputMethod, $field) {
		$this->field = $field;
		$this->inputMethod = $inputMethod;
	}
	
	/**
	 * Default validation method that simply populates the fieldContent value
	 * @return boolean
	 */
	public function validate() {
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_SANITIZE_STRING);
		return true;
	}
	
	/**
	 * Returns an array of errors that were logged for the field during validation
	 * @return array
	 */
	public function getErrors() {
		return $this->errors;
	}
}