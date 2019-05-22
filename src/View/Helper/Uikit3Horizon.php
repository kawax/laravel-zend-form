<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

class Uikit3Horizon extends Form
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
            $html .= $element->getAttribute('class') ?? 'uk-button uk-button-primary';
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
            $html .= '<div class="uk-text-meta">';
            $html .= $element->getOption('help-text');
            $html .= '</div>';
        }

        return $html;
    }
}
