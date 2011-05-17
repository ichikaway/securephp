<?php
/**
 * Cleanup of input data in PHP
 *
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011, Yasushi Ichikawa http://github.com/ichikaway/
 * @package       secure_php
 * @subpackage    secure_php.SecureInput
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class SecureInput {

/**
 * Inserts multiple values into a table
 *
 * @access public
 * @return void
 */
	public static function clean_input_data() {
		$_GET = self::delete_cntrl_char($_GET);
		$_POST = self::delete_cntrl_char($_POST);
		$_COOKIE = self::delete_cntrl_char($_COOKIE);
	}


/**
 * Delete control character
 *  not delete CR and LF and Tab(HT) 
 *
 * @param string or array
 * @access public
 * @return string or array
 */
	public static function delete_cntrl_char($data) {
		if ( is_array( $data ) ) {
			return array_map( 'self::delete_cntrl_char', $data );
		}

		return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/','', $data);
	}

}
?>
