# l5-appengine-mvm-loghandler

Google AppEngine Managed VMs LogHandler.

## Instructions

Require the package with composer:

```
composer require cedricziel/l5-appengine-mvm-loghandler
```

Bind the `ConfigureLogging` class to the custom implementation in ``bootstrap/app.php``:

```php
$app->singleton(
    Illuminate\Foundation\Bootstrap\ConfigureLogging::class,
    CedricZiel\AppEngineMvmLoghandler\LoggingConfiguration::class
);
```

Replace the stock `ConfigureLogging` bootstrapper with a the custom implementation, by overriding the `bootstrapers` field in `app/Http/Kernel.php`:

```php
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [
        'Illuminate\Foundation\Bootstrap\DetectEnvironment',
        'Illuminate\Foundation\Bootstrap\LoadConfiguration',
        // replace ConfigureLogging
        'CedricZiel\AppEngineMvmLoghandler\LoggingConfiguration',
        'Illuminate\Foundation\Bootstrap\HandleExceptions',
        'Illuminate\Foundation\Bootstrap\RegisterFacades',
        'Illuminate\Foundation\Bootstrap\RegisterProviders',
        'Illuminate\Foundation\Bootstrap\BootProviders',
    ];
```

Use the log-handler in `.env`:

```
APP_LOG=appenginemvm
```

## License

The MIT license
