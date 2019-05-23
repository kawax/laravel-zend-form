<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\Form;

use Revolution\ZendForm\View\Concerns\Render;
use Revolution\ZendForm\View\Concerns\Label;

/**
 * ViewHelper does not require the use of trait
 *
 * @codeCoverageIgnore
 */
class Custom extends Form
{
    use Render, Label;

    protected const DEFAULTS = [
        'wrapper'    => 'form-group row',
        'element'    => 'col-sm-10',
        'submit'     => 'btn btn-primary',
        'help_open'  => '<small class="form-text text-muted">',
        'help_close' => '</small>',
    ];

    /**
     * @param  ElementInterface  $element
     *
     * @return string
     */
    protected function row(ElementInterface $element)
    {
        $html = '<div class="';
        $html .= $element->getOption('wrapper-class') ?? self::DEFAULTS['wrapper'];
        $html .= '">';

        $html .= $this->label($element);

        $html .= '<div class="';
        $html .= $element->getOption('element-class') ?? self::DEFAULTS['element'];
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
        $html .= $element->getAttribute('class') ?? self::DEFAULTS['submit'];
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

        $html = self::DEFAULTS['help_open'];
        $html .= $element->getOption('help-text');
        $html .= self::DEFAULTS['help_close'];

        return $html;
    }
}
