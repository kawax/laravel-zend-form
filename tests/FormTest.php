<?php

namespace Tests;

use Revolution\ZendForm\Form;

use Zend\View\Renderer\RendererInterface;
use Zend\View\Renderer\PhpRenderer;

class FormTest extends TestCase
{
    public function testInstance()
    {
        $form = new Form;

        $this->assertInstanceOf(Form::class, $form);
    }

    public function testRender()
    {
        $form = new TestForm();

        $this->assertStringStartsWith('<form', (string)$form->render());
    }

    public function testOpenTag()
    {
        $form = new TestForm();

        $this->assertStringStartsWith('<form', $form->form()->openTag($form));
    }

    public function testInput()
    {
        $form = new TestForm();

        $this->assertStringStartsWith('<input type="text" name="name"', $form->formInput($form->get('name')));
    }

    public function testRenderer()
    {
        $renderer = app(RendererInterface::class);

        $this->assertInstanceOf(PhpRenderer::class, $renderer);
    }

    public function testHelperHorizon()
    {
        $form = new TestForm();

        $html = $form->bootstrap4horizon($form);

        $this->assertStringStartsWith('<form', $html);
    }
}
