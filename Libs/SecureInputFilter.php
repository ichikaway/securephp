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
 * @subpackage    secure_php.SecureInputFilter
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class SecureInputFilter {

/**
 * invalid array keys, these keys are used for global variable name
 *
 * @access protected
 * @var array
 */
	protected static $deleteKeys = array(
			'_GET', '_POST', '_SERVER', '_FILES', '_REQUEST', '_SESSION', '_ENV', 'GLOBALS'
			);

/**
 * Regex pattern of valid key name
 *
 * @access protected
 * @var array
 */
	protected static $allowKeyNameRegex = '/^[a-z0-9:_\.\/\-]+$/i';

/**
 * Regex pattern of invalid key name 
 * check SQL comment 
 *
 * @access protected
 * @var array
 */
	protected static $denySqlComment = '/--/';

/**
 * Inserts multiple values into a table
 *
 * @access public
 * @return void
 */
	public static function clean_input_data() {

		$_GET = self::clean_key_value($_GET);
		$_POST = self::clean_key_value($_POST);
		$_COOKIE = self::clean_key_value($_COOKIE);
		$_REQUEST = self::clean_key_value($_REQUEST);
		$_SERVER = self::clean_key_value($_SERVER);

	}


/**
 * Delete control character value(ex. nullbyte) and 
 *  invalid key name(ex, array('_SERVER') => ....)
 *
 * @param string or array $data
 * @access public
 * @return string or array
 */
	public static function clean_key_value($data) {
		if(is_array($data)) {
			foreach($data as $key => $val) {
				//delete invalid key name
				if(in_array($key, self::$deleteKeys, true)
				   	or !preg_match(self::$allowKeyNameRegex, $key)
				   	or preg_match(self::$denySqlComment, $key)
				) {
					unset($data[$key]);
				}else {
					$data[$key] = self::clean_key_value($val);
				}
			}
		} else {
			//delete control byte char
			$data = self::delete_cntrl_char($data);
		}
		return $data;
	}


/**
 * Delete control character
 *  not delete CR and LF and Tab(HT) 
 *
 * @param string or array $data
 * @access public
 * @return string or array
 */
	public static function delete_cntrl_char($data) {
		if ( is_array( $data ) ) {
			return array_map( array('self','delete_cntrl_char'), $data );
		}
		return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/','', $data);
	}



}
?>