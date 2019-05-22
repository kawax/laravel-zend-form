<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

class Bootstrap4Horizon extends Form
{
    use HelperRender;

    /**
     * @param  ElementInterface  $element
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

        $html .= $this->submit($element, $type);

        $html .= $this->helpText($element);

        $html .= '</div></div>';

        return $html;
    }

    /**
     * @param  ElementInterface  $element
     * @param  string  $type
     *
     * @return string
     */
    protected function submit(ElementInterface $element, $type = '')
    {
        $html = '';

        if ($type === 'submit') {
            $html .= '<button type="submit" class="';
            $html .= $element->getAttribute('class') ?? 'btn btn-primary';
            $html .= '">';
            $html .= $element->getValue() ?? 'Submit';
            $html .= '</button>';
        } else {
            $html .= $this->getView()->formElement($element);
        }

        return $html;
    }

    /**
     * @param  ElementInterface  $element
     *
     * @return string
     */
    protected function helpText(ElementInterface $element)
    {
        $html = '';

        if (! empty($element->getOption('help-text'))) {
            $html .= '<small class="form-text text-muted">';
            $html .= $element->getOption('help-text');
            $html .= '</small>';
        }

        return $html;
    }
}
