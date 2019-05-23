<?php

namespace Revolution\ZendForm\View\Helper;

use Zend\Form\View\Helper\Form;

use Revolution\ZendForm\View\Concerns\Render;
use Revolution\ZendForm\View\Concerns\Row;
use Revolution\ZendForm\View\Concerns\Label;
use Revolution\ZendForm\View\Concerns\Submit;
use Revolution\ZendForm\View\Concerns\Help;

class Bootstrap4Horizon extends Form
{
    use Render, Row, Label, Submit, Help;

    protected const DEFAULTS = [
        'wrapper'    => 'form-group row',
        'element'    => 'col-sm-10',
        'submit'     => 'btn btn-primary',
        'help_open'  => '<small class="form-text text-muted">',
        'help_close' => '</small>',
    ];
}
