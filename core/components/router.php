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
        $this->route = $routeInit->GetRoute('/about/123/s/');
        $this->CallMethod($routeInit->getData());
    }
    private function CallMethod($data)
    {
        $fullControllerName = ds.'controller'.ds.$this->route->getController();
        $fullControllerName = slashNamespasehReplase($fullControllerName);
        $this->controller = new $fullControllerName();
        if(!empty($data)) {
            $this->controller->{$this->route->getMethod()}($data);
        }else{
            $this->controller->{$this->route->getMethod()}();
        }
    }

}