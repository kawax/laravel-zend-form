<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\FieldsetInterface;
use Zend\Form\FormInterface;
use Zend\Form\ElementInterface;

class Bootstrap4Horizon extends Form
{
    /**
     * Render a form from the provided $form,
     *
     * @param  FormInterface $form
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

        return $this->openTag($form) . $formContent . $this->closeTag();
    }

    /**
     * @param ElementInterface $element
     *
     * @return string
     */
    protected function row(ElementInterface $element)
    {
        $html = '<div class="';
        $html .= $element->getOption('wrapper-class') ?? 'form-group row';
        $html .= '">';

        $label = $element->getLabel();
        $type = $element->getAttribute('type');

        if (isset($label) && '' !== $label && $type !== 'hidden') {
            $html .= $this->getView()->formLabel($element);
        }

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? 'col-sm-10';
        $html .= '">';

        if ($type === 'submit') {
            $html .= '<button type="submit" class="';
            $html .= $element->getAttribute('class') ?? 'btn btn-primary';
            $html .= '">';
            $html .= $element->getValue() ?? 'Submit';
            $html .= '</button>';
        } else {
            $html .= $this->getView()->formElement($element);
        }

        if ($element->getOption('help-text')) {
            $html .= '<small class="form-text text-muted">';
            $html .= $element->getOption('help-text');
            $html .= '</small>';
        }

        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
}
