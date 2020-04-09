<?php


namespace core\components;


use core\components\router\routeInit;

class router
{

    public  $url;
    public $route;
    public $controller;

    public function __construct()
    {
    }

    public function Run()
    {
        $routeInit = new routeInit();
        $this->route = $routeInit->GetRoute('/about/asd/q2/123/');
        $this->CallMethod($routeInit->getData());
    }
    private function CallMethod($data)
    {
        $fullControllerName = ds.'controller'.ds.$this->route->getController();
        $this->controller = new $fullControllerName();
        $this->controller->{$this->route->getMethod()}($data);

    }

}