<?php

namespace Tests;

use Revolution\ZendForm\Form as ZendForm;
use Zend\Form\Element;

class TestForm extends ZendForm
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
            'class' => 'col-sm-2 col-form-label',
        ]);
        $name->setOptions([
            'wrapper-class' => 'form-group row',
            'element-class' => 'col-sm-10',
            'help-text'     => '<code>help</code> text',
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
                    'class' => 'col-sm-2 col-form-label',
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
