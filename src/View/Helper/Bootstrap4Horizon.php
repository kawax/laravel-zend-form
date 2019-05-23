<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

class Bootstrap4Horizon extends Form
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
        $html .= $element->getOption('wrapper-class') ?? 'form-group row';
        $html .= '">';

        $html .= $this->label($element);

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? 'col-sm-10';
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
        $html .= $element->getAttribute('class') ?? 'btn btn-primary';
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

        $html = '<small class="form-text text-muted">';
        $html .= $element->getOption('help-text');
        $html .= '</small>';

        return $html;
    }
}
