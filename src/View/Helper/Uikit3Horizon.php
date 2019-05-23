<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

use Revolution\ZendForm\View\Concerns\{Render, Row, Label, Submit};

class Uikit3Horizon extends Form
{
    use Render, Row, Label, Submit;

    protected const DEFAULTS = [
        'wrapper' => 'uk-margin',
        'element' => 'uk-form-controls',
        'submit'  => 'uk-button uk-button-primary',
    ];

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
