<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;

use Revolution\ZendForm\View\Concerns\Render;
use Revolution\ZendForm\View\Concerns\Row;
use Revolution\ZendForm\View\Concerns\Label;
use Revolution\ZendForm\View\Concerns\Submit;
use Revolution\ZendForm\View\Concerns\Help;

class Uikit3Horizon extends Form
{
    use Render, Row, Label, Submit, Help;

    protected const DEFAULTS = [
        'wrapper'    => 'uk-margin',
        'element'    => 'uk-form-controls',
        'submit'     => 'uk-button uk-button-primary',
        'help_open'  => '<div class="uk-text-meta">',
        'help_close' => '</div>',
    ];
}
