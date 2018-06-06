<?php
/**
 * Additional View Helpers
 *
 * https://github.com/zendframework/zend-form/blob/master/src/ConfigProvider.php
 */

return [
    'aliases'   => [
        'bootstrap4horizon' => Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class,
    ],
    'factories' => [
        Revolution\ZendForm\View\Helper\Bootstrap4Horizon::class => Zend\ServiceManager\Factory\InvokableFactory::class,
    ],
];
