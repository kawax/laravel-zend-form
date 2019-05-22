<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\FieldsetInterface;
use Zend\Form\FormInterface;

trait HelperRender
{
    /**
     * Render a form from the provided $form,
     *
     * @param  FormInterface  $form
     *
     * @return string
     */
    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $formContent = '';

        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                //TODO?
                $formContent .= $this->getView()->formCollection($element);
            } else {
                $formContent .= $this->row($element);
            }
        }

        return $this->openTag($form).$formContent.$this->closeTag();
    }
}
