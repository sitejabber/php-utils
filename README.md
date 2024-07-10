# PHP Utils

Library for user's payload encryption used with Sitejabber.


## Installation

Installation is easy using Composer. Just run the following on the
command line:

```
composer require sitejabber/php-utils
```

#### Without composer

You can also clone the repository or extract the [ZIP](https://github.com/sitejabber/php-utils/archive/master.zip). Then have to add a `require 'php-utils-master/src/Utils.php';` line.


## Usage

- Get your credentials on https://biz.sitejabber.com/account
- JSON encode your user data
- Call the encrypt method
- URL-encode the result
- Redirect the user to the feedback link

```
use Sitejabber\Utils;

$userData = [
	'email'		=> 'janedoe@gmail.com',
	'order_date'	=> '06-13-2013',
	'order_id'	=> '1234',
	'first_name'	=> 'Jane',
	'last_name'	=> 'Doe'
];
$json = json_encode($userData);
$sitejabber = new Utils; 
$encryptedData = $sitejabber->encrypt($json, $CLIENT_ENCRYPTION KEY);
$feedbackLink = "https://www.sitejabber.com/biz-review?key=CLIENT_ID&payload=" . urlencode($encryptedData);
```
