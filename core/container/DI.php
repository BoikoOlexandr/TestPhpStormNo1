<?php


namespace core\container;


class DI
{
    //переменная контейнер в которой будут хранится все другие переменные
    //далее гетер и сетер для нее!
    private array $container;

    public function Set($key, $value)
    {
        if(!array_key_exists($key, $this->container)) {
            $this->container[$key] = $value;
        }
        else{
            echo "Class ".$key." already exist!";
        }
    }

    public function Get($key)
    {
        if(array_key_exists($key, $this->container))
        {
            return $this->container[$key];
        }
        else{
            echo 'There are no '.$key.' in container!';
            return false;
        }
    }
}