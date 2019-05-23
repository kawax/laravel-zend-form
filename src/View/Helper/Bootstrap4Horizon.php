<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;
use Zend\Form\ElementInterface;

use Revolution\ZendForm\View\Concerns\{Render, Row, Label, Submit};

class Bootstrap4Horizon extends Form
{
    use Render, Row, Label, Submit;

    protected const DEFAULTS = [
        'wrapper' => 'form-group row',
        'element' => 'col-sm-10',
        'submit'  => 'btn btn-primary',
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

        $html = '<small class="form-text text-muted">';
        $html .= $element->getOption('help-text');
        $html .= '</small>';

        return $html;
    }
}
