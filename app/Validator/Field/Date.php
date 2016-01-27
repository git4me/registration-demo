<?php namespace Register\Validator\Field;

use Register\Validator\Field;

class Date extends Field {
	
	public function validate() {
		// Check using a regular expression that the date pattern matches dd/mm/yyyy
		$this->fieldContent = filter_input($this->inputMethod, $this->field, FILTER_VALIDATE_REGEXP, [
			'options' => [
				'regexp' => '/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'
			]
		]);
		
		// Split the date up so that it can be validated as a real date
		$dateParts = explode("/", $this->fieldContent);
		if(!$this->fieldContent || !checkdate($dateParts[1], $dateParts[0], $dateParts[2])) {
			$this->errors[] = 'Not a valid date';
			return false;
		}
		return true;
	}
	
}