# Laravel Zend Form
[![Build Status](https://travis-ci.org/kawax/laravel-zend-form.svg?branch=master)](https://travis-ci.org/kawax/laravel-zend-form)

https://docs.zendframework.com/zend-form/

## Requirements
- PHP >= 7.0
- Laravel >= 5.5

## Installation

```
composer require revolution/laravel-zend-form
```

## Demo
https://github.com/kawax/laravel-zend-form-project

## Artisan command

```
php artisan make:form SampleForm
```

app/Http/Forms/SampleForm.php

## Form class

```php
namespace App\Http\Forms;

use Revolution\ZendForm\Form as ZendForm;
use Zend\Form\Element;

class SampleForm extends ZendForm
{
    /**
     * Create a new form.
     *
     * @param  null|string $name
     *
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->setAttributes([
            'action' => url('/'),
            'method' => 'post',
        ]);

        $name = new Element\Text('name');
        $name->setAttributes([
            'id'    => 'name',
            'class' => 'form-control',
            'value' => old('name'),
        ]);
        $name->setLabel('Your name');
        $name->setLabelAttributes([
            'class' => 'col-form-label',
        ]);

        $this->add($name);


        $this->add([
            'type'       => Element\Email::class,
            'name'       => 'email',
            'attributes' => [
                'id'    => 'email',
                'class' => 'form-control',
                'value' => old('email'),
            ],
            'options'    => [
                'label'            => 'Your email address',
                'label_attributes' => [
                    'class' => 'col-form-label',
                ],
            ],
        ]);

        $this->add([
            'type'       => Element\Hidden::class,
            'name'       => '_token',
            'attributes' => [
                'value' => csrf_token(),
            ],
        ]);

        $this->add([
            'name'       => 'send',
            'type'       => 'Submit',
            'attributes' => [
                'value' => 'Submit',
                'class' => 'btn btn-primary mt-2',
            ],
        ]);
    }
}
```

## Controller

```php
use App\Http\Forms\SampleForm;

    public function __invoke()
    {
        $form = new SampleForm;

        return view('form')->with(compact('form'));
    }
```

```php
use App\Http\Forms\SampleForm;

    public function __invoke(SampleForm $form)
    {
        return view('form')->with(compact('form'));
    }
```

## View

### Simple render

```php
{{ $form->render() }}
```

Same as ZendForm's `echo $this->form($form);`

### Detail render

```php
@php
    $form->prepare();
@endphp

{!! $form->form()->openTag($form) !!}

{{ csrf_field() }}

<div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">{!! $form->get('name')->getLabel()  !!}</label>
    <div class="col-sm-9">
        {!! $form->formInput($form->get('name')) !!}
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">{!! $form->get('email')->getLabel()  !!}</label>
    <div class="col-sm-9">
        {!! $form->formInput($form->get('email')) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-9 offset-sm-3">
        {!! $form->formSubmit($form->get('send')) !!}
    </div>
</div>

{!! $form->form()->closeTag($form) !!}
```

Form object can call Zend's ViewHelper by magic method.

See https://docs.zendframework.com/zend-form/quick-start/

## Validation
Use Laravel's FormRequest.

## LICENSE
MIT  
Copyright kawax
