<?php

namespace Routing;

class MatchedRoute
{
    private $controller;
    private $action;
    private $parameters;

    public function __construct($controller, array $parameters = array())
    {
        list($this->controller, $this->action) = explode(":", $controller, 2);
        $this->parameters = $parameters;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}