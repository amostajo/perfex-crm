# Perfex CRM customization

This repository shows how to customize Perfex CRM back-end and front-end.

**NOTE:** The CRM codebase is NOT IN here.

## Customizations

### Back-end

Back-end customizations can be done using [Perfex CRM hooks](https://help.perfexcrm.com/action-hooks/), which is an event-driven customization system similar to the one created by [WordPress](https://developer.wordpress.org/plugins/hooks/).

Inside the `/perfexcrm` folder, this project has a replica of the `my_functions_helper.php` file with custom hooks created.

**SIDE NOTE:**
My approach to back-end customizations implements dependency injection and ORM to avoid direct database queries and to make the code more maintainable.

```php
use Amostajo\PerfexCRM\Samples\ClientHooks;
// Bootstrap composer
require '../vendor/autoload.php';

// Register hooks
ClientHooks::register();
```

### Test

First, you will need to install composer:
```bash
composer install
```

You can review the hook registration and test with PHPUnit.

```bash
./vendor/bin/phpunit
```