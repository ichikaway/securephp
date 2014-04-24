## SecurePHP is the library for security.


* check input data(POST,GET,COOKIE,SERVER,REQUEST) and delete invalid data.
  - delete control byte char  
  - delete invalid key name(ex. array('_SERVER' =>....) )  


### Usage: 
include bootstrap.php of SecurePHP library.
require_once('securephp/Config/bootstrap.php');


### Composer
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

and require autoload.php and execute method.

```php
require('vendor/autoload.php');
SecureInputFilter::clean_input_data();
```
