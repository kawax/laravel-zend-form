<?php
/**
 * Additional View Helpers
 *
 * https://github.com/zendframework/zend-form/blob/master/src/ConfigProvider.php
 */

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'aliases'   => [
        'bootstrap4horizon' => Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class,
        'uikit3horizon'     => Revolution\ZendForm\View\Helper\Uikit3Horizon::class,
    ],
    'factories' => [
        Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class => InvokableFactory::class,
        Revolution\ZendForm\View\Helper\Uikit3Horizon::class     => InvokableFactory::class,
    ],
];
