<?php

namespace Revolution\ZendForm;

use Zend\Form\Form as ZendForm;
use Zend\View\Renderer\RendererInterface;

use Illuminate\Support\HtmlString;

class Form extends ZendForm
{
    /**
     * @return RendererInterface
     */
    protected function getRenderer(): RendererInterface
    {
        return app(RendererInterface::class);
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
