<?php
/**
 * bootstrap of secure_php package
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011, Yasushi Ichikawa http://github.com/ichikaway/
 * @package       secure_php
 * @subpackage    secure_php.bootstrap
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

	$SECURE_PHP_LIBS = dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR . 'libs'. DIRECTORY_SEPARATOR;

	//clenup input data
	require_once($SECURE_PHP_LIBS . 'secure_input_filter.php');
	SecureInputFilter::clean_input_data();

