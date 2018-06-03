<?php

namespace Tests;

use Revolution\ZendForm\Providers\ZendFormServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ZendFormServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
        ];
    }
}
