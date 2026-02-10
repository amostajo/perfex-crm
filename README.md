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

### In your project

You can reuse the base `Hook` class in your project, by installing this package:
```bash
composer require amostajo/perfex-crm
```

Your hook registation class:
```php
use Amostajo\PerfexCRM\Hook;
use Amostajo\PerfexCRM\Traits\Registerable;

class MyHooks extends Hook
{
    use Registerable;

    public function init()
    {
        hooks()->add_action('hook_name', [$this, 'callback_method']);
    }

    public function callback_method($args)
    {
        // Your code here
    }
}
```

Then in your `my_functions_helper.php` file, you can register your hooks:
```php
// Bootstrap composer
require __DIR__ . '/../vendor/autoload.php';

MyHooks::register();
```

#### Test

First, you will need to install composer dependencies:
```bash
composer install
```

You can review the hook registration and test with PHPUnit.

```bash
./vendor/bin/phpunit
```

### Front-end

Front-end can be customized through a custom [Perfex CRM theme](https://help.perfexcrm.com/customers-templates/) or [custom CSS](https://help.perfexcrm.com/applying-custom-css-styles/).

#### Custom CSS

In this project, we have a custom CSS file that changes the background color of the CRM.

Inside the `/perfexcrm` folder, there is a `custom.css` file that is loaded in the CRM (real file is `assets/css/custom.css`).

The source file is located at `assets/scss/custom.scss`, which is compiled to `perfexcrm/custom.css`.


**SIDE NOTE**
My approach to front-end implements vite to bundle the SCSS file and make it easier to maintain.

#### Compile

First, you will need to install npm dependencies:
```bash
npm install
```

Finally compile:
```bash
npm run build
```

#### Custom theme

Custom theming requires template replication. Ideally we want to bundle our related assets using Vite or Webpack.

## Conclusion

This repository shows how to customize Perfex CRM back-end and front-end using hooks and custom CSS. The back-end customizations are done using an event-driven system, while the front-end customizations are done through a custom CSS file. This approach allows for maintainable and scalable customizations without modifying the core codebase of Perfex CRM.

Since this CRM was design mimicing WordPress customization engine, it is a great choice for WordPress developers.