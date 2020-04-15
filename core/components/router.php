<?php


namespace core\components;


use core\components\router\routeInit;

class router
{

    private $di;
    public  $url;
    public $route;
    public $controller;

    public function __construct($di)
    {
        $this->di = $di;
        $this->url = $_SERVER["REQUEST_URI"];
    }

    public function Run()
    {
        $routeInit = new routeInit();
        $this->route = $routeInit->GetRoute($this->url);
        $this->CallMethod($routeInit->getData());
    }
    private function CallMethod($data)
    {
        $fullControllerName = ds.'controller'.ds.$this->route->getController();
        $fullControllerName = slashNamespasehReplase($fullControllerName);
        $this->controller = new $fullControllerName($this->di);
        if(!empty($data)) {
            $this->controller->{$this->route->getMethod()}($data);
        }else{
            $this->controller->{$this->route->getMethod()}();
        }
    }

}