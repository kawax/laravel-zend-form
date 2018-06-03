<?php

namespace Revolution\ZendForm\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\ZendForm\Commands;

class ZendFormServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\FormMakeCommand::class,
            ]);
        }
    }
}
