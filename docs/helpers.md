# View Helpers

## Bootstrap4 Horizontal
```php
 {!! $form->bootstrap4horizon($form) !!}
```

## UIkit3 Horizontal
```php
 {!! $form->uikit3horizon($form) !!}
```

## Create Custom View Helper

### Create View Helper in your project
```
app/Http/Forms/Helper/Custom.php
```

https://github.com/zendframework/zend-form/tree/master/src/View/Helper

### Publish config file(config/zend-from.php)
```
php artisan vendor:publish --provider="Revolution\ZendForm\Providers\ZendFormServiceProvider"
```

### Add to config

```php
return [
    'aliases'   => [
        'bootstrap4horizon' => Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class,
        'uikit3horizon'     => Revolution\ZendForm\View\Helper\Uikit3Horizon::class,
        'custom'            => App\Http\Forms\Helper\Custom::class,
    ],
    'factories' => [
        Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class => Zend\ServiceManager\Factory\InvokableFactory::class,
        Revolution\ZendForm\View\Helper\Uikit3Horizon::class     => Zend\ServiceManager\Factory\InvokableFactory::class,
        App\Http\Forms\Helper\Custom::class                      => Zend\ServiceManager\Factory\InvokableFactory::class,
    ],
];
```

### Finally

```php
 {!! $form->custom($form) !!}
```
