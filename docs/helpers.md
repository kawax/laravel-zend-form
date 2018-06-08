# View Helpers

## Bootstrap4 Horizontal
```php
 {!! $form->bootstrap4horizon($form) !!}
```

```php
 {{ $form->render('bootstrap4horizon') }}
```

```php
$name = new Element\Text('name');
$name->setAttributes([
    'id'    => 'name',
    'class' => 'form-control',
    'value' => old('name'),
]);
$name->setLabel('Your name');
$name->setLabelAttributes([
    'class' => 'col-sm-2 col-form-label',
]);
$name->setOptions([
    'wrapper-class' => 'form-group row',
    'element-class' => 'col-sm-10',
    'help-text'     => '<code>help</code> text',
]);
```

```html
<div class="form-group row">
  <label class="col-sm-2&#x20;col-form-label" for="name">Your name</label>
  <div class="col-sm-10">
    <input type="text" name="name" id="name" class="form-control" value="">
    <small class="form-text text-muted"><code>help</code> text</small>
  </div>
</div>
```

## UIkit3 Horizontal
```php
 {!! $form->uikit3horizon($form) !!}
```

```php
 {{ $form->render('uikit3horizon') }}
```

```php
$this->add([
    'type'       => Element\Text::class,
    'name'       => 'name',
    'attributes' => [
        'id'          => 'name',
        'class'       => 'uk-input',
        'value'       => old('name'),
    ],
    'options'    => [
        'label'            => 'Name',
        'label_attributes' => [
            'class' => 'uk-form-label',
        ],
        'wrapper-class'    => 'uk-margin',
        'element-class'    => 'uk-form-controls',
        'help-text'        => '',
    ],
]);
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
