<?php

namespace Revolution\ZendForm;

use Illuminate\Container\Container;
use Illuminate\Support\HtmlString;

use Zend\Form\Form as ZendForm;
use Zend\View\Renderer\RendererInterface;

class Form extends ZendForm
{
    /**
     * @return RendererInterface
     */
    protected function getRenderer(): RendererInterface
    {
        return Container::getInstance()->make(RendererInterface::class);
    }

    /**
     * @param string $helper
     *
     * @throws \BadMethodCallException
     *
     * @return HtmlString
     */
    public function render(string $helper = 'form'): HtmlString
    {
        $renderer = $this->getRenderer();

        if (is_callable([$renderer, $helper])) {
            return new HtmlString(call_user_func_array([$renderer, $helper], [$this]));
        }

        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $helper));
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
