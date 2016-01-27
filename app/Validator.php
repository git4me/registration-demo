<?php namespace Register;

/**
 * Validator object. Takes an array of fields and field types and runs the validation
 * routines stored in Register\Field\{FieldType}. Extensible if other types of field
 * are added in the future.
 */
class Validator {
	
	/**
	 * Stores the input method, e.g. INPUT_POST, INPUT_GET
	 * @var int
	 */
	private $inputMethod;
	
	/**
	 * Array of configuration for the Validator\Field objects to be loaded
	 * @var array
	 */
	private $config;
	
	/**
	 * Array of errors that occured during validation
	 * @var array
	 */
	private $errors = [];
	
	/**
	 * Array of the output fields that have been validated succesfully
	 * @var array
	 */
	private $fields = [];
	
	/**
	 * Build the Validator object
	 * @param int $inputMethod One of INPUT_GET, INPUT_POST
	 * @param array $config
	 */
	public function __construct($inputMethod, $config) {
		$this->inputMethod = $inputMethod;
		$this->config = $config;
	}
	
	/**
	 * Run the validation routine on each field object specified in the configuration
	 * @return bool Returns false if any errors occured
	 */
	public function run() {
		$this->errors = [];
		foreach($this->config as $field => $validationObject) {
			// Dynamically load the specified Field object from the configuration array
			$objectName = '\Register\Validator\Field\\' . $validationObject;
			$fieldObject = new $objectName($this->inputMethod, $field);
			
			// Determine if any errors occured during validation of this field
			if(!$fieldObject->validate()) {
				$this->errors[$field] = $fieldObject->getErrors();
			} else {
				$this->fields[$field] = $fieldObject->getFieldContent();
			}
		}
		// If any errors were recorded return false
		if(count($this->errors) > 0) {
			return false;
		}
		return true;
	}
	
	/**
	 * Returns an array of errors stored in the object
	 * @return array
	 */
	public function getErrors() {
		return $this->errors;
	}
	
	/**
	 * Returns the array of fields and their contents
	 * @return array
	 */
	public function getFields() {
		return $this->fields;
	}
}