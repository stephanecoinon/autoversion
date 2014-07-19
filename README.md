# AutoVersion [![Build Status](https://travis-ci.org/stephanecoinon/autoversion.svg?branch=master)](https://travis-ci.org/stephanecoinon/autoversion)

Suffix asset file names with a timestamp to invalidate cache if a new asset is uploaded on the server.

When you include assets like images, stylesheets or javascripts, your website visitors might not see new changes depending on their browser cache settings.
AutoVersion will force the cache to invalidate.

## Installation

In your terminal, just run:

```bash
composer require "stephanecoinon/autoversion":"dev-master"
```

## Configuration

This package is framework agnostic, the configuration process is:

```php
// Auto-load composer packages
require 'vendor/autoload.php';

// Configure the document root
AutoVersion::setDocumentRoot('/var/www/html/public');
```

And if you're using the excellent [Laravel](http://laravel.com) framework, it's even simpler: just add the service provider in `app/config/app.php`:

```php
'providers' => array(

	// Your current providers are here ...

	'Coinon\AutoVersion\AutoVersionServiceProvider',
);
```

The service provider will take care of:
* automatically loading the package
* configuring the document root to `public_path()`
* adding the `AutoVersion` class as an alias making it accessible easily from anywhere

## Usage

In your views, just call:

```php
// $pathToAsset is relative to the document root configured above
AutoVersion::asset($pathToAsset);
```

for example:

```php
<link rel="stylesheet" href="<?=AutoVersion::asset('css/main.css') ?>">
```

Or with Laravel blade:

```php
{{ HTML::style(AutoVersion::asset('css/main.css')) }}
```
