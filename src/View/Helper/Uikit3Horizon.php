<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\FieldsetInterface;
use Zend\Form\FormInterface;
use Zend\Form\ElementInterface;

class Uikit3Horizon extends Form
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
        $html .= $element->getOption('wrapper-class') ?? 'uk-margin';
        $html .= '">';

        $label = $element->getLabel();
        $type = $element->getAttribute('type');

        if (isset($label) && '' !== $label && $type !== 'hidden') {
            $html .= $this->getView()->formLabel($element);
        }

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? 'uk-form-controls';
        $html .= '">';

        if ($type === 'submit') {
            $html .= '<button type="submit" class="';
            $html .= $element->getAttribute('class') ?? 'uk-button uk-button-primary';
            $html .= '">';
            $html .= $element->getValue() ?? 'Submit';
            $html .= '</button>';
        } else {
            $html .= $this->getView()->formElement($element);
        }

        if (!empty($element->getOption('help-text'))) {
            $html .= '<div class="uk-text-meta">';
            $html .= $element->getOption('help-text');
            $html .= '</div>';
        }

        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
}
