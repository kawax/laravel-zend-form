<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

class Uikit3Horizon extends Form
{
    use HelperRender;
    use HelperLabel;

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

        $html .= $this->label($element);

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? 'uk-form-controls';
        $html .= '">';

        $html .= $this->submit($element);

        $html .= $this->helpText($element);

        $html .= '</div></div>';

        return $html;
    }

    /**
     * @param  ElementInterface  $element
     *
     * @return string
     */
    protected function submit(ElementInterface $element)
    {
        if ($element->getAttribute('type') !== 'submit') {
            return $this->getView()->formElement($element);
        }

        $html = '<button type="submit" class="';
        $html .= $element->getAttribute('class') ?? 'uk-button uk-button-primary';
        $html .= '">';
        $html .= $element->getValue() ?? 'Submit';
        $html .= '</button>';

        return $html;
    }

    /**
     * @param  ElementInterface  $element
     *
     * @return string
     */
    protected function helpText(ElementInterface $element)
    {
        if (empty($element->getOption('help-text'))) {
            return '';
        }

        $html = '<div class="uk-text-meta">';
        $html .= $element->getOption('help-text');
        $html .= '</div>';

        return $html;
    }
}
