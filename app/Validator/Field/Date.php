<?php namespace Register\Validator\Field;

use Register\Validator\Field;

class Date extends Field {
	
	public function validate() {
		// Check using a regular expression that the date matches dd/mm/yyyy
		// Ideally improve this as at present it's not validating if the date is real!
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_VALIDATE_REGEXP, [
			'options' => [
				'regexp' => '/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'
			]
		]);
		
		if(!$this->fieldContent) {
			$this->errors[] = 'Not a valid date';
			return false;
		}
		return true;
	}
	
}