# HoneyBadger Plugin for Magento 2
This module has been tested with Magento 2.3.
## Install Instructions
1. Run `composer require uft/honeybader_magento2`
2. Add the following to app/etc/env.php:
```php
<?php
return [
    'honeybadger' => [
        'api_key' => 'your-key-here'
    ],
    // Other settings...
];
```
3. Run `php bin/magento setup:upgrade`
4. Run `php bin/magento setup:di:compile`
5. Depending on your setup you may need to run `php bin/magento setup:static-content:deploy` and / or `php bin/magento cache:flush`