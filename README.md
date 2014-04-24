SecurePHP is the library for security.

Provide functions as follow.

1. check input data(POST,GET,COOKIE,SERVER,REQUEST) and delete invalid data.
 (a). delete control byte char
 (b). delete invalid key name(ex. array('_SERVER' =>....) )


Usage: 
include bootstrap.php of SecurePHP library.
require_once('securephp/Config/bootstrap.php');

If you want to install with composer,
```json
{
	"require": {
		"ichikaway/securephp": "dev-master"
	},
	"autoload": {
		"files": ["vendor/ichikaway/securephp/Libs/SecureInputFilter.php"]
	}
}
```

and autoload and execute.

```php
require('vendor/autoload.php');
SecureInputFilter::clean_input_data();
```
