<?php

namespace Revolution\ZendForm\Providers;

use Illuminate\Support\ServiceProvider;

use Zend\View\Renderer\RendererInterface;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\HelperPluginManager;
use Zend\Form\ConfigProvider;
use Zend\ServiceManager\ServiceManager;

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

        $this->publishes([
            __DIR__.'/../config/zend-form.php' => config_path('zend-form.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/zend-form.php', 'zend-form'
        );

        $this->app->singleton(RendererInterface::class, function ($app) {
            $renderer = new PhpRenderer;
            $configProvider = new ConfigProvider;

            $config = array_merge_recursive(
                $configProvider->getViewHelperConfig(),
                $app['config']['zend-form']
            );

            $pluginManager = new HelperPluginManager(new ServiceManager, $config);

            $renderer->setHelperPluginManager($pluginManager);

            return $renderer;
        });
    }
}
