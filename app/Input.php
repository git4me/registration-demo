<?php namespace Register;

/**
 * Input class to register in Flight to allow access to POST variables safely
 */
class Input {
	
	/**
	 * Returns a sanitized string from INPUT_POST
	 * @param string $variable
	 * @return string
	 */
	public static function get($variable) {
		return filter_input(INPUT_POST, $variable, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
	
}