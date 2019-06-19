## KvK API client
[![Packagist License](https://poser.pugx.org/alexwijn/kvk/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/alexwijn/kvk/version.png)](https://packagist.org/packages/alexwijn/laravel-database-url)
[![Total Downloads](https://poser.pugx.org/alexwijn/kvk/d/total.png)](https://packagist.org/packages/alexwijn/laravel-database-url)

This package provide access to the [Kvk API](https://developers.kvk.nl/) using one simple class.

## Installation

Require this package with composer.

```shell
composer require alexwijn/kvk
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel 5.5+:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Alexwijn\KvK\ServiceProvider::class,
```

### Example

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alexwijn\KvK\Client as KvK;

class CompanyController
{
    public function index(Request $request, KvK $kvk)
    {
        return $kvk->companies()->search($request->query);
    }
}
```
