# PHP Payload Encryption

Library for user's payload encryption used with Sitejabber.

# Usage

- Get your API keys on https://biz.sitejabber.com/account
- JSON encode your user data
- Call the encrypt method
- URL-encode the result
- Redirect the user to the feedback link

```
use Sitejabber\Utils;

$userData = [
	'email'		=> 'janedoe@gmail.com',
	'order_data'	=> '06-13-2013',
	'order_id'	=> '1234',
	'first_name'	=> 'Jane',
	'last_name'	=> 'Doe'
];
$json = json_encode($userData);
$sitejabber = new Utils; 
$encryptedData = $sitejabber->encrypt($json, $API_SECRET);
$feedbackLink = "https://www.sitejabber.com/biz-review?key=API_KEY&payload=" . urlencode($encryptedData);
```
