<?php namespace Register\Validator;

/**
 * Field object represents an input field from POST or GET. This base object Field
 * has some sensible defaults that can be overridden in child objects.
 * 
 * The child objects in Validator\Field all represent a field type that can be supplied
 * to the configuration of the Validator.
 * 
 * @see Field\Date, Field\Email, Field\Password, Field\Text
 */
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
	 * @final
	 * @return array
	 */
	final public function getErrors() {
		return $this->errors;
	}
	
	/**
	 * Returns the content of the field, post validation
	 * @final
	 * @return string
	 */
	final public function getFieldContent() {
		return $this->fieldContent;
	}
}