<?php


namespace controller;


class defaultController
{
    public function Start()
    {
        echo 'This is '.__METHOD__.' and have data ';
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