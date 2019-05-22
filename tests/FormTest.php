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

        $this->assertContains('<form', (string) $form->render());
    }

    public function testOpenTag()
    {
        $form = new TestForm();

        $this->assertContains('<form', $form->form()->openTag($form));
    }

    public function testInput()
    {
        $form = new TestForm();

        $this->assertContains('<input type="text" name="name"', $form->formInput($form->get('name')));
    }

    public function testRenderer()
    {
        $renderer = app(RendererInterface::class);

        $this->assertInstanceOf(PhpRenderer::class, $renderer);
    }

    public function testHelperBSHorizon()
    {
        $form = new TestForm();

        $html = $form->bootstrap4horizon($form);

        //dump($html);

        $this->assertContains('form-text text-muted', $html);
    }

    public function testHelperUIHorizon()
    {
        $form = new TestForm();

        $html = $form->uikit3horizon($form);

        //dump($html);

        $this->assertContains('uk-text-meta', $html);
    }

    public function testFormRenderWithHelper()
    {
        $form = new TestForm();

        $html = (string) $form->render('bootstrap4horizon');

        //dump($html);

        $this->assertContains('form-text text-muted', $html);
    }
}
