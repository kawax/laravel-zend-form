<?php

namespace Revolution\ZendForm;

use Zend\Form\Form as ZendForm;
use Zend\View\Renderer\PhpRenderer;
use Zend\Form\ConfigProvider;
use Zend\View\HelperPluginManager;
use Zend\ServiceManager\ServiceManager;

use Illuminate\Support\HtmlString;

class Form extends ZendForm
{
    /**
     * @var PhpRenderer
     */
    protected $renderer;

    /**
     * @return PhpRenderer
     */
    protected function getRenderer(): PhpRenderer
    {
        if (is_null($this->renderer)) {
            $this->renderer = new PhpRenderer;
            $configProvider = new ConfigProvider;
            $pluginManager = new HelperPluginManager(new ServiceManager, $configProvider()['view_helpers']);

            $this->renderer->setHelperPluginManager($pluginManager);
        }

        return $this->renderer;
    }

    /**
     * @return HtmlString
     */
    public function render(): HtmlString
    {
        return new HtmlString($this->getRenderer()->form($this));
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        $renderer = $this->getRenderer();

        if (is_callable([$renderer, $method])) {
            return call_user_func_array([$renderer, $method], $arguments);
        }

        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $method));
    }
}
