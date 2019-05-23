<?php

namespace Revolution\ZendForm\View\Concerns;

use Zend\Form\ElementInterface;

trait Submit
{
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
}
