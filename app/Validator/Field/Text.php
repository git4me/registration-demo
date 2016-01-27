<?php namespace Register\Validator\Field;

use Register\Validator\Field;

class Text extends Field {
	
	/**
	 * Validate that the field supplied is not empty
	 * @return boolean
	 */
	public function validate() {
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_SANITIZE_STRING);
		if(strlen($this->fieldContent) > 0) {
			return true;
		} else {
			$this->errors[] = 'Field was empty';
			return false;
		}
	}
	
}