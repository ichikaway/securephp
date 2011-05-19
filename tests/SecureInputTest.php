<?php


require_once "../libs/secure_input.php";

/**
 * Unit test suite for the SecurePHP package
 *  test for SecureInput class
 *
 * @author  Yasushi Ichikawa (@ichikaway)
 * @extends PHPUnit_TestCase
 */
class SecureInputTest extends PHPUnit_Framework_TestCase
{

	public function testDeleteControlChar() {
		$input = array('a1' => "aa\x00bbb", 'b1' => "bbb\x01\x02\x03ccc", 'c1' => "ccc\x0addd");
		$expect = array('a1' => "aabbb", 'b1' => 'bbbccc', 'c1' => "ccc\x0addd");

		$result = SecureInput::delete_cntrl_char($input);
var_dump();

		$this->assertEquals($expect, $result);
	}

}



?>
