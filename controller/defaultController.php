<?php


namespace controller;


use core\container\DI;

class defaultController
{
    private $di;
    private $view;
    public array $data;
    public function __construct($di)
    {
        $this->di = $di;
        $this->data = $di->GetData();
        $this->view = $this->di->Get('view');
    }

    public function Start()
    {
        $this->data = [
          "test"=>"this is test",
        ];
        $this->view->Render('home', $this->data);
    }
    public function About()
    {
        echo 'This is '.__METHOD__.' and have data ';
    }
    public function AboutInt($data)
    {
        echo 'This is '.__METHOD__.' and have data ';
        print_r($data);
    }
    public function AboutStr($data)
    {
        echo 'This is '.__METHOD__.' and have data ';
        print_r($data);
    }
}