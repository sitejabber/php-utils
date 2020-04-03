<?php
namespace Sitejabber;

class Utils
{
	public function decrypt($string, $key)
	{
		$method = "AES-256-CBC";
		$ivLen = openssl_cipher_iv_length($method);
		
		$string = base64_decode($string);
		
		$iv = substr($string, 0, $ivLen);
		$hash = substr($string, $ivLen, 32);
		$ciphertext = substr($string, 48);
		$key = hash('sha256', $key, true);

		if (!hash_equals(hash_hmac('sha256', $ciphertext, $key, true), $hash))
			return null;

		return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
	}
	
	public function encrypt($string, $key)
	{
		$method = 'AES-256-CBC';
		$key = hash('sha256', $key, true);
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

		$ciphertext = openssl_encrypt($string, $method, $key, OPENSSL_RAW_DATA, $iv);
		$hash = hash_hmac('sha256', $ciphertext, $key, true);

		return base64_encode($iv . $hash . $ciphertext);
	}
}
?>
