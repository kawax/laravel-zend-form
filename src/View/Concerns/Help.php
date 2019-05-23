<?php

namespace Revolution\ZendForm\View\Concerns;

use Zend\Form\ElementInterface;

trait Help
{
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
