<?php
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
	public function testEncryptDecripts()
	{
		$key = 'XlVzl5iwuIakc8FMlf2Ws2XCkMs6WVHh';
		$string = 'test string';
		$sitejabber = new Sitejabber\Utils;

		$this->assertEquals(
			$string,
			$sitejabber->decrypt($sitejabber->encrypt($string, $key), $key)
		);
	}
}
