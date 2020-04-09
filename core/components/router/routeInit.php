<?php


namespace core\components\router;


use core\components\router;

class routeInit
{

    public $container;
    private $data = [];
    public function __construct()
    {
        $this->InitializeRoutes();
    }

    public function Add($name, $url, $controller, $method)
    {
       $this->container[$name] = new routeDependence($name, $url, $controller, $method);
    }

    public function InitializeRoutes()
    {
        require_once dir.ds.'routes.php';

    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    public function GetRoute($url)
    {
        foreach ($this->container as $item)
        {
            if(
                $this->CheckUrl($url, $item->getUrl())
            ) {
                return $item;
            }
        }
        return $this->container["routerError"];
    }

    public function CheckUrl($url1, $url2)
    {
        $url = preg_split('%/%', $url1, -1, PREG_SPLIT_NO_EMPTY );
        $rule = preg_split('%/%', $url2, -1, PREG_SPLIT_NO_EMPTY );

       // exit();
        $OK = true;
        for($i = 0; $i < count($url); $i++) {
            if (!isset($rule[$i])) return false;

            if (preg_match($this->Preg($rule[$i], $i), $url[$i])) {
                if(isset($this->data[$i]))
                {

                }

                $OK = true;
            }
            else return false;
        }
        return $OK;
    }


    //// Добавить имя переменной в {(int)} типа
    /// {(int:name1)}
    private function Preg($rule, $i)
    {
        if($rule == '{(int)}')
        {
            $this->data[$i] = ['int'];
            return '/^[0-9]+$/';
        }elseif($rule == '{(str)}')
        {
            $this->data[$i] = ['str'];
            return '/^([0-9a-zA-Z]+)$/';
        }else return '/'.$rule.'/';
    }


}



